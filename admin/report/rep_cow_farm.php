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
                            <h1>Reports จำนวนโตเนื้อแต่ละฟาร์ม</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../main/admin_index.php">Home</a></li>
                                <li class="breadcrumb-item active">จำนวนโตเนื้อแต่ละฟาร์ม</li>
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
                                    <h3 class="card-title">จำนวนโตเนื้อแต่ละฟาร์ม</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ฟาร์ม</th>
                                                <th>เจ้าของฟาร์ม</th>
                                                <th>ดูรายละเอียดจำนวนโค</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php require '../../connect/functions.php';
                                            $sql = new reports();
                                            $query = $sql->req_countcow('');
                                            $i = 1;
                                            while ($row = $query->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td style="width: 20%;"><?php echo $i; ?></td>
                                                    <td><?php echo $row->farmname; ?></td>
                                                    <td><?php echo $row->fullname; ?></td>

                                                    <td class='data' style="width: 20%;"><?php echo $row->cou_cow; ?> ตัว</td>

                                                </tr>
                                            <?php
                                                $i++;
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
        </div>
        <!-- /.content-wrapper -->
        <?php
        require '../sub/fooster.php'; ?>

    </div>
    <!-- ./wrapper -->
    <script src="../../dist/js/datatable.js"></script>

</body>


</html>