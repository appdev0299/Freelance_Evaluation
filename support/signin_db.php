<?php

session_start();
require_once 'support_cont/connect.php';

if (isset($_POST['signin'])) {
    $password = $_POST['password'];

    if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        header("location: index.php");
    } else if (strlen($_POST['password']) !== 13) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาว 13 ตัวอักษร';
        header("location: index.php");
    } else {
        try {
            $check_data = $conn->prepare("SELECT * FROM users WHERE password = :password");
            $check_data->bindParam(":password", $password);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);

            if ($check_data->rowCount() > 0) {
                if ($row['urole'] == 'admin') {
                    $_SESSION['admin_login'] = $row['id'];
                    header("location: dashboard.php");
                } else {
                    $_SESSION['user_login'] = $row['id'];
                    header("location: dashboard.php");
                }
            } else {
                $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";
                header("location: index.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
