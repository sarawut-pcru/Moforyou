<?php
error_reporting(~E_NOTICE);
require_once '../../connect/functions.php';

$sql = new doctor();

// $id = $_REQUEST['id'];
$func = $_REQUEST['function'];

if (isset($func) && $func == 'insert') {
    $name = trim($_POST['docname']);
    $phone = preg_replace('/(-|_)/i', '', $_POST['phone']);
    $farm_id = $_POST['farm_id'];
    if (strlen($phone) <= 9) {
        $msg = array("status" => 0, "error" => true, "message" => "ไม่สามารถบันทึกได้");
    } else if (empty($name) || empty($phone) || empty($farm_id)) {
        $msg = array("status" => 0, "error" => true, "message" => "ไม่สามารถบันทึกได้");
    } else {
        $query = $sql->insert_doc($name, $phone, $farm_id);
        $msg = array(
            "status" => 200,
            "message" => 'บันทึกข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
    //  http_response_code(200);
}
if (isset($func) && $func == 'update') {
    $name = trim($_POST['docname']);
    $phone = preg_replace('/(-|_)/i', '', $_POST['phone']);
    $id = $_POST['docid'];
    if (strlen($phone) <= 9) {
        $msg = array("status" => 0, "error" => true, "message" => "ไม่สามารถบันทึกได้");
    } else if (empty($name) || empty($phone) || empty($id)) {
        $msg = array("status" => 0, "error" => true, "message" => "ไม่สามารถแก้ไขได้");
    } else {
        $query = $sql->update_doc($name, $phone, $id);
        $msg = array(
            "status" => 200,
            "message" => 'แก้ไขข้อมูลสำเร็จ',
        );
    }
    echo json_encode($msg);
    // http_response_code(200);
}

if (isset($func) && $func == 'showdata') {
    $id = $_GET['id'];
    $query = $sql->select_doc($id);
    $i = 0;
    while ($row = $query->fetch_object()) {
        $data = array(
            "id" => intval($row->id),
            "name" => $row->name,
            "phone" => $row->phone,
        );
        $i++;
    }
    if (empty($data)) {
        echo json_encode(array());
        // http_response_code(200);
    } else {
        echo json_encode($data);
        // http_response_code(200);
    }
}
if (isset($func) && $func == 'delete') {
    $sqldoctor =  new doctor();
    $id = $_GET['id'];
    $query = $sqldoctor->selectdeldoc($id);
    $row = $query->fetch_object();
    if ($row->doc_id > 0) {
        $msg = array(
            "status" => 0,
            "message" => "มีการใช้งานข้อมูลอยู่ไม่สามารถลบข้อมูลได้"
        );
    } else {
        if (empty($id)) {
            $msg = array("status" => 0, "error" => true, "message" => "ไม่สามารถลบข้อมูลได้");
        } else {
            $query = $sql->delete_doc($id);
            $msg = array(
                "status" => 200,
                "message" => 'ลบข้อมูลสำเร็จ',
            );
        }
    }

    echo json_encode($msg);
    // http_response_code(200);
}
