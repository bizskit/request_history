<?php include 'conn.php';
session_start();

if (isset($_SESSION['cid'])) {
  $cid = $_SESSION['cid'];
  $sql_request = "SELECT * FROM `request` as re 
                JOIN user as u ON u.user_id = re.user_id 
                JOIN status as s ON s.status_name_id = re.status_name_id
                WHERE cid = '$cid'";
  $request = mysqli_query($conn, $sql_request);

?>
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css"> -->

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wdth,wght@62.5..100,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>ตรวจสอบสถานะคำขอ</title>
  </head>
  <style>
    body {
      font-family: 'Noto Sans Thai', sans-serif;
    }
  </style>

  <body>
    <div class="container mr-5 ml-5 mb-5">

      <div class="alert bg-success text-center mt-2 border" style="color:aliceblue" role="alert">
        <p class="h1">ตรวจสอบสถานะคำขอประวัติการรักษา</p>
      </div>

      <?php
      while ($row = $request->fetch_assoc()) { ?>
        <div class="text-center">
          <?php
          if ($row['status_name_id'] == '01') {
            echo '<img src="2.png" width="400" height="100"><br><br>';
            echo '<h2 class="" style="margin-top: 20px;">' . $row['status_name'] . '</h2>';
          } elseif ($row['status_name_id'] == '02') {
            echo '<img src="3.png" width="400" height="100"><br><br>';
            echo '<h2 style="margin-top: 20px;">' . $row['status_name'] . '</h2>';
          } elseif ($row['status_name_id'] == '03') {
            echo '<img src="4.png" width="400" height="100"><br><br>';
            echo '<h2 style="margin-top: 20px;">' . $row['status_name'] . '</h2>';
          } elseif ($row['status_name_id'] == '04') {
            echo '<img src="5.png" width="400" height="100"><br><br>';
            echo '<h2 style="margin-top: 20px;">' . $row['status_name'] . '</h2>';
          } elseif ($row['status_name_id'] == '05') {
            echo '<img src="6.png" width="400" height="100"><br><br>';
            echo '<h2 style="margin-top: 20px;">' . $row['status_name'] . '</h2>';
          }
          ?>
        </div>
      <?php } ?>
    <?php } ?>
    </div>
  </body>

  </html>