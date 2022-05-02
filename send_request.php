<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <link rel="stylesheet" href="css/bootstrap.rtl.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@650&display=swap" rel="stylesheet">
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
    <div class="container-fluid">
        <!-- star nav -->
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary text-light">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#">مطعم المدينة</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="#">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">لماذا نحن</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled text-light">اتصل بنا</a>
                        </li>
                    </ul>
                    <a href="admin/login.php" class="btn btn-outline-light">تسجيل الدخول</a>
                </div>
            </div>
        </nav>
        <!-- end nav -->
        <?php
        if (isset($_GET['id'])) {
            include "admin/config.php";
            $sql = "select *from food_menu where id=" . $_GET['id'];
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
        }
        ?>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <img height="300px" src="images/<?php if (isset($row['image'])) {
                                                        echo $row['image'];
                                                    } ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php if (isset($row['name'])) {
                                                    echo $row['name'];
                                                } ?></h5>
                        <h5 class="card-title">سعر الوجبة:<?php if (isset($row['price'])) {
                                                                echo $row['price'];
                                                            } ?></h5>
                        <p class="card-text"><?php if (isset($row['details'])) {
                                                    echo $row['details'];
                                                } ?></p>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $number_of_meal = $_POST['number_of_meal'];
                $food_meals_id =  $_GET['id'];
                $sql = "insert into order_list (name,phone,address,number_of_meal,food_meals_id) values('$name','$phone','$address','$number_of_meal','$food_meals_id')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $msg = '<div style=" text-align: center;" class="alert alert-success" role="alert">
                     تمت العملية بنجاح ....سيتم ارسال طلبك في اسرع وقت ممكن
      </div>';
                } else {
                    echo '<div style=" text-align: center;" class="alert alert-danger" role="alert">
                        Failed to send successfully      
                         </div>';
                }
            }


            ?>
            <div class="col-6 pt-5">
                <form method="POST" class="text-center px-5">

                    <h4>يرجى تعبئة البيانات ليصل الطلب</h4>
                    <input type="text" name="name" class="form-control my-2 text-center" placeholder="الاسم رباعي">
                    <input type="number" name="phone" class="form-control my-2 text-center" placeholder="رقم الجوال">
                    <input type="text" name="address" class="form-control my-2 text-center" placeholder="العنوان">
                    <input type="number" name="number_of_meal" class="form-control my-2 text-center" placeholder="عدد الوجبات">
                    <button type="submit" name="submit" class="btn btn-primary my-2">ارسل</button>
                    <?php if (isset($msg)) {
                        echo $msg;
                    } ?>
                </form>
            </div>
        </div>
        <!-- star footer -->
        <footer class="py-3 bg-secondary text-light text-center">
            <h6>جميع الحقوق محفوظة لمطعم المدينة</h6>
        </footer>
        <!-- end  footer -->
    </div>

    <script src="js/bootstrap.js"></script>
</body>

</html>