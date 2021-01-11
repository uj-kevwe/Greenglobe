<?php
session_start();
if (isset($_POST["submit"])) {
    // print_r($_POST);
    $coyName = $_POST["coyName"];
    $projectName = $_POST["projectName"];
    $projectValue = $_POST["projectValue"];
    $projDate = $_POST["projectDate"];
    $numberofInstallments = $_SESSION["numi"]=$_POST["numberofInstallments"];
    $duration = $_POST["duration"];
    $projectCreator = $_SESSION["loggedinuser"];
    $projectDate = date('Y-m-d', strtotime($projDate));
    echo "<br> Project Date:" . $projectDate;
    include "../../dbengine.php";
    //create a unique project Name
    $projId = "Proj" . substr($_POST["coyName"], 0, 3) . substr($_POST["projectName"], 0, 3) . rand(000, 100);
    echo $projId;
//check if unique project id exist on project table
    $sql = "select ProjectId from ProjectList";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["ProjectId"] == $projId) {
                echo "UniqueId already exist on table";
                $projId = "Proj" . substr($_POST["coyName"], 0, 3) . substr($_POST["projectName"], 0, 3) . rand(000, 100);
            } else {
                continue;
            }
        }
    }
//insert record into table
    $sql = "insert into ProjectList (ProjectId,ProjectName, CompanyName, ProjectValue,StartDate,"
            . "Duration_in_weeks,Number_of_Installments, CreatedBy) values ('$projId','$projectName','$coyName',"
            . "'$projectValue','$projectDate','$duration','$numberofInstallments','$projectCreator')";

    $result = $conn->query($sql);

    //create a table for the project
    $projectName = str_replace($projectName, " ", "");
    $tablename = $projId;
    $sql = "CREATE TABLE " . $tablename . "("
            . "ProjectId varchar(15) not null primary key, "
            . "ProjectName text not null,"
            . "CompanyName text not null,"
            . "Project_Value int(12) not null,Start_Date datetime not null, "
            . "Expected_Completion_Date datetime not null"
            . ")";
    if ($conn->query($sql) === TRUE) {
        //append columns installments, installment dates, balance and Project Manager
        $no_of_installments = $_POST["numberofInstallments"];
        for ($i = 1; $i <= $no_of_installments; $i++) {
            $installment = "Installment_" . $i;
            $date_paid = "Date_Installment_" . $i . "_Paid";
            $sql1 = "alter table $tablename add"
                    . "($installment int(12) not null, $date_paid datetime not null)";
            if (!$conn->query($sql1) === TRUE) {
                echo $conn->error;
            }
            $conn->query("insert into $tablename ($installment) values(0)");
        }
        $conn->query("alter table $tablename add"
                . "(Project_Balance int(12) not null)");
    } else {
        $table_error = "Error creating table: " . $conn->error;
    }
    //fill project table with initial values;

    $interval = "$duration WEEK";
    $date = date_create($_POST['projectDate']);
    date_add($date, date_interval_create_from_date_string($interval));
    $enddate = date_format($date, 'Y-m-d');
    $sql = "update $tablename
           set ProjectId='$projId', 
               ProjectName= '$projectName',
               CompanyName = '$coyName',
           Project_Value ='$projectValue',
           Start_Date='$projectDate',
           Expected_Completion_Date = '$enddate',
           Project_Balance = '$projectValue'";
    if (!$conn->query($sql) === TRUE) {
        echo "<br>" . $conn->error;
    }
    
    //create a table for the project
    //$projectName = str_replace($projectName, " ", "");
    $tablename = $projId."Transactions";
    $sql = "CREATE TABLE " . $tablename . "("
            . "TrxnId varchar(15) not null primary key,"
            . "TrxnDate datetime not null,"
            . "TrxnDetails varchar(255) not null,"
            . "Amount int(12) not null,"
            . "TrxnType varchar(7) not null,"
            . "TrxnBalance int(12) not null"
            . ")";
    if (!$conn->query($sql) === TRUE) {
        echo "<br>Error creating Table for ".$tablename;
        echo "<br>".$sql;
        echo "<br>$conn->error";
    }

    echo "<br>" . $enddate;
}
?>
<script>
    alert("New Project Created Successfully");
    location.replace("../../dashboard.php");
</script>

