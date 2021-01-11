<?php
//include "dbengine.php";
$sql = "select * from ioutable";
$result = $conn->query($sql);
$i=1;
echo "<table style='width:100%; background-color:lightblue; border-spacing:10px; "
. "border-collapse:separate;'>";
echo "<tr>";
echo "<th style='width:10%'> S/No</th>";
echo "<th style='width:30%'> Details</th>";
echo "<th style='width:10%'> Amount </th>";
echo "<th style='width:20%'> Transaction Type </th>";
echo "<th style='width:20%'> Date </th>";
echo "<th style='width:10%'> Balance</th>";
echo "</tr>";
while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td> $i </td>";
    echo "<td>".$row["Details"]."</td>";
    echo "<td>".$row["TransactionAmount"]."</td>";
    echo "<td>".$row["TransactionType"]."</td>";
    echo "<td>".$row["Date"]."</td>";
    echo "<td>".$row["Balance"]."</td>";
    echo "</tr>";   
    $i=$i+1;
}
echo "</table>";
