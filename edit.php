<?php include 'conn.php';

$sql = "SELECT * FROM `status`";
$request = mysqli_query($conn, $sql);

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
      <h3 class="card-title">รายการสถานะ</h3><br>
      <!-- <div class="d-inline">
        ค้นหา :
        <input type="text" id="table_search" name="table_search" class="form-control d-inline" style="width: auto; display: inline-block;" placeholder="Search">
      </div> -->
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
        <thead>
          <tr>
            <th class="text-center">
              ลำดับ
            </th>
            <th class="text-center">
              รายชื่อสถานะ
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
                <?= $row['status_name_id'] ?>
              </td>
              <td>
                <?= $row['status_name'] ?>
              </td>
              <td class="project-actions text-right">
                <a class="btn btn-info btn-sm edit-button" data-bs-toggle="modal" data-bs-target="#update_Modal"
                  data-status_name="<?= $row['status_name'] ?>"
                  data-status_id="<?= $row['status_name_id'] ?>"
                  >
                  <i class="fas fa-pencil-alt">
                  </i>
                  Edit
                </a>
                <!-- <a class="btn btn-danger btn-sm" href="./delete.php?status_name_id=<?= $row['status_name_id'] ?>&status_name=<?= $row['status_name'] ?>" onclick="Del2(this.href);return false;">
                  <i class="fas fa-trash">
                  </i>
                  Delete
                </a> -->
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
          <h5 class="modal-title text-light ">แก้ไขข้อมูลสถานะ</h5>
        </div>
        <div class="modal-body">
          <!-- ฟอร์มใน Modal -->
          <form method="post" action="./update.php" enctype="multipart/form-data">
            <input type="hidden" name="status_name_id_edit" id="status_name_id_edit" class="form-control" required><br>
            <!-- <input type="text" name="cid_edit" id="cid_edit" class="form-control" readonly required><br>/ -->
            <input type="text" name="status_name_edit" id="status_name_edit" class="form-control" required>

            <div class="modal-footer">
              <button type="button" class="mt-2 btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="submit" name="edit2" id="edit2" class="mt-2 btn btn-warning">แก้ไข</button>
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
          const status_name = button.getAttribute('data-status_name');
          const status_name_id = button.getAttribute('data-status_id');

          const status_nameField = document.getElementById('status_name_edit');
          status_nameField.value = status_name;
          const status_name_idField = document.getElementById('status_name_id_edit');
          status_name_idField.value = status_name_id;


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