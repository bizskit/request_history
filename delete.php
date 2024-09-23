<!-- Sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">
<?php
include 'conn.php';

$request_id = $_GET['request_id'];
$cid = $_GET['cid'];

try {
  $sql = "DELETE FROM `request` WHERE `request_id` = $request_id";
  $query_result = mysqli_query($conn, $sql);

  $sql2 = "DELETE FROM `user` WHERE `cid` = $cid";
  $query_result2 = mysqli_query($conn, $sql2);

  if ($query_result === TRUE) {
    echo "<script>
    $(document).ready(function() {
      Swal.fire({
        title: 'ลบข้อมูลเรียบร้อย',
        text: 'รายชื่อมีการถูกลบออกแล้ว',
        icon: 'success',
        timer: 5000,
        didClose: () => {
          window.location.href = 'table_user.php';
        }
      });
    });
    </script>";
  }
} catch (mysqli_sql_exception $e) {
  $error = $e->getMessage();
  if (strpos($error, 'Cannot delete or update a parent row: a foreign key constraint fails') !== false) {
    echo "<script>
    $(document).ready(function() {
      Swal.fire({
        title: 'เกิดข้อผิดพลาด',
        text: 'ไม่สามารถลบข้อมูลได้ เนื่องจากข้อมูลนี้ถูกใช้งานอยู่',
        icon: 'error',
        timer: 5000,
        didClose: () => {
          window.location.href = 'table_user.php';
        }
      });
    });
    </script>";
  } else {
    echo "<script>
    $(document).ready(function() {
      Swal.fire({
        title: 'เกิดข้อผิดพลาด',
        text: 'เกิดข้อผิดพลาดที่ไม่ทราบสาเหตุ: $error',
        icon: 'error',
        timer: 5000,
        didClose: () => {
          window.location.href = 'table_user.php';
        }
      });
    });
    </script>";
  }
}
?>


