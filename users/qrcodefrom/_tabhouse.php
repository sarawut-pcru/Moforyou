<?php
require '../../connect/session_ckeck.php';
require_once '../../connect/functions.php';
//เก็บ id จาก session
$id = $_SESSION['id'];

$sql = new farm();
$fcheck = $sql->checkregisfarm($id);

// เช็คว่ามีการลงทะเบียนฟาร์มหรือไม่
$result = mysqli_num_rows($fcheck);
//ถ้าไม่มีส่งไปหน้าลงทะเบียน
if (empty($result)) {
    require_once '../alert/check_farm.php';
} else {
    while ($obj = $fcheck->fetch_object()) {
        $_SESSION['farm_id'] = $obj->id;
    }
}
// ถ้ามีแสดง tag นี้
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
    <div class=" wrapper">

        <!-- Navbar -->
        <?php require '../sub/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <section class=" content">
            <div class="bgimg content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container">
                        <!-- Manage -->
                        <div class="row justify-content-center">

                            <div class="col-md-8">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">เพิ่มข้อมูลโรงเรือน</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ชื่อโรงเรือน</label>
                                                <input type="text" class="form-control " id="hname" name="hname" placeholder="ชื่อโรงเรือน">
                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer text-end">
                                            <button type="submit" id="submit" name="submit" class="btn btn-primary submit">เพิ่ม</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->

                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- ./row -->

                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <div class="container ">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-outline card-blue">
                                    <h3 class=" text-center">โรงเรือน</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- table -->
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <!-- head table -->
                                        <thead>

                                            <tr>
                                                <th>#</th>
                                                <th>ชื่อโรงเรือน</th>
                                                <th>สร้าง Qrcode โรงเรือน</th>
                                                <th>แก้ไข / ลบข้อมูล</th>
                                            </tr>

                                        </thead>
                                        <!-- /.head table -->
                                        <!-- body table -->
                                        <tbody>
                                            <?php
                                            $datahouse = new house();
                                            $farmid = $_SESSION['farm_id'];
                                            $row = $datahouse->gethouseFarmid($farmid);
                                            $i = 1;
                                            while ($rs = $row->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td style="width: 20%;"><?php echo $i; ?></td>
                                                    <td style="width: 40%;"><?php echo $rs->house_name; ?></td>
                                                    <td style="width: 20%;" class="text-center">
                                                        <button class="btn btn-primary btnqrcode" title="สร้าง QR-code" id="<?php echo $rs->id; ?>">
                                                            <i class=" fa fa-qrcode"></i>
                                                        </button>
                                                    </td>
                                                    <td style="width:30%;" class="text-center">

                                                        <a class="btn btn-info btnEdit" title="แก้ไขข้อมูล" id="<?php echo $rs->id; ?>">
                                                            <i class="fa fa-pen-alt"></i>
                                                        </a>
                                                        <a class="btn btn-danger btnDels" title="ลบข้อมูล" id="<?php echo $rs->id; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
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
            <?php require_once 'modalQrcode.php'; ?>
            <?php require_once './modalhouse.php'; ?>
            <!-- /.content-wrapper -->
        </section>
        <!-- Main Footer -->
        <?php require '../sub/footer.php'; ?>
    </div>
    <script src="../../plugins/qrocde/qrcode.js"></script>
    <!-- ./wrapper -->
    <script>
        $(document).ready(function() {



            $(document).on('click', '.btnqrcode', function(e) {
                var farmid = $(this).attr('id');
                 <?php $sql =  new registra();
                $query = $sql->Getpwd($_SESSION["user"], $_SESSION["email"]);
                $row = $query->fetch_object();
                $username = $row->username;
                $password = $row->password;
                ?>
                var url = '<?php echo $_SERVER['HTTP_HOST'] . '/users/qrcodefrom/_qrcode.php?username=' . $username . "&password=" . $password ?>';
               console.log(url);
		 $('#qrcode').html('');
                if (farmid) {

                    new QRCode(qrcode, url);
                    $('#modalqrcode').modal('show');
                }
            });



            toastr.options = {
                'closeButton': false,
                'debug': false,
                'newestOnTop': false,
                'progressBar': false,
                'positionClass': 'toast-top-right',
                'preventDuplicates': false,
                'onclick': null,
                'showDuration': '300',
                'hideDuration': '1000',
                'timeOut': '5000',
                'extendedTimeOut': '1000',
                'showEasing': 'swing',
                'hideEasing': 'linear',
                'showMethod': 'fadeIn',
                'hideMethod': 'fadeOut'
            }
            $(document).on('click', '.submit', function(e) {
                e.preventDefault();

                var housename = $('#hname').val();
                var farmid = "<?php echo $_SESSION['farm_id']; ?>";

                $.ajax({
                    type: 'post',
                    dataType: 'json',
                    url: '../process/_house.php',
                    data: {
                        function: 'insert',
                        id: farmid,
                        housename: housename,
                    },
                    success: function(result) {
                        if (result.status == 200) {
                            toastr.success(
                                result.message,
                                '', {
                                    timeOut: 1000,
                                    fadeOut: 1000,
                                    onHidden: function() {
                                        location.reload();
                                    }
                                }
                            );
                        } else {
                            toastr.warning(
                                result.message,
                                '', {
                                    timeOut: 1000,
                                    fadeOut: 1000,
                                    onHidden: function() {
                                        location.reload();
                                    }
                                }
                            );
                        }
                    }

                });
            });

            $(document).on('click', '.btnEdit', function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                var housename = $("#modalhouse").val();
                var txt = 'แก้ไขข้อมูลโรงเรือน';
                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '../process/_house.php',
                    data: {
                        function: 'show',
                        id: id,
                    },
                    success: function(result) {
                        $("#modalEdit").modal('show');
                        $("#modaltextcenter").html(txt);
                        $("#modalhouse").val(result.housename);
                        $("#modal_houseid").val(result.house_id);

                    }
                });

            });

            $(document).on('click', '.btnDels', function(e) {
                e.preventDefault();
                var id = $(this).attr('id');
                var _row = $(this).parent();
                Swal.fire({
                    title: 'คุณต้องการลบข้อมูลใช่หรือไม่ ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "ยืนยัน",
                    cancelButtonText: "ยกเลิก",
                }).then((btn) => {
                    if (btn.isConfirmed) {
                        $.ajax({
                            type: 'get',
                            dataType: 'json',
                            url: '../process/_house.php',
                            data: {
                                function: 'del',
                                id: id,
                            },
                            success: function(result) {
                                if (result.status == 200) {
                                    toastr.success(
                                        result.message,
                                        '', {
                                            timeOut: 1000,
                                            fadeOut: 1000,
                                            onHidden: function() {
                                                // location.reload();
                                                _row.closest('tr').remove();
                                            }
                                        }
                                    );
                                } else {
                                    toastr.warning(
                                        result.message,
                                        '', {
                                            timeOut: 1000,
                                            fadeOut: 1000,
                                            onHidden: function() {
                                                location.reload();
                                            }
                                        }
                                    );
                                }
                            }
                        });
                    }
                })
            });

            $(document).on('click', '.btnsave', function(e) {
                e.preventDefault();
                var id = $("#modal_houseid").val();
                var housename = $("#modalhouse").val();

                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '../process/_house.php',
                    data: {
                        function: 'edit',
                        id: id,
                        housename: housename,
                    },
                    success: function(result) {
                        if (result.status == 200) {
                            toastr.success(
                                result.message,
                                '', {
                                    timeOut: 1000,
                                    fadeOut: 1000,
                                    onHidden: function() {
                                        location.reload();
                                    }
                                }
                            );
                        } else {
                            toastr.warning(
                                result.message,
                                '', {
                                    timeOut: 1000,
                                    fadeOut: 1000,
                                    onHidden: function() {
                                        location.reload();
                                    }
                                }
                            );
                        }
                    }
                });

            });
        });
    </script>
    <script src="../../dist/js/datatable.js"></script>

</body>

</html>