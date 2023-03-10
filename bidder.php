<?php
session_start();


$loggedIn = $_SESSION['Logged'];
$username = $_SESSION['Username'];
$identity = $_SESSION['Identity'];
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JBT</title>

    <link rel="stylesheet" href="./css/nav.css">
    <!-- bootstrap and fontawesome link -->
    <link rel="stylesheet" href="./css/bidder.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="./js/script.js"></script>
    <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>


</head>
<style>
    nav {
        height: 70px;
        width: 100%;
        background-color: #4649FF !important;
        padding: 10px !important;
    }

    nav a {
        color: black !important;
        font-size: large !important;
    }

    .searchBtn {
        color: black;
    }
</style>

<body>


    <header class="container">
        <nav class="navbar navbar-expand-lg navStyle">
            <div class="container-fluid">
                <a class="navbar-brand fs-1 rounded" href="./bidder.php?username=<?php echo $_SESSION['Username'] ?>&identity=<?php echo $_SESSION['Identity'] ?>">JustBidit</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-4">
                            <a class="nav-link active" aria-current="page" href="./bidder.php?username=<?php echo $_SESSION['Username'] ?>&identity=<?php echo $_SESSION['Identity'] ?>">Home</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link" href="./about.php">About</a>
                        </li>
                        <li class="nav-item dropdown mx-4">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Features
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                                <li><a class="dropdown-item" href="#">About</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Visit physical store</a></li>
                            </ul>
                        </li>


                    </ul>
                    <form action="search.php?username=<?php echo $username; ?>&identity=<?php echo $identity; ?>" class="d-flex mt-2 " role="search" method="post">
                        <input class="form-control mb-2 mx-4 searchInput" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary mb-2 searchBtn " type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>




    <section class="container mt-5">

        <div class="row">
            <div class="col">
                <h2>Live Now</h2>
            </div>
        </div>

        <div class="row my-5">

            <?php
            $conn = new mysqli('localhost', 'root', '', 'auctionbits');
            $sql = "SELECT * FROM product WHERE a_status = 1";
            $result = $conn->query($sql);
            ?>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $pic = "Images/Product/";
            ?>
                    <?php
                    $id = $row['Id'];
                    $time = $row['finishDt'];
                    $time_obj = strtotime($time);
                    $now = new DateTime();
                    $now->format('Y-m-d H:i:s');
                    // echo $now->getTimestamp();

                    // echo '   ' . $time_obj;
                    $now->getTimestamp();

                    if ($now->getTimestamp() > $time_obj) {


                        $id = $row['Id'];
                        $sql42 = "SELECT * FROM `winner` WHERE p_id = '$id' ORDER BY amount DESC LIMIT 1;";
                        $result42 = mysqli_query($conn, $sql42);

                        if ($result42->num_rows > 0) {
                            $row42 = mysqli_fetch_assoc($result42);
                            $userMail = $row42['bidder_mail'];
                            $sql45 = "UPDATE product SET winner = '$userMail' WHERE Id = '$id'";
                            $result45 = mysqli_query($conn, $sql45);
                        }

                        $sql50 = "UPDATE product SET a_status = 0 WHERE Id = '$id'";
                        $result50 = mysqli_query($conn, $sql50);

                    ?>

                    <?php  } else {
                    ?>
                        <div class="col-sm-4 mt-5">
                            <div class="row productImg">
                                <div class="col">
                                    <img src="<?php echo $pic . $row['Image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center my-2">
                                    <h4>Name : <?php echo $row['Name'] ?></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center my-2">
                                    <h5> <?php echo $row['Description'] ?></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center my-2">
                                    <Strong> <?php echo $row['Category'] ?></Strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center my-2">

                                    <?php
                                    $sql25 = "SELECT AVG(user_rating) as rating FROM review_table WHERE p_id = '$id';";
                                    $result25 = mysqli_query($conn, $sql25);
                                    if ($result25) {
                                        $row25 = $result25->fetch_assoc();
                                    ?>
                                        <Strong><img class="mx-2" src="./Images/star (1).png" width="25px" alt=""> <?php echo $row25["rating"]; ?></Strong>
                                    <? } else {

                                    ?>

                                    <?php }
                                    ?>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col text-center my-2">
                                    <strong>Started : <?php echo $row['startDt'] ?></strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center my-2">
                                    <strong>Ending : <?php echo $row['finishDt'] ?></strong>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col text-center my-2">
                                    <h5><Strong>Current Bid : <?php echo $row['Price'] ?>???</Strong></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center my-2">
                                    <a href="./Product/ProductView/view.php?id=<?php echo $row['Id'] ?>&username=<?php echo $username; ?>&identity=<?php echo $identity; ?>">
                                        <button class="bidButtons">BID NOW</button>
                                    </a>
                                </div>
                            </div>


                        <?php  }
                        ?>


                        </div>

                    <?php } ?>

                <?php } ?>

        </div>
        <hr>
    </section>

    <!-- finished auction part! -->


    <section class="container mt-5">
        <div class="row">
            <div class="col">
                <h2>Recently Auctioned</h2>
            </div>
        </div>

        <div class="row my-5">

            <?php
            $conn = new mysqli('localhost', 'root', '', 'auctionbits');
            $sql = "SELECT * FROM product WHERE a_status = 0";
            $result = $conn->query($sql);
            ?>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $pic = "Images/Product/";
            ?>

                    <div class="col-sm-4 mt-5">
                        <div class="row productImg">
                            <div class="col">
                                <img src="<?php echo $pic . $row['Image'] ?>" alt="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center my-2">
                                <h4>Name : <?php echo $row['Name'] ?></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center my-2">
                                <h5> <?php echo $row['Description'] ?></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center my-2">
                                <Strong> <?php echo $row['Category'] ?></Strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center my-2">
                            <?php
                                    $sql25 = "SELECT AVG(user_rating) as rating FROM review_table WHERE p_id = '$id';";
                                    $result25 = mysqli_query($conn, $sql25);
                                    if ($result25) {
                                        $row25 = $result25->fetch_assoc();
                                    ?>
                                        <Strong><img class="mx-2" src="./Images/star (1).png" width="25px" alt=""> <?php echo $row25["rating"]; ?></Strong>
                                    <? } else {

                                    ?>
                                    <?php }
                                    ?>
                                <!-- <Strong><?php echo $row["rating"]; ?></Strong> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center my-2">
                                <Strong>Ended: <?php echo $row["finishDt"]; ?></Strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center my-2">

                        <?php
                            $winner = $row['winner'];
                            $sql2 = "SELECT *  FROM bidder WHERE Email = '$winner'";
                            $result2 = mysqli_query($conn, $sql2);
                            if ($result2->num_rows > 0) {
                                $row2 = mysqli_fetch_assoc($result2);
                        ?>
                                <div class="row">
                                    <div class="col text-center my-2">
                                        <Strong>Winner : <?php echo $row2['Username'] ?> </Strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center my-2">

                                    
                                        <Strong>Sold at : <?php echo $row['Price'] ?> </Strong>
                                    </div>
                                </div>
                            <?php } ?>

                                <!-- <Strong>Winner: <?php echo $row["winner"]; ?></Strong> -->
                            </div>
                        </div>





                    </div>

                <?php } ?>

            <?php } ?>

        </div>
    </section>

    <?php include './include/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>