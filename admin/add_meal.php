<?php
session_start();
if (!isset($_SESSION['id'])) {

    header('Location:login.php');
}
?>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $details = $_POST['details'];
    $price = $_POST['price'];
    if (file_exists($_FILES['image']['tmp_name'])) {
        $old_img_name = $_FILES['image']['name'];
        $expload_name = explode(".", $old_img_name);
        $ext = end($expload_name);
        $imageName = "img" . time() . "." . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $imageName);
        $sql = "insert into food_menu (name,details,price,image) values ('$name','$details','$price','$imageName')";
        include "config.php";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $msg = '<div class="alert alert-success" role="alert">
                  تمت عملية الاضافة بنجاح
                </div>';
        } else {
            $msg = '<div class="alert alert-danger" role="alert">
                  لم تتم عملية الاضافة بنجاح
                </div>';
        }

        mysqli_close($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@650&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.rtl.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'Cairo', sans-serif;
    }
</style>

<body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">لوحة التحكم</a>
                <a href="logout.php" class="navbar-brand">تسجيل الخروج</a>
            </div>
        </nav>
        <div class="row">
            <div class="col-2">
                <div class="list-group">
                    <a href="food_meals_mangment.php" class="list-group-item list-group-item-action active">ادارة
                        الوجبات</a>
                    <a href="order_list_mangment.php" class="list-group-item list-group-item-action">ادارة الطلبات</a>
                </div>
            </div>
            <div class="col-10">
                <div class="d-flex justify-content-between">
                    <h4>اضافة وجبة</h4>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">اسم الوجبة</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">سعر الوجبة</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="price" name="price">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">تفاصيل الوجبة</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="details" name="details">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">صورة الوجبة</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">اضافة</button>
                    <a href="food_meals_mangment.php" class="btn btn-danger">الغاء</a>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.js"></script>
</body>

</html>