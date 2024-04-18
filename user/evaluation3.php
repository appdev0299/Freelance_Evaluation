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
                                                <form id="formevaluation3" method="post">
                                                    <h5 class="card-title text-primary">ส่วนที่ 3 ข้อมูลพฤติกรรมการดำเนินชีวิต</h5>
                                                    <hr>
                                                    <h5 class="card-title text-primary">3.1 พฤติกรรมการบริโภคอาหาร</h5>
                                                    <?php
                                                    include('user_cont/connect.php');
                                                    $form_2_id = isset($_GET['form_2_id']) ? $_GET['form_2_id'] : 0;
                                                    if (!empty($form_2_id)) {
                                                        $query = "SELECT * FROM form_2 WHERE form_2_id = :form_2_id";
                                                        $stmt = $conn->prepare($query);
                                                        $stmt->bindParam(':form_2_id', $form_2_id);
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
                                                            $score_form1 = $result['score_form1'];
                                                            $score_form2 = $result['score_form2'];
                                                            $bmiScore = $result['bmiScore'];
                                                            $pressureupScore = $result['pressureupScore'];
                                                            $waistlineScore = $result['waistlineScore'];
                                                            $fatbloodScore = $result['fatbloodScore'];
                                                            $bloodlevelScore = $result['bloodlevelScore'];
                                                            $pregnantScore = $result['pregnantScore'];

                                                            $fullname = $result['fullname'];
                                                            $tel = $result['tel'];
                                                            $address = $result['address'];
                                                            $province_name = $result['province_name'];
                                                            $district_name = $result['district_name'];
                                                            $subdistrict_name = $result['subdistrict_name'];
                                                            $totalScoreFromDatabase = $result['total_score'];

                                                            $totalScoreFromDatabase = $result['total_score'];
                                                    ?>
                                                            <!-- <p><strong>เพศ:</strong> <?php echo $sex; ?></p>
                                                            <p><strong>อายุ:</strong> <?php echo $age; ?></p>
                                                            <p><strong>สถานะ:</strong> <?php echo $status; ?></p>
                                                            <p><strong>การศึกษา:</strong> <?php echo $study; ?></p>
                                                            <p><strong>ส่วนสูง:</strong> <?php echo $height; ?></p>
                                                            <p><strong>น้ำหนัก:</strong> <?php echo $weight; ?></p>
                                                            <p><strong>BMI:</strong> <?php echo $bmi; ?></p>
                                                            <p><strong>ความดันโลหิต (บน):</strong> <?php echo $pressureup; ?></p>
                                                            <p><strong>ความดันโลหิต (ล่าง):</strong> <?php echo $pressuredown; ?></p>
                                                            <p><strong>รอบเอว:</strong> <?php echo $waistline; ?></p>
                                                            <p><strong>ไขมัน:</strong> <?php echo $fat; ?></p>
                                                            <p><strong>ไขมันในเลือด:</strong> <?php echo $fatblood; ?></p>
                                                            <p><strong>ระดับน้ำตาลในเลือด:</strong> <?php echo $bloodlevel; ?></p>
                                                            <p><strong>การตั้งครรภ์:</strong> <?php echo $pregnant; ?></p>
                                                            <p><strong>การมีรังไข่:</strong> <?php echo $ovary; ?></p>
                                                            <p><strong>คะแนน form 1:</strong> <?php echo $score_form1; ?></p>
                                                            <p><strong>คะแนน form 2:</strong> <?php echo $score_form2; ?></p>
                                                            <p><strong>คะแนน BMI:</strong> <?php echo $bmiScore; ?></p>
                                                            <p><strong>คะแนนความดันโลหิต (บน):</strong> <?php echo $pressureupScore; ?></p>
                                                            <p><strong>คะแนนรอบเอว:</strong> <?php echo $waistlineScore; ?></p>
                                                            <p><strong>คะแนนไขมันในเลือด:</strong> <?php echo $fatbloodScore; ?></p>
                                                            <p><strong>คะแนนระดับน้ำตาลในเลือด:</strong> <?php echo $bloodlevelScore; ?></p>
                                                            <p><strong>คะแนนการตั้งครรภ์:</strong> <?php echo $pregnantScore; ?></p>
                                                            <p><strong>ชื่อเต็ม:</strong> <?php echo $fullname; ?></p>
                                                            <p><strong>เบอร์โทร:</strong> <?php echo $tel; ?></p>
                                                            <p><strong>ที่อยู่:</strong> <?php echo $address; ?></p>
                                                            <p><strong>จังหวัด:</strong> <?php echo $province_name; ?></p>
                                                            <p><strong>อำเภอ:</strong> <?php echo $district_name; ?></p>
                                                            <p><strong>ตำบล:</strong> <?php echo $subdistrict_name; ?></p>
                                                            <p><strong>คะแนนรวมจากฐานข้อมูล:</strong> <?php echo $totalScoreFromDatabase; ?></p> -->

                                                    <?php
                                                        } else {
                                                            echo "ไม่พบข้อมูลสำหรับ form_2_id: $form_2_id";
                                                        }
                                                    } else {
                                                        echo "ไม่ได้รับ form_2_id จาก URL";
                                                    }
                                                    ?>
                                                    <br>
                                                    <h5 class="card-title text-primary">ท่านรับประทานอาหารครบ 3 มื้อ</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section1" id="C1" value="เป็นประจำ/ปฏิบัติทุกวัน" />
                                                                <label class="form-check-label" for="C1">เป็นประจำ/ปฏิบัติทุกวัน</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section1" id="C2" value="บ่อยครั้ง/5-6 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C2">บ่อยครั้ง/5-6 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section1" id="C3" value="บางครั้ง/3-4 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C3">บางครั้ง/3-4 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section1" id="C4" value="นานๆครั้ง/1-2 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C4">นานๆครั้ง/1-2 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section1" id="C5" value="ไม่เคยเลย" />
                                                                <label class="form-check-label" for="C5">ไม่เคยเลย</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">ท่านชอบเติมเครื่องปรุงรสชาติอาหารให้มีรสหวานเสมอ เช่น น้ำตาล ผงชูรส ก้อนปรุงรส ซอส</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section2" id="C6" value="เป็นประจำ/ปฏิบัติทุกวัน" />
                                                                <label class="form-check-label" for="C6">เป็นประจำ/ปฏิบัติทุกวัน</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section2" id="C7" value="บ่อยครั้ง/5-6 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C7">บ่อยครั้ง/5-6 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section2" id="C8" value="บางครั้ง/3-4 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C8">บางครั้ง/3-4 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section2" id="C9" value="นานๆครั้ง/1-2 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C9">นานๆครั้ง/1-2 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section2" id="C10" value="ไม่เคยเลย" />
                                                                <label class="form-check-label" for="C10">ไม่เคยเลย</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">ท่านรับประทานอาหารว่างระหว่างมื้อนอกเหนือจากอาหารมื้อหลัก 3 มื้อต่อวัน</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section3" id="C11" value="เป็นประจำ/ปฏิบัติทุกวัน" />
                                                                <label class="form-check-label" for="C11">เป็นประจำ/ปฏิบัติทุกวัน</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section3" id="C12" value="บ่อยครั้ง/5-6 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C12">บ่อยครั้ง/5-6 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section3" id="C13" value="บางครั้ง/3-4 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C13">บางครั้ง/3-4 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section3" id="C14" value="นานๆครั้ง/1-2 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C14">นานๆครั้ง/1-2 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section3" id="C15" value="ไม่เคยเลย" />
                                                                <label class="form-check-label" for="C15">ไม่เคยเลย</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">ท่านรับประทานขัดสี ข้าวเหนียว ขนมปังสีขาว</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section4" id="C16" value="เป็นประจำ/ปฏิบัติทุกวัน" />
                                                                <label class="form-check-label" for="C16">เป็นประจำ/ปฏิบัติทุกวัน</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section4" id="C17" value="บ่อยครั้ง/5-6 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C17">บ่อยครั้ง/5-6 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section4" id="C18" value="บางครั้ง/3-4 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C18">บางครั้ง/3-4 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section4" id="C19" value="นานๆครั้ง/1-2 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C19">นานๆครั้ง/1-2 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section4" id="C20" value="ไม่เคยเลย" />
                                                                <label class="form-check-label" for="C20">ไม่เคยเลย</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">ท่านรับประทานเส้นก๋วยเตี๋ยว ได้แก่ เส้นเล็ก เส้นใหญ่ บะหมี่เส้นเหลือง</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section5" id="C21" value="เป็นประจำ/ปฏิบัติทุกวัน" />
                                                                <label class="form-check-label" for="C21">เป็นประจำ/ปฏิบัติทุกวัน</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section5" id="C22" value="บ่อยครั้ง/5-6 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C22">บ่อยครั้ง/5-6 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section5" id="C23" value="บางครั้ง/3-4 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C23">บางครั้ง/3-4 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section5" id="C24" value="นานๆครั้ง/1-2 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C24">นานๆครั้ง/1-2 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section5" id="C25" value="ไม่เคยเลย" />
                                                                <label class="form-check-label" for="C25">ไม่เคยเลย</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">ท่านรับประทานผลไม้อย่างไม่จำกัดปริมาณ</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section6" id="C26" value="เป็นประจำ/ปฏิบัติทุกวัน" />
                                                                <label class="form-check-label" for="C26">เป็นประจำ/ปฏิบัติทุกวัน</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section6" id="C27" value="บ่อยครั้ง/5-6 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C27">บ่อยครั้ง/5-6 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section6" id="C28" value="บางครั้ง/3-4 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C28">บางครั้ง/3-4 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section6" id="C29" value="นานๆครั้ง/1-2 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C29">นานๆครั้ง/1-2 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section6" id="C30" value="ไม่เคยเลย" />
                                                                <label class="form-check-label" for="C30">ไม่เคยเลย</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">ท่านรับประทานอาหารมัน อาหารทอด แกงกะทิ</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section7" id="C31" value="เป็นประจำ/ปฏิบัติทุกวัน" />
                                                                <label class="form-check-label" for="C31">เป็นประจำ/ปฏิบัติทุกวัน</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section7" id="C32" value="บ่อยครั้ง/5-6 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C32">บ่อยครั้ง/5-6 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section7" id="C33" value="บางครั้ง/3-4 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C33">บางครั้ง/3-4 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section7" id="C34" value="นานๆครั้ง/1-2 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C34">นานๆครั้ง/1-2 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section7" id="C35" value="ไม่เคยเลย" />
                                                                <label class="form-check-label" for="C35">ไม่เคยเลย</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">ท่านดื่มเครื่องดื่มประเภท น้ำหวาน น้ำชา กาแฟ น้ำอัดลม ที่รสชาติหวาน</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section8" id="C36" value="เป็นประจำ/ปฏิบัติทุกวัน" />
                                                                <label class="form-check-label" for="C36">เป็นประจำ/ปฏิบัติทุกวัน</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section8" id="C37" value="บ่อยครั้ง/5-6 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C37">บ่อยครั้ง/5-6 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section8" id="C38" value="บางครั้ง/3-4 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C38">บางครั้ง/3-4 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section8" id="C39" value="นานๆครั้ง/1-2 วัน/สัปดาห์" />
                                                                <label class="form-check-label" for="C39">นานๆครั้ง/1-2 วัน/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section8" id="C40" value="ไม่เคยเลย" />
                                                                <label class="form-check-label" for="C40">ไม่เคยเลย</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h5 class="card-title text-primary">3.2 พฤติกรรมการออกกำลังกาย</h5>
                                                    <br>
                                                    <h5 class="card-title text-primary">ท่านออกกำลังกายประเภทแอโรบิก เช่น การวิ่งเหยาะ ๆ ว่ายน้ำ แบดมินตัน ฟุตบอล เต้นแอโรบิก</h5>
                                                    <div class="row col-lg-12 col-md-6 col-3">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section9" id="C41" value="ไม่ใช่" />
                                                                <label class="form-check-label" for="C41">ไม่ใช่</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section9" id="C42" value="ใช่" />
                                                                <label class="form-check-label" for="C42">ใช่</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">ระยะเวลาในแต่และครั้งที่ออกกำลังกาย นาที/ครั้ง</h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section10" id="C43" value="น้อยกว่า 30 นาที" />
                                                                <label class="form-check-label" for="C43">น้อยกว่า 30 นาที</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section10" id="C44" value="มากกว่า 30 นาที" />
                                                                <label class="form-check-label" for="C44">มากกว่า 30 นาที</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5 class="card-title text-primary">ความถี่ของการออกกำลังกาย ครั้ง/สัปดาห์ </h5>
                                                    <div class="row col-lg-12 col-md-6 col-12">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section11" id="C45" value="น้อยกว่า 3 ครั้ง/สัปดาห์" />
                                                                <label class="form-check-label" for="C45">น้อยกว่า 3 ครั้ง/สัปดาห์</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section11" id="C46" value="มากกว่า 3 ครั้ง/สัปดาห์" />
                                                                <label class="form-check-label" for="C46">มากกว่า 3 ครั้ง/สัปดาห์</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h5 class="card-title text-primary">3.3 พฤติกรรมการสูบบุหรี่</h5>
                                                    <br>
                                                    <h5 class="card-title text-primary">ท่านสูบบุหรี่หรือไม่</h5>
                                                    <div class="row col-lg-12 col-md-6 col-8">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section12" id="C47" value="ไม่เคย" />
                                                                <label class="form-check-label" for="C47">ไม่เคย</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section12" id="C48" value="ปัจจุบันสูบอยู่" />
                                                                <label class="form-check-label" for="C48">ปัจจุบันสูบอยู่</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section12" id="C49" value="เคยสูบแต่เลิกแล้ว" />
                                                                <label class="form-check-label" for="C49">เคยสูบแต่เลิกแล้ว</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row col-lg-12 col-md-6 col-12" id="section12">
                                                        <br>
                                                        <h5 class="card-title text-primary">ปริมาณการสูบบุหรี่ ม้วน/วัน</h5>
                                                        <div class="row col-lg-12 col-md-6 col-12">
                                                            <div class="col-md">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="section13" id="C50" value="น้อยกว่า 24 ม้วน/วัน" />
                                                                    <label class="form-check-label" for="C50">น้อยกว่า 24 ม้วน/วัน</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="section13" id="C51" value="มากกว่าเท่ากับ 25 ม้วน/วัน" />
                                                                    <label class="form-check-label" for="C51">มากกว่าเท่ากับ 25 ม้วน/วัน</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <h5 class="card-title text-primary">บุคคลใกล้ชิดของท่านเคยสูบบุหรี่หรือไม่</h5>
                                                        <div class="row col-lg-12 col-md-6 col-8">
                                                            <div class="col-md">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="section14" id="C52" value="ไม่เคย" />
                                                                    <label class="form-check-label" for="C52">ไม่เคย</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="section14" id="C53" value="ปัจจุบันสูบอยู่" />
                                                                    <label class="form-check-label" for="C53">ปัจจุบันสูบอยู่</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="section14" id="C54" value="เคยสูบแต่เลิกแล้ว" />
                                                                    <label class="form-check-label" for="C54">เคยสูบแต่เลิกแล้ว</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h5 class="card-title text-primary">3.4 พฤติกรรมการบริโภคเครื่องดื่มแอลกอฮอล์</h5>
                                                    <br>
                                                    <h5 class="card-title text-primary">ท่านดื่มเครื่องดื่มแอลกอฮอล์หรือไม่</h5>
                                                    <div class="row col-lg-12 col-md-6 col-8">
                                                        <div class="col-md">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section15" id="C55" value="ไม่เคยดื่ม" />
                                                                <label class="form-check-label" for="C55">ไม่เคยดื่ม</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section15" id="C56" value="ปัจจุบันดื่มอยู่" />
                                                                <label class="form-check-label" for="C56">ปัจจุบันดื่มอยู่</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="section15" id="C57" value="เคยดื่มแต่เลิกแล้ว" />
                                                                <label class="form-check-label" for="C57">เคยดื่มแต่เลิกแล้ว</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row col-lg-12 col-md-6 col-12" id="section15">
                                                        <h5 class="card-title text-primary">ชนิดของเครื่องดื่มแอลกอฮอล์ที่ดื่มเป็นประจำ</h5>
                                                        <div class="row col-lg-12 col-md-6 col-6">
                                                            <div class="col-md">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="section16" id="C58" value="สุรา" />
                                                                    <label class="form-check-label" for="C58">สุรา</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="section16" id="C59" value="เบียร์" />
                                                                    <label class="form-check-label" for="C59">เบียร์</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="section16" id="C60" value="ไวน์/สปาย" />
                                                                    <label class="form-check-label" for="C60">ไวน์/สปาย</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <h5 class="card-title text-primary">ปริมาณการดื่มต่อครั้ง</h5>
                                                        <div class="row col-lg-12 col-md-6 col-8">
                                                            <div class="col-md">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="section17" id="C61" value="ไม่เคยดื่ม/ดื่มน้อยมาก" />
                                                                    <label class="form-check-label" for="C61">ไม่เคยดื่ม/ดื่มน้อยมาก</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="section17" id="C62" value="ดื่มน้อย" />
                                                                    <label class="form-check-label" for="C62">ดื่มน้อย</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="section17" id="C63" value="ดื่มปานกลาง" />
                                                                    <label class="form-check-label" for="C63">ดื่มปานกลาง</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="section17" id="C64" value="ดื่มมาก" />
                                                                    <label class="form-check-label" for="C64">ดื่มมาก</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                    $section1 = isset($_POST['section1']) ? $_POST['section1'] : '';
                                                    $section2 = isset($_POST['section2']) ? $_POST['section2'] : '';
                                                    $section3 = isset($_POST['section3']) ? $_POST['section3'] : '';
                                                    $section4 = isset($_POST['section4']) ? $_POST['section4'] : '';
                                                    $section5 = isset($_POST['section5']) ? $_POST['section5'] : '';
                                                    $section6 = isset($_POST['section6']) ? $_POST['section6'] : '';
                                                    $section7 = isset($_POST['section7']) ? $_POST['section7'] : '';
                                                    $section8 = isset($_POST['section8']) ? $_POST['section8'] : '';
                                                    $section9 = isset($_POST['section9']) ? $_POST['section9'] : '';
                                                    $section10 = isset($_POST['section10']) ? $_POST['section10'] : '';
                                                    $section11 = isset($_POST['section11']) ? $_POST['section11'] : '';
                                                    $section12 = isset($_POST['section12']) ? $_POST['section12'] : '';
                                                    $section13 = isset($_POST['section13']) ? $_POST['section13'] : '';
                                                    $section14 = isset($_POST['section14']) ? $_POST['section14'] : '';
                                                    $section15 = isset($_POST['section15']) ? $_POST['section15'] : '';
                                                    $section16 = isset($_POST['section16']) ? $_POST['section16'] : '';
                                                    $section17 = isset($_POST['section17']) ? $_POST['section17'] : '';

                                                    $scoreMapping = array(
                                                        'section1' => array(
                                                            'เป็นประจำ/ปฏิบัติทุกวัน' => 1,
                                                            'บ่อยครั้ง/5-6 วัน/สัปดาห์' => 2,
                                                            'บางครั้ง/3-4 วัน/สัปดาห์' => 3,
                                                            'นานๆครั้ง/1-2 วัน/สัปดาห์' => 4,
                                                            'ไม่เคยเลย' => 5,
                                                        ),
                                                        'section2' => array(
                                                            'เป็นประจำ/ปฏิบัติทุกวัน' => 5,
                                                            'บ่อยครั้ง/5-6 วัน/สัปดาห์' => 4,
                                                            'บางครั้ง/3-4 วัน/สัปดาห์' => 3,
                                                            'นานๆครั้ง/1-2 วัน/สัปดาห์' => 2,
                                                            'ไม่เคยเลย' => 1,
                                                        ),
                                                        'section3' => array(
                                                            'เป็นประจำ/ปฏิบัติทุกวัน' => 5,
                                                            'บ่อยครั้ง/5-6 วัน/สัปดาห์' => 4,
                                                            'บางครั้ง/3-4 วัน/สัปดาห์' => 3,
                                                            'นานๆครั้ง/1-2 วัน/สัปดาห์' => 2,
                                                            'ไม่เคยเลย' => 1,
                                                        ),
                                                        'section4' => array(
                                                            'เป็นประจำ/ปฏิบัติทุกวัน' => 5,
                                                            'บ่อยครั้ง/5-6 วัน/สัปดาห์' => 4,
                                                            'บางครั้ง/3-4 วัน/สัปดาห์' => 3,
                                                            'นานๆครั้ง/1-2 วัน/สัปดาห์' => 2,
                                                            'ไม่เคยเลย' => 1,
                                                        ),
                                                        'section5' => array(
                                                            'เป็นประจำ/ปฏิบัติทุกวัน' => 5,
                                                            'บ่อยครั้ง/5-6 วัน/สัปดาห์' => 4,
                                                            'บางครั้ง/3-4 วัน/สัปดาห์' => 3,
                                                            'นานๆครั้ง/1-2 วัน/สัปดาห์' => 2,
                                                            'ไม่เคยเลย' => 1,
                                                        ),
                                                        'section6' => array(
                                                            'เป็นประจำ/ปฏิบัติทุกวัน' => 5,
                                                            'บ่อยครั้ง/5-6 วัน/สัปดาห์' => 4,
                                                            'บางครั้ง/3-4 วัน/สัปดาห์' => 3,
                                                            'นานๆครั้ง/1-2 วัน/สัปดาห์' => 2,
                                                            'ไม่เคยเลย' => 1,
                                                        ),
                                                        'section7' => array(
                                                            'เป็นประจำ/ปฏิบัติทุกวัน' => 5,
                                                            'บ่อยครั้ง/5-6 วัน/สัปดาห์' => 4,
                                                            'บางครั้ง/3-4 วัน/สัปดาห์' => 3,
                                                            'นานๆครั้ง/1-2 วัน/สัปดาห์' => 2,
                                                            'ไม่เคยเลย' => 1,
                                                        ),
                                                        'section8' => array(
                                                            'เป็นประจำ/ปฏิบัติทุกวัน' => 5,
                                                            'บ่อยครั้ง/5-6 วัน/สัปดาห์' => 4,
                                                            'บางครั้ง/3-4 วัน/สัปดาห์' => 3,
                                                            'นานๆครั้ง/1-2 วัน/สัปดาห์' => 2,
                                                            'ไม่เคยเลย' => 1,
                                                        ),
                                                        'section9' => array(
                                                            'ไม่ใช่' => 2,
                                                            'ใช่' => 1,
                                                        ),
                                                        'section10' => array(
                                                            'น้อยกว่า 30 นาที' => 2,
                                                            'มากกว่า 30 นาที' => 1,
                                                        ),
                                                        'section11' => array(
                                                            'น้อยกว่า 3 ครั้ง/สัปดาห์' => 2,
                                                            'มากกว่า 3 ครั้ง/สัปดาห์' => 1,
                                                        ),
                                                        'section12' => array(
                                                            'ไม่เคย' => 0,
                                                            'ปัจจุบันสูบอยู่' => 2,
                                                            'เคยสูบแต่เลิกแล้ว' => 2,
                                                        ),
                                                        'section13' => array(
                                                            'น้อยกว่า 24 ม้วน/วัน' => 1,
                                                            'มากกว่าเท่ากับ 25 ม้วน/วัน' => 2,
                                                        ),
                                                        'section14' => array(
                                                            'ไม่เคย' => 1,
                                                            'ปัจจุบันสูบอยู่' => 2,
                                                            'เคยสูบแต่เลิกแล้ว' => 2,
                                                        ),
                                                        'section15' => array(
                                                            'ไม่เคยดื่ม' => 1,
                                                            'ปัจจุบันดื่มอยู่' => 0,
                                                            'เคยดื่มแต่เลิกแล้ว' => 2,
                                                        ),
                                                        'section16' => array(
                                                            'สุรา' => 0,
                                                            'เบียร์' => 0,
                                                            'ไวน์/สปาย' => 0,
                                                        ),
                                                        'section17' => array(
                                                            'ไม่เคยดื่ม/ดื่มน้อยมาก' => 0,
                                                            'ดื่มน้อย' => 0,
                                                            'ดื่มปานกลาง' => 0,
                                                            'ดื่มมาก' => 0,
                                                        ),
                                                    );
                                                    $section1 = isset($_POST['section1']) ? $_POST['section1'] : '';
                                                    $section2 = isset($_POST['section2']) ? $_POST['section2'] : '';
                                                    $section3 = isset($_POST['section3']) ? $_POST['section3'] : '';
                                                    $section4 = isset($_POST['section4']) ? $_POST['section4'] : '';
                                                    $section5 = isset($_POST['section5']) ? $_POST['section5'] : '';
                                                    $section6 = isset($_POST['section6']) ? $_POST['section6'] : '';
                                                    $section7 = isset($_POST['section7']) ? $_POST['section7'] : '';
                                                    $section8 = isset($_POST['section8']) ? $_POST['section8'] : '';
                                                    $section9 = isset($_POST['section9']) ? $_POST['section9'] : '';
                                                    $section10 = isset($_POST['section10']) ? $_POST['section10'] : '';
                                                    $section11 = isset($_POST['section11']) ? $_POST['section11'] : '';
                                                    $section12 = isset($_POST['section12']) ? $_POST['section12'] : '';
                                                    $section13 = isset($_POST['section13']) ? $_POST['section13'] : '';
                                                    $section14 = isset($_POST['section14']) ? $_POST['section14'] : '';
                                                    $section15 = isset($_POST['section15']) ? $_POST['section15'] : '';
                                                    $section16 = isset($_POST['section16']) ? $_POST['section16'] : '';
                                                    $section17 = isset($_POST['section17']) ? $_POST['section17'] : '';

                                                    $section1score = isset($_POST['section1']) ? ($scoreMapping['section1'][$_POST['section1']] ?? 0) : 0;
                                                    $section2score = isset($_POST['section2']) ? ($scoreMapping['section2'][$_POST['section2']] ?? 0) : 0;
                                                    $section3score = isset($_POST['section3']) ? ($scoreMapping['section3'][$_POST['section3']] ?? 0) : 0;
                                                    $section4score = isset($_POST['section4']) ? ($scoreMapping['section4'][$_POST['section4']] ?? 0) : 0;
                                                    $section5score = isset($_POST['section5']) ? ($scoreMapping['section5'][$_POST['section5']] ?? 0) : 0;
                                                    $section6score = isset($_POST['section6']) ? ($scoreMapping['section6'][$_POST['section6']] ?? 0) : 0;
                                                    $section7score = isset($_POST['section7']) ? ($scoreMapping['section7'][$_POST['section7']] ?? 0) : 0;
                                                    $section8score = isset($_POST['section8']) ? ($scoreMapping['section8'][$_POST['section8']] ?? 0) : 0;
                                                    $section9score = isset($_POST['section9']) ? ($scoreMapping['section9'][$_POST['section9']] ?? 0) : 0;
                                                    $section10score = isset($_POST['section10']) ? ($scoreMapping['section10'][$_POST['section10']] ?? 0) : 0;
                                                    $section11score = isset($_POST['section11']) ? ($scoreMapping['section11'][$_POST['section11']] ?? 0) : 0;
                                                    $section12score = isset($_POST['section12']) ? ($scoreMapping['section12'][$_POST['section12']] ?? 0) : 0;
                                                    $section13score = isset($_POST['section13']) ? ($scoreMapping['section13'][$_POST['section13']] ?? 0) : 0;
                                                    $section14score = isset($_POST['section14']) ? ($scoreMapping['section14'][$_POST['section14']] ?? 0) : 0;
                                                    $section15score = isset($_POST['section15']) ? ($scoreMapping['section15'][$_POST['section15']] ?? 0) : 0;
                                                    $section16score = isset($_POST['section16']) ? ($scoreMapping['section16'][$_POST['section16']] ?? 0) : 0;
                                                    $section17score = isset($_POST['section17']) ? ($scoreMapping['section17'][$_POST['section17']] ?? 0) : 0;

                                                    $totalScore = $section1score + $section2score + $section3score + $section4score + $section5score + $section6score + $section7score + $section8score;
                                                    if ($totalScore >= 8 && $totalScore <= 14) {
                                                        $score = 1;
                                                    } elseif ($totalScore >= 15 && $totalScore <= 22) {
                                                        $score = 2;
                                                    } elseif ($totalScore >= 23 && $totalScore <= 31) {
                                                        $score = 3;
                                                    } elseif ($totalScore >= 32 && $totalScore <= 40) {
                                                        $score = 4;
                                                    }

                                                    echo "score : $score <br>";

                                                    $totalScore2 = $section9score + $section10score + $section11score;

                                                    if ($totalScore2 <= 5) {
                                                        $score2 = 2;
                                                    } elseif ($totalScore2 > 5) {
                                                        $score2 = 1;
                                                    }

                                                    $totalScore3 = $section12score + $section13score + $section14score;

                                                    $scoreall = $totalScoreFromDatabase + $score + $score2 + $totalScore3 + $section15score + $section16score + $section17score;

                                                    $score_form1 = $score_form1;
                                                    $score_form2 = $score_form2;
                                                    $score_form3 = $score + $score2 + $totalScore3 + $section15score + $section16score + $section17score;

                                                    $foodScore = $score;
                                                    $exerciseScore = $score2;
                                                    $cigaretteScore = $section12score;
                                                    $alcoholScore = $section15score;

                                                    $insertQuery = "INSERT INTO form_3 (province_name, district_name, subdistrict_name, fullname, tel, address, alcoholScore, cigaretteScore, exerciseScore, foodScore, bmiScore, pressureupScore, waistlineScore, fatbloodScore, bloodlevelScore, pregnantScore, score_form1, score_form2, score_form3, scoreall, height, weight, bmi, pressureup, pressuredown, waistline, fat, fatblood, bloodlevel, pregnant, ovary, sex, age, status, study, section1, section2, section3, section4, section5, section6, section7, section8, section9, section10, section11, section12, section13, section14, section15, section16, section17) 
                                                    VALUES ( :province_name, :district_name, :subdistrict_name, :fullname, :tel, :address, :alcoholScore, :cigaretteScore, :exerciseScore, :foodScore, :bmiScore, :pressureupScore, :waistlineScore, :fatbloodScore, :bloodlevelScore, :pregnantScore, :score_form1, :score_form2, :score_form3, :scoreall, :height, :weight, :bmi, :pressureup, :pressuredown, :waistline, :fat, :fatblood, :bloodlevel, :pregnant, :ovary, :sex, :age, :status, :study, :section1, :section2, :section3, :section4, :section5, :section6, :section7, :section8, :section9, :section10, :section11, :section12, :section13, :section14, :section15, :section16, :section17)";
                                                    $stmt = $conn->prepare($insertQuery);
                                                    $stmt->bindParam(':score_form3', $score_form3);
                                                    $stmt->bindParam(':score_form2', $score_form2);
                                                    $stmt->bindParam(':score_form1', $score_form1);
                                                    $stmt->bindParam(':scoreall', $scoreall);
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
                                                    $stmt->bindParam(':study', $study);

                                                    $stmt->bindParam(':bmiScore', $bmiScore);
                                                    $stmt->bindParam(':pressureupScore', $pressureupScore);
                                                    $stmt->bindParam(':waistlineScore', $waistlineScore);
                                                    $stmt->bindParam(':fatbloodScore', $fatbloodScore);
                                                    $stmt->bindParam(':bloodlevelScore', $bloodlevelScore);
                                                    $stmt->bindParam(':pregnantScore', $pregnantScore);
                                                    $stmt->bindParam(':foodScore', $foodScore);
                                                    $stmt->bindParam(':exerciseScore', $exerciseScore);
                                                    $stmt->bindParam(':cigaretteScore', $cigaretteScore);
                                                    $stmt->bindParam(':alcoholScore', $alcoholScore);

                                                    $stmt->bindParam(':fullname', $fullname);
                                                    $stmt->bindParam(':tel', $tel);
                                                    $stmt->bindParam(':address', $address);
                                                    $stmt->bindParam(':province_name', $province_name);
                                                    $stmt->bindParam(':district_name', $district_name);
                                                    $stmt->bindParam(':subdistrict_name', $subdistrict_name);

                                                    $stmt->bindParam(':section1', $section1);
                                                    $stmt->bindParam(':section2', $section2);
                                                    $stmt->bindParam(':section3', $section3);
                                                    $stmt->bindParam(':section4', $section4);
                                                    $stmt->bindParam(':section5', $section5);
                                                    $stmt->bindParam(':section6', $section6);
                                                    $stmt->bindParam(':section7', $section7);
                                                    $stmt->bindParam(':section8', $section8);
                                                    $stmt->bindParam(':section9', $section9);
                                                    $stmt->bindParam(':section10', $section10);
                                                    $stmt->bindParam(':section11', $section11);
                                                    $stmt->bindParam(':section12', $section12);
                                                    $stmt->bindParam(':section13', $section13);
                                                    $stmt->bindParam(':section14', $section14);
                                                    $stmt->bindParam(':section15', $section15);
                                                    $stmt->bindParam(':section16', $section16);
                                                    $stmt->bindParam(':section17', $section17);
                                                    try {
                                                        $stmt->execute();
                                                        $form_3_id = $conn->lastInsertId();
                                                        echo '<script>window.location.href = "evaluation4.php?form_3_id=' . $form_3_id . '";</script>';
                                                    } catch (PDOException $e) {
                                                        echo "Error: " . $e->getMessage();
                                                    }
                                                }
                                                ?>
                                                <script>
                                                    function checkSelection() {
                                                        var selectedProvinces = document.querySelectorAll('input[type="radio"]:checked').length;
                                                        var selectedOptions = document.querySelectorAll('select, input[type="radio"]:checked').length;

                                                        if (selectedOptions >= 13 && selectedOptions <= 18) {
                                                            document.getElementById('nextButton').style.display = 'block';
                                                        } else {
                                                            document.getElementById('nextButton').style.display = 'none';
                                                        }
                                                    }
                                                    var formElements = document.querySelectorAll('#formevaluation3 select, #formevaluation3 input[type="radio"]');
                                                    formElements.forEach(function(element) {
                                                        element.addEventListener('change', checkSelection);
                                                    });
                                                </script>

                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        toggleSmokingSection();
                                                        toggleAlcoholSection();

                                                        var smokingStatusRadios = document.getElementsByName('section12');
                                                        for (var i = 0; i < smokingStatusRadios.length; i++) {
                                                            smokingStatusRadios[i].addEventListener('change', toggleSmokingSection);
                                                        }

                                                        var alcoholStatusRadios = document.getElementsByName('section15');
                                                        for (var i = 0; i < alcoholStatusRadios.length; i++) {
                                                            alcoholStatusRadios[i].addEventListener('change', toggleAlcoholSection);
                                                        }
                                                    });

                                                    function toggleSmokingSection() {
                                                        var smokingStatus = getSelectedRadioValue('section12');
                                                        var smokingStatusSection = document.getElementById('section12');
                                                        if (smokingStatusSection) {
                                                            smokingStatusSection.style.display = (smokingStatus === 'ไม่เคย') ? 'none' : 'block';
                                                        }
                                                    }

                                                    function toggleAlcoholSection() {
                                                        var alcoholStatus = getSelectedRadioValue('section15');
                                                        var alcoholStatusSection = document.getElementById('section15');
                                                        if (alcoholStatusSection) {
                                                            alcoholStatusSection.style.display = (alcoholStatus === 'ไม่เคยดื่ม') ? 'none' : 'block';
                                                        }
                                                    }

                                                    function getSelectedRadioValue(name) {
                                                        var radios = document.getElementsByName(name);
                                                        for (var i = 0; i < radios.length; i++) {
                                                            if (radios[i].checked) {
                                                                return radios[i].value;
                                                            }
                                                        }
                                                        return null;
                                                    }
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