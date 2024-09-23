<!-- Sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">

<?php
include 'conn.php';

if (isset($_POST['edit1'])) {

  $request_id_edit = $_POST['request_id_edit'];
  $cid_edit = $_POST['cid_edit'];
  $name_edit = $_POST['name_edit'];
  $status_name_edit = $_POST['status_name_edit'];

  $sql_edit = "UPDATE `request` SET `status_name_id`='$status_name_edit' WHERE `request`.`request_id` = $request_id_edit";
  mysqli_query($conn, $sql_edit);

  echo "<script>
  $(document).ready(function() {
    Swal.fire({
      title: 'บันทึกเรียบร้อย',
      text: 'สถานะถูกเปลี่ยนแล้ว',
      icon: 'success',
      timer: 5000,
      didClose: () => {
        window.location.href = 'table_user.php';
      }
    });
  });
</script>";
}

if (isset($_POST['edit2'])) {

  $status_name_id_edit = $_POST['status_name_id_edit'];
  $status_name_edit = $_POST['status_name_edit'];

  $sql_edit = "UPDATE `status` SET `status_name`='$status_name_edit' WHERE `status_name_id`='$status_name_id_edit'";
  mysqli_query($conn, $sql_edit);

  echo "<script>
  $(document).ready(function() {
    Swal.fire({
      title: 'บันทึกเรียบร้อย',
      text: 'ข้อมูลสถานะถูกเปลี่ยนแล้ว',
      icon: 'success',
      timer: 5000,
      didClose: () => {
        window.location.href = 'edit.php';
      }
    });
  });
</script>";
}

?>