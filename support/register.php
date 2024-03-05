<?php

session_start();
require_once 'support_cont/connect.php';
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: index.php');
}

?>



<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php
include('support_cont/head.php');
?>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php
            include('support_cont/aside.php');
            ?>
            <div class="layout-page">
                <?php
                include('support_cont/nav.php');
                ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">เพิ่มผู้ใช้งาน</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <label class="form-label" for="fullname">ชื่อ-สกุล</label>
                                                <input type="text" name="fullname" class="form-control" required />
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <label class="form-label" for="password">หมายเลขบัตรประชาชน</label>
                                                <input type="number" class="form-control" name="password" required />
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <label class="form-label" for="urole">สถานะ</label>
                                                <select name="urole" class="form-select color-dropdown" required>
                                                    <option value="user" selected>ผู้ใช้งานทั่วไป</option>
                                                    <option value="admin">ผู้ดูแลระบบ</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                            </div>
                                            <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                        </div>
                                    </form>
                                    <?php
                                    require_once 'support_cont/connect.php';

                                    if (isset($_POST['fullname']) && isset($_POST['password']) && isset($_POST['urole'])) {
                                        $fullname = $_POST['fullname'];
                                        $password = $_POST['password'];
                                        $urole = $_POST['urole'];

                                        try {
                                            $check_sql = "SELECT COUNT(*) FROM users WHERE password = :password";
                                            $check_stmt = $conn->prepare($check_sql);
                                            $check_stmt->bindParam(':password', $password);
                                            $check_stmt->execute();
                                            $count = $check_stmt->fetchColumn();
                                            if ($count > 0) {
                                                echo '
                                                <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                                                <script>
                                                    swal({
                                                    title: "ผิดพลาด",
                                                    text: "รหัสผ่านซ้ำกับข้อมูลที่มีอยู่แล้ว",
                                                    type: "error",
                                                    confirmButtonText: "OK"
                                                    });
                                                </script>';
                                            } else {
                                                // ไม่มีข้อมูล password ซ้ำกัน ทำการบันทึกข้อมูล
                                                $insert_sql = "INSERT INTO users (fullname, password, urole) VALUES (:fullname, :password, :urole)";
                                                $insert_stmt = $conn->prepare($insert_sql);
                                                $insert_stmt->bindParam(':fullname', $fullname);
                                                $insert_stmt->bindParam(':password', $password);
                                                $insert_stmt->bindParam(':urole', $urole);
                                                $insert_stmt->execute();
                                                echo '
                                                <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                                                <script>
                                                    swal({
                                                    title: "บันทึกข้อมูลสำเร็จ",
                                                    text: "บันทึกข้อมูลเรียบร้อยแล้ว",
                                                    type: "success",
                                                    timer: 1500,
                                                    showConfirmButton: false
                                                    }, function(){
                                                        window.location = "register.php";
                                                    });
                                                </script>';
                                            }
                                        } catch (PDOException $e) {
                                            echo "ผิดพลาดในการบันทึกข้อมูล: " . $e->getMessage();
                                        }
                                    }

                                    $pdo = null;
                                    ?>
                                    <hr>
                                    <div class="card">
                                        <div class="table-responsive text-nowrap">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ชื่อ-สกุล</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    <?php
                                                    $stmt = $conn->prepare("SELECT * FROM users");
                                                    $stmt->execute();
                                                    $result = $stmt->fetchAll();
                                                    $countrow = 1;
                                                    foreach ($result as $t1) {
                                                    ?>

                                                        <tr>
                                                            <td><?= $countrow ?></td>
                                                            <td><?= $t1['fullname']; ?></td>
                                                            <td><span class="badge bg-label-primary me-1"><?= $t1['urole']; ?></span></td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="javascript:void(0);" data-original-title="Delete" onclick="confirmDelete('<?= $t1['id']; ?>')"><i class="bx bx-trash me-1"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                                                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
                                                        <script>
                                                            function confirmDelete(id) {
                                                                swal({
                                                                        title: "ตำเตือน",
                                                                        text: "เมื่อท่านกด ยืนยัน ระบบจะทำการลบข้อมูลออกจากระบบ และจะไม่สามารถนำกลับมาได้",
                                                                        type: "warning",
                                                                        showCancelButton: true,
                                                                        confirmButtonColor: "#DD6B55",
                                                                        confirmButtonText: "ยืนยัน",
                                                                        cancelButtonText: "ยกเลิก",
                                                                        closeOnConfirm: false
                                                                    },
                                                                    function(isConfirm) {
                                                                        if (isConfirm) {
                                                                            window.location = "deldata.php?id=" + id;
                                                                        }
                                                                    });
                                                            }
                                                        </script>

                                                    <?php $countrow++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                include('support_cont/footer.php');
                ?>
            </div>
        </div>
    </div>


    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/dashboards-analytics.js"></script>
</body>

</html>