<?php
print_r($_POST);

include "..\..\dbengine.php";
$amt = $_POST["IOUReqAmount"];
$date = $_POST["IOUReqDate"];
$reqBy=$_POST["reqBy"];

//insert new IOU request into Request Table
$sql="insert into iourequest (ReqBy, ReqDate,ReqAmount) values ('$reqBy','$date','$amt')";
$result=$conn->query($sql);
if(!$result===TRUE){
    echo $conn->error;
}
echo "<script>"
. "location.replace('../../dashboard.php')"
        . "</script>";
