<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php require_once '../../build/script.php'; ?>
</head>

<body>
    <?php
    require_once '../../connect/functions.php';
    require_once '../../connect/alert.php';

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $deletedata = new house();
        $sql = $deletedata->delhouse($id);
        if ($sql) {
            echo success("ลบข้อมูลสำเร็จ", "../listmenu/_tabhouse.php");
        }
    }
    ?>
</body>

</html>