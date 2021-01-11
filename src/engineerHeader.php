<style>
    #bigheader{
        background-color:#483D8B; height: 55px;padding-top:5px;
        padding-left:5px;padding-right:20px;width:100%
    }
    #menu{
        position:fixed;
        top:0; right:0;
        display:none;
        font-size:20px;
        padding-right:10px;
    }
    #menu a{color:white;}
    #floatleft{
        float:left;
    }
    #menulist{
        font-size:16px;
        margin-left:50px;
        background-color:red;
        width:60%;
        float:left;
        display:block;
    }
    #menulist ul{
        list-style-type: none;
        margin:0;
        padding:0;
        display:inline-block;
    }
    #menulist li {
        float:left;
    }
    #menulist li a{
        display: block;
        color:white;
        //text-align:center;
        margin-top:10px;
        padding-left:40px;
        text-decoration: none;

    }
    #menulist li a:hover{color:#483D8B;}
    #floatright{
        float:right; 
        color:white;
        /*padding:5px;*/
    }
    #menubar{
        width:100%;
        height:200px;
        position:absolute;
        top:80px;
        background-color:rgba(0,0,0,0.3);
        display:none;
    }
    #floatright a{color:white;}
    #floatright a:hover{background-color: lightblue;}
    li #dropdown{display:inline-block}
    #dropdownContent{
        position:absolute;
        top:50px;
        width:fit-content;
        display:none;
        background-color:lightgreen;

    }
    #dropdownContent ul li{
        margin:0;
        padding:0;
        //text-align:left;
    }
    #menucontent{
        float:right;
        padding-right:20px;
        width:fit-content
    }
    #menucontent li{
        list-style-type: square;
        color:white;

    }
    #menucontent li a {color:white;}
    #submenu{display:none;}
    @media only screen and (max-width:600px){
        #bigheader{height:80px}
        #menu{display: block;}
        #menulist{display:none;}
        #floatleft{float:none;}
        #floatright{
            float: right;
            margin-top:10px;margin-left:0px;
        }
        #loginbtn{display:none;}
        #menubar{
            top:107px;
            width:100%;
            margin:0;
            padding:0;
        }
    }
    @media screen and (min-width:600px){
        #menubar{display:none;}
        // #menulist{display:none;}
    }
</style>
<script>
    window.onmouseover = function () {
        /*        var hideMe = document.getElementById('dropdownContent');
         document.onmouseover = function (e) {
         if (e.target.id !== 'dropdownContent') {
         hideMe.style.display = 'none';
         }
         };*/
    };
    function showMenu() {
        document.getElementById("dropdownContent").style.display = "block";
    }
    function closeShowMenu() {
        document.getElementById("dropdownContent").style.display = "none";
    }
    function clickShowMenu() {
        if (document.getElementById("dropdownContent").style.display == "block") {
            document.getElementById("dropdownContent").style.display == "none";
        }
    }
    function dropmenubar() {
        var y = document.getElementById("menubar");
        if (y.style.display === "none") {
            y.style.display = "block";
        }
        else {
            y.style.display = "none";
        }
        return false;
    }
    function showsubmenu() {
        var z = document.getElementById("submenu");
        //z.style.display = "none";
        if (z.style.display === "none") {
            z.style.display = "block";
        } else {
            z.style.display = "none";
        }
        return false;
    }
    function confirm_logged_status() {
        if (status == 0) {
            alert("No user logged on")
        }
        else if (status == 1) {
            alert("User Logged on");
        }
    }
    function loginform() {
        document.getElementById('id01').style.display = 'block';
    }
    function logout() {
            window.location.href = "index.php";
        }
    function hideDropdown() {
        document.getElementById("dropdownContent").style.display = "none";
    }
    /*function closeallmenu() {
     menu1 = document.getElementById("dropdownContent");
     menu2 = document.getElementById("menubar");
     menu3 = document.getElementById("submenu");
     menu1.style.display = "none";
     menu2.style.display = "none";
     menu3.style.display = "none";
     }*/
    
    function requestIOU(){
        document.getElementById("temp").style.display="none";
        document.getElementById("requestIOU").style.display="block";
        //document.getElementById("acceptIOU").style.display="none";
        document.getElementById("postVoucher").style.display="none";
        document.getElementById("viewBalance").style.display="none";
    }
    
   /* function acceptIOU(){
        document.getElementById("temp").style.display="none";
        document.getElementById("requestIOU").style.display="none";
        document.getElementById("acceptIOU").style.display="block";
        document.getElementById("postVoucher").style.display="none";
        document.getElementById("viewBalance").style.display="none";
    }*/
    
    function postVoucher(){
        document.getElementById("temp").style.display="none";
        document.getElementById("requestIOU").style.display="none";
      //  document.getElementById("acceptIOU").style.display="none";
        document.getElementById("postVoucher").style.display="block";
        document.getElementById("viewBalance").style.display="none";
    }
    
    function viewBalance(){
        document.getElementById("temp").style.display="none";
        document.getElementById("requestIOU").style.display="none";
      //  document.getElementById("acceptIOU").style.display="none";
        document.getElementById("postVoucher").style.display="none";
        document.getElementById("viewBalance").style.display="block";
    }
</script>

<div id='bigheader'>
    <div id='menu'>
        <a href='#' onmouseover="dropmenubar();"
           onclick="clickShowMenu();"><i class='fa fa-bars' style='margin-left:15px;'></i></a>
    </div>
    <div id='floatleft'>
        <img src = 'src\images\snl.png' style=''>
    </div>
    <div id='menulist'>
        <ul>
            <li><a href='#'><i class='fa fa-home'></i></a></li>
            <li><a id="request" href="#" onclick="requestIOU();">Request</a></li>
        <!--    <li><a id="accept" href="#" onclick="acceptIOU();">Accept</a></li> -->
            <li><a id="post" href="#" onclick="postVoucher();">Post</a></li>
            <li><a id="view" href="#" onclick="viewBalance();">View Statement</a></li>
           <!-- <li><a id="log" href="" onclick="logout()">Logout</a></li> -->
        </ul>
    </div>
    <div id='floatright'>
        <!--  <a id ='login-link' href='login.php'>
              <i class='fa fa-search'>&nbsp;&nbsp;&nbsp;Login</i>
          </a> -->
        <button id="loginbtn" class="btn-info" onmouseover="hideDropdown();" onclick="logout()">Logout</button>
    </div>
    <div id="menubar">
        <div id="menucontent">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#" onclick="requestIOU();">Request</a></li>
                <li><a href="#" onclick="postVoucher();">Post</a></li>
                <li><a href="#" onclick="viewBalance();">View Statements</a></li>
                <li><a href="#" onclick="logout();">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
