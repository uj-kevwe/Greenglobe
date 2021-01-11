<style>
    body{background-color:rgb(229, 249, 255);}
    #header{
        width:100%;
        // padding:10px;
        margin:0;
        background-color:rgba(0,255,0,0.9);
        height:80px;
        top:0; 
        position:absolute;
        z-index: 2;
    }
    #logo{
        margin-top:20px;
        margin-left:10px;
        float: left;
        width: 30%;
        background-color:red;
    }
    #menulist{
        margin-top:20px;
        float:left;
        width:60%;
    }
    #menu{
        float:right;
        margin-top:10px;
        margin-right:10px;
        font-size:20px;
        width:fit-content;
        background-color:black;
        padding:10px;
        cursor: pointer;
        display:none;
    }
    #submenu{
        display:none;
    }
    #logoimage{
        width:100%;
    }
    #bars{
        color:white;
    }
    #home {
        /*background-color:white;*/
        float:left;
        width:15%;
        cursor: pointer;
        padding:5px;
        font-weight: bolder;
        background-color:lightgreen; 
        width:fit-content;
        margin-left:50px; 
        margin-right:50px;
    }
    #past {
        /*background-color:yellow;*/
        float:left;
        width:40%;
        cursor: pointer;
        padding:5px;
        font-weight: bolder;
        background-color:lightgreen; 
        width:fit-content;
        margin-left:50px; 
        margin-right:50px;
    }
    #project {
        /*background-color:pink;*/
        float:left;
        width:30%;
        cursor: pointer;
        padding:5px;
        font-weight: bolder;
        background-color:lightgreen; 
        width:fit-content;
        margin-left:50px; 
        /*margin-right:50px;*/
    }
    #menubox{
        margin-top:80px;
        display:none;
        width:100%;
        padding-right:30px;

    }
    #projects{
        margin-top:80px;
        display:none;
        width:100%;
        padding-right:30px;
        background-color:white;
    }
    #menubox ul li {
        list-style-type: none;
    }
    #scrollimage{
        width:100%;
        background-image:url("src/images/construction3.jpeg");
        height: 600px; 
        /*top:200px;*/
        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }
    #content1{
        padding:20px;
        position:absolute;
        z-index: 3;
    }
    table td {
        height:50px;
    }
    ul{list-style-type: none;}
    #about1, #about2, #about3,#about4, #about5{height:900px;}

    @media only screen and (max-width:600px){
        #menu{
            margin-top:2px;
            padding:5px;
            display: block;
        }
        #content2, #content3 {
            width:100%; 
            float: none;
            background-color:rgb(229, 249, 255);
        }
        #menulist{display:none;}
        #projects{display:none;}
        #logo {width:50%;margin-left:10%;}
        #logo img {width:100%}
        table{font-size:12px;}
    }
    blockquote{font-size:12px;}

</style>
<script>
    function turnred() {
        document.getElementById("menu").style.backgroundColor = "red";
    }
    function turnblack() {
        document.getElementById("menu").style.backgroundColor = "black";
    }
    function displayMenu() {
        if (document.getElementById("menubox").style.display == "none") {
            document.getElementById("menubox").style.display = "block";
        }
        else {
            document.getElementById("menubox").style.display = "none";
        }
    }
    function hideMenu() {
        document.getElementById("menubox").style.display = "none";
        document.getElementById("projects").style.display = "none";
    }
    function dropSubmenu() {
        if (document.getElementById("submenu").style.display == "none") {
            document.getElementById("submenu").style.display = "block";
        }
        else {
            document.getElementById("submenu").style.display = "none";
        }
    }
    function displayContents(z) {
        document.getElementById("menubox").style.display = "none";
        document.getElementById("scrollimage").style.display = "none";
        document.getElementById("projects").style.display = "none";
        document.getElementById("submenu").style.display = "none";
        document.getElementById("content1").style.display = "none";
        document.getElementById("project1").style.display = "none";
        document.getElementById("project2").style.display = "none";
        document.getElementById("project3").style.display = "none";
        document.getElementById("contents").style.display = "block";
//        displayMenu();
        var id = "project" + z.id;
        var descrp = "descrp" + z.id;
        var project1 = "project" + id;
        document.getElementById("title").innerHTML = z.text;
        document.getElementById(descrp).innerHTML = z.text;

        if (id != "project0") {
            document.getElementById(id).style.display = "block";
        }
        else {
            // document.getElementById("about").style.display = "block";
        }
    }
    function showthis(x) {
        document.getElementById("about1").style.display = "none";
        document.getElementById("about2").style.display = "none";
        document.getElementById("about3").style.display = "none";
        document.getElementById("about4").style.display = "none";
        document.getElementById("about5").style.display = "none";
        var i = "about" + x.id;
        document.getElementById(i).style.display = "block";
    }

    function goGreenHome() {
        window.location.href = "index.php";
    }
    function goProjectHome() {
        window.location.href = "index1.php";
    }
    function displayProjects() {
        var x = document.getElementById("projects");

        if (document.getElementById("projects").style.display == "none") {
//            alert("Mo gbe o");
            document.getElementById("projects").style.display = "block";
        }
        else {
//            alert("Mo ti gbe patapata");
            document.getElementById("projects").style.display = "none";
        }
    }
</script>
<div id="header">
    <div id="logo">
        <img id="logoimage" src="src/images/greenglobe1.PNG" >
    </div>
    <div id="menulist">
        <div id="home" onclick="goGreenHome();
                return false;" 
             onmouseover=" this.style.backgroundColor = 'darkgrey';
                     document.getElementById('projects').style.display = 'none';"
             onmouseout="this.style.backgroundColor = 'lightgreen'">Home</div>
        <div style="" id="past" onclick="displayProjects();
                return false;"
             onmouseover="this.style.backgroundColor = 'darkgrey';"
             onmouseout="this.style.backgroundColor = 'lightgreen';">
            Past Projects Profile <i class="fa fa-angle-down"></i>
        </div>
        <div id="project" onclick="goProjectHome(this);
                return false;"
             onmouseover=" this.style.backgroundColor = 'darkgrey';
                     document.getElementById('projects').style.display = 'none';"
             onmouseout="this.style.backgroundColor = 'lightgreen'">Process a Project</div>
    </div>
    <div id="projects" onmouseover="this.style.backgroundColor = 'lightgrey';"
         onmouseout="this.style.backgroundColor = 'white';">
        <ul>
            <!--    <li><hr><a id="1" value="2" onclick="displayContents(this);
                        return false;" href="#project1" >Petcoke Platform - Onigbedu</a></li>
                <li><hr><a id="2" value="3" onclick="displayContents(this);
                        return false;" href="#project2" >Earth Filling Project - Sagamu</a></li>
                <li><hr><a id="3" value="4" onclick="displayContents(this);
                        return false;" href="#project3" >Mining Road Construction - Onigbedu</a></li> -->
            <?php
            $i = "1"
                    . "";
            include "dbengine.php";
            $sql = "select * from projectlist";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                ?>

                <hr><li>    
                    <a id="<?php echo $i ?>" value="<?php echo $i ?>" onclick="displayContents(this);
                                return false;" href="<?php echo "#project" . $i; ?>" >
                           <?php
                           echo $row["ProjectName"] . " - " . $row["CompanyName"];
                           ?>
                    </a>
                </li>

                <?php
                $i = $i + 1;
            }
            ?>
        </ul>
    </div>
    <div id="menu" onmouseover="turnred();" onmouseout="turnblack()">
        <i id="bars" class="fa fa-bars" onclick="displayMenu();"></i>
    </div>
</div>
<div id="menubox">

    <ul>
        <li><hr><a href="">Home</a></li>
        <li>
            <hr>
            <span onclick="dropSubmenu();
                    return false;"><a href="#" >Past Projects Profiles&nbsp;&nbsp;<i class="fa fa-angle-down"></i></a></span>
            <ul id="submenu">
                <!--  <li><hr><a id="1" value="a" onclick="displayContents(this);
                          return false;" href="#project" >Petcoke Platform - Onigbedu</a></li>
                  <li><hr><a id="2" value="b" onclick="displayContents(this);
                          return false;" href="#project2" >Earth Filling Project - Sagamu</a></li>
                  <li><hr><a id="3" value="c" onclick="displayContents(this);
                          return false;" href="#project3" >Mining Road Construction - Onigbedu</a></li> -->
                <?php
                $i = 1;
                include "dbengine.php";
                $sql = "select * from projectlist";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<hr><li><a id='$i' value='$i' onclick='displayContents(this);"
                    . "return false;' href='#project'.$i >" . $row['ProjectName'] .
                    " - " . $row['CompanyName'] . "</a></li>";
                    $i = $i + 1;
                }
                ?>
            </ul>
        </li>
        <li><hr><a onclick="displayLogin();" href="index1.php">Process a project</a><hr></li>
    </ul>
</div>
<div  onclick="hideMenu();" id="scrollimage">

</div>
<div id="body1" style="height:600px;">
    <div id="content1">

        <div id="content2" style="width:40%;float:left">
            <h4>Welcome to Greenglobe Nigeria Limited
                <p style="font-size: 12px; font-style: italic;margin:0 0 0 50px; 
                   text-align: justify; font-weight: bold;">
                    Civil Engineering and General Contractors
                </p>
            </h4>
            <div style="text-align:center;margin-bottom: 10px;">
                <img src="src/images/chairman.jpg" style="width:400px; height:400px;border-radius: 50%;">
            </div>
            <p style="text-align: justify">
                Greenglobe Nigeria Limited is a full service general contracting firm specializing in civil
                construction projects.<br>
                Our management team has over 10years of individual knowledge and experience in the
                Construction industry. They are supported by a team of highly skilled and dedicated professionals,
                subcontractors and suppliers who have worked with us for many years and share the same vision
                of excellence in customer service and professional workmanship.
                We stand for quality, and prompt delivery of projects on schedule as well as ensuring cost
                effective solution.<br>
                We would be glad if you considered us as your first choice in your soon to commence civil
                construction projects.<br><br>
                Yours sincerely,
            </p>
            <p>
                Emmanuel Igoche <br style="margin:0">
                <span style="font-weight: bold; font-style: italic">Chairman/MD/CEO</span>
            </p>
        </div>
        <div id="content3" style="width:50%;float:right; height:900px;">
            <h5 style="margin-left:30px;">Quick Links</h5>
            <ul style="list-style-type: none;">
                <li><a href="" onclick="showthis(this);
                        return false;" id="1">Who we are</a></li>
                <li><a href="" onclick="showthis(this);
                        return false;" id="2">Our Philosophy</a></li>
                <li><a href="" onclick="showthis(this);
                        return false;" id="3">Our Technical and Professional Competencies</a></li>
                <li><a href="" onclick="showthis(this);
                        return false;" id="4">Our Tools</a></li>
                <li><a href="" onclick="showthis(this);
                        return false;" id="5">Our People</a></li>
            </ul>
            <div id="about1" style="display:none;">
                <h3 style="margin-left:20px;">Who We Are</h3>
                <blockquote>
                    GREENGLOBE NIG LTD is a dynamic and progressive organization with a commitment to deliver
                    projects on schedule and in adherence to safety standards and regulation.
                    Our edge and uniqueness lie in our ability to bring solutions to client’s requirements in all phases
                    of project planning and execution.
                </blockquote>
            </div>
            <div id="about2" style="display:none;">
                <h3 style="margin-left:20px;">Our Philosophy</h3>
                <blockquote>
                    At GREENGLOBE NIG. LTD, we view every project as just another opportunity to show our
                    competence and leave our mark of delivering quality project on schedule.
                    We do not just undertake clients project but ensure that they are satisfied with their projects
                    while forging a relationship based on trust for years to come.
                </blockquote>

            </div>
            <div id="about3" style="display:none;">
                <h3 style="margin-left:20px;">Our Technical and Professional Competencies</h3>
                <blockquote>
                    We are professionally and technically competent in the following ways:
                    <ul>
                        <li>Completion of quality project on schedule</li>
                        <li>A workforce of experts</li>
                        <li>New and modern equipment and machines</li>
                    </ul>
                </blockquote>

            </div>
            <div id="about4" style="display:none;">
                <h3 style="margin-left:20px;">Our Tools</h3>
                <blockquote>
                    <ul>
                        <li>2 units of concrete mixing machine</li>
                        <li>1 unit of Compactor Machine</li>
                        <li>1 unit of Excavator</li>
                        <li>1 unit of Payloader</li>
                    </ul>
                </blockquote>
            </div>
            <div id="about5" style="display:none;">
                <h3 style="margin-left:20px;">Our People</h3>
                <blockquote>
                    Due to our commitment to quality we have assembled a dedicated workforce, the best of brains in
                    the civil and construction industry giving us a competitive edge in the industry.
                    Clients are assured of the best possible service in project delivery as Greenglobe staff are
                    committed to the success of each and every project.<br><br>
                    Below is a table of some key staff:<br>
                    Table 1. List of Professional &amp; Technical staff
                    <table border="1" style="width:100%;">
                        <tr>
                            <th>Name</th>
                            <th>Responsibility</th>
                        </tr>
                        <tr>
                            <td>Emmanuel Igoche</td>
                            <td>Chairman/CEO</td>
                        </tr>
                        <tr>
                            <td>Allen Missier</td>
                            <td>Project Manager</td>
                        <tr>
                            <td>Urijah Omiunu</td>
                            <td>Head of Operations</td>
                        </tr>
                        <tr>
                            <td>Thankgod Owielace</td>
                            <td>Civil Engineer</td>
                        </tr>
                        <tr>
                            <td>Matthew Allahdey</td>
                            <td>Admin/Logistics</td>
                        </tr>
                        <tr>
                            <td>Victor Abutu</td>
                            <td>Site Acountant/Store Keeper</td>
                        </tr>
                    </table>
                    Other Artisans includes:
                    <ul>
                        <li>Iron benders</li>
                        <li>Painters</li>
                        <li>Tillers</li>
                        <li>Joinery Specialists</li>
                        <li>Welders</li>
                        <li style="list-style: none;">etc</li>
                    </ul>
                </blockquote>
            </div>
        </div>
    </div>
    <?php
    include ("webcontents.php");
    ?>
</div>
