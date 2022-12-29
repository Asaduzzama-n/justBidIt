<?php
include 'Include/DB.php';
session_start();

$username = $_GET['username'];
$identity = $_GET['identity'];
$identity = $_GET['identity'];




?>


<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>JBT</title>
  <link rel="stylesheet" href="./css/search.css">
  <link rel="stylesheet" href="./css/bidder.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
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

</style>

<body>

  <header class="customContainer">
    <nav class="navbar navbar-expand-lg navStyle">
      <div class="container-fluid">
        <a class="navbar-brand fs-1 rounded" href="./bidder.php?id=<?php echo $id ?>&username=<?php echo $username ?>&identity=<?php echo $identity ?>">JustBidit</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item mx-4">
              <a class="nav-link active" aria-current="page" href="./bidder.php?id=<?php echo $id ?>&username=<?php echo $username ?>&identity=<?php echo $identity ?>">Home</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-link" href="./about.php?id=<?php echo $id ?>&username=<?php echo $username ?>&identity=<?php echo $identity ?>">About</a>
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

            <?php if ($identity == 'seller') { ?>
              <li class="nav-item mx-4"><a class="nav-link" href="Product/AddProduct.php?username=<?php echo $username; ?>&identity=<?php echo $identity; ?>">Add Product</a></li>
            <?php } ?>


          </ul>
          <!-- <form action="search.php?username=<?php echo $username; ?>&identity=<?php echo $identity; ?>" class="d-flex mt-2 " role="search">
            <input class="form-control mb-2 mx-4 searchInput" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary mb-2 searchBtn " type="submit">Search</button>
          </form> -->
        </div>
      </div>
    </nav>
  </header>

  <section class="customContainer productViewContainer">
  <?php
            $searchItem=$_POST['search'];
            $conn = new mysqli('localhost', 'root', '', 'auctionbits');
            $sql = "SELECT * FROM product where Name LIKE '%$searchItem%' OR Category LIKE '%$searchItem%'  ";
            $result = $conn->query($sql);
            ?> <div class="productViewContainer mt-5"><?php
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $path="/Images/Product/";
                ?>

            <div class="infoContainer mt-5">
                <div class="imgContainer">
                    <img src="<?php echo $pic.$row['Image']?>"  alt="img">
                </div>
                <div class="descriptionContainer">
                    <h2>Name: <?php echo $row['Name']; ?></h2>
                    <h4>Category: <?php echo $row['Category']; ?></h4>
                    <h5><img src="../../img/star.png" width="30px" alt=""> <?php echo $row['rating']; ?> </h5>
                    <!-- <h5>Ending: <?php echo $row['eventdt']; ?></h5> -->
                    <div class="desc">
                        <p><?php echo $row['Description']; ?></p>
                    </div>
                    <div class="d-flex">
                        <p>Current Bid: ৳ </p>
                        <p id="currentPrice"><?php echo $row['Price'] ?></p>
                    </div>

                    <?php 

                    $id = $row['Id'];

                    $time = $row['eventdt'];
                    $time_obj = strtotime($time);
                    
                    $now = new DateTime();
                    $now->format('Y-m-d H:i:s'); 
                    $now->getTimestamp();
                
                  if($now->getTimestamp() > $time_obj ){	
                    
                      $sql2 = "SELECT username as user, MAX(bid) as bid FROM winner WHERE Id=$id ";
                      $row44 = mysqli_query($conn, $sql2);
                      if ($row44->num_rows > 0) {
                        $row3 = mysqli_fetch_assoc($row44);
                      ?>
                        <div class="product-name">Winner : <?php echo $row3['user'] ?> </div>
                        <div class="product-name">Max Bid : <?php echo $row3['bid'] ?> ৳ </div>	

                      <?php } }

                      else{
                        ?>
                        <div class="product-name"><h5>Ending : <?php echo $row['eventdt'] ?></h5> </div>
                        
                        <div class="text-secondary text-uppercase"><Strong>Current Bid : <?php echo $row['Price'] ?>৳</Strong> </div>

                        <a href="./Product/ProductView/view.php?id=<?php echo $row['Id'] ?>&username=<?php echo $username; ?>&identity=<?php echo $identity; ?>"><button >Start Bidding  <img src="../../Images/others/right-arrow.png" width="20px" alt="" srcset=""> </a>
                        
                      <?php	}
                        ?>
  



                    <a href=""></button></a>

                </div>
            </div>
            
        </div>
        <?php
            } ?>  <?php
            } else {
            echo "0 results";
            }
            $conn->close();
        ?>

    </section>




    </body>
</html>