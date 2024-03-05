<?php
if (isset($_GET['id'])) {
    require_once 'support_cont/connect.php';
    $id = htmlspecialchars($_GET['id']);

    if (!is_numeric($id)) {
        echo "Invalid ID";
        exit;
    }

    try {
        $stmt = $conn->prepare('DELETE FROM users WHERE id=:id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $success_message = json_encode("ลบข้อมูลสำเร็จ");
            echo '
            <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
            <script>
                setTimeout(function() {
                    swal({
                        title: "Success",
                        text: ' . $success_message . ',
                        type: "success"
                    }, function() {
                        window.location = "register.php";
                    });
                }, 200);
            </script>';
        } else {
            $error_message = json_encode("เกิดข้อผิดพลาดในการลบข้อมูล");
            echo '<script>
                setTimeout(function() {
                    swal({
                        title: "Error",
                        text: ' . $error_message . ',
                        type: "error"
                    }, function() {
                        window.location = "register.php";
                    });
                }, 200);
            </script>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
