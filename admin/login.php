<?php session_start(); ?>
<?php
// login code 
$msg = "";
if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    if (empty($username)) {
        $msg = "<div class='alert alert-danger' role='alert'>
      الرجاء ادخال اسم المستخدم
     </div>";
    } elseif (empty($_POST['password'])) {
        $msg = "<div class='alert alert-danger' role='alert'>
    الرجاء ادخال كلمة المرور
   </div>";
    } else {
        include "config.php";
        $sql = "select * from users where username='$username' and password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            $msg = "<div class='alert alert-danger' role='alert'>
        خطأ في اسم المستخدم و كلمة المرور
       </div>";
        } else {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $user['id'];
            $_SESSION['user'] = $user['username'];
            header('Location:food_meals_mangment.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
    <div class="container w-25 text-center animate__animated animate__backInDown">
        <img src="../images/logo.png" alt="">
        <form method="POST" class="border p-4">
            <?php if (isset($msg)) {
                echo $msg;
            } ?>
            <div class="row mb-3">
                <label for="">اسم المستخدم</label>
                <input type="text" class="form-control text-center" id="username" name="username" placeholder="username">
            </div>
            <div class="row mb-3">
                <label for="inputPassword3">كلمة السر</label>
                <input type="password" class="form-control text-center" id="passowrd" name="password" placeholder="password">
            </div>
            <button type="submit" name="submit" class="btn btn-outline-dark">تسجيل الدخول</button>

    </div>
    </form>
    </div>
    <script src="../js/bootstrap.js"></script>
</body>

</html>