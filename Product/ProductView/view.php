<?php
include '../../Include/DB.php';
session_start();

$username = $_SESSION['Username'];
$identity = $_GET['identity'];
$id = $_GET['id'];
$mail = $_SESSION['Email'];
// echo $id;



if (isset($_POST['submit'])) {
    $amount = $_POST['bidAmount'];

    $sql = "Update product SET Price = '$amount',highestBidBy = '$username' WHERE Id = '$id' ";
    $result = mysqli_query($conn, $sql);


    $sql5 = "INSERT INTO winner (amount,bidder_mail, p_id)
        VALUES ('$amount', '$mail', '$id') ";
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
                    <!-- <form action="search.php?username=<?php echo $username; ?>&identity=<?php echo $identity; ?>" class="d-flex mt-2 " role="search" method="post">
                        <input class="form-control mb-2 mx-4 searchInput" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary mb-2 searchBtn " type="submit">Search</button>
                    </form> -->
                </div>
            </div>
        </nav>
    </header>

    
    <?php
    $sql3 = "SELECT * FROM product WHERE Id='$id'";
    $result3 = mysqli_query($conn, $sql3);
    if (mysqli_num_rows($result3) > 0) {
        $row = $result3->fetch_assoc();
        $path = '../../Images/Product/';
    }

    ?>

    >

    <section class="container">

        <div class="row">
            <div class="col-sm-8">
                <div class="row productViewContainer mt-5">
                    <!-- <div class=" infoContainer"> -->
                    <div class="col-sm-6 ">
                        <div class="imgContainer">
                            <img src="<?php echo $path . $row['Image'] ?>" alt="">
                        </div>
                    </div>

                    <div class=" col-sm-4 mx-4 descriptionContainer">
                        <h2>Name: <?php echo $row['Name']; ?></h2>
                        <h4>Category: <?php echo $row['Category']; ?></h4>
                        <h5><img class="mx-2" src="../../Images/star (1).png" width="25px" alt="">
                    
                        <?php
                            $sql25 = "SELECT AVG(user_rating) as rating FROM review_table WHERE p_id = '$id';";
                            $result25 = mysqli_query($conn, $sql25);
                            if ($result25) {
                                $row25 = $result25->fetch_assoc();
                            ?>
                                <Strong><?php echo $row25["rating"]; ?></Strong>
                            <? } else {

                            ?>

                            <?php }
                            ?>

                        </h5>
                        <!-- <h5>Ending: <?php echo $row['finishDt']; ?></h5> -->
                        <div class="desc">
                            <p><?php echo $row['Description']; ?></p>
                        </div>
                        <div class="d-flex">
                            <strong>Current Bid: ???  </strong>
                            <strong class="mx-2" id="currentPrice"> <?php echo $row['Price'] ?></strong>
                        </div>
                        <div class="d-flex">
                            <strong>Last bid by: <?php echo $row['highestBidBy'] ?> </strong>
                        </div>
                        <button onclick="showForm();">Start Bidding <img src="../../Images/others/right-arrow.png" width="20px" alt="" srcset=""> </button>
                    </div>
                </div>
                <!-- </div> -->
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

    <!-- Review and Feedback -->
    <section class="container">
        <div class="">
            <h1 class="mt-5 mb-5">Review & Rating </h1>
            <div class="card customDesign">
                <div class="card-header" id="pId">Product ID: <?php echo $row['Id']; ?></div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-sm-4 text-center">
                            <h1 class="text-warning mt-4 mb-4">
                                <b><span id="average_rating">0.0</span> / 5</b>
                            </h1>
                            <div class="mb-3">
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                            </div>
                            <h3><span id="total_review">0</span> Review</h3>
                        </div>
                        <div class="col-sm-4">
                            <p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                            </p>
                            <p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>
                            </p>
                            <p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>
                            </p>
                            <p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>
                            </p>
                            <p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>
                            </p>
                        </div>
                        <div class="col-sm-4 text-center">
                            <h3 class="mt-4 mb-3">Write Review Here</h3>
                            <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5" id="review_content"></div>
        </div>
    </section>

    <div id="review_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Submit Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center mt-2 mb-4">
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                    </h4>
                    <div class="form-group">
                        <!-- <input  type="number" name="pId" id="pId" class="form-control"value="<?php echo $row['Id'] ?>"  /> -->
                        <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
                    </div>
                    <div class="form-group">
                        <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                    </div>
                    <div class="form-group text-center mt-4">
                        <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="container">
        <?php include './include/footer.php' ?>
    </footer>


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






        var rating_data = 0;

        $('#add_review').click(function() {

            $('#review_modal').modal('show');

        });

        $(document).on('mouseenter', '.submit_star', function() {

            var rating = $(this).data('rating');

            reset_background();

            for (var count = 1; count <= rating; count++) {

                $('#submit_star_' + count).addClass('text-warning');

            }

        });

        function reset_background() {
            for (var count = 1; count <= 5; count++) {

                $('#submit_star_' + count).addClass('star-light');

                $('#submit_star_' + count).removeClass('text-warning');

            }
        }

        $(document).on('mouseleave', '.submit_star', function() {

            reset_background();

            for (var count = 1; count <= rating_data; count++) {

                $('#submit_star_' + count).removeClass('star-light');

                $('#submit_star_' + count).addClass('text-warning');
            }

        });

        $(document).on('click', '.submit_star', function() {

            rating_data = $(this).data('rating');

        });

        $('#save_review').click(function() {

            const pId = document.getElementById('pId');
            const pIdString = pId.innerHTML;
            const pIdVal = pIdString.split(' ');

            var p_id = pIdVal[2];
            // console.log('EE', p_id);

            var user_name = $('#user_name').val();

            var user_review = $('#user_review').val();

            if (user_name == '' || user_review == '') {
                alert("Please Fill Both Field");
                return false;
            } else {
                $.ajax({
                    url: "submitReview.php",
                    method: "POST",
                    data: {
                        rating_data: rating_data,
                        user_name: user_name,
                        user_review: user_review,
                        p_id: p_id
                    },
                    success: function(data) {
                        $('#review_modal').modal('hide');

                        load_rating_data();

                        alert(data);
                    }
                })
            }

        });

        // $('#save_review').click(function(){

        // var user_name = $('#user_name').val();

        // var user_review = $('#user_review').val();

        // if(user_name == '' || user_review == '')
        // {
        //     alert("Please Fill Both Field");
        //     return false;
        // }
        // else
        // {
        //     $.ajax({
        //         url:"submit_rating.php",
        //         method:"POST",
        //         data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
        //         success:function(data)
        //         {
        //             $('#review_modal').modal('hide');

        //             load_rating_data();

        //             alert(data);
        //         }
        //     })
        // }

        // });



        load_rating_data();

        function load_rating_data() {
            const pId = document.getElementById('pId');
            const pIdString = pId.innerHTML;
            const pIdVal = pIdString.split(' ');

            var p_id = pIdVal[2];
            console.log('EE', p_id);

            $.ajax({
                url: "submitReview.php",
                method: "POST",
                data: {
                    action: 'load_data',
                    p_id: p_id
                },
                dataType: "JSON",
                success: function(data) {
                    $('#average_rating').text(data.average_rating);
                    $('#total_review').text(data.total_review);

                    var count_star = 0;

                    $('.main_star').each(function() {
                        count_star++;
                        if (Math.ceil(data.average_rating) >= count_star) {
                            $(this).addClass('text-warning');
                            $(this).addClass('star-light');
                        }
                    });

                    $('#total_five_star_review').text(data.five_star_review);

                    $('#total_four_star_review').text(data.four_star_review);

                    $('#total_three_star_review').text(data.three_star_review);

                    $('#total_two_star_review').text(data.two_star_review);

                    $('#total_one_star_review').text(data.one_star_review);

                    $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

                    $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

                    $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

                    $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

                    $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

                    if (data.review_data.length > 0) {
                        var html = '';

                        for (var count = 0; count < data.review_data.length; count++) {
                            html += '<div class="row mb-3">';

                            html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].user_name.charAt(0) + '</h3></div></div>';

                            html += '<div class="col-sm-11">';

                            html += '<div class="card">';

                            html += '<div class="card-header"><b>' + data.review_data[count].user_name + '</b></div>';

                            html += '<div class="card-body">';

                            for (var star = 1; star <= 5; star++) {
                                var class_name = '';

                                if (data.review_data[count].rating >= star) {
                                    class_name = 'text-warning';
                                } else {
                                    class_name = 'star-light';
                                }

                                html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                            }

                            html += '<br />';

                            html += data.review_data[count].user_review;

                            html += '</div>';

                            html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';

                            html += '</div>';

                            html += '</div>';

                            html += '</div>';
                        }

                        $('#review_content').html(html);
                    }
                }
            })
        }
    </script>

</body>













</html>