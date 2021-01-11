<script>
    function invoiceDetails() {
        document.getElementById("invoice").style.display = "none";
        document.getElementById("invoiceDetails").style.display = "block";
    }

    function showOthers() {
        if (document.getElementById("det1").selectedIndex == "3") {
            document.getElementById('others').style.display = 'block';
        }
        else {
            document.getElementById('others').style.display = 'none';
        }
        //alert(document.getElementById("det1").selectedIndex);
    }
</script>
<?php
include "../../dbengine.php";
$sql = "select * from ioutable";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $balance = $row["Balance"];
}

if ($balance == 0) {
    echo "Balance is: " . $balance;
    ?>
    <script>
        alert('You have exhausted you IOU.\nPlease Request for a New IOU');
        window.location.replace("../../dashboard.php");
    </script>
    <?php
} else {
    $date = date('Y-m-d');
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "Click on image to supply invoice details";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

// Check if file already exists
    if (file_exists($target_file)) {
        echo "<br>Sorry, file already exists.";
        $uploadOk = 0;
    }

// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "<br>Sorry, your file is too large.";
        $uploadOk = 0;
    }

// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<br>Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "<br>Sorry, there was an error uploading your file.";
        }
    }
    ?>
    <div id="invoice" style="cursor: pointer; padding-left:25%;padding-right:25%;" onclick="invoiceDetails()">
        <img src="<?php echo $target_file ?>" style="width:80%">
    </div>
    <div id="invoiceDetails" style="padding-left:20%;padding-right:20%;display:none;">
        <form action="generateVoucher.php" method="post">
            <table style="width:100%">
                <tr>
                    <td style="width:40%">Date</td>
                    <td style="width:60%">
                        <input type="datetime" name="date" id="date"
                               value="<?php echo $date ?>"
                    </td>
                </tr>
                <tr>
                    <td><label for = "det1">What is this Invoice For?</label></td>
                    <td>
                        <select name="det1" id="det1" onclick="showOthers()">
                            <option>Fuel/Petrol</option>
                            <option>Car Maintenance</option>
                            <option>Hotel Lodging</option>
                            <option>Others</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="text" name="others" id="others" style="display:none; width:100%"
                               placeholder="Please input the product purchased">
                    </td>
                </tr>
                <tr>
                    <td>Amount (Value on Invoice)</td>
                    <td>
                        <input type="text" name="invoiceAmount" id="invoiceAmount">
                    </td>
                </tr>
                <tr>
                    <td>Narration (The way it should appear on voucher)</td>
                    <td>
                        <input type="text" name="narration" id="narration">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input style="width:100%" type="text" name="pdfFileName" id="pdfFileName"  
                                           placeholder="Give a name to save your voucher as pdf file"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" name="submit" value="Post Voucher">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
}
?>