<?php

session_start();
$loggedinuser = $_SESSION["loggedinuser"];
$approvedDate=date("Y-m-d");
echo $approvedDate;
include "../../dbengine.php";
$sql = "select * from iourequest where ApprovedBy=''";
$result = $conn->query($sql);

//process request
print_r($_POST);
while ($row = $result->fetch_assoc()) {
    $rid = $row["ReqID"];
    $amount = $row["ReqAmount"];
    $reqBy=$row["ReqBy"];
    //echo $rid;
    if ($_POST[$rid] == "Approve") {
        $sql = "update iourequest "
                . "set ApprovedBy = '$loggedinuser',"
                . "ApprovedDate =  '$approvedDate' "
                . "where ApprovedBy=''";
        $result1 = $conn->query($sql);
        if (!$result1 === TRUE) {
            echo "<br>" . $conn->error;
        }       
//update IOU Table
 $conn->query("insert into ioutable (Details,TransactionAmount,TransactionType, Date, Balance) "
         . "values ('I.O.U to $reqBy','$amount','Inflow','$approvedDate','$amount')");
    }
}
header("location:../../dashboard.php");



