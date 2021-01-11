<?php
session_start();
//print_r($_POST);
if (isset($_POST["submitbtn"])) {
    $_SESSION['uname'] = $_POST["uname"];
    $_SESSION['psw'] = $_POST["psw"];
}
//echo $_SESSION["uname"];
if($_SESSION['uname']=="sambhu0001" || $_SESSION["uname"]=="sambhu0002"){
    include "dbengine.php";
    $sql = "select * from iourequest";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        $check = 0;
        while($row=$result->fetch_assoc()){
            if($row["ApprovedBy"]==""){
                $check=1;
                echo "<script>location.replace('src/projects/approveIOU.php')</script>";
            }
        }
        
    }
}
?>

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
        .aside1{
            float:left;
            width:20%;
            background-color:black;
            color:white;
            height:800px;
        }
        .aside2{
            float:left;
            width:80%;
            heigh:800px;
        }
        #profilepix{
            width:80%;
            border-color: white;
            border-radius: 50%;
            margin-top:50%;
            text-align: center;
        }
        #temp, temp2{height:400px;}

        @media only screen and (max-width:300px){
            .aside1{display:none;}
            .aside2{width:100%; float: none;}
        }
    </style>
    <script>

        function loadDashboard() {
            var profilename = "src/images/" + document.getElementById("profilepix").getAttribute("name") + ".jpg";
            //alert(profilename);
            document.getElementById("log").innerHTML = "Logout";
            document.getElementById("loginbtn").innerHTML = "Logout";
            document.getElementById("log").setAttribute("onclick", "logout()");
            document.getElementById("loginbtn").setAttribute("onclick", "logout()")
            document.getElementById("sambhu1").setAttribute("onclick", "loadSambhu()");
            document.getElementById("sambhu2").setAttribute("onclick", "loadSambhu()");
            document.getElementById("green1").setAttribute("onclick", "loadGreen()");
            document.getElementById("green2").setAttribute("onclick", "loadGreen()");
            document.getElementById("copia1").setAttribute("onclick", "loadCopia()");
            document.getElementById("copia2").setAttribute("onclick", "loadCopia()");
            document.getElementById("profilepix").setAttribute("src", profilename)
        }

        function logout() {
            window.location.href = "index.php";
        }
        function loadSambhu() {
            //window.location.href = "src/projects/sambhuprojects.php"
            //document.getElementById("aside2").innerHTML='<object type="text/html" data="src/projects/sambhuprojects.php" ></object>';
            document.getElementById("company").innerHTML = "SAMBHU NIGERIA LIMITED";
            document.getElementById("sambhuAside").style.display = "block";
        }
    </script>

</head>
<body onload="loadDashboard();"  onclick="document.getElementById('submenu').style.display = 'none';
        alert(Hello)">
    <?php
//print_r($_POST);
    include "dbengine.php";

    $sql = "select * from users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            if ($_SESSION['uname'] == $row["User_id"] and $_SESSION['psw'] == $row["Password"]) {
                $loggedinuser = $row["Name"];
                $loggedinrole = $row["Role"];
                $_SESSION["loggedinuser"] = $loggedinuser;
                $loggedinuserId = $row["User_id"];
            }
        }
    } else {
        $loggedinuser = "Invalid username or password";
        $_SESSION["loggedinuser"] = $loggedinuser;
    }
    $message = "Welcome " . $_SESSION["loggedinuser"];
//header("location:index.php");
//    if ($loggedinuser == "Allen Missier") {
    if ($loggedinrole == "Engineer") {
//        include "src/allenHeader.php";
        include "src/engineerHeader.php";
    } else {
        include "src/header.php";
    }
    echo "<div style='width:100%; background-color:green; color:white;"
    . "text-align:center;heght:50px; font-size: 20px; font-style:bolder;'>" . $message . "</div>";
//    if($loggedinuser!="Allen Missier"){
    if($loggedinrole!="Engineer"){
    ?>
    <div class="aside1" id="aside1">
        <div id="company"></div>
        <img src="" id="profilepix" name = "<?php echo $loggedinuserId ?>">
    </div>
    <?php 
    }
//        if($loggedinuser=="Allen Missier"){ 
    if($loggedinrole=="Engineer"){ ?>
    <div id="temp"></div>
    <div id="allenaside" style="background-color:blue;">
        <?php 
    // include "src/projects/allenProfile.php" 
        include "src/projects/engineerProfile.php" 
        
        ?>
    </div>
    <div><?php include "footer.php"; ?></div>        
   <?php     }else{
    ?>
    
    <div class="aside2" id="aside2">
        <div id="temp2"></div>
        <div id="sambhuAside" style="display:none;">
            <?php
            include "src/projects/sambhuprojects.php"
            ?>
        </div>
        <div id="greenAside" style="display:none;">
            <?php
            //include "src/projects/greenprojects.php"
            ?>
        </div>
        <div id="copiaAside" style="display:none;">
            <?php
            include "src/projects/copiaprojects.php"
            ?>
        </div>
    </div>
    <?php  }?>
</body>