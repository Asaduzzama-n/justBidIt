<?php
session_start();
include '../../include/DB.php';

$loggedIn = $_SESSION['Logged'];
$username = $_SESSION['Username'];
$identity = $_SESSION['Identity'];
$sellerMail = $_SESSION['Email'];

echo $loggedIn, $username, $identity, $sellerMail;

if (isset($_POST['submit'])) {

    // $id = $_POST['productId'];
    $name = $_POST['pName'];
    $category = $_POST['radio'];
    $price = $_POST['pPrice'];
    $description = $_POST['description'];
    $startDt = $_POST['auctionStart'];
    $finishDt = $_POST['auctionFinish'];

    echo 'OUT';


    $photo_name = $_FILES["image"]["name"];
    $photo_tmp_name = $_FILES["image"]["tmp_name"];
    $photo_size = $_FILES["image"]["size"];
    $photo_new_name = rand() . $photo_name;
    echo $photo_name;
    if ($photo_size > 5242880) {
        echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
    } else {

        echo 'IN';


        $sql = "INSERT INTO product (Price, Name,seller_email, Category, Description, Image, startDt,finishDt)
                VALUES ('$price','$name','$sellerMail','$category','$description','$photo_new_name','$startDt','$finishDt')";
        $result = mysqli_query($conn, $sql);
        echo $result;
        if ($result) {
            move_uploaded_file($photo_tmp_name, "../../Images/Product/" . $photo_new_name);
            echo "<script>alert('Product Added Successfully.')</script>";
            header("Location: ./addProduct.php?username=$get_username&identity=$identity");


            $name = "";
            $price = "";
            $photo_tmp_name = "";
            $photo_new_name = "";
            $description = "";
            $category = "";
        } else {
            echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
    }
}



?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JBT</title>

    <link rel="stylesheet" href="./addProduct.css">
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
                            <a class="nav-link" href="./Product/addProduct/addProduct.php">Add Product</a>
                        </li>
                        <li class="nav-item dropdown mx-4">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Features
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Blog & Feedback</a></li>
                                <li><a class="dropdown-item" href="#">About</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Visit physical store</a></li>
                            </ul>
                        </li>


                    </ul>
                    <!-- <form action="search.php?username=<?php echo $username; ?>&identity=<?php echo $identity; ?>" class="d-flex mt-2 " role="search" method="post">
                        <input class="form-control mb-2 mx-4 searchInput" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary mb-2 searchBtn " type="submit">Search</button>
                    </form> -->
                </div>
            </div>
        </nav>
    </header>




    <section class="container mt-5 ">

        <div class="row customSize">
            <div class="row mb-5">
                <div class="col text-center">
                    <h1>ADD PRODUCT</h1>
                    <h4>Place your Product</h4>
                </div>
            </div>

            <hr>
            <div class="row mt-3">
                <div class="col">
                    <h3>Product Info</h3>
                </div>
            </div>

            <form action="" method="post" enctype="multipart/form-data" novalidate>

                <div class="row ">
                    <div class="col-sm-6">
                        <input class="my-3" type="text" id="pName" name="pName" placeholder="Product Name" required>
                    </div>
                    <div class="col-sm-6">
                        <input class="my-3" type="number" id="pPrice" name="pPrice" placeholder="৳">
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-6">
                        <textarea type="text" id="description" name="description" placeholder="Product Description" required></textarea>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-sm-6">
                        <label class="my-3" for="">Auction Start Date & Time</label>
                        <input type="datetime-local" name="auctionStart" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <label class="my-3" for="">Auction finish Date & Time</label>
                        <input type="datetime-local" name="auctionFinish" class="form-control">
                    </div>
                </div>
                <!-- <div class="row my-3">
                    <div class="col-sm-6">
                        <label class="my-3" for="">Auction finish Date & Time</label>
                        <input type="datetime-local" name="auctionFinish" class="form-control">
                    </div>
                </div> -->
                <br>
                <br>
                <hr>
                <div class="row my-3">
                    <div class="col-12">
                        <h4 class="mb-3">Category</h4>

                        <div class="form-check" style="margin: auto auto 2px auto;">
                            <input value="sports" id="sports" type="radio" name="radio" class="form-check-input" checked required>
                            <label for="sports">Sports</label>
                        </div>
                        <div class="form-check" style="margin: 2px auto;">
                            <input value="antique" id="antique" type="radio" name="radio" class="form-check-input" required>
                            <label for="antique">Antique</label>
                        </div>
                        <div class="form-check" style="margin: 2px auto;">
                            <input value="art" id="art" type="radio" name="radio" class="form-check-input" required>
                            <label for="art">Art</label>
                        </div>
                        <div class="form-check" style="margin: 2px auto;">
                            <input value="others" id="others" type="radio" name="radio" class="form-check-input" required>
                            <label for="others">Others</label>
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-12">
                        <p>Chose Image</p>
                        <input type="file" accept="image/*" placeholder="Image" name="image" required>
                    </div>
                </div>

                <div class="row my-5">
                    <div class="col-12 text-center">
                        <button name="submit" class="submitBtn">Add Product</button></a>
                    </div>
                </div>


            </form>

        </div>
    </section>

    <footer class="container">
        <?php include '../../include/footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>