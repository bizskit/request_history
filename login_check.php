<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">

<?php
require('conn.php');
session_start(); // ย้าย session_start() ขึ้นมาที่บรรทัดแรก

// ตรวจสอบว่ามีการส่งข้อมูล cid มาจากฟอร์ม
if (isset($_POST['cid'])) {
    $cid = $_POST['cid'];

    // ใช้ prepared statements เพื่อป้องกัน SQL Injection
    $stmt = $conn->prepare("SELECT * FROM `user` WHERE cid = ? ");
    $stmt->bind_param("s", $cid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $role = $row['role']; // ดึงค่า role จากฐานข้อมูล
        $_SESSION['cid'] = $cid;
        $_SESSION['role'] = $role;

        // ตรวจสอบ role ว่าเป็น 1 หรือ 0
        if ($role == 1) {
            // role = 1 กรณีเป็นผู้ดูแลระบบหรือ role 1
            echo "
                <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'เข้าสู่ระบบสำเร็จ',
                        text: 'ยินดีต้อนรับผู้ดูแลระบบ',
                    }).then(function() {
                        window.location = 'table_user.php'; // ไปยังหน้าแอดมิน
                    });
                });
                </script>
                ";
        } else if ($role == 0) {
            // role = 0 กรณีผู้ใช้ทั่วไป
            echo "
                <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'ตรวจสอบสถานะ',
                        text: 'มีคำร้องขอของคุณอยู่ในระบบ',
                    }).then(function() {
                        window.location = 'user.php'; // ไปยังหน้าผู้ใช้ทั่วไป
                    });
                });
                </script>
                ";
        }

    } else {
        // กรณีไม่พบผู้ใช้หรือ cid ไม่ถูกต้อง
        echo "
        <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'ไม่พบคำร้อง',
                text: 'ไม่พบคำร้องหรือบัตรประชาชนไม่ถูกต้อง',
            }).then(function() {
                window.location = 'index.php';
            });
        });
        </script>
        ";
    }

    $stmt->close();
} else {
    // กรณีไม่ได้ส่งข้อมูล cid
    echo "
    <script>
    $(document).ready(function() {
        Swal.fire({
            icon: 'error',
            title: 'No Data',
            text: 'กรุณากรอกข้อมูลบัตรประชาชน',
        }).then(function() {
            window.location = 'index.php';
        });
    });
    </script>
    ";
    exit();
}
?>
