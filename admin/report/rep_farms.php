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
                            <h1>Report ข้อมูลฟาร์ม</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../main/admin_index.php">Home</a></li>
                                <li class="breadcrumb-item active">ข้อมูลฟาร์ม</li>
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
                                    <h3 class="card-title">ข้อมูลฟาร์ม</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ฟาร์ม</th>
                                                <th>ที่อยู่</th>
                                                <th>ชื่อเจ้าของฟาร์ม</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php require '../../connect/functions.php';
                                            $sql = new farm();
                                            $query = $sql->selectfarm('admin');
                                            $i = 1;
                                            while ($row = $query->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td style="width: 10%;"><?php echo $i; ?></td>
                                                    <td><?php echo $row->farmname; ?></td>
                                                    <td><?php @$get_tombon = file_get_contents('https://raw.githubusercontent.com/sarawut-pcru/Thailand_Map/main/json/tombon.json');
                                                        $tombon = json_decode($get_tombon);
                                                        foreach ($tombon as $value) {
                                                            if ($row->district_id == $value->id) { //? check id amphur
                                                                echo  $value->name_th;
                                                            }
                                                        }; ?></td>
                                                    <td><?php echo $row->fullname; ?></td>
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
        </div>
        <!-- /.content-wrapper -->
        <?php require '../sub/fooster.php'; ?>

    </div>
    <!-- ./wrapper -->

</body>
<script src="../../dist/js/datatable.js"></script>


</html>