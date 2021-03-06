<?php
require_once '../../connect/session_ckeck.php';
require '../../connect/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
    <meta http-equiv="Content-Type" content="text/html; charset=tis-620">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin|Dashboard</title>
    <?php
    include '../../build/script.php';
    ?>
</head>

</script>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <?php
        // Navbar Admin
        require '../sub/navbar.php';
        // Aside Admin
        require '../sub/aside.php';
        // Manage Pages Admin
        require '../sub/side_manage.php';
        // Reports Admin   
        require '../sub/side_reports.php';
        ?>

        </ul>

        <!-- /.sidebar-menu -->
        <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>ManagePages การผสมพันธุ์</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./admin_index.php">Home</a></li>
                                <li class="breadcrumb-item active">Breed</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header card-outline card-blue">
                                    <h3 class="text-center">การผสมพันธุ์</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- table -->
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <!-- head table -->
                                        <thead>
                                            <tr align="center">
                                                <th>#</th>
                                                <th>ระหว่าง</th>
                                                <th>วันที่ / เวลา</th>
                                                <th>ประมาณวันที่คลอด</th>

                                            </tr>
                                        </thead>
                                        <!-- /.head table -->
                                        <!-- body table -->
                                        <tbody>
                                            <?php
                                            function DateThai($strDate)
                                            {
                                                $strYear = date("Y", strtotime($strDate)) + 543;
                                                $strMonth = date("n", strtotime($strDate));
                                                $strDay = date("j", strtotime($strDate));
                                                $strHour = date("H", strtotime($strDate));
                                                $strMinute = date("i", strtotime($strDate));
                                                $strSeconds = date("s", strtotime($strDate));
                                                $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
                                                $strMonthThai = $strMonthCut[$strMonth];
                                                if ($strHour == '00' && $strMinute == '00') {
                                                    return "$strDay $strMonthThai $strYear   ";
                                                } else {
                                                    return "$strDay $strMonthThai $strYear $strHour:$strMinute  ";
                                                }
                                            }
                                            $data = new breed();
                                            $row = $data->select_breed_all('');
                                            $i = 1;
                                            while ($rs = mysqli_fetch_object($row)) {
                                            ?>
                                                <tr align="center">
                                                    <td style="width: 10%;"><?php echo $i; ?></td>
                                                    <td><?php echo $rs->namemale . " และ " . $rs->namefemale; ?></td>
                                                    <td><?php echo DateThai($rs->breed_date); ?></td>
                                                    <td><?php echo DateThai($rs->breednext); ?></td>
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
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require '../sub/fooster.php'; ?>

    </div>
    <!-- ./wrapper -->

</body>
<script src="../../dist/js/datatable.js"></script>

</html>