<?php

session_start();
$loggedinuser = $_SESSION["loggedinuser"];
include "../../dbengine.php";
$sql = "select * from iourequest where ApprovedBy ='' ";
$result = $conn->query($sql);
if (!$result === TRUE) {
    echo $conn->error;
} else {
    echo "<form action='approve.php' method='post'>";
    echo "<table border='1' style='margin-left: 10%; margin-top:5%; margin-right:20%; width:80%; "
    . "border-spacing:0 2px;border-collapse:separate; background-color:lightgreen'>";
    while ($row = $result->fetch_assoc()) {
        $rid = $row["ReqID"];
        echo "<tr>";
        echo "<td>" . $rid . "</td>";
        echo "<td>" . $row['ReqBy'] . "</td>";
        echo "<td>" . $row['ReqDate'] . "</td>";
        echo "<td>" . $row['ReqAmount'] . "</td>";
        echo "<td> <select name='$rid' style='width:100%'>"
        . "<option>Approve</option>"
        . "<option>Reject</option>"
        . "</select>" .
        "</td>";
       // . "<td><input type ='datetime' name='date'.$rid placeholder='Date Approved (yyyy-mm-dd)'></td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='5' style='text-align:center'>"
    . "<input type='submit' value='Submit Query' name='submit'></td></tr>";
    echo "</table";
    echo "</form>";
}