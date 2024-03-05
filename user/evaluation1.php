<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php
include('user_cont/head.php');
?>

<body class="theme_turquoise">
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">
            <div class="layout-page">
                <?php
                include('user_cont/nav.php');
                ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12 mb-2 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-12">
                                            <div class="card-body">
                                                <form id="formevaluation1" method="post">
                                                    <h5 class="card-title text-primary">ส่วนที่ 1 ข้อมูลทั่วไป</h5>
                                                    <?php
                                                    include('user_cont/connect.php');
                                                    $form_0_id = isset($_GET['form_0_id']) ? $_GET['form_0_id'] : 0;
                                                    if (!empty($form_0_id)) {
                                                        $query = "SELECT * FROM form_0 WHERE form_0_id = :form_0_id";
                                                        $stmt = $conn->prepare($query);
                                                        $stmt->bindParam(':form_0_id', $form_0_id);
                                                        $stmt->execute();
                                                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                                        if ($result) {
                                                            $fullname = $result['fullname'];
                                                            $tel = $result['tel'];
                                                            $address = $result['address'];
                                                            $province_name = $result['province_name'];
                                                            $district_name = $result['district_name'];
                                                            $subdistrict_name = $result['subdistrict_name'];
                                                            $check_query = "SELECT * FROM province WHERE province_name = :province_name";
                                                            $check_stmt = $conn->prepare($check_query);
                                                            $check_stmt->bindParam(':province_name', $province_name);
                                                            $check_stmt->execute();
                                                            $province_result = $check_stmt->fetch(PDO::FETCH_ASSOC);
                                                            if ($province_result) {
                                                                $province_scores = $province_result['province_scores'];
                                                            } else {
                                                                echo "ไม่พบข้อมูลจังหวัด: $province_name";
                                                            }
                                                    ?>
                                                            <!-- <h1>ข้อมูล Form 0</h1>
                                                            <p><strong>ชื่อ-สกุล:</strong> <?php echo $fullname; ?></p>
                                                            <p><strong>เบอร์โทรศัพท์:</strong> <?php echo $tel; ?></p>
                                                            <p><strong>ที่อยู่:</strong> <?php echo $address; ?></p>
                                                            <p><strong>จังหวัด:</strong> <?php echo $province_name; ?></p>
                                                            <p><strong>อำเภอ:</strong> <?php echo $district_name; ?></p>
                                                            <p><strong>ตำบล:</strong> <?php echo $subdistrict_name; ?></p>
                                                            <p><strong>คะแนน:</strong> <?php echo $province_scores; ?></p> -->
                                                    <?php
                                                        } else {
                                                            echo "ไม่พบข้อมูลสำหรับ form_0_id: $form_0_id";
                                                        }
                                                    } else {
                                                        echo "ไม่ได้รับ form_0_id จาก URL";
                                                    }
                                                    ?>
                                                    <hr>
                                                    <h5 class="card-title text-primary">เพศ</h5>
                                                    <div class="row col-lg-12 col-md-6 col-6">
                                                        <div class="col-mb">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="sex" id="A1" value="หญิง" />
                                                                <label class="form-check-label" for="A1">หญิง</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="sex" id="A2" value="ชาย" />
                                                                <label class="form-check-label" for="A2">ชาย</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">อายุ (ปีเต็ม)</h5>
                                                    <div class="row col-lg-12 col-md-6 col-6">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="age" id="A3" value="0-34 ปี" />
                                                                <label class="form-check-label" for="A3">0-34 ปี</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="age" id="A4" value="34-59 ปี" />
                                                                <label class="form-check-label" for="A4">34-59 ปี</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="age" id="A5" value="60 ปีขึ้นไป" />
                                                                <label class="form-check-label" for="A5">60 ปีขึ้นไป</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">สถานภาพ</h5>
                                                    <div class="row col-lg-12 col-md-6 col-6">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="status" id="A6" value="โสด" />
                                                                <label class="form-check-label" for="A6">โสด</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="status" id="A7" value="สมรส" />
                                                                <label class="form-check-label" for="A7">สมรส</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="status" id="A8" value="หม้าย/หย่าร้าง/แยกกันอยู่" />
                                                                <label class="form-check-label" for="A8">หม้าย/หย่าร้าง/แยกกันอยู่</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">ระดับการศึกษา</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="study" id="A13" value="ประถมและต่ำกว่า" />
                                                                <label class="form-check-label" for="A13">ประถมและต่ำกว่า</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="study" id="A14" value="มัธยมศึกษาตอนต้น" />
                                                                <label class="form-check-label" for="A14">มัธยมศึกษาตอนต้น</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="study" id="A15" value="มัธยมศึกษาตอนปลาย" />
                                                                <label class="form-check-label" for="A15">มัธยมศึกษาตอนปลาย</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="study" id="A16" value="ปริญญาตรีและสูงกว่า" />
                                                                <label class="form-check-label" for="A16">ปริญญาตรีและสูงกว่า</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="demo-inline-spacing d-flex justify-content-between">
                                                        <button type="button" class="btn btn-primary active" onclick="window.history.back();">ย้อนกลับ</button>
                                                        <button type="submit" id="nextButton" class="btn btn-primary active" style="display: none">ถัดไป</button>
                                                    </div>
                                                    <hr>
                                                    <center>
                                                        <div class="button-container">
                                                            <a type="button" class="btn btn-primary" href="index.php"> <i class='bx bx-home'></i> กลับหน้าหลัก</a>
                                                        </div>
                                                    </center>
                                                </form>
                                                <?php
                                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    include('user_cont/connect.php');
                                                    $sex = isset($_POST['sex']) ? $_POST['sex'] : '';
                                                    $age = isset($_POST['age']) ? $_POST['age'] : '';
                                                    $status = isset($_POST['status']) ? $_POST['status'] : '';
                                                    $study = isset($_POST['study']) ? $_POST['study'] : '';

                                                    $scoreMapping = array(
                                                        'sex' => array(
                                                            'หญิง' => 2,
                                                            'ชาย' => 1,
                                                        ),
                                                        'age' => array(
                                                            '0-34 ปี' => 1,
                                                            '34-59 ปี' => 2,
                                                            '60 ปีขึ้นไป' => 1,
                                                        ),
                                                        'status' => array(
                                                            'โสด' => 2,
                                                            'สมรส' => 1,
                                                            'หม้าย/หย่าร้าง/แยกกันอยู่' => 2,
                                                        ),
                                                        'study' => array(
                                                            'ประถมและต่ำกว่า' => 2,
                                                            'มัธยมศึกษาตอนต้น' => 2,
                                                            'มัธยมศึกษาตอนปลาย' => 1,
                                                            'ปริญญาตรีและสูงกว่า' => 1,
                                                        ),
                                                    );

                                                    $sexScore = isset($_POST['sex']) ? ($scoreMapping['sex'][$_POST['sex']] ?? 0) : 0;
                                                    $ageScore = isset($_POST['age']) ? ($scoreMapping['age'][$_POST['age']] ?? 0) : 0;
                                                    $statusScore = isset($_POST['status']) ? ($scoreMapping['status'][$status] ?? 0) : 0;
                                                    $studyScore = isset($_POST['study']) ? ($scoreMapping['study'][$study] ?? 0) : 0;

                                                    $totalScore = $sexScore + $ageScore + $statusScore + $studyScore + $province_scores;

                                                    $insertQuery = "INSERT INTO form_1 (fullname, tel, province_name, district_name, subdistrict_name, address, sex, age, status,  study, province_score, total_score, sexScore, ageScore, statusScore, studyScore) 
                                                    VALUES (:fullname, :tel, :province_name, :district_name, :subdistrict_name, :address, :sex, :age, :status,:study, :province_scores, :totalScore, :sexScore, :ageScore, :statusScore, :studyScore)";

                                                    $stmt = $conn->prepare($insertQuery);
                                                    $stmt->bindParam(':fullname', $fullname);
                                                    $stmt->bindParam(':tel', $tel);
                                                    $stmt->bindParam(':address', $address);
                                                    $stmt->bindParam(':province_name', $province_name);
                                                    $stmt->bindParam(':district_name', $district_name);
                                                    $stmt->bindParam(':subdistrict_name', $subdistrict_name);
                                                    $stmt->bindParam(':sex', $sex);
                                                    $stmt->bindParam(':age', $age);
                                                    $stmt->bindParam(':status', $status);
                                                    $stmt->bindParam(':study', $study);
                                                    $stmt->bindParam(':province_scores', $province_scores);
                                                    $stmt->bindParam(':totalScore', $totalScore);
                                                    $stmt->bindParam(':sexScore', $sexScore);
                                                    $stmt->bindParam(':ageScore', $ageScore);
                                                    $stmt->bindParam(':statusScore', $statusScore);
                                                    $stmt->bindParam(':studyScore', $studyScore);

                                                    try {
                                                        $stmt->execute();
                                                        $form_1_id = $conn->lastInsertId();
                                                        echo '<script>window.location.href = "evaluation2.php?form_1_id=' . $form_1_id . '";</script>';
                                                        exit();
                                                    } catch (PDOException $e) {
                                                        echo "Error: " . $e->getMessage();
                                                    }
                                                }
                                                ?>
                                                <script>
                                                    function checkSelection() {
                                                        var selectedProvinces = document.querySelectorAll('input[type="radio"]:checked').length;
                                                        var selectedOptions = document.querySelectorAll('select, input[type="radio"]:checked').length;

                                                        if (selectedOptions === 4) {
                                                            document.getElementById('nextButton').style.display = 'block';
                                                        } else {
                                                            document.getElementById('nextButton').style.display = 'none';
                                                        }

                                                        var selectedProvinceCountElement = document.getElementById('selectedProvinceCount');
                                                        if (selectedProvinceCountElement) {
                                                            selectedProvinceCountElement.innerText = selectedProvinces;
                                                        }
                                                    }

                                                    var formElements = document.querySelectorAll('#formevaluation1 select, #formevaluation1 input[type="radio"]');
                                                    formElements.forEach(function(element) {
                                                        element.addEventListener('change', checkSelection);
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-backdrop fade"></div>
                </div>
                <?php
                include('user_cont/footer.php');
                ?>
            </div>
        </div>
    </div>


    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <script src="../assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script defer src="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@v2.8.6/dist/cookieconsent.js"></script>
    <script defer src="cc-init.js"></script>
</body>

</html>