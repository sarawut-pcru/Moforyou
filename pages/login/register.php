<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    
    <?php require '../../build/script.php'; ?>
   
</head>
<style>
    .bg-gd {
        background: rgb(255, 255, 255);
        background: -moz-linear-gradient(315deg, rgba(255, 255, 255, 1) 50%, rgba(207, 116, 27, 1) 50%);
        background: -webkit-linear-gradient(315deg, rgba(255, 255, 255, 1) 50%, rgba(207, 116, 27, 1) 50%);
        background: linear-gradient(315deg, rgba(255, 255, 255, 1) 50%, rgba(207, 116, 27, 1) 50%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ffffff", endColorstr="#cf741b", GradientType=1);
    }

    .card-head {
        background: rgb(195, 104, 0);
        background: -moz-linear-gradient(90deg, rgba(195, 104, 0, 1) 0%, rgba(236, 161, 0, 1) 38%, rgba(255, 188, 0, 1) 100%);
        background: -webkit-linear-gradient(90deg, rgba(195, 104, 0, 1) 0%, rgba(236, 161, 0, 1) 38%, rgba(255, 188, 0, 1) 100%);
        background: linear-gradient(90deg, rgba(195, 104, 0, 1) 0%, rgba(236, 161, 0, 1) 38%, rgba(255, 188, 0, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#c36800", endColorstr="#ffbc00", GradientType=1);
    }

    .login100-form-btn {

        line-height: 1.5;
        color: #fff;
        text-transform: uppercase;

        width: 100%;
        height: 50px;
        border-radius: 25px;
        background: #c36800;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 25px;

        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;
    }

    .login100-form-btn:hover {
        background: rgba(236, 161, 0, 1);
    } .main-footer {
            padding: 0 0 0 0;
            width: 100%;
        }
</style>
<body class="hold-transition register-page bg-gd">
    <div class="register-box">
        <div class="card">
            <div class="card-header text-center card-head">
                <a href="#" class="h1 text-white">MoForYou</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">สมัครเพื่อเข้าใช้งาน</p>

                <form action="#" method="post">
                <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-circle"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="ชื่อ - นามสกุล">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="บัตรประชาชน">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="เบอร์โทรศัพท์">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-mobile-alt"></span>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn login100-form-btn btn-block">สมัคร</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <center>
                    <p class="mt-4 mb-0">
                        <a href="login" class="text-center">ฉันเป็นสมาชิกอยู่แล้ว</a>
                    </p>

                </center>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
  
</body>

</html>