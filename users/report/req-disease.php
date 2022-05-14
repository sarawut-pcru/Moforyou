<?php
require '../../connect/session_ckeck.php';
require_once '../../connect/functions.php';
//เก็บ id จาก session
$id = $_SESSION['id'];
$farmid = $_SESSION['farm_id'];

$sql = new farm();
$fcheck = $sql->checkregisfarm($id);

// เช็คว่ามีการลงทะเบียนฟาร์มหรือไม่
$result = mysqli_num_rows($fcheck);
//ถ้าไม่มีส่งไปหน้าลงทะเบียน
if (empty($result)) {
    require_once '../alert/check_farm.php';
} else {
    // ถ้ามีแสดง tag นี้
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoForYou</title>

    <?php require '../../build/script.php'; ?>
    <link rel="stylesheet" href="../main/_listmenu.css">
</head>


<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require '../sub/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <section class="content">
            <div class="bgimg content-wrapper">
                <!-- Content Header (Page header) -->

                <div class="content-header">
                    <div class="container">
                        <div class="row mb-4 mt-4 justify-content-beetween ">

                            <div class="col-md-12">
                                <button class="btn btn-info col-3 btn-lg float-end""  onclick=" window.history.go(-1);"><i class="fa fa-arrow-alt-left"></i></button>
                            </div>
                        </div>
                        <div class="row  mb-5">
                            <div class="col-md-12">
                                <div class="card card-info ">
                                    <?php
                                    $data = new heal();
                                    $row1 = $data->refheal($farmid);
                                    $rs1 = mysqli_fetch_object($row1);
                                    ?>
                                    <div class="card-header ">
                                        <h3 class=" text-center">รายงาน โรค / อาการป่วย ของ <?php echo $rs1->farmname ?></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- table -->
                                        <div class=" text-end mb-3">
                                            <a class="btn btn-outline-danger "><img src="../../dist/img/icon/pdf.png" width="40px"></a>
                                            <a href="../print/print_disease.php?farm=<?php echo $farmid; ?>" class="btn btn-outline-primary "><img src="../../dist/img/icon/printer.png" width="40px"></a>
                                        </div>
                                        <table id="example1" class="table table-bordered table-striped table-hover">
                                            <!-- head table -->
                                            <thead>

                                                <tr>
                                                    <th>#</th>
                                                    <th>ชื่อโค</th>
                                                    <th>โรคหรืออาการป่วย</th>
                                                    <th>เริ่มแสดงอาการวันที่</th>
                                                </tr>

                                            </thead>
                                            <!-- /.head table -->
                                            <!-- body table -->
                                            <tbody>
                                                <?php
                                                $data = new heal();
                                                require_once '../../connect/function_datetime.php';
                                                $row = $data->select_healbyfarm($farmid);
                                                $i = 1;
                                                while ($rs = mysqli_fetch_object($row)) {
                                                    if ($rs->dis_id == '1') {
                                                        $dis = '';
                                                    } else {
                                                        $dis = $rs->detail;
                                                    }
                                                    if ($rs->healmore != NULL && $dis == '') {
                                                        $disa = $rs->healmore;
                                                    } else {
                                                        $disa =  $dis . " และ " . $rs->healmore;
                                                    }


                                                ?>
                                                    <tr>
                                                        <td style="width: 10%;"><?php echo $i; ?></td>
                                                        <td style="width: 30%;"><?php echo $rs->cow_name; ?></td>
                                                        <td><?php echo $disa; ?></td>
                                                        <td style="width: 30%;"><?php echo DateThai($rs->datestart); ?></td>

                                                        <!--  -->
                                                    </tr>
                                                <?php
                                                    $i++;
                                                } ?>
                                            </tbody>
                                            <!-- /.body table -->

                                        </table>
                                        <!-- /.table -->
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.content-wrapper -->
        </section>
        <!-- Main Footer -->
        <?php require '../sub/footer.php'; ?>
    </div>

    <!-- ./wrapper -->
    <script src="../../dist/js/datatable.js"></script>
</body>


</html>