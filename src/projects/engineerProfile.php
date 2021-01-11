<head>
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
    #requestIOU{
        background-color:lightblue;
        height: 400px;
        display:none;
    }
    #acceptIOU{
        background-color:lightgreen;
        height: 400px;
        display:none;
    }
    #postVoucher{
        background-color:lightcyan;
        height: 400px;
        display:none;
    }
    #viewBalance{
        background-color:lightyellow;
        height: 400px;
        display:none;
    }
</style>

<div id="requestIOU">
    <?php
    include "dbengine.php";
    $sql = "select * from ioutable";
    $result = $conn->query($sql);
    $balance = 0;
    while ($row = $result->fetch_assoc()) {
        $balance = $row["Balance"];
        //echo $balance;
    }
    if (!$result->num_rows > 0 || $balance == 0) {

        // if ($balance == 0) {
        ?>
        <div style="padding-left:20%;padding-right:20%;padding-top:5%;">
            <form action="src/projects/submitIOURequest.php" method="post">
                <table style="width:100%;border-spacing: 0 10px; border-collapse: separate;">
                    <tr>
                        <td style="width:30%">Amount</td>
                        <td style="width:70%"><input type="number" name="IOUReqAmount" style="width:100%"></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><input type="date" name="IOUReqDate" style="width:100%"></td>
                    </tr>
                    <tr>
                        <td>Requested By:</td>
                        <td><input readonly name="reqBy" value="<?php echo $_SESSION['loggedinuser'] ?>"</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center"><input type="submit" value="Submit IOU Request"></td>
                    </tr>
                </table> 
            </form>
        </div>
        <?php
    } else {
            echo "<p>You Haven't Exhausted you last IOU. <br>"
           . "Kindly post any outstanding vouchers</p>";
            }
            ?>
        </div>
        <!--<div id="acceptIOU">
            Accepting IOU
        </div> -->
        <div id="postVoucher" style="padding-top:10%; padding-left:20%; padding-right:20%">
            <form style="width:100%;" action="src/projects/processInvoice.php" method="post" enctype="multipart/form-data">
                <label for ="fileToUpload">Upload An Invoice</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </div>
        <div id="viewBalance">
        <?php include "iouStatement.php" ?>
</div>