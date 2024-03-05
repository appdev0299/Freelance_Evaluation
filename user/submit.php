<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('user_cont/connect.php');

    $section18 = isset($_POST['section18']) ? $_POST['section18'] : '';
    $section19 = isset($_POST['section19']) ? $_POST['section19'] : '';
    $section20 = isset($_POST['section20']) ? $_POST['section20'] : '';
    $section21 = isset($_POST['section21']) ? $_POST['section21'] : '';

    $scoreMapping = array(
        'section18' => array(
            'ไม่มี' => 0,
            'มี เป็นญาติสายตรง ได้แก่ พ่อแม่ พี่น้อง หรือลูกของตัวเอง' => 2,
            'มี เครือญาติ ได้แก่ ปู่ ย่า ตา ยาย ลุง ป้า น้า อา' => 2,
        ),
        'section19' => array(
            'ลักษณะทางพันธุกรรมที่พบได้ทั่วไป (CC)' => 1,
            'ลักษณะทางพันธุกรรมที่มีความแปรผัน Heterozygous (TC)' => 2,
            'ลักษณะทางพันธุกรรมที่มีความแปรผันแบบ homozygous (TT)' => 3,
            'ไม่มีข้อมูล' => 0,
        ),
        'section20' => array(
            'ลักษณะทางพันธุกรรมที่พบได้ทั่วไป (CC)' => 1,
            'ลักษณะทางพันธุกรรมที่มีความแปรผัน Heterozygous (TC)' => 2,
            'ลักษณะทางพันธุกรรมที่มีความแปรผันแบบ homozygous (TT)' => 2,
            'ไม่มีข้อมูล' => 0,
        ),
        'section21' => array(
            'ลักษณะทางพันธุกรรมที่พบได้ทั่วไป (CC)' => 1,
            'ลักษณะทางพันธุกรรมที่มีความแปรผัน Heterozygous (TC)' => 2,
            'ลักษณะทางพันธุกรรมที่มีความแปรผันแบบ homozygous (TT)' => 2,
            'ไม่มีข้อมูล' => 0,
        ),
    );

    $section18score = isset($_POST['section18']) ? ($scoreMapping['section18'][$_POST['section18']] ?? 0) : 0;
    $section19score = isset($_POST['section19']) ? ($scoreMapping['section19'][$_POST['section19']] ?? 0) : 0;
    $section20score = isset($_POST['section20']) ? ($scoreMapping['section20'][$_POST['section20']] ?? 0) : 0;
    $section21score = isset($_POST['section21']) ? ($scoreMapping['section21'][$_POST['section21']] ?? 0) : 0;

    $totalScore = $section18score + $section19score + $section20score + $section21score;

    if ($totalScore >= 0 && $totalScore <= 3) {
        $score = 1;
    } elseif ($totalScore >= 4 && $totalScore <= 6) {
        $score = 2;
    } elseif ($totalScore >= 7) {
        $score = 3;
    }

    $score_form1 = $score_form1;
    $score_form2 = $score_form2;
    $score_form3 = $score_form3;
    $score_form4 = $score;

    $finishscore = $score + $scoreall;

    $finishscore = $score + $scoreall;
    if ($finishscore >= 19 && $finishscore <= 46) {
        $finishscore_TH = "เสี่ยงต่ำต่อการเป็นโรคเบาหวาน";
    } elseif ($finishscore >= 47 && $finishscore <= 57) {
        $finishscore_TH = "เสี่ยงสูงต่อการเป็นโรคเบาหวาน";
    }


    $insertQuery = "INSERT INTO form_4 (
                                                        province_name, district_name, subdistrict_name, fullname, tel, address, finishscore_TH, score_form1, score_form2, score_form3, score_form4, sex, age, status, study, height, weight, bmi, pressureup, pressuredown, waistline, fat, fatblood, bloodlevel, pregnant, ovary,
                                                        section1, section2, section3, section4, section5, section6, section7, section8, section9, section10, section11, section12, section13, section14,
                                                        section15, section16, section17, section18, section19, section20, section21, finishscore, 
                                                        bmiScore, pressureupScore, waistlineScore, fatbloodScore, bloodlevelScore, pregnantScore, foodScore, exerciseScore, cigaretteScore, alcoholScore
                                                    ) VALUES (
                                                        :province_name, :district_name, :subdistrict_name, :fullname, :tel, :address, :finishscore_TH, :score_form1, :score_form2, :score_form3, :score_form4, :sex, :age, :status, :study, :height, :weight, :bmi, :pressureup, :pressuredown, :waistline, :fat, :fatblood, :bloodlevel, :pregnant, :ovary,
                                                        :section1, :section2, :section3, :section4, :section5, :section6, :section7, :section8, :section9, :section10, :section11, :section12, :section13, :section14,
                                                        :section15, :section16, :section17, :section18, :section19, :section20, :section21, :finishscore,
                                                        :bmiScore, :pressureupScore, :waistlineScore, :fatbloodScore, :bloodlevelScore, :pregnantScore, :foodScore, :exerciseScore, :cigaretteScore, :alcoholScore
                                                    )";
    $stmt = $conn->prepare($insertQuery);

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

    $stmt->bindParam(':finishscore_TH', $finishscore_TH);
    $stmt->bindParam(':score_form4', $score_form4);
    $stmt->bindParam(':score_form3', $score_form3);
    $stmt->bindParam(':score_form2', $score_form2);
    $stmt->bindParam(':score_form1', $score_form1);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':study', $study);
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
    $stmt->bindParam(':section18', $section18);
    $stmt->bindParam(':section19', $section19);
    $stmt->bindParam(':section20', $section20);
    $stmt->bindParam(':section21', $section21);

    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':province_name', $province_name);
    $stmt->bindParam(':district_name', $district_name);
    $stmt->bindParam(':subdistrict_name', $subdistrict_name);
    $stmt->bindParam(':finishscore', $finishscore);
    try {
        $stmt->execute();
        $form_4_id = $conn->lastInsertId();
        echo '<script>window.location.href = "finaleve.php?form_4_id=' . $form_4_id . '";</script>';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
