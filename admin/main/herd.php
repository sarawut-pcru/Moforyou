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
                            <h1>ManagePages ฝูงโค</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./admin_index.php">Home</a></li>
                                <li class="breadcrumb-item active">Herd</li>
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
                                    <h3 class="text-center">ฝูงโค</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- table -->
                                    <table id="example1" class="table table-bordered table-striped table-hover">
                                        <!-- head table -->
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ฝูง</th>
                                                <th>โรงเรือน</th>
                                                <th>ฟาร์ม</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <!-- /.head table -->
                                        <!-- body table -->
                                        <tbody>
                                            <?php
                                            $sql = new herd();
                                            $query = $sql->select_herd('');
                                            while ($row = $query->fetch_object()) { ?>
                                                <tr>
                                                    <td><?php echo $row->id; ?></td>
                                                    <td><?php echo $row->herd_name; ?></td>
                                                    <td><?php echo $row->house_name; ?></td>
                                                    <td><?php echo $row->farmname; ?></td>
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-info btnEdits" title="แก้ไขข้อมูล" id="<?php echo $row->id; ?>">
                                                                <i class="fas fa-pencil-alt"></i>

                                                            </a>
                                                            <!-- <a class="btn btn-danger btnDels" title="ลบข้อมูล" id="<?php echo $row->id; ?>">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a> -->
                                                        </center>
                                                    </td>
                                                </tr>
                                            <?php } ?>
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
            <?php require_once '../modalEdit.php'; ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require '../sub/fooster.php'; ?>

    </div>
    <!-- ./wrapper -->

</body>
<script src="../../dist/js/datatable.js"></script>
<script>
    //edit
    // . = class
    // # = id 
    $(document).on('click', '.btnEdits', function(e) {
        // $(document).on('click', '.btnEdits', function(e) {
        e.preventDefault();

        var id = $(this).attr('id');
        var txt_head = 'Edit Herd'

        $.ajax({
            type: 'get', //post put get delete
            dataType: "json",
            url: '../process/_herd.php', //ทำงานที่ไฟล์อะไร
            data: { // ส่งค่าอะไรไปบ้าง
                id: id,
                function: 'showeditherd',
            },
            success: function(rs) {

                var house_id = rs.house_id;

                $("#modalEditherd").modal("show");
                $("#modalherd").html(txt_head)
                $("#herdname").val(rs.herd_name);

                $('#modal_herdid').val(rs.id);

                $.ajax({
                    type: 'get',
                    dataType: "json",
                    url: '../process/_herd.php',
                    data: {
                        function: '',
                        id: '',
                    },
                    success: function(rs) {
                        var fact = '';

                        for (i in rs) {
                            if (rs[i].id == house_id) {
                                fact += '<option selected value="' + rs[i].id + '" selected >' + rs[i]
                                    .house_name +
                                    '</option>'
                            } else {
                                fact += '<option value="' + rs[i].id + '">' + rs[i]
                                    .house_name +
                                    '</option>';
                            }

                        }
                        $("#house_id").html(fact);
                    }

                })

            }
        })

    });
    // modal //
    $(document).on('click', '.btnsave', function(e) {
        // $(document).on('click', '.btnEdits', function(e) {
        e.preventDefault();

        var id = $("#modal_herdid").val();
        var fname = $("#herdname").val();
        var IDHouse = $("#house_id").val();


        var txt_head = 'Edit Herd'

        $.ajax({
            type: 'get', //post put get delete
            dataType: "json",
            url: '../process/_herd.php', //ทำงานที่ไฟล์อะไร
            data: { // ส่งค่าอะไรไปบ้าง
                hname: fname,
                IDHouse: IDHouse,
                id: id,
                function: 'modaleditherd',
            },
            success: function(result) {
                if (result.status != 200) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                    })
                    Toast.fire({
                            icon: 'warning',
                            title: result.message

                        })
                        .then((result) => {
                            $("#modalEdit").modal("hide");
                            location.reload();

                        })
                } else {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                    })
                    Toast.fire({
                        icon: 'success',
                        title: result.message

                    }).then((result) => {
                        $("#modalEditherd").modal("hide");
                        location.reload();
                        // $('#frmModalEdit')[0].reset();
                        // $('#title').focus();
                    })
                }

            }
        })

    });

    // delete
    $(document).on('click', '.btnDels', function(e) {
        e.preventDefault();


        var id = $(this).attr('id');

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
                    dataType: 'JSON',
                    type: "get",
                    url: "../process/_herd.php",
                    data: {
                        id: id,

                        function: 'delsherd',
                    },
                    success: function(result) {
                        Swal.fire({
                            icon: 'success',
                            title: result.message,
                        }).then((result) => {
                            location.reload();
                        })
                    },
                });
            }
        })



    });
</script>

</html>