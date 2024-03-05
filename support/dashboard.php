<?php
session_start();
require_once 'support_cont/connect.php';

if (!isset($_SESSION['admin_login']) && !isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: index.php');
    exit;
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
                        <div class="row">
                            <?php
                            require_once 'support_cont/connect.php';
                            $sqltotal = "SELECT COUNT(*) AS total FROM form_4";
                            $stmttotal = $conn->prepare($sqltotal);
                            $stmttotal->execute();
                            $resulttotal = $stmttotal->fetch();

                            $sql_sex_count = "SELECT sex, COUNT(*) AS count FROM form_4 GROUP BY sex";
                            $stmt_sex_count = $conn->prepare($sql_sex_count);
                            $stmt_sex_count->execute();
                            $rows_sex_count = $stmt_sex_count->fetchAll(PDO::FETCH_ASSOC);

                            $male_count = 0;
                            $female_count = 0;

                            foreach ($rows_sex_count as $row) {
                                if ($row['sex'] == 'ชาย') {
                                    $male_count += $row['count'];
                                } elseif ($row['sex'] == 'หญิง') {
                                    $female_count += $row['count'];
                                }
                            }

                            $sql_finishscore_TH_count = "SELECT finishscore_TH, COUNT(*) AS count FROM form_4 GROUP BY finishscore_TH";
                            $stmt_finishscore_TH_count = $conn->prepare($sql_finishscore_TH_count);
                            $stmt_finishscore_TH_count->execute();
                            $rows_finishscore_TH_count = $stmt_finishscore_TH_count->fetchAll(PDO::FETCH_ASSOC);

                            $up_count = 0;
                            $down_count = 0;

                            foreach ($rows_finishscore_TH_count as $row) {
                                if ($row['finishscore_TH'] == 'เสี่ยงสูงต่อการเป็นโรคเบาหวาน') {
                                    $up_count += $row['count'];
                                } elseif ($row['finishscore_TH'] == 'เสี่ยงต่ำต่อการเป็นโรคเบาหวาน') {
                                    $down_count += $row['count'];
                                }
                            }

                            ?>
                            <div class="col-md-6 col-lg-6 col-xl-6 order-0 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <ul class="p-0 m-0">
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-message-dots'></i></span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">จำนวนผู้กรอกแบบสอบถาม</h6>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold"><?php echo $resulttotal['total']; ?>
                                                            ราย </small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded bg-label-success"><i class='bx bx-male'></i></span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">จำนวนผู้กรอกแบบสอบถาม เพศ ชาย</h6>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold"><?php echo $male_count; ?> ราย
                                                        </small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded bg-label-info"><i class='bx bx-female'></i></span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">จำนวนผู้กรอกแบบสอบถาม เพศ หญิง</h6>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold"><?php echo $female_count; ?> ราย
                                                        </small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded bg-label-secondary"><i class='bx bx-trending-up'></i></span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">เสี่ยงสูงต่อการเป็นโรคเบาหวาน</h6>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold"><?php echo $up_count; ?> ราย </small>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mb-4 pb-1">
                                                <div class="avatar flex-shrink-0 me-3">
                                                    <span class="avatar-initial rounded bg-label-secondary"><i class='bx bx-trending-down'></i></span>
                                                </div>
                                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                    <div class="me-2">
                                                        <h6 class="mb-0">เสี่ยงต่ำต่อการเป็นโรคเบาหวาน</h6>
                                                    </div>
                                                    <div class="user-progress">
                                                        <small class="fw-semibold"><?php echo $down_count; ?> ราย
                                                        </small>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-12">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">ช่วงอายุ</h5>
                                                <div id="age" style="width: 100%; height: 300px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-12">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">ภูมิลำเนา</h5>
                                                <div id="province_name" style="width: 100%; height: 300px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-12">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">ความเสี่ยง</h5>
                                                <div id="hazard" style="width: 100%; height: 300px;"></div>
                                            </div>
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
    <?php
    function thai_date($date)
    {
        $months = [
            'ม.ค', 'ก.พ', 'มี.ค', 'เม.ย', 'พ.ค', 'มิ.ย',
            'ก.ค', 'ส.ค', 'ก.ย', 'ต.ค', 'พ.ย', 'ธ.ค'
        ];

        $timestamp = strtotime($date);
        $thai_year = date(' Y', $timestamp) + 543;
        $thai_date = date('j ', $timestamp) . $months[date('n', $timestamp) - 1] . ' ' . $thai_year;

        return $thai_date;
    }

    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['age', 'year'],
                <?php
                require_once 'support_cont/connect.php';

                $stmtC = $conn->prepare("SELECT age, COUNT(*) AS count FROM `form_4` GROUP BY age");
                $stmtC->execute();

                while ($row = $stmtC->fetch(PDO::FETCH_ASSOC)) {
                    echo "['" . $row['age'] . "', " . $row['count'] . "],";
                }
                ?>
            ]);

            var options = {
                pieHole: 0.4,
                colors: ['#ffca28', '#f57f17', '#FB9678', '#e51c23', '#4a148c', '#ab47bc', '#4fc3f7', '#01579b',
                    '#afb42b', '#006064', '#26a69a', '#2baf2b', '#ff6f00', '#6c2c10', '#880e4f', '#311b92',
                    '#e7e9fd'
                ]
            };

            var chart = new google.visualization.PieChart(document.getElementById('age'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['province_name', 'province_name'],
                <?php
                require_once 'support_cont/connect.php';

                $stmtC = $conn->prepare("SELECT province_name, COUNT(*) AS count FROM `form_4` GROUP BY province_name");
                $stmtC->execute();

                while ($row = $stmtC->fetch(PDO::FETCH_ASSOC)) {
                    echo "['" . $row['province_name'] . "', " . $row['count'] . "],";
                }
                ?>
            ]);

            var options = {
                pieHole: 0.4,
                colors: ['#AB8CE4', '#03A9E3', '#FB9678', '#e51c23', '#4a148c', '#ab47bc', '#4fc3f7', '#01579b',
                    '#00bcd4', '#006064', '#26a69a', '#2baf2b', '#ff6f00', '#6c2c10'
                ]
            };

            var chart = new google.visualization.PieChart(document.getElementById('province_name'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['finishscore_TH', 'finishscore_TH'],
                <?php
                require_once 'support_cont/connect.php';

                $stmtC = $conn->prepare("SELECT finishscore_TH, COUNT(*) AS count FROM `form_4` GROUP BY finishscore_TH");
                $stmtC->execute();

                while ($row = $stmtC->fetch(PDO::FETCH_ASSOC)) {
                    echo "['" . $row['finishscore_TH'] . "', " . $row['count'] . "],";
                }
                ?>
            ]);

            var options = {
                pieHole: 0.4,
                colors: ['#AB8CE4', '#03A9E3', '#FB9678', '#e51c23', '#4a148c', '#ab47bc', '#4fc3f7', '#01579b',
                    '#00bcd4', '#006064', '#26a69a', '#2baf2b', '#ff6f00', '#6c2c10'
                ]
            };

            var chart = new google.visualization.PieChart(document.getElementById('hazard'));
            chart.draw(data, options);
        }
    </script>

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