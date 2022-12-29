<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer</title>
    <link rel="stylesheet" href="../../css/footer.css">
    <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>
</head>
<style>
    .footerContainer{
    background-color: white;
    padding: 10px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    height: 300px;
    
}
.footerLogo{
    text-align: start;
    height: 150px;
    width: 200px;
    /* background-color:#455a642e; */
    padding: 10px;
    
}
.footerLogo h1{
    color: #F98012!important;
    font-weight: 800;
}
.about{
    text-align: start;
    height: 150px;
    width: 200px;
    /* background-color:#455a642e; */
    padding: 10px;
}
.follow{
    text-align: start;
    height: 150px;
    width: 200px;
    /* background-color:#455a642e; */
    padding: 10px;
}
.about ul{
    padding: 0%;
    margin: 0%;
    margin-top: 10px!important;
}
.follow ul{
    padding: 0%;
    margin: 0%;
    margin-top: 10px!important;
}
.about ul li{
    list-style: none;
    margin-top: 5px!important;
    
}
.follow ul li{
    list-style: none;
    margin-top: 10px!important;
    
    
}
.about a{
    text-decoration: none;
    font-size: large;
    margin: 0%;
    color: #455A64;
    font-weight: 500;
    
}
.about a:hover{
    color: #F98012;
}
.follow a{
    text-decoration: none;
    font-size: large;
    margin: 0%;
    color: #455A64;
    font-weight: 500;
    
}
.follow a:hover{
    color: #F98012;
}
</style> 
<body>
    <footer>
        <div class="footerContainer mt-5">
            <div class="footerLogo">
                <h1>JBT</h1>
                <p>Lorem ipsum, dolor sit amet consectetur <br> adipisicing elit. Voluptates, at?</p>
            </div>
            <div class="about">
                <h2>About Us</h2>
                <ul>
                    <li><a href="#">Ideas</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Support</a></li>
                </ul>
                
            </div>
            <div class="follow">
            <h2>Follow Us</h2>
                <ul>
                     <li><i class="fa-brands fa-facebook fa-xl"></i><a href="#">Facebook</a></li>
                    <li><i class="fa-brands fa-instagram fa-xl"></i><a href="#">Instagram</a></li>
                    <li><i class="fa-brands fa-twitter fa-xl"></i><a href="#">Twitter</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>