<?php
//Update database

//create pdf voucher
require('..\..\Assets\fpdf.php');
$pdf = new FPDF("L", "mm", "A5");
$pdf->AddPage();
//$pdf->SetFillColor(0,0,0);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', 'B', 14);
//$pdf->image("..\images\snl.png");
$pdf->Cell(100, 10, "SAMBHU NIGERIA LTD", 0, 2, "C", false);
$pdf->Ln(10);
$pdf->Write(10, "Cash/Cheque Payment/Bank Transfer Voucher");
$pdf->SetDrawColor(0, 0, 0);
$pdf->Ln(13);
$pdf->setFont("Times", "B", 10);
$pdf->Cell(50, 10, "Voucher Date:", 0, 0, "L", false);
$pdf->SetFillColor(0, 255, 255);
$pdf->setFont("Times", "B", 10);
$pdf->Write(10, $_POST['date']);
$name = "Allen Missier";
$pdf->Ln(14);
$pdf->setFont("Times", "B", 10);
$pdf->Cell(50, 10, "Payee:", 0, 0, "L", false);
$pdf->SetFillColor(0, 255, 255);
$pdf->setFont("Times", "B", 10);
$pdf->Write(10, $name);
$pdf->Ln(15);
$pdf->setFont("Times", "B", 10);
$pdf->Cell(50, 8, "Transaction Date", 0, 0, "L", false);
$pdf->SetFillColor(0, 255, 255);
$pdf->setFont("Times", "B", 10);
$pdf->Cell(90, 8, "Description", 0, 0, "L", false);
$pdf->SetFillColor(0, 255, 255);
$pdf->setFont("Times", "B", 10);
$pdf->Cell(50, 8, "Amount", 0, 0, "L", false);
$pdf->Ln(16);
$pdf->SetFillColor(0, 255, 255);
$pdf->setFont("Times", "B", 10);
$pdf->Cell(50, 8, $_POST['date'], 0, 0, "L", false);
$pdf->SetFillColor(0, 255, 255);
$pdf->setFont("Times", "B", 10);
$pdf->Cell(90, 8, $_POST["det1"] . "-" . $_POST["narration"], 0, 0, "L", false);
$pdf->SetFillColor(0, 255, 255);
$pdf->setFont("Times", "B", 10);
$pdf->Cell(50, 8, $_POST["invoiceAmount"], 0, 0, "L", false);
$pdf->Ln(17);
$pdf->SetFillColor(0, 255, 255);
$pdf->setFont("Times", "B", "10");
$pdf->Cell(40, 8, "Prepared By", 0, 0, "L", false);
$pdf->Cell(40, 8, "Checked By", 0, 0, "L", false);
$pdf->Cell(40, 8, "Authorized By", 0, 0, "L", false);
$pdf->Cell(40, 8, "Approved By", 0, 0, "L", false);
$pdf->Cell(40, 8, "Received By", 0, 0, "L", false);
$filename = "pdfVouchersOutput/" . $_POST["pdfFileName"] . ".pdf";
$pdf->Output($filename, 'F');

//update database
include "../../dbengine.php";
print_r($_POST);
$sql="select * from ioutable";
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){
    $balance=$row["Balance"];
}
$newBalance= $balance-intval($_POST["invoiceAmount"]);
$details=$_POST["det1"] . "-" . $_POST["narration"];
$amt=$_POST["invoiceAmount"];
$trxnType="Outflow";
$date=date("Y-m-d",  strtotime($_POST['date']));
$sql="insert into ioutable (Details,TransactionAmount,TransactionType,Date,Balance) "
        . "values ('$details','$amt','$trxnType','$date','$newBalance')";
$result=$conn->query($sql);
?>
<script>
window.location.replace("../../dashboard.php");
</script>