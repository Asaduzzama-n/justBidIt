<?php
session_start();
include './include/DB.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="style9.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>more about AuctionBits</title>

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
                            <a class="nav-link" href="./about.php?username=<?php echo $_SESSION['Username'] ?>&identity=<?php echo $_SESSION['Identity'] ?>">About</a>
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

    
  <!-- ** About me ** -->
  
  <section class="introduction container my-5">
    <div class="starcontainer">
      <h2>About AuctionBits</h2>
      <i class="fa fa-star fa-2x"></i>
      <hr class="star"></hr>
    </div>
      <p>AuctionBits is an online based bidding system for bidding, selling, shipping and trading antique or precious product. Here users can post their product which they interested in selling.  </p>
  </section>
  
  <section class="location container my-5">
      <h1>What is Auction Bits?</h1>
      <p>AuctionBits is a online bidding selling platform</p>
  </section>
  
  <section class="questions container my-5">
      <h1 class="my-3">More About AuctionBits </h1>
        <h2>What is motivation of Auctionbits?</h2>
         <p>Going to different auction in different places at a time is impossible. It is costly and inefficient. In our county we can see that there is no online auction system. The people of our county are not familiar with online auction system. It is our high chance to introduce our system to our people. People of our county don’t need to go physically to the auction system. Our system will make an impact to the people of our county and they will eventually adapt out system.</p>
        <br><h2>What is the objective?</h2>
         <p>In this system sellers can create their post about their product and admin will accept the valid and authentic product. Bidders can bid the product and if they win the bid then they can ship the product. There is a proper messaging system between bidders and sellers. It will help them to communicate with each other. There is a blog section in our system where the bidders or sellers can post any product blog description. Rating, review and comment section is also present in our system</p>
         <br><h2>System study of AuctionBits</h2>
         <p>We gathered information from benchmark products and online resources to conduct the system study. We mainly focused on external sources of information as ours is a new company without an existing user base. From these sources we have fixed our feature list which is described in the Functional Requirements section.</p>
  </section>

  <div>
    <br><br><br>
  </div>
  








  
  <footer class="container">
    <?php './include/footer.php' ?>
  </footer>
  </body>
  
</html>