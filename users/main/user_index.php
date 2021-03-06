<?php
require '../../connect/session_ckeck.php';
require_once '../../connect/functions.php';
require_once '../../connect/function_datetime.php';
$date = date('Y-m-d');
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
    $selectdata = $sql->selectfarmbyid($_SESSION['farm_id']);
    $result_data = $selectdata->fetch_object();
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
</head>
<style>
    .main-footer {
        padding: 0 0 0 0;
        width: 100%;
    }

    .far {
        color: white;
    }

    .far:hover {
        color: saddlebrown;
    }

    .card-user {
        background: rgb(107, 255, 102);
        background: linear-gradient(0deg, rgba(107, 255, 102, 1) 0%, rgba(255, 180, 11, 1) 100%);

    }

    .colorfont {
        color: white;
    }

    .colorfont:hover {
        color: saddlebrown;
    }
</style>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class=" wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="" src="../../dist/img/Preloader-1.gif" alt="RELOAD">
        </div>
        <!-- Navbar -->
        <?php require '../sub/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="bgimg content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content ">
                <div class="container ">
                    <div class="row  ">
                        <div class="col-md-12  col-sm-12">
                            <div class="card ">
                                <div class="card-header card-user">
                                    <h2 class="text-center m-0 "><i class="fa fa-wreath blink"></i> ยินดีตอนรับ <i class="fa fa-wreath blink"></i></h2>
                                </div>
                                <div class="card-body ">
                                    <div class="d-flex justify-content-around">
                                        <h3 class="card-text ">
                                            คุณ : <?php echo $_SESSION['fullname']; ?>
                                        </h3>
                                        <h3 class="card-text">
                                            ฟาร์ม : <?php if ($result_data->farmname != "") {
                                                        echo $result_data->farmname;
                                                    } else {
                                                        echo 'ยังไม่ได้ลงทะเบียนฟาร์ม';
                                                    }
                                                    ?>
                                        </h3>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- <div class="row"> -->
                        <div class="col-lg-6 col-md-12 col-sm-12 ">
                            <!-- small box -->
                            <div class="small-box bg-gradient-pink">
                                <div class="inner">
                                    <h3 id="farmdata"> ผสมพันธุ์ครั้งล่าสุด</h3>
                                    <div class="d-flex justify-content-start">
                                        <p style="font-size: 18px;" id="datebreed"></p>
                                    </div>
                                    <div class="d-flex  mt-4">
                                        <p class="card-text mr-5 ml-4">
                                            ตัวผู้ : <span id="namemale"></span>
                                        </p>
                                        <p class="card-text  ml-5">
                                            ตัวเมีย : <span id="namefemale"></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-venus-mars"></i>
                                </div>

                                <a href="../report/req-breed.php" class="small-box-footer">ดูข้อมูล <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-md-12 col-sm-12 ">
                            <!-- small box -->
                            <div class="small-box bg-gradient-olive">
                                <div class="inner">
                                    <h3>โคภายในฟาร์ม <span style="font-size: 28px;" id="cowdata"></span> ตัว </h3>
                                    <div class="d-flex justify-content-start">
                                        <p style="font-size: 18px;">จำนวนโคเนื้อทั้งหมด</p>
                                    </div>
                                    <div class="d-flex ml-5 mt-4">
                                        <p class="card-text ml-4">พ่อโค : <span id="male"> </span> ตัว</p>
                                        <p class="card-text ml-4">แม่โค : <span id="female"> </span> ตัว</p>
                                    </div>
                                </div>
                                <div class="icon">
                                    <i class="fad fa-cow"></i>
                                </div>
                                <a href="../report/req-cow.php" class="small-box-footer">ดูข้อมูล <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-6 col-md-12 col-sm-12  ">

                            <div class="card card-purple card-outline">
                                <div class="card-header">
                                    <h5 class="text-center m-0"><i class="fa fa-briefcase-medical"></i> ประวัติการรักษาครั้งล่าสุด</h5>
                                </div>
                                <div class="card-body">

                                    <div class="d-flex justify-content-end">
                                        <h6 class="card-title">วันที่ : <span id="dateheal"></span> </h6>
                                    </div>
                                    <p class="card-text">โค : <span id="namecowheal"></span> </p>
                                    <p class="card-text">อาการป่วย / โรค : <span id="heal"></span></p>
                                    <p class="card-text">สัตวแพทย์ : <span id="doctorheal"></span></p>
                                    <a href="../report/req-heal.php" class="btn btn-primary"><i class="fas fa-search"></i> ดูรายละเอียด</a>

                                </div>
                            </div>
                        </div>

                        <!-- /.col-md-6 -->
                        <div class="col-lg-6 col-md-12 col-sm-12 ">

                            <div class="card card-success card-outline ">
                                <div class="card-header">
                                    <h5 class="text-center m-0"><i class="fa fa-wheat"></i> ประวัติการให้อาหารครั้งล่าสุด</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-end">
                                        <h6 class="card-title"> วันที่ : <span id="datefood"></span> </h6>
                                    </div>
                                    <hr>
                                    <p class="card-text">ทั้งหมด <span id="cowfood"></span> ตัว</p>
                                    <p class="card-text">น้ำหนักอาหารทั้งสิ้น <span id="weightfood"></span> กิโลกรัม</p>
                                    <a href="../report/req-foodrecord.php" class="btn btn-primary"><i class="fas fa-search"></i> ดูรายละเอียด</a>
                                </div>
                            </div>

                        </div>
                        <!-- /.col-md-6 -->
                    </div>


                    <!-- /.container-fluid -->
                </div>
                <div class="container ">
                    <div class="row mb-5">
                        <div class="col-lg-12 col-md-12 col-sm-12 ">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="far fa-chart-bar"></i>
                                        การเจริญเติบโตของโคในแต่ละเดือน (เปอร์เซ็นต์)
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-end">
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <label class="col-form-label " for="month_id">เลือกเดือน : </label>
                                                <div class="col-md">
                                                    <select class="form-select" id="month_id">
                                                        <?php for ($i = 1; $i <= 12; $i++) {
                                                            if ($i <= 9) {
                                                                $month = "0" . $i;
                                                            } else if ($i >= 10) {
                                                                $month = $i;
                                                            }

                                                        ?>
                                                            <option value="<?php echo $month; ?>"><?php echo  month($month); ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <label class="col-form-label " for="year_id">เลือกปี : </label>
                                                <div class="col-md">
                                                    <select class="form-select" id="year_id">
                                                        <?php $sql2 = new recordfood();
                                                        $query2 = $sql2->select_year();
                                                        while ($row = $query2->fetch_object()) {
                                                        ?>
                                                            <option value="<?php echo $row->year; ?>"><?php echo $row->year; ?> </option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div id="bar-chart" style="width: 1000px; height: 500px;margin-left:3rem"></div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-center">ข้อมูล ณ วันที่ : <?php echo DateThai($date) ?> </div>
                                </div>


                            </div>

                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 ">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="far fa-chart-bar"></i>
                                        โคแต่ละสายพันธุ์
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="donut-chart" style="width: 900px; height: 500px;margin-left:6rem"></div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-center">ข้อมูล ณ วันที่ : <?php echo DateThai($date) ?> </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.row -->
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <?php require '../sub/footer.php';
        $sql = new reports();
        $farm_id = $_SESSION['farm_id'];
        $query = $sql->req_cow($farm_id);
        ?>

    </div>
    <!-- ./wrapper -->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['spec_name', 'cow'],
                <?php
                while ($row =  $query->fetch_array()) {
                    echo "['" . $row["spec_name"] . "', " . $row["cow"] . "],";
                }
                ?>
            ]);
            var options = {
                is3D: true,
                title: '',
                pieHole: 0.4,
                colors: ['#402E32', '#864313', '#c9641d', '#e68c4d', '#936444', '#B4876C', '#efb78f', '#f5d4bc', '#FFF7F0', '#DFE0DF'],

            };
            var chart = new google.visualization.PieChart(document.getElementById('donut-chart'));
            chart.draw(data, options);
        }
    </script>
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback();

        function load_monthwise_data(month, title) {
            var temp_title = title + ' ' + month + '';
            var farm = '<?php echo $_SESSION['farm_id']; ?>'
            $.ajax({
                url: "../process/_index.php",
                method: "get",
                data: {
                    month: month,
                    farm_id: farm,
                    function: 'barchart'
                },
                dataType: "JSON",
                success: function(data) {
                    drawMonthwiseChart(data, temp_title);
                }
            });
        }

        function drawMonthwiseChart(chart_data, chart_main_title) {
            var jsonData = chart_data;
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'name');
            data.addColumn('number', '');
            $.each(jsonData, function(i, jsonData) {
                var name = jsonData.name;
                var weight = parseFloat($.trim(jsonData.weight));
                data.addRows([
                    [name, weight]
                ]);
            });
            var options = {
                title: '',
                hAxis: {
                    title: ""
                },

            };

            var chart = new google.visualization.ColumnChart(document.getElementById('bar-chart'));
            chart.draw(data, options);
        }
    </script>

    <script>
        $(document).ready(function() {

            $('#month_id').change(function() {
                var month = $(this).val();
                if (month != '') {
                    load_monthwise_data(month);
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            cache_clear();

            setInterval(function() {
                cache_clear()
            }, 60000);
        });



        function cache_clear() {
            function toThaiDateString(date) {
                let monthNames = [
                    "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
                    "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม.",
                    "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                ];

                let year = date.getFullYear() + 543;
                let month = monthNames[date.getMonth()];
                let numOfDay = date.getDate();

                let hour = date.getHours().toString().padStart(2, "0");
                let minutes = date.getMinutes().toString().padStart(2, "0");
                let second = date.getSeconds().toString().padStart(2, "0");

                return `${numOfDay} ${month} ${year} `; //+
                // `${hour}:${minutes}:${second} น.`;
            }
            var farm_id = '<?php echo $_SESSION['farm_id']; ?>'
            $.ajax({
                type: "get",
                dataType: 'json',
                url: '../process/_index.php',
                data: {
                    function: 'breed',
                    farm_id: farm_id,
                },
                success: function(result) {
                    if (result.date2 != null) {
                        var date1 = new Date(result.date2)
                        var date = toThaiDateString(date1);
                        $('#datebreed').html(date);
                        $('#namemale').html(result.namemale2);
                        $('#namefemale').html(result.namefemale2);
                    } else {
                        $('#datebreed').html('-');
                        $('#namemale').html('-');
                        $('#namefemale').html('-');

                    }
                }
            });
            $.ajax({
                type: "get",
                dataType: 'json',
                url: '../process/_index.php',
                data: {
                    function: 'cow',
                    farm_id: farm_id,
                },
                success: function(result) {
                    if (result.cou_cow == null) {
                        $('#cowdata').html('0');
                        $('#male').html(result.cou_male);
                        $('#female').html(result.cou_female);
                    } else {
                        $('#cowdata').html(result.cou_cow);
                        $('#male').html(result.cou_male);
                        $('#female').html(result.cou_female);
                    }

                }
            });
            $.ajax({
                type: "get",
                dataType: 'json',
                url: '../process/_index.php',
                data: {
                    function: 'food',
                    farm_id: farm_id,
                },
                success: function(result) {
                    if (result.date == null) {
                        $('#datefood').html('--/--/----');
                        $('#weightfood').html('--');
                    } else {
                        var date1 = new Date(result.date)
                        var date = toThaiDateString(date1);
                        $('#datefood').html(date);
                        $('#weightfood').html(result.weight_food);
                    }





                    var date = result.date;
                    $.ajax({
                        type: "get",
                        dataType: 'json',
                        url: '../process/_index.php',
                        data: {
                            function: 'foodcow',
                            date: date,
                            farm_id: farm_id,
                        },
                        success: function(result) {

                            $('#cowfood').html(result.cow);

                        }
                    });
                }
            });
            $.ajax({
                type: "get",
                dataType: 'json',
                url: '../process/_index.php',
                data: {
                    function: 'heal',
                    farm_id: farm_id,
                },
                success: function(result) {
                    if (result.date == null) {
                        $('#dateheal').html('--/--/----');
                        $('#namecowheal').html('-');

                        $('#doctorheal').html('-');
                    } else {
                        var date1 = new Date(result.date)
                        var date = toThaiDateString(date1);
                        $('#dateheal').html(result.date);
                        $('#namecowheal').html(result.cow);

                        $('#doctorheal').html(result.docname);
                    }

                    if (result.heal == null) {
                        var heal = '-';
                    } else {
                        var heal = result.heal;
                    }

                    var dis_id = result.dis;
                    $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: '../process/_index.php',
                        data: {
                            function: 'showdisease',
                        },
                        success: function(results) {
                            var data = '';
                            for (i in results) {
                                if (results[i].id == dis_id) {
                                    var detail = results[i].detail
                                } else {
                                    var detail = '';
                                }
                            }
                            if (dis_id != "") {
                                $('#heal').html(detail + "  " + heal);
                            }
                        }
                    });
                }
            });

        }
    </script>
</body>

</html>