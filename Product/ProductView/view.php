<?php
include '../../Include/DB.php';
session_start();

$username = $_GET['username'];
$identity = $_GET['identity'];
$id = $_GET['id'];
echo $id;



if (isset($_POST['submit'])) {
    $price = $_POST['bidAmount'];

    $sql = "Update product SET Price = '$price' WHERE Id = '$id' ";
    $result = mysqli_query($conn, $sql);


    $sql5 = "INSERT INTO winner (Id, username, bid)
        VALUES ('$id', '$username', '$price') ";
    $result5 = mysqli_query($conn, $sql5);

    if ($result) {
        echo "<script>alert('Updated.')</script>";
        header("Location: ../../bidder.php?username=$username&identity=$identity");
    } else {
        echo 'sorry!';
    }
}


?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Just Bid It!</title>

    <link rel="stylesheet" href="../../css/bidder.css">
    <link rel="stylesheet" href="./view.css">

    <!-- Custom css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


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
                <a class="navbar-brand fs-1 rounded" href="../../bidder.php?username=<?php echo $username ?>&identity=<?php echo $identity ?>">JustBidit</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-4">
                            <a class="nav-link active" aria-current="page" href="../../bidder.php?username=<?php echo $username ?>&identity=<?php echo $identity ?>">Home</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link" href="../../about.php?&username=<?php echo $username ?>&identity=<?php echo $identity ?>">About</a>
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
                    <form action="search.php?username=<?php echo $username; ?>&identity=<?php echo $identity; ?>" class="d-flex mt-2 " role="search" method="post">
                        <input class="form-control mb-2 mx-4 searchInput" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary mb-2 searchBtn " type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <?php
    $sql3 = "SELECT * FROM product WHERE Id='$id'";
    $result3 = mysqli_query($conn, $sql3);
    if (mysqli_num_rows($result3) > 0) {
        $row = $result3->fetch_assoc();
        $path = '/jbt/Images/Product/';
    }

    ?>

    >

    <section class="container">

        <div class="row">
            <div class="col-sm-8">
                <div class="productViewContainer mt-5">
                    <div class="infoContainer">
                        <div class="imgContainer">
                            <img src="<?php echo $path . $row['Image'] ?>" alt="APNA">
                        </div>
                        <div class="descriptionContainer">
                            <h2>Name: <?php echo $row['Name']; ?></h2>
                            <h4>Category: <?php echo $row['Category']; ?></h4>
                            <h5><img src="../../img/star.png" width="30px" alt=""> <?php echo $row['rating']; ?> </h5>
                            <h5>Ending: <?php echo $row['finishDt']; ?></h5>
                            <div class="desc">
                                <p><?php echo $row['Description']; ?></p>
                            </div>
                            <div class="d-flex">
                                <p>Current Bid: ৳ </p>
                                <p id="currentPrice"><?php echo $row['Price'] ?></p>
                            </div>
                            <button onclick="showForm();">Start Bidding <img src="../../Images/others/right-arrow.png" width="20px" alt="" srcset=""> </button>

                        </div>
                    </div>
                </div>
            </div>
                <div class="col-sm-4">
                    <div class="biddingFormContainer mt-5">
                        <div id="biddingForm">
                            <form action="" method="post">
                                <input id="updatedAmount" type="number" name="bidAmount" placeholder="Amount">
                                <button class="mt-5" id="bidButton" name="submit">Bid Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


        <script>
            const showForm = () => {
                const from = document.getElementById('biddingForm');
                from.style.display = 'block';
                document.getElementById("bidButton").disabled = true;
            }
            const amountCheck = (e) => {
                console.log("ok");

                const currentPrice = parseInt(document.getElementById('currentPrice').innerText);
                const updatedAmount = parseInt(e.target.value);
                console.log(currentPrice);
                console.log(updatedAmount);


                if (updatedAmount > currentPrice) {
                    document.getElementById('bidButton').disabled = false;
                } else {
                    document.getElementById('bidButton').disabled = true;
                }
            }
            const input = document.getElementById('updatedAmount');
            input.addEventListener('input', amountCheck);


            // }
        </script>

</body>













</html>