<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบตรวจสอบคำขอประวัติ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Prompt';
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: lightgrey;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 650px;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h2 class="text-center mt-3">ระบบติดตามคำขอประวัติ<br>รพ.ค่ายวีรวัฒน์โยธิน มณฑลทหารบกที่ 25</h2>
                <form action="login_check.php" method="post" class="mt-4">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="cid" name="cid" required placeholder="กรอกเลขบัตรประชาชน">&nbsp
                    </div>
                    <button type="submit" class="btn btn-success w-100">ตรวจสอบคำร้อง</button>&nbsp
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>