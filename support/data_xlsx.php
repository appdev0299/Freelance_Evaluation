<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $selected_sex = isset($_GET['sex']) ? $_GET['sex'] : null;
    $selected_age = isset($_GET['age']) ? $_GET['age'] : null;
    $selected_score_form1 = isset($_GET['score_form1']) ? $_GET['score_form1'] : null;
    $selected_score_form2 = isset($_GET['score_form2']) ? $_GET['score_form2'] : null;
    $selected_score_form3 = isset($_GET['score_form3']) ? $_GET['score_form3'] : null;
    $selected_score_form4 = isset($_GET['score_form4']) ? $_GET['score_form4'] : null;
    $selected_finishscore_TH = isset($_GET['finishscore_TH']) ? $_GET['finishscore_TH'] : null;
    $showall = isset($_GET['showall']) ? $_GET['showall'] : 'form_4';

    $sql = "SELECT form_4_id, fullname, sex, age, status, subdistrict_name, district_name, province_name, study, height, weight, bmi, pressureup, pressuredown, waistline, fat, fatblood, bloodlevel, pregnant, ovary, section1, section2, section3, section4, section5, section6, section7, section8, section9, section10, section11, section12, section13, section14, section15, section16, section17, section18, section19, section20, section21, score_form1, score_form2, score_form3, score_form4, finishscore, finishscore_TH, dateCreate FROM form_4";

    $sql .= " WHERE 1=1";

    if (!empty($selected_sex)) {
        $sql .= " AND sex = :sex ";
    }

    if (!empty($selected_age)) {
        $sql .= " AND age = :age ";
    }

    if (!empty($selected_score_form1)) {
        $sql .= " AND score_form1 = :score_form1 ";
    }
    if (!empty($selected_score_form2)) {
        $sql .= " AND score_form2 = :score_form2 ";
    }
    if (!empty($selected_score_form3)) {
        $sql .= " AND score_form3 = :score_form3 ";
    }
    if (!empty($selected_score_form3)) {
        $sql .= " AND score_form3 = :score_form3 ";
    }
    if (!empty($selected_finishscore_TH)) {
        $sql .= " AND finishscore_TH = :finishscore_TH ";
    }

    $sql .= " ORDER BY finishscore_TH ASC";

    require_once 'support_cont/connection.php';

    $stmt = $conn->prepare($sql);

    if (!empty($selected_sex)) {
        $stmt->bindParam(':sex', $selected_sex);
    }

    if (!empty($selected_age)) {
        $stmt->bindParam(':age', $selected_age);
    }

    if (!empty($selected_score_form1)) {
        $stmt->bindParam(':score_form1', $selected_score_form1);
    }
    if (!empty($selected_score_form2)) {
        $stmt->bindParam(':score_form2', $selected_score_form2);
    }
    if (!empty($selected_score_form3)) {
        $stmt->bindParam(':score_form3', $selected_score_form3);
    }
    if (!empty($selected_score_form4)) {
        $stmt->bindParam(':score_form4', $selected_score_form4);
    }
    if (!empty($selected_finishscore_TH)) {
        $stmt->bindParam(':finishscore_TH', $selected_finishscore_TH);
    }

    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($results)) {
        $sql = "SELECT form_4_id, fullname, sex, age, status, subdistrict_name, district_name, province_name, study, height, weight, bmi, pressureup, pressuredown, waistline, fat, fatblood, bloodlevel, pregnant, ovary, section1, section2, section3, section4, section5, section6, section7, section8, section9, section10, section11, section12, section13, section14, section15, section16, section17, section18, section19, section20, section21, score_form1, score_form2, score_form3, score_form4, finishscore, finishscore_TH, dateCreate FROM form_4";

        $sql .= " ORDER BY form_4_id DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    if (!empty($results)) {
        require_once '../vendor/autoload.php';

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $columns = ['ชื่อ-สกุล', 'เพศ', 'อายุ', 'สถานภาพ', 'ภูมิลำเนา', 'ระดับการศึกษา', 'ส่วนสูง', 'น้ำหนัก', 'ดัชนีมวลกาย (BMI)', 'ระดับความดันโลหิตตัวบน', 'ระดับความดันโลหิตตัวล่าง', 'รอบเอว ชาย/หญิง', 'ระดับไขมัน HDL ในเลือด (mg/dL)', 'ระดับไขมันไตรกลีเซอไรด์ในเลือด (mg/dL)', 'ระดับน้ำตาลในเลือดหลังอดอาหาร 6-8 ชั่วโมง', 'มีประวัติเป็นเบาหวานขณะตั้งครรภ์', 'มีประวัติเป็นโรคความดันโลหิตสูง', 'ท่านรับประทานอาหารครบ 3 มื้อ', 'ท่านชอบเติมเครื่องปรุงรสชาติอาหารให้มีรสหวานเสมอ เช่น น้ำตาล ผงชูรส ก้อนปรุงรส ซอส', 'ท่านรับประทานอาหารว่างระหว่างมื้อนอกเหนือจากอาหารมื้อหลัก 3 มื้อต่อวัน', 'ท่านรับประทานขัดสี ข้าวเหนียว ขนมปังสีขาว', 'ท่านรับประทานเส้นก๋วยเตี๋ยว ได้แก่ เส้นเล็ก เส้นใหญ่ บะหมี่เส้นเหลือง', 'ท่านรับประทานผลไม้อย่างไม่จำกัดปริมาณ', 'ท่านรับประทานอาหารมัน อาหารทอด แกงกะ', 'ท่านดื่มเครื่องดื่มประเภท น้ำหวาน น้ำชา กาแฟ น้ำอัดลม ที่รสชาติหวาน', '	ท่านออกกำลังกายประเภทแอโรบิก เช่น การวิ่งเหยาะ ๆ ว่ายน้ำ แบดมินตัน ฟุตบอล เต้นแอโรบิก', 'ระยะเวลาในแต่และครั้งที่ออกกำลังกาย', 'ความถี่ของการออกกำลังกาย', 'ท่านสูบบุหรี่หรือไม่', 'ปริมาณการสูบบุหรี่', 'บุคคลใกล้ชิดของท่านเคยสูบบุหรี่หรือไม่', 'ท่านดื่มเครื่องดื่มแอลกอฮอล์หรือไม่', 'ชนิดของเครื่องดื่มแอลกอฮอล์ที่ดื่มเป็นประจำ', 'ปริมาณการดื่มต่อครั้ง', 'ยีน CDKN2A/2B (rs10811661)', 'ยีน TCF7L2 (rs7903146)', 'ยีน KCNQ1 (rs2237892)', 'คะแนนส่วน 1', 'คะแนนส่วน 2', 'คะแนนส่วน 3', 'คะแนนส่วน 4', 'คะแนนรวม', 'ความเสี่ยง'];
        $col = 'A';

        foreach ($columns as $column) {
            $sheet->setCellValue($col . '1', $column);
            $col++;
        }
        $row = 2;
        $totalAmount = 0;

        foreach ($results as $result) {
            $col = 'A';
            $sheet->setCellValue($col . $row, $result['fullname']);
            $col++;
            $sheet->setCellValue($col . $row, $result['sex']);
            $col++;
            $sheet->setCellValue($col . $row, $result['age']);
            $col++;
            $sheet->setCellValue($col . $row, $result['status']);
            $col++;
            $sheet->setCellValue($col . $row, $result['subdistrict_name'] . ', ' . $result['district_name'] . ', ' . $result['province_name']);
            $col++;
            $sheet->setCellValue($col . $row, $result['study']);
            $col++;
            $sheet->setCellValue($col . $row, $result['height']);
            $col++;
            $sheet->setCellValue($col . $row, $result['weight']);
            $col++;
            $sheet->setCellValue($col . $row, $result['bmi']);
            $col++;
            $sheet->setCellValue($col . $row, $result['pressureup']);
            $col++;
            $sheet->setCellValue($col . $row, $result['pressuredown']);
            $col++;
            $sheet->setCellValue($col . $row, $result['waistline']);
            $col++;
            $sheet->setCellValue($col . $row, $result['fat']);
            $col++;
            $sheet->setCellValue($col . $row, $result['fatblood']);
            $col++;
            $sheet->setCellValue($col . $row, $result['bloodlevel']);
            $col++;
            $sheet->setCellValue($col . $row, $result['pregnant']);
            $col++;
            $sheet->setCellValue($col . $row, $result['ovary']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section1']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section2']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section3']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section4']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section5']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section6']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section7']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section8']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section9']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section10']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section11']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section12']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section13']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section14']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section15']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section16']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section17']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section18']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section19']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section20']);
            $col++;
            $sheet->setCellValue($col . $row, $result['section21']);
            $col++;
            $sheet->setCellValue($col . $row, $result['score_form1']);
            $col++;
            $sheet->setCellValue($col . $row, $result['score_form2']);
            $col++;
            $sheet->setCellValue($col . $row, $result['score_form3']);
            $col++;
            $sheet->setCellValue($col . $row, $result['score_form4']);
            $col++;
            $sheet->setCellValue($col . $row, $result['finishscore']);
            $col++;
            $sheet->setCellValue($col . $row, $result['finishscore_TH']);
            $col++;
            $sheet->setCellValue($col . $row, $result['dateCreate']);
            $row++;
        }

        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $sheet->setAutoFilter('A1:' . $highestColumn . $highestRow);

        $filename = 'DataReport_' . date('Y-m-d') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    } else {
        echo "No data found.";
    }
}
