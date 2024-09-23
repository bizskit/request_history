<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Sweetalert -->
  <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js "></script>
  <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css " rel="stylesheet">

  <!-- AdminLTE -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wdth,wght@62.5..100,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>เพิ่มรายการผู้มาขอประวัติ</title>
</head>
<style>
  body {
    font-family: 'Noto Sans Thai', sans-serif;
    background-color: lightgrey;
  }
</style>

<body>

  <?php include 'navbar.php'; ?>

  <div class="container d-flex justify-content-center" style="margin-top: 3cm;">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">เพิ่มรายการผู้มาขอประวัติ</h3>
          <div class="card-tools">
          </div>
        </div>
        <div class="card-body">

          <form method="post" action="./insert_data_user.php" enctype="multipart/form-data">
            <div class="form-group">
              <label for="inputName">ชื่อผู้มาขอประวัติ</label>
              <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
              <label for="inputClientCompany">เลขบัตรประชาชน</label>
              <input type="text" id="cid" name="cid" class="form-control">
            </div>
            <button type="submit" name="save" id="save" class="mt-2 btn btn-success">บันทึก</button>
            <button type="reset" class="mt-2 btn btn-warning">รีเซ็ต</button>
          </form>

        </div>
      </div>

    </div>

</body>

</html>