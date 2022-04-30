<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MoForYou</title>

    <?php require '../../build/script.php'; ?>
    <link rel="stylesheet" href="./_main_page.css">
    <style>
        .card-data {
            background: rgb(209, 128, 0);
            background: linear-gradient(0deg, rgba(209, 128, 0, 1) 0%, rgba(255, 231, 168, 1) 45%, rgba(255, 231, 168, 1) 58%, rgba(209, 128, 0, 1) 100%);
        }

        .edit-head {
            background: rgba(209, 128, 0, 1);
            color: #fff;
        }

        .font-big {
            font-size: 18px;
        }
    </style>

<body class=" hold-transition sidebar-collapse layout-top-nav">

    <div class=" wrapper mb-5">
        <!-- Navbar -->
        <?php require './navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="bgimg content-wrapper mt-5 ">

            <!-- Content Header (Page header) -->
            <section class=" content-header ">
                <div class=" container-fluid mt-2  ">

                    <div class=" row justify-content-center ">
                        <div class="col">
                            <ul class="nav nav-pills " id="custom-content-below-tab" role="tablist">
                                <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                    <a class="bt " id="tab-farm-tab" href="index_tab-farm">ฟาร์ม</a>
                                </li>
                                <li class="nav-item  col-md-4 col-sm-12 mt-2">
                                    <a class="bt active" id="tab-cow-tab" href="index_tab-cow">โคเนื้อ</a>
                                </li>
                                <li class="nav-item col-md-4 col-sm-12 mt-2">
                                    <a class="bt " id="tab-specise-tab" href="index_tab-specise">สายพันธุ์โคเนื้อ</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content-header -->
            <!-- Main Tab -->
            <div class=" tab-content mt-3 " id="custom-content-below-tabContent">
                <!-- row card -->

                <!-- tab-1 -->
                <div class="tab-pane fade show active " id="tab-cow">
                    <?php require './tab_layout/_tab_cow.php'; ?>
                </div>

                <!-- /.row card -->
            </div>
        </div>

        <!-- /.content-wrapper -->
        <?php require_once './modalreqcow.php';
        require_once './modalreqfarm.php';
        require './footer.php'; ?>
        <!-- <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </a> -->
    </div>
    <!-- ./wrapper -->
    <script>
        $(document).ready(function() {

            $(document).on('click', '.modalreqcow', function() {
                var id = $(this).attr('id');
                $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: './_reqindex.php',
                    data: {
                        function: "cow",
                        cowid: id,
                    },
                    success: function(result) {
                        $('#reqcow').modal('show');
                        $('#farm-name').html(result.name);
                        $('#farmer-name').html(result.farm_name);
                        $('#cow-name').html(result.cow_name);
                        $('#spec-name').html(result.spec_name);
                        $('#gender').html(result.gender);
                        $('#age').html(result.age);
                        $('#weight').html(result.weight);
                        $('#high').html(result.high);
                        $('#dis-name').html(result.detail);
                        $('#date-dis').html(result.datestart);
                        $('#start-heal').html(result.healend);
                        $('#end-heal').html(result.healend);


                    }
                })

            })
        })
    </script>
</body>


</html>