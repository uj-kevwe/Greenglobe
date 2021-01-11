<?php
//$_SESSION["loggedinuser"]="";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

        <link rel="icon" type="image/ico" href="images/kemcarenanny-logo.jpg" />

        <!--Font Awsome  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,500" rel="stylesheet"/>

        <!--Bootstraps  -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <title>Sambhu And Greenglobe Projects</title>
        <style>
            body{
                background-image:url("src/images/payloader1.jpg");
                background-size: 1200px;
                font-family: Arial, Helvetica, sans-serif;
            }
            /* Full-width input fields */
            input[type=text], input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            /* Set a style for all buttons */
            button {
                background-color: #4CAF50;
                color: white;
                padding: 7px 10px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }

            button:hover {
                opacity: 0.8;
            }

            /* Extra styles for the cancel button */
            .cancelbtn {
                width: auto;
                padding: 10px 18px;
                background-color: #f44336;
            }

            /* Center the image and position the close button */
            .imgcontainer {
                text-align: center;
                margin: 24px 0 12px 0;
                position: relative;
            }

            img.avatar {
                width: 40%;
                border-radius: 50%;
            }

            .container {
                padding: 4px;
            }

            span.psw {
                float: right;
                padding-top: 16px;
            }

            /* The Modal (background) */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                left: 250px;
                top: 80px;
                width: 50%; /* Full width */
                height: 80%; /* Full height */
                overflow: hidden; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                padding-bottom: 2px;
                padding-top: 2px;
            }

            /* Modal Content/Box */
            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 80%; /* Could be more or less, depending on screen size */
            }

            /* The Close Button (x) */
            .close {
                position: absolute;
                right: 25px;
                top: 0;
                color: #000;
                font-size: 25px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: red;
                cursor: pointer;
            }

            /* Add Zoom Animation */
            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
            }

            @-webkit-keyframes animatezoom {
                from {-webkit-transform: scale(0)} 
                to {-webkit-transform: scale(1)}
            }

            @keyframes animatezoom {
                from {transform: scale(0)} 
                to {transform: scale(1)}
            }
            @media only screen and (max-width:700px){
                body{
                    background-size: 800px;
                    background-repeat: no-repeat;
                }
                .modal{
                    top:0;
                    width: 100%;
                    left: 5px;
                    height:auto;
                }
            }
            @media only screen and (max-width:300px){
                body{
                    background-size: 800px;
                    background-repeat: no-repeat;
                }
                span.psw {
                    display: block;
                    float: none;
                }
                .cancelbtn {
                    width: 100%;
                }
                .modal{
                    width: 100%;
                    left: 5px;
                    height:auto;
                }
                #uname{
                    width:100%
                }
                #pswd{
                    width:100%
                }
            }
        </style>
        <script>
            function closeallmenu() {
                menu1 = document.getElementById("dropdown_content");
                menu2 = document.getElementById("menubar");
                menu3 = document.getElementById("submenu");
                menu1.style.display = "none";
                menu2.style.display = "none";
                menu3.style.display = "none";
            }
        </script>
    </head>
    <body onclick="closeallmenu()">
        <?php
        include "src/header.php";
        //include "src/sidebar.php";
        //include "src/mainpage.php";
        ?>
      <!--  <button onclick="document.getElementById('id01').style.display = 'block'" style="width:auto;">Login</button>-->

        <div id="id01" class="modal">

            <form class="modal-content animate" action="dashboard.php" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display = 'none'" class="close" title="Close Modal">&times;</span>
                    <!--<img src="img_avatar2.png" alt="Avatar" class="avatar">-->
                    <i class="fa fa-user-circle-o" style="font-size:40px; color:green"></i>
                </div>

                <div class="container">
                    <label for="uname"><b>Username</b></label><br>
                    <input type="text" placeholder="Enter Username" name="uname" id="uname" required
                           style="width:40%"><br>

                    <label for="psw"><b>Password</b></label><br>
                    <input type="password" placeholder="Enter Password" name="psw" id="pswd"  required
                           style="width:40%"><br>

                    <button type="submit" style="width:100px;" name="submitbtn">Login</button><br>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>

                <div class="container" style="background-color:#f1f1f1; width:100%;">
                    <button type="button" onclick="document.getElementById('id01').style.display = 'none'" class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        </div>
      <footer>
      </footer>
        <script>
        // Get the modal
            var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
        
    </body>
</html>
