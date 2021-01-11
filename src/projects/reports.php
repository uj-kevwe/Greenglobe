<?php
session_start();
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
</head>

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
        margin-left:100px;
        margin-top:10px;
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
        padding-left:60px;
        text-decoration: none;

    }
    #menulist li a:hover{color:#483D8B;}
    #mobilemenu{
        display:none;
        margin-right:20px;
        margin-top:7px;
        padding:2px;
        float:right;
        color:white;
        font-size:25px;
        cursor:pointer;
    }
    #smallmenu{
        display:none;
        margin-top:55px;
    }
    #floatright{
        float:right; 
        color:white;
        /*padding:5px;*/
    }
    #projectlist, #reports {
        display:none;
        width:100%;
        background-color:lightblue;
        height:600px;
        padding-top:5px;
        padding-left:5px;
        padding-right:20px;
        overflow: scroll;
    }
    heading {
        font-size:14px;
        color:blue;

    }
    @media only screen and (max-width:800px) {
        #menulist{display:none}
        #mobilemenu{display:block}
    }
</style>
<script>
    function showProjects() {
        document.getElementById("projectlist").style.display = "block";
        document.getElementById("reports").style.display = "none";
        return false;
    }
    function showReports() {
        document.getElementById("reports").style.display = "block";
        document.getElementById("projectlist").style.display = "none";
        return false;
    }
    function showDetails(i) {
        document.getElementById("details").style.display = "block";
        var title = document.getElementById(i).text;
        alert(title);
        var projV = document.getElementById("projValue_" + i).value;
        var inflow = document.getElementById("inflows_" + i).value
        var variance = projV - inflow;
        document.getElementById("projectName").value = title;
        document.getElementById("projectCoy").value = document.getElementById("company_" + i).value;
        document.getElementById("projectValue").value = projV;
        document.getElementById("projectStartDate").value = document.getElementById("startDate_" + i).value;
        document.getElementById("projectEndDate").value = document.getElementById("endDate_" + i).value;
        document.getElementById("projectInflow").value = inflow;

        document.getElementById("projectInflowVariance").value = variance;
        document.getElementById("projectOutflow").value = document.getElementById("outflows_" + i).value;
        document.getElementById("projectProfit").value = document.getElementById("profit_" + i).value;
    }
    function turngreen() {
        document.getElementById("mobilemenu").style.backgroundColor = "lightgreen";
    }
    function revert() {
        document.getElementById("mobilemenu").style.backgroundColor = "#483D8B";
    }
    function showmobilemenu() {
        if (document.getElementById("smallmenu").style.display == "none") {
            document.getElementById("smallmenu").style.display = "block";
        }
        else {
            document.getElementById("smallmenu").style.display = "none";
        }
    }
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col" style="width:100%">
            <div id="bigheader" style="width:100%">
                <div id='menu' style="width:100%">
                    <a href='#' onmouseover="dropmenubar();"
                       onclick="clickShowMenu();"><i class='fa fa-bars' style='margin-left:15px;'></i></a>
                </div>
                <div id="floatleft">
                    <img src = '..\images\snl.png' style=''>
                </div>
                <div id="menulist">
                    <ul>
                        <li><a href="..\..\dashboard.php">Dashboard</a></li>
                        <li><a href="#" onclick="showProjects()">Project List</a></li>
                        <li><a href="#" onclick="showReports()">Comprehensive Report</a></li>
                        <li><a href='..\..\index.php'onclick='showReports()'><i class='fa fa-home'>&nbsp;&nwarrow;Home</i></a></li>

                    </ul>
                </div>
                <div id="mobilemenu" onclick="showmobilemenu();" onmouseover="turngreen();"
                     onmouseout="revert()">
                    <i class="fa fa-bars"></i>
                </div>
                <div id="smallmenu">
                    <ul>
                        <li><a href="..\..\dashboard.php">Dashboard</a></li>
                        <li><a href="#" onclick="showProjects()">Project List</a></li>
                        <li><a href="#" onclick="showReports()">Comprehensive Report</a></li>
                        <li><a href='..\..\index.php'onclick='showReports()'><i class='fa fa-home'>&nbsp;&nwarrow;Home</i></a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col" id="projectlist">
            <div id="lists"  style="width:40%; float:left;">
                <heading>Project Listing</heading>
                <?php
                include "..\..\dbengine.php";

                $sql = "select * from projectList";
                $result = $conn->query("$sql");
                echo "<table id='projectTable'>";
                if ($result === TRUE) {
                    echo "<tr><td>No Project Created On Database Yet</td></tr>";
                } else {
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $r = $i + 1;
                        echo "<tr><td style='width:10%;'> $r </td>";
                        echo"<td style='width:90%;'><a id = '$i' href='#' "
                        . "onclick='showDetails($i)'>" .
                        $row["ProjectName"] . "</a></td></tr>";
                        $projId = $row['ProjectId'];
                        $idCoy = 'projectId' . $i;
                        echo "<input type = 'hidden' id=$idCoy value = '$projId'>";
                        $coyName = $row['CompanyName'];
                        //echo $coyName;
                        echo "<input type = 'hidden' id ='company_$i' value = '$coyName'>";
                        $projValue = $row['ProjectValue'];
                        echo "<input type = 'hidden' id='projValue_$i' value = '$projValue'>";
                        $startDate = $row['StartDate'];
                        echo "<input type = 'hidden' id='startDate_$i' value = '$startDate'>";
                        $sql1 = "select * from $projId";
                        $result1 = $conn->query("$sql1");
                        if (!$result1 === TRUE) {
                            echo $row['ProjectName'] . " Does not exist";
                        } else {
                            $m = $i;
                            while ($row1 = $result1->fetch_assoc()) {
                                $enddate = $row1['Expected_Completion_Date'];
                                //echo $enddate;
                                echo "<input type = 'hidden' id='endDate_$m' value = '$enddate'>";
                                $inflows = 0;
                                for ($j = 1; $j <= $row['Number_of_Installments']; $j++) {
                                    $inflows = $inflows + $row1['Installment_' . $j];
                                }
                                echo "<input type = 'hidden' id='inflows_$m' value = '$inflows'>";
                                echo "<input type = 'hidden' id='inflowDifference_$m' value = ''>";
                                $sql2 = "select * from $projId" . "transactions where TrxnType = 'Outflow'";
                                $result2 = $conn->query("$sql2");
                                // echo $sql2;
                                if (!$result2 === TRUE) {
                                    echo $row['ProjectName'] . " Does not exist";
                                } else {
                                    //echo "Ole Ole Ole Ole";
                                    $outflows = 0;
                                    while ($row2 = $result2->fetch_assoc()) {
                                        //echo "<br>". $row2["Amount"];
                                        $outflows = $outflows + $row2['Amount'];
                                    }
                                    $diff = $inflows - $outflows;
                                    echo "<input type = 'hidden' id='outflows_$m' value = '$outflows'>";
                                    //echo $diff;
                                    echo "<input type = 'hidden' id='profit_$m' value = '$diff'>";
                                }
                            }
                            $i = $i + 1;
                        }
                    }
                }
                /*  echo "<tr><td>".++$i." </td>"
                  . "<td><a href='..\..\index.php'onclick='showReports()'><i class='fa fa-home'>&nbsp;&nwarrow;"
                  . "Home</i></a></td></tr>"; */
                echo "</table>";
                ?>
            </div>
            <div id="details" style="width:60%; float:right;display:none;">
                <p id="title"></p>
                <form action="writeToPdf.php" method="post">
                    <fieldset>
                        <legend>Project Name</legend>
                        <input readonly="" id="projectName" name="projectName"
                               style="width:100%; background-color:lightgrey">
                    </fieldset>
                    <fieldset>
                        <legend>Sponsor Company</legend>
                        <input readonly="" id="projectCoy" name="projectCoy"
                               style="width:100%; background-color:lightgrey">
                    </fieldset>
                    <fieldset>
                        <legend>Project Value</legend>
                        <input readonly="" id="projectValue" name="projectValue"
                               style="width:100%; background-color:lightgrey">
                    </fieldset>
                    <fieldset>
                        <legend>Project Start Date</legend>
                        <input readonly="" id="projectStartDate" name="projectStartDate"
                               style="width:100%; background-color:lightgrey">
                    </fieldset>
                    <fieldset>
                        <legend>Project Completed Date</legend>
                        <input readonly="" id="projectEndDate" name="projectEndDate"
                               style="width:100%; background-color:lightgrey">
                    </fieldset>
                    <fieldset>
                        <legend>Inflow</legend>
                        <input readonly="" id="projectInflow" name="projectInflow"
                               style="width:100%; background-color:lightgrey" placeholder="Actual Inflow">
                        <input readonly="" id="projectInflowVariance" name="projectInflowVariance" 
                               style="width:100%; background-color:lightgrey" placeholder="variance From Project Value">                        
                    </fieldset>
                    <fieldset>
                        <legend>Outflow</legend>
                        <input readonly="" id="projectOutflow" name="projectOutflow"
                               style="width:100%; background-color:lightgrey">
                    </fieldset>
                    <fieldset>
                        <legend>Net Profit</legend>
                        <input readonly="" id="projectProfit" name="projectProfit" 
                               style="width:100%; background-color:lightgrey">
                    </fieldset>

                    <input name="submit" type ="submit" value="Download To Pdf format">
                </form>
            </div>
        </div>
        <div class="col" id="reports">
            <heading>Reports</heading> 
        </div>
    </div>
</div>