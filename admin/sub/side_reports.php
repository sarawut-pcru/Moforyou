<?php
// ตัดคำ จาก URI 
$cut = explode("/", $_SERVER["REQUEST_URI"]);
//echo $div[4];
// for($i=0;$i<count($div);$i++){
//   echo $div[$i];
// }
?>
<li class="nav-header">REPORTS</li>
<li class="nav-item <?php include '../sub_mange/sub_nav-item-rep.php'; ?>">
  <a href="#" class="nav-link <?php
                              if ($cut[4] == 'rep_users.php') {
                                echo "active";
                              } else if ($cut[4] == 'rep_spec_farm.php') {
                                echo "active";
                              } else if ($cut[4] == 'rep_cow_farm.php') {
                                echo "active";
                              } else if ($cut[4] == 'rep_breed_farm.php') {
                                echo "active";
                              } else if ($cut[4] == 'rep_farms.php') {
                                echo "active";
                              } else {
                                echo "";
                              }
                              ?>
              ">
    <i class="nav-icon far fa-file-chart-pie"></i>
    <p> รายงาน
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item ">
      <a href="../report/rep_users.php" class="nav-link <?php if ($cut[4] == 'rep_users.php') {
                                                          echo "active";
                                                        }  ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>ข้อมูลผู้ใช้งาน</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="../report/rep_farms.php" class="nav-link <?php if ($cut[4] == 'rep_farms.php') {
                                                          echo "active";
                                                        }  ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>ข้อมูลฟาร์ม</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="../report/rep_spec_farm.php" class="nav-link <?php if ($cut[4] == 'rep_spec_farm.php') {
                                                              echo "active";
                                                            }  ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>ข้อมูลจำนวนสายพันธุ์โค</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="../report/rep_cow_farm.php" class="nav-link <?php if ($cut[4] == 'rep_cow_farm.php') {
                                                              echo "active";
                                                            }  ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>ข้อมูลโคเนื้อแค่ละฟาร์ม</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="../report/rep_breed_farm.php" class="nav-link <?php if ($cut[4] == 'rep_breed_farm.php') {
                                                                echo "active";
                                                              }  ?>">
        <i class="far fa-circle nav-icon"></i>
        <p>ข้อมูลการผสมพันธุ์แต่ละฟาร์ม</p>
      </a>
    </li>
  </ul>
</li>