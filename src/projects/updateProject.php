<?php

session_start();
if (isset($_POST['submit'])) {
    print_r($_POST);
    include '../../dbengine.php';
    $tablename = $_POST["projectId"];
    $amt = intval($_POST['amt']);
    $pymtDate = $_POST['pymtDate'];
    $close = $_POST['close'];
    $installment = $_POST["numInstall"];
    $trxnType = $_POST['trxnType'];
    $projectName = $_POST['projectTitle'];

    $out_date = $_POST["out_date"];
    $out_details = "Invoice Number: " . $_POST["out_inv"] . "<br>Supplier Name: " . $_POST["out_supplier"] .
            "<br>Description: " . $_POST["out_descr"];
    $out_unit_price = $_POST["out_unit_price"];
    $out_quantity = $_POST["out_quantity"];
    $out_amt = intval($out_unit_price) * intval($out_quantity);



//convert string to date
    $pymtDate = date('Y-m-d', strtotime($pymtDate));
    $out_date = date('Y-m-d', strtotime($out_date));

//get the last balance from Transactions table
    $sql = "select * from $tablename" . "transactions";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
//    echo "<br>I got here 1st<br>";
        while ($row = $result->fetch_assoc()) {
//      echo "<br>I got here 2nd<br>";
            $balance = $row["TrxnBalance"];
            $trx = $row["TrxnId"];
//    echo "<br>This is record " . $trx;
        }
        if ($trxnType == "inflow") {
            $balance = $balance + $amt;
        } else {
            $balance = $balance - $out_amt;
        }
        $trx = $trx + 1;
//echo "<br> This should be the next record " . $trx;
    } else {
        //echo "<br>I wan't supposed to get here<br>";
        if ($trxnType == "inflow") {
            $balance = $amt;
        } else {
            $balance = $out_amt * -1;
        }
        $trx = 1;
    }



    if ($trxnType == "inflow") {
        // echo "<br>Processing an Inflow";
        if ($_POST["numInstall"] == "1st Installment") {
            $num = 1;
        }
        if ($_POST["numInstall"] == "2nd Installment") {
            $num = 2;
        }
        if ($_POST["numInstall"] == "3rd Installment") {
            $num = 3;
        }
        if ($_POST["numInstall"] == "4th Installment") {
            $num = 4;
        }
        if ($_POST["numInstall"] == "5th Installment") {
            $num = 5;
        }
        if ($_POST["numInstall"] == "6th Installment") {
            $num = 6;
        }
        if ($_POST["numInstall"] == "7th Installment") {
            $num = 7;
        }
        if ($_POST["numInstall"] == "8th Installment") {
            $num = 8;
        }
        if ($_POST["numInstall"] == "9th Installment") {
            $num = 9;
        }
        if ($_POST["numInstall"] == "10th Installment") {
            $num = 10;
        }


//open project table

        $sql = "update $tablename set "
                . "Installment_" . $num . " = $amt,"
                . "Date_Installment_" . $num . "_Paid = '$pymtDate',"
                . "Project_Balance = '$close'";

        $result = $conn->query($sql);
        if (!$result === TRUE) {
            echo "<br>" . $sql . "<br>";
            echo $conn->error;
        }

//insert new transaction into transaction table
        $sql = "insert into " . $tablename . "transactions"
                . "(TrxnId,TrxnDate,TrxnDetails,Amount,TrxnType,TrxnBalance)"
                . "values('$trx','$pymtDate','Being $installment Payment','$amt','Inflow','$balance')";

        $result = $conn->query($sql);
        if (!$result === TRUE) {
            echo "<br>" . $sql;
            echo "<br>" . $conn->error;
        }
    } else if ($trxnType == "outflow") {
        // echo "<br>Processing an outflow";
        //write outflow invoice to table 

        $sql = "insert into $tablename" . "transactions"
                . "(TrxnId, TrxnDate, TrxnDetails, Amount, TrxnType, TrxnBalance)"
                . "values"
                . "('$trx','$out_date','$out_details','$out_amt','Outflow','$balance')";

        $result = $conn->query($sql);
        if (!$result === TRUE) {
            echo "<br>" . $sql;
            echo "<br>" . $conn->error;
        }

        // echo "<br>Transaction Details:\n".$out_details;
    }
    echo "<script>
    alert('Project Updated Successfully');
    location.href='../../dashboard.php';
</script>;";
}
?>



