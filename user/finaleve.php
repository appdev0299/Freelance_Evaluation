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
                                                <div class="col-md mb-5">
                                                    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                                        <ol class="carousel-indicators">
                                                            <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
                                                            <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
                                                        </ol>
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item active">
                                                                <img class="d-block w-100" src="../assets/img/elements/home1.jpg" alt="First slide" />
                                                            </div>
                                                            <div class="carousel-item">
                                                                <img class="d-block w-100" src="../assets/img/elements/home2.jpg" alt="Second slide" />
                                                            </div>
                                                        </div>
                                                        <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <?php
                                                include('user_cont/connect.php');
                                                $form_4_id = isset($_GET['form_4_id']) ? $_GET['form_4_id'] : 0;
                                                if (!empty($form_4_id)) {
                                                    $query = "SELECT * FROM form_4 WHERE form_4_id = :form_4_id";
                                                    $stmt = $conn->prepare($query);
                                                    $stmt->bindParam(':form_4_id', $form_4_id);
                                                    $stmt->execute();
                                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                                    if ($result) {
                                                        $sex = $result['sex'];
                                                        $age = $result['age'];
                                                        $status = $result['status'];
                                                        $study = $result['study'];
                                                        $height = $result['height'];
                                                        $weight = $result['weight'];
                                                        $bmi = $result['bmi'];
                                                        $pressureup = $result['pressureup'];
                                                        $pressuredown = $result['pressuredown'];
                                                        $waistline = $result['waistline'];
                                                        $fat = $result['fat'];
                                                        $fatblood = $result['fatblood'];
                                                        $bloodlevel = $result['bloodlevel'];
                                                        $pregnant = $result['pregnant'];
                                                        $ovary = $result['ovary'];
                                                        $section1 = $result['section1'];
                                                        $section2 = $result['section2'];
                                                        $section3 = $result['section3'];
                                                        $section4 = $result['section4'];
                                                        $section5 = $result['section5'];
                                                        $section6 = $result['section6'];
                                                        $section7 = $result['section7'];
                                                        $section8 = $result['section8'];
                                                        $section9 = $result['section9'];
                                                        $section10 = $result['section10'];
                                                        $section11 = $result['section11'];
                                                        $section12 = $result['section12'];
                                                        $section13 = $result['section13'];
                                                        $section14 = $result['section14'];
                                                        $section15 = $result['section15'];
                                                        $section16 = $result['section16'];
                                                        $section17 = $result['section17'];
                                                        $score_form1 = $result['score_form1'];
                                                        $score_form2 = $result['score_form2'];
                                                        $score_form3 = $result['score_form3'];
                                                        $score_form4 = $result['score_form4'];
                                                        $finishscore = $result['finishscore'];
                                                        $finishscore_TH = $result['finishscore_TH'];

                                                        $bmiScore = $result['bmiScore'];
                                                        $pressureupScore = $result['pressureupScore'];
                                                        $waistlineScore = $result['waistlineScore'];
                                                        $fatbloodScore = $result['fatbloodScore'];
                                                        $bloodlevelScore = $result['bloodlevelScore'];
                                                        $pregnantScore = $result['pregnantScore'];
                                                        $foodScore = $result['foodScore'];
                                                        $exerciseScore = $result['exerciseScore'];
                                                        $cigaretteScore = $result['cigaretteScore'];
                                                        $alcoholScore = $result['alcoholScore'];
                                                        $score_form4 = $result['score_form4'];
                                                        $fullname = $result['fullname'];
                                                        $tel = $result['tel'];
                                                        $address = $result['address'];
                                                        $province_name = $result['province_name'];
                                                        $district_name = $result['district_name'];
                                                        $subdistrict_name = $result['subdistrict_name'];

                                                ?>

                                                        <!-- <h5> คำแนะนำ BMI : <?php echo $bmiScore; ?></h5>
                                                        <h5> คำแนะนำความดันโลหิต : <?php echo $pressureupScore; ?></h5>
                                                        <h5> คำแนะนำรอบเอว : <?php echo $waistlineScore; ?></h5>
                                                        <h5> คำแนะนำระดับไขมันในเลือด : <?php echo $fatbloodScore; ?></h5>
                                                        <h5> คำแนะนำระดับน้ำตาลในเลือดหลังอดอาหาร 6-8 ชั่วโมง : <?php echo $bloodlevelScore; ?></h5>
                                                        <h5> คำแนะนำมีประวัติเป็นเบาหวานขณะตั้งครรภ์ /คลอดบุตรมีน้ำหนักเกิน 4 กิโลกรัม : <?php echo $pregnantScore; ?></h5>
                                                        <h5> คำแนะนำพฤติกรรมการบริโภคอาหาร : <?php echo $foodScore; ?></h5>
                                                        <h5> คำแนะนำพฤติกรรมการออกกำลังกาย : <?php echo $exerciseScore; ?></h5>
                                                        <h5> คำแนะนำพฤติกรรมการสูบบุหรี่ : <?php echo $cigaretteScore; ?></h5>
                                                        <h5> คำแนะนำพฤติกรรมการบริโภคเครื่องดื่มแอลกอฮอล์ : <?php echo $alcoholScore; ?></h5>
                                                        <h5> คำแนะนำส่วนที่ 4 พันธุกรรม : <?php echo $score_form4; ?></h5> -->



                                                        <!-- <h5> ส่วนที่ 1 : <?php echo $score_form1; ?> คะแนน</h5>
                                                        <h5> ส่วนที่ 2 : <?php echo $score_form2; ?> คะแนน</h5>
                                                        <h5> ส่วนที่ 3 : <?php echo $score_form3; ?> คะแนน</h5>
                                                        <h5> ส่วนที่ 4 : <?php echo $score_form4; ?> คะแนน</h5>
                                                        <h5> รวม : <?php echo $finishscore; ?> คะแนน</h5>
                                                        <p><strong>Sex:</strong> <?php echo $sex; ?></p>
                                                        <p><strong>Age:</strong> <?php echo $age; ?></p>
                                                        <p><strong>Status:</strong> <?php echo $status; ?></p>
                                                        <p><strong>Province:</strong> <?php echo $province; ?></p>
                                                        <p><strong>Study:</strong> <?php echo $study; ?></p>
                                                        <p><strong>Height:</strong> <?php echo $height; ?></p>
                                                        <p><strong>Weight:</strong> <?php echo $weight; ?></p>
                                                        <p><strong>BMI:</strong> <?php echo $bmi; ?></p>
                                                        <p><strong>Pressure Up:</strong> <?php echo $pressureup; ?></p>
                                                        <p><strong>Pressure Down:</strong> <?php echo $pressuredown; ?></p>
                                                        <p><strong>Waistline:</strong> <?php echo $waistline; ?></p>
                                                        <p><strong>Fat:</strong> <?php echo $fat; ?></p>
                                                        <p><strong>Fat Blood:</strong> <?php echo $fatblood; ?></p>
                                                        <p><strong>Blood Level:</strong> <?php echo $bloodlevel; ?></p>
                                                        <p><strong>Pregnant:</strong> <?php echo $pregnant; ?></p>
                                                        <p><strong>Ovary:</strong> <?php echo $ovary; ?></p>
                                                        <p><strong>Section 1:</strong> <?php echo $section1; ?></p>
                                                        <p><strong>Section 2:</strong> <?php echo $section2; ?></p>
                                                        <p><strong>Section 3:</strong> <?php echo $section3; ?></p>
                                                        <p><strong>Section 4:</strong> <?php echo $section4; ?></p>
                                                        <p><strong>Section 5:</strong> <?php echo $section5; ?></p>
                                                        <p><strong>Section 6:</strong> <?php echo $section6; ?></p>
                                                        <p><strong>Section 7:</strong> <?php echo $section7; ?></p>
                                                        <p><strong>Section 8:</strong> <?php echo $section8; ?></p>
                                                        <p><strong>Section 9:</strong> <?php echo $section9; ?></p>
                                                        <p><strong>Section 10:</strong> <?php echo $section10; ?></p>
                                                        <p><strong>Section 11:</strong> <?php echo $section11; ?></p>
                                                        <p><strong>Section 12:</strong> <?php echo $section12; ?></p>
                                                        <p><strong>Section 13:</strong> <?php echo $section13; ?></p>
                                                        <p><strong>Section 14:</strong> <?php echo $section14; ?></p>
                                                        <p><strong>Section 15:</strong> <?php echo $section15; ?></p>
                                                        <p><strong>Section 16:</strong> <?php echo $section16; ?></p>
                                                        <p><strong>Section 17:</strong> <?php echo $section17; ?></p>
                                                        <p><strong>Score All:</strong> <?php echo $finishscore; ?></p> -->
                                                <?php
                                                    } else {
                                                        echo "ไม่พบข้อมูลสำหรับ form_3_id: $form_3_id";
                                                    }
                                                } else {
                                                    echo "ไม่ได้รับ form_3_id จาก URL";
                                                }
                                                ?>
                                                <div class="col-md-12 col-xl-12 mb-5">
                                                    <?php
                                                    if ($finishscore < 47) {
                                                        echo '<div class="card bg-info text-white">
                                                        <div class="card-body text-center">
                                                            <h5 class="card-title text-white">ระดับคะแนนของคุณคือ ' . $finishscore . ' คะแนน</h5>
                                                        </div>
                                                    </div>';
                                                    } else {
                                                        echo '<div class="card bg-warning text-white">
                                                        <div class="card-body text-center">
                                                            <h5 class="card-title text-white">ระดับคะแนนของคุณคือ ' . $finishscore . ' คะแนน</h5>
                                                        </div>
                                                    </div>';
                                                    }
                                                    ?>
                                                </div>

                                                <h3 class="card-title text-center mb-4"><u>ผลการทดสอบ</u></h3>
                                                <h5 class="card-title text-center mb-4">
                                                    <p style='color: red;'>
                                                        <b><?php echo $finishscore_TH; ?></b>
                                                    </p>
                                                </h5>
                                                <h5 class="card-title text-center mb-2"><u>ข้อแนะนำในการดูแล</u></h5>
                                                <div class="row">
                                                    <div class="col-md mb-4 mb-md-0">
                                                        <div class="accordion mt-3" id="accordionExample">
                                                            <div class="card accordion-item active">
                                                                <h2 class="accordion-header" id="headingOne">
                                                                    <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                                                                        คำแนะนำ BMI
                                                                    </button>
                                                                </h2>
                                                                <div id="accordionOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <?php
                                                                        $sql = "SELECT title, advice FROM bmiadvice WHERE score = :bmiScore";
                                                                        $stmt = $conn->prepare($sql);
                                                                        $stmt->bindParam(':bmiScore', $bmiScore);
                                                                        $stmt->execute();
                                                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                                        if ($row) {
                                                                            $title = $row['title'];
                                                                            $advice = $row['advice'];
                                                                            echo "<p class='card-title text-center mb-4'>$title</p>";
                                                                            echo "<hr>";
                                                                            if (!empty($advice)) {
                                                                                echo "<p style='color: red;'>คำแนะนำในการดูแลตนเองให้ห่างไกลโรค</p>";
                                                                                echo "<p class='card-title text-center mb-4'>$advice</p>";
                                                                            }
                                                                        } else {
                                                                            echo "<p class='card-title text-center mb-4'>ไม่พบข้อมูลที่เกี่ยวข้อง</p>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card accordion-item">
                                                                <h2 class="accordion-header" id="headingTwo">
                                                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">
                                                                        คำแนะนำความดันโลหิต
                                                                    </button>
                                                                </h2>
                                                                <div id="accordionTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <?php
                                                                        $sql = "SELECT title, advice FROM pressureupadvice WHERE score = :pressureupScore";
                                                                        $stmt = $conn->prepare($sql);
                                                                        $stmt->bindParam(':pressureupScore', $pressureupScore);
                                                                        $stmt->execute();
                                                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                                        if ($row) {
                                                                            $title = $row['title'];
                                                                            $advice = $row['advice'];
                                                                            echo "<p class='card-title text-center mb-4'>$title</p>";
                                                                            echo "<hr>";
                                                                            if (!empty($advice)) {
                                                                                echo "<p style='color: red;'>คำแนะนำในการดูแลตนเองให้ห่างไกลโรค</p>";
                                                                                echo "<p class='card-title text-center mb-4'>$advice</p>";
                                                                            }
                                                                        } else {
                                                                            echo "<p class='card-title text-center mb-4'>ไม่พบข้อมูลที่เกี่ยวข้อง</p>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card accordion-item">
                                                                <h2 class="accordion-header" id="headingThree">
                                                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionThree" aria-expanded="false" aria-controls="accordionThree">
                                                                        คำแนะนำรอบเอว
                                                                    </button>
                                                                </h2>
                                                                <div id="accordionThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <?php
                                                                        $sql = "SELECT title, advice FROM waistlineadvice WHERE score = :waistlineScore";
                                                                        $stmt = $conn->prepare($sql);
                                                                        $stmt->bindParam(':waistlineScore', $waistlineScore);
                                                                        $stmt->execute();
                                                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                                        if ($row) {
                                                                            $title = $row['title'];
                                                                            $advice = $row['advice'];
                                                                            echo "<p class='card-title text-center mb-4'>$title</p>";
                                                                            echo "<hr>";
                                                                            if (!empty($advice)) {
                                                                                echo "<p style='color: red;'>คำแนะนำในการดูแลตนเองให้ห่างไกลโรค</p>";
                                                                                echo "<p class='card-title text-center mb-4'>$advice</p>";
                                                                            }
                                                                        } else {
                                                                            echo "<p class='card-title text-center mb-4'>ไม่พบข้อมูลที่เกี่ยวข้อง</p>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card accordion-item">
                                                                <h2 class="accordion-header" id="headingFour">
                                                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionFour" aria-expanded="false" aria-controls="accordionFour">
                                                                        คำแนะนำระดับไขมันในเลือด
                                                                    </button>
                                                                </h2>
                                                                <div id="accordionFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <?php
                                                                        $sql = "SELECT title, advice FROM fatbloodadvice WHERE score = :fatbloodScore";
                                                                        $stmt = $conn->prepare($sql);
                                                                        $stmt->bindParam(':fatbloodScore', $fatbloodScore);
                                                                        $stmt->execute();
                                                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                                        if ($row) {
                                                                            $title = $row['title'];
                                                                            $advice = $row['advice'];
                                                                            echo "<p class='card-title text-center mb-4'>$title</p>";
                                                                            echo "<hr>";
                                                                            if (!empty($advice)) {
                                                                                echo "<p style='color: red;'>คำแนะนำในการดูแลตนเองให้ห่างไกลโรค</p>";
                                                                                echo "<p class='card-title text-center mb-4'>$advice</p>";
                                                                            }
                                                                        } else {
                                                                            echo "<p class='card-title text-center mb-4'>ไม่พบข้อมูลที่เกี่ยวข้อง</p>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card accordion-item">
                                                                <h2 class="accordion-header" id="headingFive">
                                                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionFive" aria-expanded="false" aria-controls="accordionFive">
                                                                        คำแนะนำระดับน้ำตาลในเลือดหลังอดอาหาร 6-8 ชั่วโมง
                                                                    </button>
                                                                </h2>
                                                                <div id="accordionFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <?php
                                                                        $sql = "SELECT title, advice FROM bloodleveladvice WHERE score = :bloodlevelScore";
                                                                        $stmt = $conn->prepare($sql);
                                                                        $stmt->bindParam(':bloodlevelScore', $bloodlevelScore);
                                                                        $stmt->execute();
                                                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                                        if ($row) {
                                                                            $title = $row['title'];
                                                                            $advice = $row['advice'];
                                                                            echo "<p class='card-title text-center mb-4'>$title</p>";
                                                                            echo "<hr>";
                                                                            if (!empty($advice)) {
                                                                                echo "<p style='color: red;'>คำแนะนำในการดูแลตนเองให้ห่างไกลโรค</p>";
                                                                                echo "<p class='card-title text-center mb-4'>$advice</p>";
                                                                            }
                                                                        } else {
                                                                            echo "<p class='card-title text-center mb-4'>ไม่พบข้อมูลที่เกี่ยวข้อง</p>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card accordion-item">
                                                                <h2 class="accordion-header" id="headingSix">
                                                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionSix" aria-expanded="false" aria-controls="accordionSix">
                                                                        คำแนะนำมีประวัติเป็นเบาหวานขณะตั้งครรภ์ /คลอดบุตรมีน้ำหนักเกิน 4 กิโลกรัม
                                                                    </button>
                                                                </h2>
                                                                <div id="accordionSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <?php
                                                                        $sql = "SELECT title, advice FROM pregnantadvice WHERE score = :pregnantScore";
                                                                        $stmt = $conn->prepare($sql);
                                                                        $stmt->bindParam(':pregnantScore', $pregnantScore);
                                                                        $stmt->execute();
                                                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                                        if ($row) {
                                                                            $title = $row['title'];
                                                                            $advice = $row['advice'];
                                                                            echo "<p class='card-title text-center mb-4'>$title</p>";
                                                                            echo "<hr>";
                                                                            if (!empty($advice)) {
                                                                                echo "<p style='color: red;'>คำแนะนำในการดูแลตนเองให้ห่างไกลโรค</p>";
                                                                                echo "<p class='card-title text-center mb-4'>$advice</p>";
                                                                            }
                                                                        } else {
                                                                            echo "<p class='card-title text-center mb-4'>ไม่พบข้อมูลที่เกี่ยวข้อง</p>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card accordion-item">
                                                                <h2 class="accordion-header" id="headingSeven">
                                                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionSeven" aria-expanded="false" aria-controls="accordionSeven">
                                                                        คำแนะนำพฤติกรรมการบริโภคอาหาร
                                                                    </button>
                                                                </h2>
                                                                <div id="accordionSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <?php
                                                                        $sql = "SELECT title, advice FROM foodadvice WHERE score = :foodScore";
                                                                        $stmt = $conn->prepare($sql);
                                                                        $stmt->bindParam(':foodScore', $foodScore);
                                                                        $stmt->execute();
                                                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                                        if ($row) {
                                                                            $title = $row['title'];
                                                                            $advice = $row['advice'];
                                                                            echo "<p class='card-title text-center mb-4'>$title</p>";
                                                                            echo "<hr>";
                                                                            if (!empty($advice)) {
                                                                                echo "<p style='color: red;'>คำแนะนำในการดูแลตนเองให้ห่างไกลโรค</p>";
                                                                                echo "<p class='card-title text-center mb-4'>$advice</p>";
                                                                            }
                                                                        } else {
                                                                            echo "<p class='card-title text-center mb-4'>ไม่พบข้อมูลที่เกี่ยวข้อง</p>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card accordion-item">
                                                                <h2 class="accordion-header" id="headingEight">
                                                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionEight" aria-expanded="false" aria-controls="accordionEight">
                                                                        คำแนะนำพฤติกรรมการออกกำลังกาย
                                                                    </button>
                                                                </h2>
                                                                <div id="accordionEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <?php
                                                                        $sql = "SELECT title, advice FROM exerciseadvice WHERE score = :exerciseScore";
                                                                        $stmt = $conn->prepare($sql);
                                                                        $stmt->bindParam(':exerciseScore', $exerciseScore);
                                                                        $stmt->execute();
                                                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                                        if ($row) {
                                                                            $title = $row['title'];
                                                                            $advice = $row['advice'];
                                                                            echo "<p class='card-title text-center mb-4'>$title</p>";
                                                                            echo "<hr>";
                                                                            if (!empty($advice)) {
                                                                                echo "<p style='color: red;'>คำแนะนำในการดูแลตนเองให้ห่างไกลโรค</p>";
                                                                                echo "<p class='card-title text-center mb-4'>$advice</p>";
                                                                            }
                                                                        } else {
                                                                            echo "<p class='card-title text-center mb-4'>ไม่พบข้อมูลที่เกี่ยวข้อง</p>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card accordion-item">
                                                                <h2 class="accordion-header" id="headingNine">
                                                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionNine" aria-expanded="false" aria-controls="accordionNine">
                                                                        คำแนะนำพฤติกรรมการสูบบุหรี่
                                                                    </button>
                                                                </h2>
                                                                <div id="accordionNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <?php
                                                                        $sql = "SELECT title, advice FROM cigaretteadvice WHERE score = :cigaretteScore";
                                                                        $stmt = $conn->prepare($sql);
                                                                        $stmt->bindParam(':cigaretteScore', $cigaretteScore);
                                                                        $stmt->execute();
                                                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                                        if ($row) {
                                                                            $title = $row['title'];
                                                                            $advice = $row['advice'];
                                                                            echo "<p class='card-title text-center mb-4'>$title</p>";
                                                                            echo "<hr>";
                                                                            if (!empty($advice)) {
                                                                                echo "<p style='color: red;'>คำแนะนำในการดูแลตนเองให้ห่างไกลโรค</p>";
                                                                                echo "<p class='card-title text-center mb-4'>$advice</p>";
                                                                            }
                                                                        } else {
                                                                            echo "<p class='card-title text-center mb-4'>ไม่พบข้อมูลที่เกี่ยวข้อง</p>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card accordion-item">
                                                                <h2 class="accordion-header" id="headingTen">
                                                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionTen" aria-expanded="false" aria-controls="accordionTen">
                                                                        คำแนะนำพฤติกรรมการบริโภคเครื่องดื่มแอลกอฮอล์
                                                                    </button>
                                                                </h2>
                                                                <div id="accordionTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <?php
                                                                        $sql = "SELECT title, advice FROM alcoholadvice WHERE score = :alcoholScore";
                                                                        $stmt = $conn->prepare($sql);
                                                                        $stmt->bindParam(':alcoholScore', $alcoholScore);
                                                                        $stmt->execute();
                                                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                                        if ($row) {
                                                                            $title = $row['title'];
                                                                            $advice = $row['advice'];
                                                                            echo "<p class='card-title text-center mb-4'>$title</p>";
                                                                            echo "<hr>";
                                                                            if (!empty($advice)) {
                                                                                echo "<p style='color: red;'>คำแนะนำในการดูแลตนเองให้ห่างไกลโรค</p>";
                                                                                echo "<p class='card-title text-center mb-4'>$advice</p>";
                                                                            }
                                                                        } else {
                                                                            echo "<p class='card-title text-center mb-4'>ไม่พบข้อมูลที่เกี่ยวข้อง</p>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card accordion-item">
                                                                <h2 class="accordion-header" id="headingEleven">
                                                                    <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionEleven" aria-expanded="false" aria-controls="accordionEleven">
                                                                        คำแนะนำส่วนที่ 4 พันธุกรรม
                                                                    </button>
                                                                </h2>
                                                                <div id="accordionEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <?php
                                                                        $sql = "SELECT title, advice FROM score_form4advice WHERE score = :score_form4";
                                                                        $stmt = $conn->prepare($sql);
                                                                        $stmt->bindParam(':score_form4', $score_form4);
                                                                        $stmt->execute();
                                                                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                                        if ($row) {
                                                                            $title = $row['title'];
                                                                            $advice = $row['advice'];
                                                                            echo "<p class='card-title text-center mb-4'>$title</p>";
                                                                            echo "<hr>";
                                                                            if (!empty($advice)) {
                                                                                echo "<p style='color: red;'>คำแนะนำในการดูแลตนเองให้ห่างไกลโรค</p>";
                                                                                echo "<p class='card-title text-center mb-4'>$advice</p>";
                                                                            }
                                                                        } else {
                                                                            echo "<p class='card-title text-center mb-4'>ไม่พบข้อมูลที่เกี่ยวข้อง</p>";
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <center>
                                                    <div class="button-container">
                                                        <a type="button" class="btn btn-primary" href="index.php"> <i class='bx bx-home'> </i>กลับหน้าหลัก</a>
                                                        <a type="button" class="btn btn-primary" href="evaluation0.php"><i class='bx bx-spreadsheet'></i> ประเมินอีกรอบ</a>
                                                    </div>
                                                </center>
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