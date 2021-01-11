
<style>
    * {
        box-sizing: border-box;
    }
    br{
        padding-bottom: 0;
        margin-bottom: 0;
    }
    input[type=text], select, textarea {
        width: 60%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
        font-size:12px;
    }

    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 10px;
    }

    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
        .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
        input[type=text],select{
            width:100%;
        }
    }
</style>
<script>
    /*    new Ajax.Request{
     
     function popupEdit(i) {
     
     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function () {
     alert("I got here");
     if (this.readyState == 4 && this.status == 200) {
     var projectTitle = document.getElementById("projectList").rows[i].cells[2].innerHTML;
     var coyName = document.getElementById("projectList").rows[i].cells[3].innerHTML;
     var projValue = document.getElementById("projectList").rows[i].cells[4].innerHTML;
     var start_date = document.getElementById("projectList").rows[i].cells[5].innerHTML;
     var duration = document.getElementById('projectList').rows[i].cells[6].innerHTML;
     var projId = document.getElementById('ProjectList').rows[i].cells[7].innerHTML;
     document.getElementById("projectTitle").innerHTML = ajax.responseText;
     }
     else {
     alert("Error reading Ajax Files");
     }
     };
     xhttp.open("GET", "dashboard.php?coyName=" + coyName + "&projValue=" + projValue + "&start_date=\n\
     " + start_date + "&duration=" + duration + "&projId=" + projId, true);
     xhttp.send();
     }
     }
     */
    function popupEdit(i) {

        document.getElementById("edit").style.display = "none";
        document.getElementById("buttonmenu").style.display = "none";
        document.getElementById("projectTitle").innerHTML = "";
        document.getElementById("coyName").value = "";
        document.getElementById("projValue").value = 0;
        document.getElementById("projDate").value = "";
        document.getElementById("projEndDate").value = "";

        document.getElementById("editProject").style.display = "block";

        var projectTitle = document.getElementById("projectList").rows[i].cells[2].innerHTML;
        var coyName = document.getElementById("projectList").rows[i].cells[3].innerHTML;
        var projValue = document.getElementById("projectList").rows[i].cells[4].innerHTML;
        var start_date = document.getElementById("projectList").rows[i].cells[5].innerHTML;
        var duration = document.getElementById('projectList').rows[i].cells[6].innerHTML;
        //var projId = document.getElementById('ProjectList').rows[i].cells[7].innerHTML;
        //
        var projId = document.getElementById(i).value;
        alert(projId);
        //alert(start_date);
        var d = new Date(start_date);
        //var enddate = new Date(d.setDate(d.getDate()+(duration*7)));
        var enddate = new Date(start_date);
        enddate.setDate(d.getDate() + (duration * 7));
        //var end_date = document.getElementById("projectList");

        document.getElementById("projectTitle").value = projectTitle;
        document.getElementById("coyName").innerHTML = coyName;
        document.getElementById("projValue").value = projValue;
        document.getElementById("projDate").value = d;
        document.getElementById("projEndDate").value = enddate;


        //window.location.href = "dashboard.php?projId=" + projId;


    }

    function getBalance(val) {
        var bal = document.getElementById('projBalance').value;
        //var new_inflow = val;
        alert("Outstanding Balance: " + bal);
        alert("Amount Inflow Paid: " + val);
        var new_bal = bal - val;
        document.getElementById("close").value = new_bal;
        alert("New Outstanding Balance: " + new_bal);
        document.getElementById("dispBal").innerHTML =
                "Outstanding inflow from client is: " + new_bal;
    }
</script>
<div class="container" id="sambhuProjectForm" style="height:100%">
    <form action = "src/projects/createProject.php" method="post">
        <div class="row">
            <div id="buttonmenu" class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="border-right-color: black;
                 border-right-width: thick;">
                <hr>
                <div onclick="document.getElementById('create').style.display = 'block';
                        document.getElementById('edit').style.display = 'none';"
                     style="cursor: pointer; height:50px; width:100%;
                     background-color:lightgrey; border-color:black; padding:5px;">
                    Create a New Project
                </div>
                <hr>
                <div onclick="document.getElementById('edit').style.display = 'block';
                        document.getElementById('create').style.display = 'none';"
                     style="cursor: pointer; height:50px; width:100%; 
                     background-color:lightgrey; border-color:black;padding:5px;">
                    Edit an Existing Project
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div id="create" style="display:none">
                    <label for ="coyName">Company</label><br>
                    <select name="coyName">
                        <option>Purechem Manufacturing Limited, Onigbedu </option>
                        <option>Rosemary Limited, Sagamu</option>
                    </select><br>
                    <label for ="projectName">Project Name</label><br>
                    <input name="projectName" type="text" required ><br>
                    <label for ="projectValue">Project Value</label><br>
                    <input name="projectValue" type="number" size="10" required><br>
                    <label for ="projectDate">Project Date</label><br>
                    <input name="projectDate" type="datetime-local" required placeholder="dd-mm-yyyy"><br>
                    <label for ="numberOfInstallments">Number of Inflow installments</label><br>
                    <input name="numberofInstallments" type="number" size="3" required><br>
                    <label for ="duration">Project Duration in Weeks</label><br>
                    <input name="duration" type="number" size="3" required><br>
                    <input type="submit" name="submit" id="submit" value="Create Project">

                </div>
                <div id="edit" style="display:none">
                    <label>Please select Project to Edit</label>
                    <?php
                    $sql = "Select * from projectlist;";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $i = 0;
                        ?>
                        <table id='projectList' style ='background-color:green;font-size:12px;"
                               padding:10px;width:100%;'>
                            <tr style='background-color:lightgreen; height:50px;'>
                                <th style='width:10%'>S/No</th>
                                <th style='width:40%'>Project ID<br>
                                    <span style='font-size:10px; font-style:italic'>(Click on Project Id to edit)</span></th>
                                <th style='width:50%'>Project Name</th>
                            </tr> <?php
                            while ($row = $result->fetch_assoc()) {
                                $projId = $row['ProjectId'];
                                //echo $projId;
                                // echo "<input type ='hidden' id='s' value='$projId'>";
                                echo "<tr style='height:30px;'>";
                                echo "<td style='color:white;'>";
                                echo ++$i;
                                echo "</td>";
                                echo "<td>";
                                echo "<button onclick='popupEdit($i)' style='color:blue;'>" . $row["ProjectId"] . "</button>";
                                echo "</td>";
                                echo "<td style='color:white;font-weight:bolder;'>";
                                echo $row["ProjectName"];
                                echo "</td>";
                                echo "<td style='display:none'>" . $row['CompanyName'] . "</td>";
                                echo "<td style='display:none'>" . $row['ProjectValue'] . "</td>";
                                echo "<td style='display:none'>" . $row['StartDate'] . "</td>";
                                echo "<td style='display:none'>" . $row['Duration_in_weeks'] . "</td>";
                                echo "<td style='display:none'>"
                                . "<input id='$i' value='" . $row['ProjectId'] . "'>"
                                . "</td>";

                                echo "</tr>";
                            }
                            ?>
                        </table>
                        <?php
                    }
                    //get current balance from selected project table
                    $projId = $projId;
                    $sql = "select * from $projId";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $balance = $row['Project_Balance'];

                            echo "<input id='projBalance' type='hidden' value='$balance'>";
                            $_SESSION['balance'] = $balance;
                        }
                        echo "<p id='dispBal'>Project Outstanding Balance: </p>";
                    } else {
                        echo $conn->error;
                    }
                    ?>
                </div>
            </div>
        </div>
    </form> 
    <div id="editProject" style="display:none; height:500px;  
         ;background-color:green;z-index: 1;font-weight:bolder;text-decoration: underline;
         padding-left:5%; padding-right:5%; padding-bottom:5%; overflow-y: scroll;">
        <div id="coyName" style="color:white; text-align: center;font-size:14px;"></div>
        <div style="margin-bottom: 5px;margin-top:10px; background-color:white; 
             padding-right:10px;padding-left:10px;font-size:12px;">
            <form action="../../dashboard.php" method="post"
                  style="">
                <table style='width:100%'>
                    <tr>
                        <td style="width:30%"><label>Project Name</label></td>
                        <td style="width:70%">
                            <input id="projectTitle" readonly value="" 
                                   style='width:100%;background-color:lightgrey'>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%"><label>Value of Project</label></td>
                        <td style="width:70%">
                            <input id="projValue" readonly value=""
                                   style='width:100%;background-color:lightgrey'>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%"><label>Start Date</label></td>
                        <td style="width:70%"><input id="projDate" readonly value=""
                                                     style='width:100%;background-color:lightgrey'></td>
                    </tr>
                    <tr>
                        <td style="width:30%"><label>Completion Date</label></td>
                        <td style="width:70%"><input id="projEndDate" readonly value=""
                                                     style='width:100%;background-color:lightgrey'></td>
                    </tr>
                    <tr>
                        <td style="width:30%"><label>Payment Installment Number</label></td>
                        <td style="width:70%">
                            <select style='width:100%;'>
                                <option>What installment is this?</option>
                                <?php
                                for ($i = 1; $i <= 10; $i++) {
                                    echo "<option>$i</option>";
                                }
                                ?>
                            </select>

                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%"><label>Amount paid</label></td>
                        <td style="width:70%">
                            <input id="amt" type="text" value="0.0" style='width:100%;' 
                                   onchange="getBalance(this.value)">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:30%"><label>Date of Payment</label></td>
                        <td style="width:70%"><input type="datetime" style='width:100%;'></td>
                    </tr>
                    <tr>
                        <td style="width:30%"><label>Closing Balance</label></td>
                        <td style="width:70%">
                            <input id="close" type="text" value="" 
                                   style='width:100%;'>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center;"><button>Update Project</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>


</div>

