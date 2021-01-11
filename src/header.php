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
        color:white;
        margin-top:2px;
        margin-right:5px;
        cursor:pointer;
    }
    #menu a{color:white;}
    #floatleft{
        float:left;
    }
    #menulist{
        font-size:16px;
        margin-left:100px;
        background-color:red;
        width:50%;
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
        padding-left:60px;
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
        margin-top:80px;
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
        z-index: 3;

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

    }
    @media screen and (min-width:600px){
        #menubar{display:none;}
        // #menulist{display:none;}
    }
</style>
<script>
        function showMenu() {
        document.getElementById("dropdownContent").style.display="block";
        document.getElementById("body2").style.display="none";
        }
        function closeShowMenu(){
            document.getElementById("dropdownContent").style.display="none";
        }
        function clickShowMenu(){
            if(document.getElementById("menubar").style.display=="none"){
                document.getElementById("menubar").style.display="block";
            }
            else{
                document.getElementById("menubar").style.display="none";
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
        function hidesubmenu(){
            var z = document.getElementById("submenu");
            //z.style.display = "none";
            if (z.style.display === "block") {
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
        function loginform(){
            document.getElementById('id01').style.display = 'block';
        }
        function hideDropdown(){
            document.getElementById("dropdownContent").style.display="none";
        }
</script>

<div id='bigheader'>
    <div id='menu' onclick="clickShowMenu();">
        <i class='fa fa-bars' style='margin-left:15px;'></i>
    </div>
    <div id='floatleft'>
        <img src = 'src\images\snl.png' style=''>
    </div>
    <div id='menulist'>
        <ul>
            <li><a href='index.php' onmouseover="hideDropdown();"><i class='fa fa-home'></i></a></li>
            <li id='dropdown' >
                <div href="#" id='dropbtn' onclick="showMenu();
                    return false;" >
                    New Project <i class="fa fa-angle-double-down"></i>
                    <div id='dropdownContent' onclick="closeShowMenu(); return false;">
                        <a id="sambhu1" href="#" onclick="alert('No user logged on')">Sambhu Projects</a>
                        <a id="green1" href="#" onclick="alert('No user logged on')">Greenglobe Projects</a>
                        <a id="copia1" href="#" onclick="alert('No user logged on')">Copia Projects</a>
                        <a id="log" href="" onclick="loginform()">Login</a>
                    </div> 
                </div>
            </li>
            <li><a href="src/projects/reports.php" onmouseover="hideDropdown();">Project Reports</a></li>
        </ul>
    </div>
    <div id='floatright'>
        <!--  <a id ='login-link' href='login.php'>
              <i class='fa fa-search'>&nbsp;&nbsp;&nbsp;Login</i>
          </a> -->
        <button id="loginbtn" class="btn-info" onmouseover="hideDropdown();" onclick="loginform()">Login</button>
    </div>
    <div id="menubar">
        <div id="menucontent">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li style="color:white">New Project<a href="" onmouseover="showsubmenu();
                    return false;" onmouseout="hidesubmenu(); return false;" 
                    onclick="showsubmenu(); return false;">
                        <i class="fa fa-angle-double-down"></i></a>
                    <ul id="submenu">
                        <li>fffccxghsacgasc</li>
                        <li><a id="sambhu2" href="#" onclick="alert('No user logged on')">Sambhu Proects</a></li>
                        <li><a id="green2" href="#" onclick="alert('No user logged on')">Greenglobe Projects</a></li>
                        <li><a id="copia2" href="#" onclick="alert('No user logged on')">Copia Projects</a></li>
                    </ul>
                </li>
                <li><a href="src/projects/reports.php">Project Reports</a></li>
                <li><a href="" onmouseover="document.getElementById('id01').style.display = 'block'">Login</a></li>
            </ul>
        </div>
    </div>
</div>
