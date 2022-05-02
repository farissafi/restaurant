<?php
include "admin/config.php";
$sql = "select * from food_menu";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css" integrity="sha512-csw0Ma4oXCAgd/d4nTcpoEoz4nYvvnk21a8VA2h2dzhPAvjbUIK6V3si7/g/HehwdunqqW18RwCJKpD7rL67Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.rtl.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
        <!-- star slider -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $key => $row) {
                ?>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $key ?>" class="<?php if ($key == 0) echo 'active' ?>" aria-current="true" aria-label="Slide <?php echo ++$key ?>"></button>

                <?php
                    }
                }
                ?>


            </div>
            <div class="carousel-inner">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $key => $row) {
                ?>
                        <div class="carousel-item <?php if ($key == 0) echo 'active' ?>">
                            <img height="630px" src="images/<?php echo $row['image'] ?>" class="d-block w-100" alt="<?php echo $row['name'] ?>">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>
                                    <?php echo $row['name'] ?>
                                </h5>
                                <p>
                                    <?php echo $row['details'] ?>
                                </p>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>



            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- end slider -->
        <!-- star card -->
        <div class="card my-5 text-center">
            <div class="card-header">
                <h5>قائمة الوجبات</h5>
            </div>
            <div class="card-body row">
                <?php
                include "admin/config.php";
                $sql = "select * from food_menu";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $key => $row) {
                        echo '
                    <div class="col-md-3">
                    <div class="card hvr-grow-shadow">
                        <img height="250px" src="images/' . $row['image'] . '" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">' . $row['name'] . '</h5>
                            <p class="card-text">' . $row['details'] . '</p>
                            <a href="send_request.php?id=' . $row['id'] . '" class="btn btn-primary">تفاصيل الوجبة</a>
                        </div>
                    </div>
                </div>
                    ';
                    }
                }
                ?>

            </div>
        </div>
        <!-- end card -->
        <!-- star footer -->
        <footer class="py-3 bg-secondary text-light text-center">
            <h6>جميع الحقوق محفوظة لمطعم المدينة</h6>
        </footer>
        <!-- end  footer -->
    </div>

    <script src="js/bootstrap.js"></script>
</body>

</html>