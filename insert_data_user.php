<!-- Sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">

<?php
include 'conn.php';
if (isset($_POST['save'])){

  $name = $_POST['name'];
  $cid = $_POST['cid'];

  $sql_insert_user = "INSERT INTO `user`(`user_id`, `cid`, `name`, `role`) VALUES ('','$cid','$name','0')";
  mysqli_query($conn, $sql_insert_user);

  $user_id = mysqli_insert_id($conn);

  $sql_insert_requst = "INSERT INTO `request` (`request_id`, `user_id`, `status_name_id`) VALUES (NULL, '$user_id', '01'); ";
  mysqli_query($conn, $sql_insert_requst);

  echo "<script>
  $(document).ready(function() {
    Swal.fire({
      title: 'บันทึกเรียบร้อย',
      text: 'ข้อมูลถูกบันทึกแล้ว',
      icon: 'success',
      timer: 5000,
      didClose: () => {
        window.location.href = 'insert_user.php';
      }
    });
  });
</script>";

}


?>
