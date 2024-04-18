<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<?php
include('user_cont/head.php');
?>

<body>
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
                                                <form id="formevaluation2" method="post">
                                                    <h5 class="card-title text-primary">ส่วนที่ 2 ข้อมูลสุขภาพ</h5>
                                                    <?php
                                                    include('user_cont/connect.php');
                                                    $form_1_id = isset($_GET['form_1_id']) ? $_GET['form_1_id'] : 0;
                                                    if (!empty($form_1_id)) {
                                                        $query = "SELECT * FROM form_1 WHERE form_1_id = :form_1_id";
                                                        $stmt = $conn->prepare($query);
                                                        $stmt->bindParam(':form_1_id', $form_1_id);
                                                        $stmt->execute();
                                                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                                        if ($result) {
                                                            $sex = $result['sex'];
                                                            $age = $result['age'];
                                                            $status = $result['status'];
                                                            $study = $result['study'];
                                                            $sexScore = $result['sexScore'];
                                                            $ageScore = $result['ageScore'];
                                                            $statusScore = $result['statusScore'];
                                                            $studyScore = $result['studyScore'];
                                                            $fullname = $result['fullname'];
                                                            $tel = $result['tel'];
                                                            $address = $result['address'];
                                                            $province_name = $result['province_name'];
                                                            $district_name = $result['district_name'];
                                                            $subdistrict_name = $result['subdistrict_name'];
                                                            $totalScoreFromDatabase = $result['total_score'];
                                                    ?>
                                                            <!-- <h1>ข้อมูล Form 1</h1>
                                                            <p><strong>เพศ:</strong> <?php echo $sex; ?></p>
                                                            <p><strong>อายุ:</strong> <?php echo $age; ?></p>
                                                            <p><strong>สถานะ:</strong> <?php echo $status; ?></p>
                                                            <p><strong>จังหวัด:</strong> <?php echo $province_name; ?></p>
                                                            <p><strong>อำเภอ:</strong> <?php echo $district_name; ?></p>
                                                            <p><strong>ตำบล:</strong> <?php echo $subdistrict_name; ?></p>
                                                            <p><strong>ระดับการศึกษา:</strong> <?php echo $study; ?></p>
                                                            <p><strong>sexScore:</strong> <?php echo $sexScore; ?></p>
                                                            <p><strong>ageScore:</strong> <?php echo $ageScore; ?></p>
                                                            <p><strong>statusScore:</strong> <?php echo $statusScore; ?></p>
                                                            <p><strong>studyScore:</strong> <?php echo $studyScore; ?></p>
                                                            <p><strong>คะแนนรวมจากฐานข้อมูล:</strong> <?php echo $totalScoreFromDatabase; ?></p> -->
                                                    <?php
                                                        } else {
                                                            echo "ไม่พบข้อมูลสำหรับ form_1_id: $form_1_id";
                                                        }
                                                    } else {
                                                        echo "ไม่ได้รับ form_1_id จาก URL";
                                                    }
                                                    ?>
                                                    <hr>
                                                    <h5 class="card-title text-primary">ส่วนสูง (เซนติเมตร)</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-mb">
                                                            <div class="form-check form-check-inline">
                                                                <input type="number" class="form-control" name="height" id="B1" aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">น้ำหนัก (กิโลกรัม)</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input type="number" class="form-control" name="weight" id="B2" aria-describedby="defaultFormControlHelp" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">ดัชนีมวลกาย</h5>
                                                    <div class="row col-lg-12 col-md-6 col-6">
                                                        <span id="bmiDisplay"></span>
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="bmi" id="B3" value="น้อยกว่า 18.5" required />
                                                                <label class="form-check-label" for="B3">น้อยกว่า 18.5</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="bmi" id="B4" value="18.5-24.9" />
                                                                <label class="form-check-label" for="B3">18.5-24.9</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="bmi" id="B5" value="25-29.9" />
                                                                <label class="form-check-label" for="B3">25-29.9</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="bmi" id="B6" value="มากกว่า 30" />
                                                                <label class="form-check-label" for="B3">มากกว่า 30</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">ระดับความดันโลหิตตัวบน (mmHg)</h5>
                                                    <div class="row col-lg-12 col-md-6 col-8">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="pressureup" id="B7" value="น้อยกว่า 120 mmHg" required />
                                                                <label class="form-check-label" for="pressureup">น้อยกว่า 120 mmHg</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="pressureup" id="B8" value="121-139 mmHg" />
                                                                <label class="form-check-label" for="pressureup">121-139 mmHg</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="pressureup" id="B9" value="140-159mmHg" />
                                                                <label class="form-check-label" for="pressureup">140-159mmHg</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="pressureup" id="B10" value="มากกว่าหรือเท่ากับ 160 mmHg" />
                                                                <label class="form-check-label" for="pressureup">มากกว่าหรือเท่ากับ 160 mmHg</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">ระดับความดันโลหิตตัวล่าง (mmHg)</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="pressuredown" id="B11" value="น้อยกว่า 80 mmHg" required />
                                                                <label class="form-check-label" for="pressuredown">น้อยกว่า 80 mmHg</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="pressuredown" id="B12" value="80-89 mmHg" />
                                                                <label class="form-check-label" for="pressuredown">80-89 mmHg</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="pressuredown" id="B13" value="มากกว่าหรือเท่ากับ 90 mmHg" />
                                                                <label class="form-check-label" for="pressuredown">มากกว่าหรือเท่ากับ 90 mmHg</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">รอบเอว วัดผ่านสะดือ (เซนติเมตร)</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <?php
                                                        $sex = $result['sex'];
                                                        if ($sex == 'ชาย') {
                                                            echo '<div class="col-md">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="waistline" id="B14.1" value="น้อยกว่าหรือเท่ากับ 89 cm" />
                                                                    <label class="form-check-label" for="waistline">น้อยกว่าหรือเท่ากับ 89 cm</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="waistline" id="B14.2" value="มากกว่าหรือเท่ากับ 90 cm" />
                                                                    <label class="form-check-label" for="waistline">มากกว่าหรือเท่ากับ 90 cm</label>
                                                                </div>
                                                            </div>';
                                                        } elseif ($sex == 'หญิง') {
                                                            echo '<div class="col-md">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="waistline" id="B14.3" value="น้อยกว่าหรือเท่ากับ 79 cm" />
                                                                    <label class="form-check-label" for="waistline">น้อยกว่าหรือเท่ากับ 79 cm</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="waistline" id="B14.4" value="มากกว่าหรือเท่ากับ 80 cm" />
                                                                    <label class="form-check-label" for="waistline">มากกว่าหรือเท่ากับ 80 cm</label>
                                                                </div>
                                                            </div>';
                                                        }
                                                        ?>
                                                        <h5 class="card-title text-primary">ระดับไขมัน HDL ในเลือด (mg/dL)</h5>
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="fat" id="B15" value="น้อยกว่า 35 mg/dL" required />
                                                                <label class="form-check-label" for="fat">น้อยกว่า 35 mg/dL</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="fat" id="B16" value="มากกว่า 35 mg/dL" />
                                                                <label class="form-check-label" for="fat">มากกว่า 35 mg/dL</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">ระดับไขมันไตรกลีเซอไรด์ในเลือด (mg/dL)</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="fatblood" id="B17" value="น้อยกว่า 250 mg/dL" required />
                                                                <label class="form-check-label" for="fatblood">น้อยกว่า 250 mg/dL</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="fatblood" id="B18" value="มากกว่า 250 mg/dL" />
                                                                <label class="form-check-label" for="fatblood">มากกว่า 250 mg/dL</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">ระดับน้ำตาลในเลือดหลังอดอาหาร 6-8 ชั่วโมง</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="bloodlevel" id="B19" value="น้อยกว่า 100 mg%" required />
                                                                <label class="form-check-label" for="bloodlevel">น้อยกว่า 100 mg%</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="bloodlevel" id="B20" value="100 ถึง 125 mg%" />
                                                                <label class="form-check-label" for="bloodlevel">100 ถึง 125 mg%</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="bloodlevel" id="B21" value="มากกว่า 126 mg%" />
                                                                <label class="form-check-label" for="bloodlevel">มากกว่า 126 mg%</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $sex = $result['sex'];
                                                    if ($sex == 'หญิง') {
                                                        echo '<br>
                                                        <h5 class="card-title text-primary">มีประวัติเป็นเบาหวานขณะตั้งครรภ์ /คลอดบุตรมีน้ำหนักเกิน 4 กิโลกรัม</h5>
                                                        <div class="row col-lg-12 col-md-6 col-3">
                                                            <div class="col-md">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="pregnant" id="B22" value="ไม่มี" />
                                                                    <label class="form-check-label" for="pregnant">ไม่มี</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="pregnant" id="B23" value="มี" />
                                                                    <label class="form-check-label" for="pregnant">มี</label>
                                                                </div>
                                                            </div>
                                                        </div>';
                                                    }
                                                    ?>

                                                    <br>
                                                    <h5 class="card-title text-primary">มีประวัติเป็นโรคความดันโลหิตสูง หรือ ถุงน้ำรังไข่หลายใบหรือ โรคหัวใจและหลอดเลือดหรือ โรคอ้วนรุนแรง หรือ มีภาวะไขมันพอกตับ หรือไม่ </h5>
                                                    <div class="row col-lg-12 col-md-6 col-3">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="ovary" id="B24" value="ไม่มี" required />
                                                                <label class="form-check-label" for="ovary">ไม่มี</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="ovary" id="B25" value="มี" />
                                                                <label class="form-check-label" for="ovary">มี</label>
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
                                                            <a type="button" class="btn btn-primary" href="index.php"><i class='bx bx-home'></i> กลับหน้าหลัก</a>
                                                        </div>
                                                    </center>
                                                </form>
                                                <?php
                                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    include('user_cont/connect.php');
                                                    $height = isset($_POST['height']) ? $_POST['height'] : '';
                                                    $weight = isset($_POST['weight']) ? $_POST['weight'] : '';
                                                    $bmi = isset($_POST['bmi']) ? $_POST['bmi'] : '';
                                                    $pressureup = isset($_POST['pressureup']) ? $_POST['pressureup'] : '';
                                                    $pressuredown = isset($_POST['pressuredown']) ? $_POST['pressuredown'] : '';
                                                    $waistline = isset($_POST['waistline']) ? $_POST['waistline'] : '';
                                                    $fat = isset($_POST['fat']) ? $_POST['fat'] : '';
                                                    $fatblood = isset($_POST['fatblood']) ? $_POST['fatblood'] : '';
                                                    $bloodlevel = isset($_POST['bloodlevel']) ? $_POST['bloodlevel'] : '';
                                                    $pregnant = isset($_POST['pregnant']) ? $_POST['pregnant'] : '';
                                                    $ovary = isset($_POST['ovary']) ? $_POST['ovary'] : '';


                                                    $scoreMapping = array(
                                                        'bmi' => array(
                                                            'น้อยกว่า 18.5' => 2,
                                                            '18.5-24.9' => 1,
                                                            '25-29.9' => 3,
                                                            'มากกว่า 30' => 4,
                                                        ),
                                                        'pressureup' => array(
                                                            'น้อยกว่า 120 mmHg' => 1,
                                                            '121-139 mmHg' => 2,
                                                            '140-159mmHg' => 3,
                                                            'มากกว่าหรือเท่ากับ 160 mmHg' => 4,
                                                        ),
                                                        'pressuredown' => array(
                                                            'น้อยกว่า 80 mmHg' => 1,
                                                            '80-89 mmHg' => 2,
                                                            'มากกว่าหรือเท่ากับ 90 mmHg' => 3,
                                                        ),
                                                        'waistline' => array(
                                                            'น้อยกว่าหรือเท่ากับ 89 cm' => 1,
                                                            'มากกว่าหรือเท่ากับ 90 cm' => 2,
                                                            'น้อยกว่าหรือเท่ากับ 79 cm' => 1,
                                                            'มากกว่าหรือเท่ากับ 80 cm' => 2,
                                                        ),
                                                        'fat' => array(
                                                            'น้อยกว่า 35 mg/dL' => 2,
                                                            'มากกว่า 35 mg/dL' => 1,
                                                        ),
                                                        'fatblood' => array(
                                                            'น้อยกว่า 250 mg/dL' => 1,
                                                            'มากกว่า 250 mg/dL' => 2,
                                                        ),
                                                        'bloodlevel' => array(
                                                            'น้อยกว่า 100 mg%' => 0,
                                                            '100 ถึง 125 mg%' => 1,
                                                            'มากกว่า 126 mg%' => 4,
                                                        ),
                                                        'pregnant' => array(
                                                            'ไม่มี' => 0,
                                                            'มี' => 2,
                                                        ),
                                                        'ovary' => array(
                                                            'ไม่มี' => 0,
                                                            'มี' => 1,
                                                        ),
                                                    );

                                                    $bmiScore = isset($_POST['bmi']) ? ($scoreMapping['bmi'][$_POST['bmi']] ?? 0) : 0;
                                                    $pressureupScore = isset($_POST['pressureup']) ? ($scoreMapping['pressureup'][$_POST['pressureup']] ?? 0) : 0;
                                                    $pressuredownScore = isset($_POST['pressuredown']) ? ($scoreMapping['pressuredown'][$_POST['pressuredown']] ?? 0) : 0;
                                                    $waistlineScore = isset($_POST['waistline']) ? ($scoreMapping['waistline'][$_POST['waistline']] ?? 0) : 0;
                                                    $fatScore = isset($_POST['fat']) ? ($scoreMapping['fat'][$_POST['fat']] ?? 0) : 0;
                                                    $fatbloodScore = isset($_POST['fatblood']) ? ($scoreMapping['fatblood'][$_POST['fatblood']] ?? 0) : 0;
                                                    $bloodlevelScore = isset($_POST['bloodlevel']) ? ($scoreMapping['bloodlevel'][$_POST['bloodlevel']] ?? 0) : 0;
                                                    $pregnantScore = isset($_POST['pregnant']) ? ($scoreMapping['pregnant'][$_POST['pregnant']] ?? 0) : 0;
                                                    $ovaryScore = isset($_POST['ovary']) ? ($scoreMapping['ovary'][$_POST['ovary']] ?? 0) : 0;

                                                    $totalScore = $bmiScore + $pressureupScore + $pressuredownScore + $waistlineScore + $fatScore + $fatbloodScore + $bloodlevelScore + $pregnantScore + $ovaryScore + $totalScoreFromDatabase;

                                                    $score_form1 = $totalScoreFromDatabase;
                                                    $score_form2 = $bmiScore + $pressureupScore + $pressuredownScore + $waistlineScore + $fatScore + $fatbloodScore + $bloodlevelScore + $pregnantScore + $ovaryScore;

                                                    $insertQuery = "INSERT INTO form_2 (
                                                        score_form1, 
                                                        score_form2, 
                                                        total_score, 
                                                        height, 
                                                        weight, 
                                                        bmi, 
                                                        pressureup, 
                                                        pressuredown, 
                                                        waistline, 
                                                        fat, 
                                                        fatblood, 
                                                        bloodlevel, 
                                                        pregnant, 
                                                        ovary,
                                                        sex,
                                                        age,
                                                        status,
                                                        province_name,
                                                        district_name,
                                                        subdistrict_name,
                                                        study,
                                                        bmiScore, 
                                                        pressureupScore, 
                                                        pressuredownScore, 
                                                        waistlineScore, 
                                                        fatScore, 
                                                        fatbloodScore, 
                                                        bloodlevelScore, 
                                                        pregnantScore, 
                                                        ovaryScore,
                                                        fullname,
                                                        tel,
                                                        address
                                                    ) 
                                                    VALUES (
                                                        :score_form1, 
                                                        :score_form2, 
                                                        :totalScore, 
                                                        :height, 
                                                        :weight, 
                                                        :bmi, 
                                                        :pressureup, 
                                                        :pressuredown, 
                                                        :waistline, 
                                                        :fat, 
                                                        :fatblood, 
                                                        :bloodlevel, 
                                                        :pregnant, 
                                                        :ovary,
                                                        :sex,
                                                        :age,
                                                        :status,
                                                        :province_name,
                                                        :district_name,
                                                        :subdistrict_name,
                                                        :study,
                                                        :bmiScore, 
                                                        :pressureupScore, 
                                                        :pressuredownScore, 
                                                        :waistlineScore, 
                                                        :fatScore, 
                                                        :fatbloodScore, 
                                                        :bloodlevelScore, 
                                                        :pregnantScore, 
                                                        :ovaryScore,
                                                        :fullname,
                                                        :tel,
                                                        :address
                                                    )";

                                                    $stmt = $conn->prepare($insertQuery);
                                                    $stmt->bindParam(':score_form2', $score_form2);
                                                    $stmt->bindParam(':score_form1', $score_form1);
                                                    $stmt->bindParam(':totalScore', $totalScore);
                                                    $stmt->bindParam(':height', $height);
                                                    $stmt->bindParam(':weight', $weight);
                                                    $stmt->bindParam(':bmi', $bmi);
                                                    $stmt->bindParam(':pressureup', $pressureup);
                                                    $stmt->bindParam(':pressuredown', $pressuredown);
                                                    $stmt->bindParam(':waistline', $waistline);
                                                    $stmt->bindParam(':fat', $fat);
                                                    $stmt->bindParam(':fatblood', $fatblood);
                                                    $stmt->bindParam(':bloodlevel', $bloodlevel);
                                                    $stmt->bindParam(':pregnant', $pregnant);
                                                    $stmt->bindParam(':ovary', $ovary);
                                                    $stmt->bindParam(':sex', $sex);
                                                    $stmt->bindParam(':age', $age);
                                                    $stmt->bindParam(':status', $status);
                                                    $stmt->bindParam(':province_name', $province_name);
                                                    $stmt->bindParam(':district_name', $district_name);
                                                    $stmt->bindParam(':subdistrict_name', $subdistrict_name);
                                                    $stmt->bindParam(':study', $study);
                                                    $stmt->bindParam(':bmiScore', $bmiScore);
                                                    $stmt->bindParam(':pressureupScore', $pressureupScore);
                                                    $stmt->bindParam(':pressuredownScore', $pressuredownScore);
                                                    $stmt->bindParam(':waistlineScore', $waistlineScore);
                                                    $stmt->bindParam(':fatScore', $fatScore);
                                                    $stmt->bindParam(':fatbloodScore', $fatbloodScore);
                                                    $stmt->bindParam(':bloodlevelScore', $bloodlevelScore);
                                                    $stmt->bindParam(':pregnantScore', $pregnantScore);
                                                    $stmt->bindParam(':ovaryScore', $ovaryScore);
                                                    $stmt->bindParam(':fullname', $fullname);
                                                    $stmt->bindParam(':tel', $tel);
                                                    $stmt->bindParam(':address', $address);

                                                    try {
                                                        $stmt->execute();
                                                        $form_2_id = $conn->lastInsertId();
                                                        echo '<script>window.location.href = "evaluation3.php?form_2_id=' . $form_2_id . '";</script>';
                                                    } catch (PDOException $e) {
                                                        echo "Error: " . $e->getMessage();
                                                    }
                                                }
                                                ?>
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        const heightInput = document.getElementById('B1');
                                                        const weightInput = document.getElementById('B2');
                                                        const bmiDisplay = document.getElementById('bmiDisplay');

                                                        const bmiRadioInputs = [{
                                                                input: document.getElementById('B3'),
                                                                range: {
                                                                    min: 0,
                                                                    max: 18.5
                                                                }
                                                            },
                                                            {
                                                                input: document.getElementById('B4'),
                                                                range: {
                                                                    min: 18.55,
                                                                    max: 24.9
                                                                }
                                                            },
                                                            {
                                                                input: document.getElementById('B5'),
                                                                range: {
                                                                    min: 25,
                                                                    max: 29.9
                                                                }
                                                            },
                                                            {
                                                                input: document.getElementById('B6'),
                                                                range: {
                                                                    min: 30,
                                                                    max: Infinity
                                                                }
                                                            }
                                                        ];

                                                        heightInput.addEventListener('input', updateBMI);
                                                        weightInput.addEventListener('input', updateBMI);

                                                        function updateBMI() {
                                                            const heightInCM = parseFloat(heightInput.value);
                                                            const weight = parseFloat(weightInput.value);
                                                            const heightInM = heightInCM / 100;
                                                            const heightSquared = Math.pow(heightInM, 2);

                                                            if (!isNaN(heightInM) && !isNaN(weight) && heightInM > 0 && weight > 0) {
                                                                const bmi = calculateBMI(heightSquared, weight);
                                                                updateFormBasedOnBMI(bmi);
                                                            }
                                                        }

                                                        function calculateBMI(heightSquared, weight) {
                                                            return weight / heightSquared;
                                                        }

                                                        function updateFormBasedOnBMI(bmi) {
                                                            if (bmiDisplay) {
                                                                bmiDisplay.textContent = `BMI: ${bmi.toFixed(2)}`;
                                                            }
                                                            bmiRadioInputs.forEach(({
                                                                input,
                                                                range
                                                            }) => {
                                                                input.checked = bmi >= range.min && bmi <= range.max;
                                                            });
                                                        }
                                                    });
                                                </script>
                                                <script>
                                                    function checkSelection() {
                                                        var selectedprovince_names = document.querySelectorAll('input[type="radio"]:checked').length;
                                                        var selectedOptions = document.querySelectorAll('select, input[type="radio"]:checked').length;

                                                        if (selectedOptions >= 8 && selectedOptions <= 9) {
                                                            document.getElementById('nextButton').style.display = 'block';
                                                        } else {
                                                            document.getElementById('nextButton').style.display = 'none';
                                                        }
                                                    }
                                                    var formElements = document.querySelectorAll('#formevaluation2 select, #formevaluation2 input[type="radio"]');
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