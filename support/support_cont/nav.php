<?php
// เช็คว่ามี session ของ admin หรือ user ที่ล็อกอินอยู่หรือไม่
if (isset($_SESSION['admin_login']) || isset($_SESSION['user_login'])) {
    // หากมี session ของ admin หรือ user ที่ล็อกอินอยู่ ให้ดำเนินการต่อ
    $user_id = isset($_SESSION['admin_login']) ? $_SESSION['admin_login'] : $_SESSION['user_login'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = :user_id");
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        if ($row['urole'] == 'admin' || $row['urole'] == 'user') {
        } else {
            echo "คุณไม่มีสิทธิ์เข้าถึงหน้านี้";
        }
    } else {
        echo "ไม่พบข้อมูลผู้ใช้";
    }
} else {
    echo "กรุณาล็อกอินก่อนเข้าถึงหน้านี้";
}
?>

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="../assets/img/avatars/logo.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="../assets/img/avatars/logo.png" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block"><?php echo $row['fullname'] ?></span>
                                    <small class="text-muted"><?php echo $row['urole'] ?></small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="logout.php">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">ออกจากระบบ</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>