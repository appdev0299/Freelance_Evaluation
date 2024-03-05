<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="dashboard.php" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="../assets/img/favicon/logo-cmru.png" alt="Logo" width="100" height="50">
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item active">
            <a href="dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">หน้าหลัก</div>
            </a>
        </li>
        <?php if (isset($_SESSION['admin_login'])) : ?>
            <li class="menu-item">
                <a href="register.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-collection"></i>
                    <div data-i18n="Basic">เพิ่มผู้ใช้งาน</div>
                </a>
            </li>
        <?php endif; ?>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">รายงาน</span>
        </li>
        <li class="menu-item">
            <a href="report.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-export"></i>
                <div data-i18n="Tables">ออกรายงาน</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase"><span class="menu-header-text">เอกสาร</span></li>
        <li class="menu-item">
            <a href="../support/manual.pdf" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">คู่มือ</div>
            </a>
        </li>

    </ul>
</aside>