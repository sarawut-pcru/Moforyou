<?php
require_once '../../connect/session_ckeck.php';
require '../../connect/functions.php';


$sql = new farmer();
$query = $sql->select_allfarmer('', '');
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
                            <h1>Report ข้อมูลผู้ใช้งาน</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../main/admin_index.php">Home</a></li>
                                <li class="breadcrumb-item active">ข้อมูลผู้ใช้งาน</li>
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
                                <div class="card-header">
                                    <div class="row justify-content-between">

                                    </div>
                                    <h3 class="card-title">ข้อมูลผู้ใช้งาน</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ชื่อเจ้าของฟาร์ม</th>
                                                <th>เบอร์โทร</th>
                                                <th>อีเมล</th>
                                                <th>บัตรประชาชน</th>
                                                <!-- <th>ดูรายละเอียด</th> -->

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1;
                                            while ($row = $query->fetch_object()) { ?>
                                                <tr>
                                                    <td style="width: 10%;"><?php echo $i; ?></td>
                                                    <td><?php echo $row->fullname; ?></td>
                                                    <td><?php echo $row->phone; ?></td>
                                                    <td><?php echo $row->email; ?></td>
                                                    <td><?php echo substr($row->card, 0, 7) . "*******"; ?></td>
                                                    <!-- <td>
                                                    <center>
                                                        
                                                        <a class="btn btn-info  btnDetail" title="ดูรายละเอียด" id="<?php echo $row->id; ?>">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </center>
                                                </td> -->


                                                </tr>
                                            <?php $i++;
                                            } ?>
                                        </tbody>

                                    </table>
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
            <?php require_once '../modalDetail.php'; ?>
        </div>
        <!-- /.content-wrapper -->
        <?php require '../sub/fooster.php'; ?>

    </div>
    <!-- ./wrapper -->

</body>
<script src="../../dist/js/datatable.js"></script>



</html>