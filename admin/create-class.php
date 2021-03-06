<?php
session_start();
include('../includes/config.php');
if (!isset($_SESSION['SESSION_EMAIL'])) {
  header("Location: admin.php");
  die();
}

$msg='';

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
if (mysqli_num_rows($query) > 0) {
  $row = mysqli_fetch_assoc($query);
  $email = $row['email'];
  $name_user = $row['name'];
}

// Create class
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email_teacher = $_POST['email_teacher'];
  $code = bin2hex(random_bytes(20));

  $query = mysqli_query($conn, "SELECT * FROM class WHERE name_class='$name'");
  if (mysqli_num_rows($query) > 0) {
    $msg = "<div class='alert alert-danger'>Lớp học đã tồn tại.</div>";
  }else {
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email_teacher'");
    if (mysqli_num_rows($query) > 0) {
      while ($row = mysqli_fetch_array($query)) {
        $sql = "INSERT INTO class (name_class,`time`,email_teacher,code)
                    VALUES ('$name',NOW(),'$email_teacher','$code')";
        mysqli_query($conn, $sql);
        $class_id = mysqli_insert_id($conn);
        $user_id = $row['id'];
        $sql = "INSERT INTO class_user(id_class,id_user) VALUES ('$class_id','$user_id')";
        mysqli_query($conn, $sql);
        $sql = "INSERT INTO room(date_create,name_room) VALUES (NOW(),'$name')";
        mysqli_query($conn, $sql);
      }
    } else {
       $msg = "<div class='alert alert-danger'>Email không tồn tại.</div>";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Dashboard - Admin</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="./assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="./assets/vendor/fonts/boxicons.css" />

  <!-- Admin CSS -->
  <link rel="stylesheet" href="./assets/vendor/css/admin.css">

  <!-- Core CSS -->
  <link rel="stylesheet" href="./assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="./assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="./assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="./assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="./assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="./assets/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="admin.php" class="app-brand-link">
            <span><img src="./assets//img/icons/brands/ZaRoom1.png" alt=""></span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Zaroom</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item active">
            <a href="admin.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <!-- Layouts -->

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-cube-alt"></i>
              <div data-i18n="Permission">Permission</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="create-auth.php" class="menu-link">
                  <div data-i18n="Create Auth">Create Auth</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="edit-auth.php" class="menu-link">
                  <div data-i18n="Edit Auth">Edit Auth</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-cube-alt"></i>
              <div data-i18n="Class">Class</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="class-control.php" class="menu-link">
                  <div data-i18n="Class">Class</div>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->
              <li class="nav-item lh-1 me-3"></li>

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="./assets/img/avatars/main.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="./assets/img/avatars/main.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block"><?php echo $name_user; ?></span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="../php/login/logout.php">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="col-lg-12 col-md-12 mb-12 order-0">
                <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-12">
                      <div class="card-body pt-3 pb-0">
                        <h5 class="create-title text-primary danger"><?php echo $msg; ?></h5>
                      </div>
                      <hr class="my-0" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-8 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center">
                    <h4 class="card-title m-9 me-2">Thông tin lớp học</h4>
                  </div>
                  <div class="card-body">
                    <form id="formAccountSettings" method="POST">
                      <div class="mb-3 col-md-6">
                        <label for="name" class="form-label">Tên lớp học</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="Nhập tên lớp học" autofocus />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="email_teacher" class="form-label">Email Giáo viên</label>
                        <input class="form-control" type="text" id="email_teacher" name="email_teacher" placeholder="Nhập tên giáo viên" />
                      </div>
                      <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2" name="submit" value="submit">Tạo lớp học</button>
                        <button type="reset" class="btn btn-outline-secondary">Làm mới</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-4 mb-4">
                <div class="card h-100">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="card-title m-0 me-2">Danh sách lớp học</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2 md-0">
                        <div class="userID">Số thứ tự</div>
                      </div>
                      <div class="col-lg-5">
                        <div class="className">Tên lớp</div>
                      </div>
                      <div class="col-lg-3">
                        <div class="classTeacher">Tên giáo viên</div>
                      </div>
                      <div class="col-lg-2">
                        <div class="classCode">Code</div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="row">
                      <div class="col-12 mb-2 md-0">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM class");
                        if (mysqli_num_rows($query) > 0) {
                          while ($row = $query->fetch_assoc()) {
                        ?>
                            <div class="row">
                              <div class="col-lg-2"><?php echo '<div class="userID">' . $row['id_class'] . '</div>' ?></div>
                              <div class="col-lg-5"><?php echo '<div class="className">' . $row['name_class'] . '</div>' ?></div>
                              <div class="col-lg-3"><?php echo '<div class="classTeacher">' . $row['email_teacher'] . '</div>' ?></div>
                              <div class="col-lg-2"><?php echo '<div class="classCode">' . $row['code'] . '</div>' ?></div>
                            </div>
                        <?php
                          }
                        }
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="./assets/vendor/libs/jquery/jquery.js"></script>
  <script src="./assets/vendor/libs/popper/popper.js"></script>
  <script src="./assets/vendor/js/bootstrap.js"></script>
  <script src="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="./assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="./assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="./assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="./assets/js/dashboards-analytics.js"></script>
</body>

</html>