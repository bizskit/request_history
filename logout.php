<!-- Sweetalert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
<link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">

<?php
session_start();
session_destroy();
echo "<script>
$(document).ready(function() {
  Swal.fire({
    title: 'ออกระบบเรียบร้อย',
    text: 'ท่านได้ทำการออกจากระบบ',
    icon: 'success',
    timer: 5000,
    didClose: () => {
      window.location.href = 'index.php';
    }
  });
});
</script>";
?>