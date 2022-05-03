<?php
session_start();
if (!isset($_SESSION['id'])) {

    header('Location:login.php');
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
    <div class="container">
        <nav class="navbar navbar-light bg-light animate__animated animate__fadeInDown">
            <div class="container-fluid">
                <a class="navbar-brand">لوحة التحكم</a>
                <a href="logout.php" class="navbar-brand">تسجيل الخروج</a>
            </div>
        </nav>
        <div class="row">
            <div class="col-2 animate__animated animate__fadeInRight">
                <div class="list-group">
                    <a href="food_meals_mangment.php" class="list-group-item list-group-item-action ">ادارة
                        الوجبات</a>
                    <a href="order_list_mangment.php" class="list-group-item list-group-item-action active">ادارة الطلبات</a>
                </div>
            </div>
            <div class="col-10 animate__animated animate__fadeInLeft">
                <div class="d-flex justify-content-between">
                    <h4>ادارة الطلبات</h4>
                </div>
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">اسم الزبون</th>
                            <th scope="col">رقم الزبون</th>
                            <th scope="col">عنوان الزبون</th>
                            <th scope="col">الوجبة</th>
                            <th scope="col">عدد الوجبات</th>
                            <th scope="col">المبلغ المطلوب</th>
                            <th scope="col">حالة الطلب</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "config.php";
                        $sql = "select order_list.*,food_menu.id as did , food_menu.name as dname ,food_menu.price from order_list join food_menu on order_list.food_meals_id = food_menu.id where `order_state` = '0'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $key => $row) {
                                echo '
                           <tr class="align-middle">
                             <th scope="row">' . ++$key . '</th>
                             <td>' . $row['name'] . '</td>
                             <td>' . $row['price'] . '</td>
                             <td>' . $row['address'] . '</td>
                             <td>' . $row['dname'] . '</td>
                             <td>' . $row['number_of_meal'] . '</td>
                             <td>' . $row['number_of_meal'] * $row['price'] . '</td>
                             <td><a href="order_sell.php?id=' . $row['id'] . '" class="btn btn-danger">تم</a></td>
                           </tr>
                           
                           ';
                            }
                        } else {
                            echo '<tr class="align-middle">
                            <td colspan="5" scope="row">لا يوجد بيانات يمكن عرضها...</td>
                        </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <footer>
            <div class="py-4 text-center bg-light animate__animated animate__fadeInUp">
                <h5>ادارة مطعم المدينة | اسطنبول</h5>
            </div>
        </footer>
    </div>
    <script src="../js/bootstrap.js"></script>
</body>

</html>