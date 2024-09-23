<?php include 'conn.php';

$sql_request = "SELECT * FROM `request` as re JOIN user as u ON u.user_id = re.user_id JOIN status as s ON s.status_name_id = re.status_name_id; ";
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
  <!-- <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">

  <!-- Bootstrap -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wdth,wght@62.5..100,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>รายการคำร้องขอ</title>
</head>
<style>
  body {
    font-family: 'Noto Sans Thai', sans-serif;
    background-color: lightgrey;
  }
</style>

<body>

  <?php include 'navbar.php'; ?>

  <section class="content d-flex justify-content-center" style="margin-top: 1cm;"" >

    <div class=" card">
    <div class="card-header">
      <h3 class="card-title">รายการคำร้องขอ</h3><br>
      <div class="d-inline">
        ค้นหา :
        <input type="text" id="table_search" name="table_search" class="form-control d-inline" style="width: auto; display: inline-block;" placeholder="Search">
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
        <thead>
          <tr>
            <th class="text-center">
              บัตรประชาชน
            </th>
            <th class="text-center">
              ชื่อผู้มาส่งคำร้องขอ
            </th>
            <th class="text-center">
              สถานะ
            </th>
            <th class="text-center">
              วันที่ส่งคำร้อง
            </th>
            <th class="text-center">
              แก้ไข/ลบ
            </th>
          </tr>
        </thead>
        <tbody id="user_table">
          <?php while ($row = $request->fetch_assoc()) { ?>
            <tr>
              <td>
                <?= $row['cid'] ?>
              </td>
              <td>
                <?= $row['name'] ?>
              </td>
              <td>
                <?php
                if ($row['status_name_id'] == '01') {
                  echo '<span class="badge badge-danger">' . $row['status_name'] . '</span>';
                } elseif ($row['status_name_id'] == '02') {
                  echo '<span class="badge badge-warning">' . $row['status_name'] . '</span>';
                } elseif ($row['status_name_id'] == '03') {
                  echo '<span class="badge badge-info">' . $row['status_name'] . '</span>';
                } elseif ($row['status_name_id'] == '04') {
                  echo '<span class="badge badge-primary">' . $row['status_name'] . '</span>';
                } elseif ($row['status_name_id'] == '05') {
                  echo '<span class="badge badge-success">' . $row['status_name'] . '</span>';
                }
                ?>
              </td>
              <td>
                <?= $row['date_request'] ?>
              </td>
              <td class="project-actions text-right">
                <a class="btn btn-info btn-sm edit-button" data-bs-toggle="modal" data-bs-target="#update_Modal"
                  data-request="<?= $row['request_id'] ?>"
                  data-status_name="<?= $row['status_name'] ?>"
                  data-status_id="<?= $row['status_name_id'] ?>"
                  data-cid="<?= $row['cid'] ?>"
                  data-name=" <?= $row['name'] ?>">
                  <i class="fas fa-pencil-alt">
                  </i>
                  Edit
                </a>
                <a class="btn btn-danger btn-sm" href="./delete.php?request_id=<?= $row['request_id'] ?>&cid=<?= $row['cid'] ?>" onclick="Del2(this.href);return false;">
                  <i class="fas fa-trash">
                  </i>
                  Delete
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    </div>

  </section>

  <!-- Modal update -->
  <div class="modal fade" id="update_Modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light">แก้ไขข้อมูล</h5>
        </div>
        <div class="modal-body">
          <!-- ฟอร์มใน Modal -->
          <form method="post" action="./update.php" enctype="multipart/form-data">
            <input type="hidden" name="request_id_edit" id="request_id_edit" class="form-control" required>
            <input type="text" name="cid_edit" id="cid_edit" class="form-control" readonly required><br>
            <input type="text" name="name_edit" id="name_edit" class="form-control" readonly required><br>

            <select class="form-select" name="status_name_edit" id="status_name_edit" required>
              <?php
              $sql_status = "SELECT * FROM `status`";
              $rs_sql_status = mysqli_query($conn, $sql_status);
              foreach ($rs_sql_status as $roe) { ?>
                <option value="<?= $roe['status_name_id'] ?>"><?= $roe['status_name'] ?></option>
              <?php } ?>
            </select>

            <div class="modal-footer">
              <button type="button" class="mt-2 btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="submit" name="edit1" id="edit1" class="mt-2 btn btn-warning">แก้ไข</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
  <!-- End Modal update-->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const moveButtons = document.querySelectorAll('.edit-button');
      moveButtons.forEach(function(button) {
        button.addEventListener('click', function() {
          const status_id = button.getAttribute('data-status_id'); // นำค่า status_id มาใช้
          const cid = button.getAttribute('data-cid');
          const name = button.getAttribute('data-name');
          const request_id = button.getAttribute('data-request');

          const request_idField = document.getElementById('request_id_edit');
          const cidField = document.getElementById('cid_edit');
          const nameField = document.getElementById('name_edit');
          const statusSelect = document.getElementById('status_name_edit');

          request_idField.value = request_id;
          cidField.value = cid;
          nameField.value = name;

          // กำหนดค่า selected สำหรับ select
          Array.from(statusSelect.options).forEach(option => {
            if (option.value === status_id) {
              option.selected = true;
            } else {
              option.selected = false;
            }
          });
        });
      });
    });

    function Del2(mypage) {
      Swal.fire({
        title: 'คุณต้องการลบข้อมูลหรือไม่',
        text: "คุณจะไม่สามารถกู้คืนข้อมูลนี้ได้!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่, ลบมัน!',
        cancelButtonText: 'ยกเลิก'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location = mypage;
        }
      });
    }

    $(document).ready(function() {
      $("#table_search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#user_table tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
</body>


</html>