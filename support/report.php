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
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="col-xl">
                                    <div class="card mb-4">
                                        <form method="post" id="clear">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="basic-default-email">เพศ</label>
                                                            <select class="form-control" name="sex" id="sex">
                                                                <option value="" <?php echo empty($_POST['sex']) ? 'selected' : ''; ?>>แสดงทั้งหมด</option>
                                                                <?php
                                                                require_once 'support_cont/connection.php';
                                                                $sql = "SELECT DISTINCT sex FROM form_4";
                                                                $stmt = $conn->prepare($sql);
                                                                $stmt->execute();
                                                                $checkings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                                foreach ($checkings as $checking) {
                                                                    $sex = $checking['sex'];
                                                                    $selected = ($_POST['sex'] == $sex) ? 'selected' : '';
                                                                    echo "<option value='$sex' $selected>$sex</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="basic-default-email">อายุ</label>
                                                            <select class="form-control" name="age" id="age">
                                                                <option value="" <?php echo empty($_POST['age']) ? 'selected' : ''; ?>>แสดงทั้งหมด</option>
                                                                <?php
                                                                require_once 'support_cont/connection.php';
                                                                $sql = "SELECT DISTINCT age FROM form_4";
                                                                $stmt = $conn->prepare($sql);
                                                                $stmt->execute();
                                                                $checkings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                                foreach ($checkings as $checking) {
                                                                    $age = $checking['age'];
                                                                    $selected = ($_POST['age'] == $age) ? 'selected' : '';
                                                                    echo "<option value='$age' $selected>$age</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="card mb-4">
                                                        <label class="card-header">เลือกได้ 1 ส่วน</label>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="basic-default-email">ช่วงคะแนน ส่วนที่ 1 </label>
                                                                        <select class="form-control" name="score_form1" id="score_form1">
                                                                            <option value="" <?php echo empty($_POST['score_form1']) ? 'selected' : ''; ?>>แสดงทั้งหมด</option>
                                                                            <?php
                                                                            require_once 'support_cont/connection.php';
                                                                            $sql = "SELECT DISTINCT score_form1 FROM form_4";
                                                                            $stmt = $conn->prepare($sql);
                                                                            $stmt->execute();
                                                                            $checkings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                                            foreach ($checkings as $checking) {
                                                                                $score_form1 = $checking['score_form1'];
                                                                                $selected = ($_POST['score_form1'] == $score_form1) ? 'selected' : '';
                                                                                echo "<option value='$score_form1' $selected>$score_form1 คะแนน</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 col-md-6 col-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="basic-default-email">ช่วงคะแนน ส่วนที่ 2 </label>
                                                                        <select class="form-control" name="score_form2" id="score_form2">
                                                                            <option value="" disabled <?php echo empty($_POST['score_form2']) ? 'selected' : ''; ?>>แสดงทั้งหมด</option>
                                                                            <?php
                                                                            require_once 'support_cont/connection.php';
                                                                            $sql = "SELECT DISTINCT score_form2 FROM form_4";
                                                                            $stmt = $conn->prepare($sql);
                                                                            $stmt->execute();
                                                                            $checkings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                                            foreach ($checkings as $checking) {
                                                                                $score_form2 = $checking['score_form2'];
                                                                                $selected = ($_POST['score_form2'] == $score_form2) ? 'selected' : '';
                                                                                echo "<option value='$score_form2' $selected>$score_form2 คะแนน</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="basic-default-email">ช่วงคะแนน ส่วนที่ 3 </label>
                                                                        <select class="form-control" name="score_form3" id="score_form3">
                                                                            <option value="" disabled <?php echo empty($_POST['score_form3']) ? 'selected' : ''; ?>>แสดงทั้งหมด</option>
                                                                            <?php
                                                                            require_once 'support_cont/connection.php';
                                                                            $sql = "SELECT DISTINCT score_form3 FROM form_4";
                                                                            $stmt = $conn->prepare($sql);
                                                                            $stmt->execute();
                                                                            $checkings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                                            foreach ($checkings as $checking) {
                                                                                $score_form3 = $checking['score_form3'];
                                                                                $selected = ($_POST['score_form3'] == $score_form3) ? 'selected' : '';
                                                                                echo "<option value='$score_form3' $selected>$score_form3 คะแนน</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="basic-default-email">ช่วงคะแนน ส่วนที่ 4 </label>
                                                                        <select class="form-control" name="score_form4" id="score_form4">
                                                                            <option value="" disabled <?php echo empty($_POST['score_form4']) ? 'selected' : ''; ?>>แสดงทั้งหมด</option>
                                                                            <?php
                                                                            require_once 'support_cont/connection.php';
                                                                            $sql = "SELECT DISTINCT score_form4 FROM form_4";
                                                                            $stmt = $conn->prepare($sql);
                                                                            $stmt->execute();
                                                                            $checkings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                                            foreach ($checkings as $checking) {
                                                                                $score_form4 = $checking['score_form4'];
                                                                                $selected = ($_POST['score_form4'] == $score_form4) ? 'selected' : '';
                                                                                echo "<option value='$score_form4' $selected>$score_form4 คะแนน</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-6 col-12">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="basic-default-email">ความเสี่ยง</label>
                                                            <select class="form-control" name="finishscore_TH" id="finishscore_TH">
                                                                <option value="" disabled selected>แสดงทั้งหมด</option>
                                                                <?php
                                                                require_once 'support_cont/connection.php';
                                                                $sql = "SELECT DISTINCT finishscore_TH FROM form_4";
                                                                $stmt = $conn->prepare($sql);
                                                                $stmt->execute();
                                                                $checkings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                                foreach ($checkings as $checking) {
                                                                    $finishscore_TH = $checking['finishscore_TH'];
                                                                    $selected = ($_POST['finishscore_TH'] == $finishscore_TH) ? 'selected' : '';
                                                                    echo "<option value='$finishscore_TH' $selected>$finishscore_TH</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row justify-content-end">
                                                    <div class="col-sm-12">
                                                        <button type="submit" name="display_data" class="btn btn-primary">ค้นหา</button>
                                                        <button type="button" id="export_data" class="btn btn-success">ออกรายงาน</button>
                                                        <script>
                                                            document.getElementById("export_data").addEventListener("click", function() {
                                                                var sex = document.getElementById("sex").value;
                                                                var age = document.getElementById("age").value;
                                                                var score_form1 = document.getElementById("score_form1").value;
                                                                var score_form2 = document.getElementById("score_form2").value;
                                                                var score_form3 = document.getElementById("score_form3").value;
                                                                var score_form4 = document.getElementById("score_form4").value;
                                                                var finishscore_TH = document.getElementById("finishscore_TH").value;
                                                                var url = "data_xlsx.php?";
                                                                if (sex) {
                                                                    url += "sex=" + encodeURIComponent(sex) + "&";
                                                                }
                                                                if (age) {
                                                                    url += "age=" + encodeURIComponent(age) + "&";
                                                                }
                                                                if (score_form1) {
                                                                    url += "score_form1=" + encodeURIComponent(score_form1) + "&";
                                                                }
                                                                if (score_form2) {
                                                                    url += "score_form2=" + encodeURIComponent(score_form2) + "&";
                                                                }
                                                                if (score_form3) {
                                                                    url += "score_form3=" + encodeURIComponent(score_form3) + "&";
                                                                }
                                                                if (score_form4) {
                                                                    url += "score_form4=" + encodeURIComponent(score_form4) + "&";
                                                                }
                                                                if (finishscore_TH) {
                                                                    url += "finishscore_TH=" + encodeURIComponent(finishscore_TH);
                                                                }
                                                                window.location.href = url;
                                                            });
                                                        </script>
                                                        <button type="button" id="clear_data" class="btn btn-danger">ล้างข้อมูล</button>
                                                        <script>
                                                            document.addEventListener("DOMContentLoaded", function() {
                                                                var clearButton = document.getElementById("clear_data");
                                                                clearButton.addEventListener("click", function() {
                                                                    var form = document.getElementById("clear");
                                                                    var elements = form.elements;
                                                                    for (var i = 0; i < elements.length; i++) {
                                                                        if (elements[i].type === "text" || elements[i].type === "textarea" || elements[i].type === "select-one") {
                                                                            elements[i].value = "";
                                                                        }
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="col-lg-12 d-flex align-items-stretch">
                                            <div class="card w-100">
                                                <div class="card-body p-4">
                                                    <div class="table-responsive">
                                                        <?php
                                                        $allDataSql = "SELECT * FROM form_4";
                                                        $allDataStmt = $conn->prepare($allDataSql);
                                                        $allDataStmt->execute();

                                                        $sql = "SELECT * FROM form_4 WHERE 1=1";

                                                        if (isset($_POST['sex']) && !empty($_POST['sex'])) {
                                                            $selected_sex = $_POST['sex'];
                                                            $sql .= " AND sex = :sex";
                                                        }

                                                        if (isset($_POST['age']) && !empty($_POST['age'])) {
                                                            $selected_age = $_POST['age'];
                                                            $sql .= " AND age = :age";
                                                        }

                                                        if (isset($_POST['score_form1']) && !empty($_POST['score_form1'])) {
                                                            $selected_score_form1 = $_POST['score_form1'];
                                                            $sql .= " AND score_form1 = :score_form1";
                                                        }

                                                        if (isset($_POST['score_form2']) && !empty($_POST['score_form2'])) {
                                                            $selected_score_form2 = $_POST['score_form2'];
                                                            $sql .= " AND score_form2 = :score_form2";
                                                        }

                                                        if (isset($_POST['score_form3']) && !empty($_POST['score_form3'])) {
                                                            $selected_score_form3 = $_POST['score_form3'];
                                                            $sql .= " AND score_form3 = :score_form3";
                                                        }

                                                        if (isset($_POST['score_form4']) && !empty($_POST['score_form4'])) {
                                                            $selected_score_form4 = $_POST['score_form4'];
                                                            $sql .= " AND score_form4 = :score_form4";
                                                        }

                                                        if (isset($_POST['finishscore_TH']) && !empty($_POST['finishscore_TH'])) {
                                                            $selected_finishscore_TH = $_POST['finishscore_TH'];
                                                            $sql .= " AND finishscore_TH = :finishscore_TH";
                                                        }

                                                        $sql .= " ORDER BY dateCreate ASC";
                                                        $stmt = $conn->prepare($sql);

                                                        if (isset($selected_sex)) {
                                                            $stmt->bindParam(':sex', $selected_sex);
                                                        }

                                                        if (isset($selected_age)) {
                                                            $stmt->bindParam(':age', $selected_age);
                                                        }

                                                        if (isset($selected_score_form1)) {
                                                            $stmt->bindParam(':score_form1', $selected_score_form1);
                                                        }

                                                        if (isset($selected_score_form2)) {
                                                            $stmt->bindParam(':score_form2', $selected_score_form2);
                                                        }
                                                        if (isset($selected_score_form3)) {
                                                            $stmt->bindParam(':score_form3', $selected_score_form3);
                                                        }
                                                        if (isset($selected_score_form4)) {
                                                            $stmt->bindParam(':score_form4', $selected_score_form4);
                                                        }
                                                        if (isset($selected_finishscore_TH)) {
                                                            $stmt->bindParam(':finishscore_TH', $selected_finishscore_TH);
                                                        }

                                                        $stmt->execute();
                                                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                                        if (count($results) > 0) {
                                                        ?>

                                                            <table id="myTable1" class="table table-bordered">
                                                                <thead class="text-dark fs-4">
                                                                    <tr>
                                                                        <th class="border-bottom-0">
                                                                            <h6 class="fw-semibold mb-0">ลำดับ</h6>
                                                                        </th>
                                                                        <th class="border-bottom-0">
                                                                            <h6 class="fw-semibold mb-0">ข้อมูลส่วนตัว</h6>
                                                                        </th>
                                                                        <th class="border-bottom-0">
                                                                            <h6 class="fw-semibold mb-0">ภูมิลำเนา</h6>
                                                                        </th>
                                                                        <th class="border-bottom-0">
                                                                            <h6 class="fw-semibold mb-0">ความเสี่ยง</h6>
                                                                        </th>
                                                                        <th class="border-bottom-0">
                                                                            <h6 class="fw-semibold mb-0">วันที่บันทึก</h6>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $startIndex = 1;
                                                                    foreach ($results as $row) :
                                                                    ?>
                                                                        <tr>
                                                                            <td class="border-bottom-0">
                                                                                <h6 class="fw-semibold mb-0"><?= $startIndex++; ?></h6>
                                                                            </td>
                                                                            <td class="border-bottom-0">
                                                                                <h6 class="fw-semibold mb-1"> <?= $row['fullname']; ?> </h6>
                                                                                <span class="fw-normal">เพศ <?= $row['sex']; ?> | อายุ <?= $row['age']; ?></span>
                                                                            </td>
                                                                            <td class="border-bottom-0">
                                                                                <h6 class="fw-semibold mb-0">ต.<?= $row['subdistrict_name']; ?> อ.<?= $row['district_name']; ?> จ.<?= $row['province_name']; ?></h6>
                                                                            </td>
                                                                            <td class="border-bottom-0">
                                                                                <h6 class="fw-semibold mb-0"><?= $row['finishscore_TH']; ?></h6>
                                                                            </td>
                                                                            <td class="border-bottom-0">
                                                                                <h6 class="fw-semibold mb-0"><?= thai_date($row['dateCreate']); ?></h6>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        <?php
                                                        } else {
                                                            echo "No data found.";
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
            <script src="../assets/vendor/libs/jquery/jquery.js"></script>
            <script src="../assets/vendor/libs/popper/popper.js"></script>
            <script src="../assets/vendor/js/bootstrap.js"></script>
            <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
            <script src="../assets/vendor/js/menu.js"></script>
            <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
            <script src="../assets/js/main.js"></script>
            <script src="../assets/js/dashboards-analytics.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
            <script>
                $(document).ready(function() {
                    $("#myTable1").DataTable();
                });
            </script>
</body>

</html>