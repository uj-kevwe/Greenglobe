<?php
require('..\..\Assets\fpdf.php');
$pdf = new FPDF(); 
$pdf->AddPage();
//$pdf->SetFillColor(0,0,0);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B',16);
$pdf->image("..\images\snl.png");
$pdf->Cell(60,20,"SAMBHU NIGERIA LTD",0,2,"C",false,"www.sambhunigeria.com");
$pdf->Ln(10);
$pdf->Write(10,"Project Report for ".$_POST['projectName']);
$pdf->SetDrawColor(0,0,0);
$pdf->Ln(15);
$pdf->setFont("Times","B",10);
$pdf->Cell(46,12,"Company Name:",0,0,"L",false);
$pdf->SetFillColor(0,255,255);
$pdf->setFont("Times","B",10);
$pdf->Write(12,$_POST['projectCoy']);
$pdf->Ln(10);
$pdf->setFont("Times","B",10);
$pdf->Cell(46,12,"Project Value:",0,0,"L",false);
$pdf->SetFillColor(0,255,255);
$pdf->setFont("Times","B",10);
$pdf->Write(12,$_POST['projectValue']);
$pdf->Ln(10);
$pdf->setFont("Times","B",10);
$pdf->Cell(46,12,"Start Date:",0,0,"L",false);
$pdf->SetFillColor(0,255,255);
$pdf->setFont("Times","B",10);
$pdf->Write(12,$_POST['projectStartDate']);
$pdf->Ln(10);
$pdf->setFont("Times","B",10);
$pdf->Cell(46,12,"Date of Completion:",0,0,"L",false);
$pdf->SetFillColor(0,255,255);
$pdf->setFont("Times","B",10);
$pdf->Write(12,$_POST['projectEndDate']);
$pdf->Ln(10);
$pdf->setFont("Times","B",10);
$pdf->Cell(46,12,"Total Inflow:",0,0,"L",false);
$pdf->SetFillColor(0,255,255);
$pdf->setFont("Times","B",10);
$pdf->Write(12,$_POST['projectInflow']);
$pdf->Ln(10);
$pdf->setFont("Times","B",10);
$pdf->Cell(46,12,"Variance from Project Value:",0,0,"L",false);
$pdf->SetFillColor(0,255,255);
$pdf->setFont("Times","B",10);
$pdf->Write(12,$_POST['projectInflowVariance']);
$pdf->Ln(10);
$pdf->setFont("Times","B",10);
$pdf->Cell(46,12,"Total Outflow:",0,0,"L",false);
$pdf->SetFillColor(0,255,255);
$pdf->setFont("Times","B",10);
$pdf->Write(12,$_POST['projectOutflow']);
$pdf->Ln(10);
$pdf->setFont("Times","B",10);
$pdf->Cell(46,12,"Gross Profit:",0,0,"L",false);
$pdf->SetFillColor(0,255,255);
$pdf->setFont("Times","B",10);
$pdf->Write(12,$_POST['projectProfit']);

$pdf->Output('my_file.pdf','D'); // Send to browser and display */

//
//$textColour = array( 0, 0, 0 );
//$headerColour = array( 100, 100, 100 );
//$tableHeaderTopTextColour = array( 255, 255, 255 );
//$tableHeaderTopFillColour = array( 125, 152, 179 );
//$tableHeaderTopProductTextColour = array( 0, 0, 0 );
//$tableHeaderTopProductFillColour = array( 143, 173, 204 );
//$tableHeaderLeftTextColour = array( 99, 42, 57 );
//$tableHeaderLeftFillColour = array( 184, 207, 229 );
//$tableBorderColour = array( 50, 50, 50 );
//$tableRowFillColour = array( 213, 170, 170 );
//$reportName = "Summary Project Report for ".$_POST['projectName'];
//$reportNameYPos = 160;
//$logoFile = "..\images\snl.png";
//$logoXPos = 50;
//$logoYPos = 108;
//$logoWidth = 110;
//$columnLabels = array( "Title", "Value" );
//$rowLabels = array();
//$list=8;
//for($i=1;$i<=$list;$i++){
//    array_push($rowLabels,$i);
//}
///*
//$chartXPos = 20;
//$chartYPos = 250;
//$chartWidth = 160;
//$chartHeight = 80;
//$chartXLabel = "Product";
//$chartYLabel = "2009 Sales";
//$chartYStep = 20000;
//
//$chartColours = array(
//                  array( 255, 100, 100 ),
//                  array( 100, 255, 100 ),
//                  array( 100, 100, 255 ),
//                  array( 255, 255, 100 ),
//                );
//*/
//$data = array(
//          array( $_POST['projectCoy'], $_POST['projectValue'], $_POST['projectStartDate'], $_POST['projectEndDate'] ),
//          array( $_POST['projectInflow'], $_POST['projectInflowVariance'], $_POST['projectOutflow'], $_POST['projectProfit']),
//        );
//
//// End configuration
//
//
///**
//  Create the title page
//**/
//require('..\..\Assets\fpdf.php');
//
//$pdf = new FPDF();
//$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
//$pdf->AddPage();
//
//// Logo
//$pdf->Image( $logoFile, $logoXPos, $logoYPos, $logoWidth );
//
//// Report Name
//$pdf->SetFont( 'Arial', 'B', 24 );
//$pdf->Ln( $reportNameYPos );
//$pdf->Cell( 0, 15, $reportName, 0, 0, 'C' );
//
//
///**
//  Create the page header, main heading, and intro text
//**/
//
//$pdf->AddPage();
//$pdf->SetTextColor( $headerColour[0], $headerColour[1], $headerColour[2] );
//$pdf->SetFont( 'Arial', '', 17 );
//$pdf->Cell( 0, 15, $reportName, 0, 0, 'C' );
//$pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
//$pdf->SetFont( 'Arial', '', 20 );
//$pdf->Write( 19,"A SUMMARY REPORT OF PROJECT ".$_POST['projectName'] );
//$pdf->Ln( 16 );
//$pdf->SetFont( 'Arial', '', 12 );
//
//
///**
//  Create the table
//**/
//
//$pdf->SetDrawColor( $tableBorderColour[0], $tableBorderColour[1], $tableBorderColour[2] );
//$pdf->Ln( 15 );
//
//// Create the table header row
//$pdf->SetFont( 'Arial', 'B', 15 );
//
//// "PRODUCT" cell
//$pdf->SetTextColor( $tableHeaderTopProductTextColour[0], $tableHeaderTopProductTextColour[1], $tableHeaderTopProductTextColour[2] );
//$pdf->SetFillColor( $tableHeaderTopProductFillColour[0], $tableHeaderTopProductFillColour[1], $tableHeaderTopProductFillColour[2] );
//$pdf->Cell( 46, 12, "S/NO", 1, 0, 'L', true );
//
//// Remaining header cells
//$pdf->SetTextColor( $tableHeaderTopTextColour[0], $tableHeaderTopTextColour[1], $tableHeaderTopTextColour[2] );
//$pdf->SetFillColor( $tableHeaderTopFillColour[0], $tableHeaderTopFillColour[1], $tableHeaderTopFillColour[2] );
//
//for ( $i=0; $i<count($columnLabels); $i++ ) {
//  $pdf->Cell( 36, 12, $columnLabels[$i], 1, 0, 'C', true );
//}
//
//$pdf->Ln( 12 );
//
//// Create the table data rows
//
//$fill = false;
//$row = 0;
//
//foreach ( $data as $dataRow ) {
//
//  // Create the left header cell
//  $pdf->SetFont( 'Arial', 'B', 15 );
//  $pdf->SetTextColor( $tableHeaderLeftTextColour[0], $tableHeaderLeftTextColour[1], $tableHeaderLeftTextColour[2] );
//  $pdf->SetFillColor( $tableHeaderLeftFillColour[0], $tableHeaderLeftFillColour[1], $tableHeaderLeftFillColour[2] );
//  $pdf->Cell( 46, 12, " " . $rowLabels[$row], 1, 0, 'L', $fill );
//
//  // Create the data cells
//  $pdf->SetTextColor( $textColour[0], $textColour[1], $textColour[2] );
//  $pdf->SetFillColor( $tableRowFillColour[0], $tableRowFillColour[1], $tableRowFillColour[2] );
//  $pdf->SetFont( 'Arial', '', 15 );
//
//  for ( $i=0; $i<count($columnLabels); $i++ ) {
//    $pdf->Cell( 36, 12, $dataRow[$i], 1, 0, 'C', $fill );
//  }
//
//  $row++;
//  $fill = !$fill;
//  $pdf->Ln( 12 );
//}
//
//
///***
//  Create the chart
//
//
//// Compute the X scale
//$xScale = count($rowLabels) / ( $chartWidth - 40 );
//
//// Compute the Y scale
//
//$maxTotal = 0;
//
//foreach ( $data as $dataRow ) {
//  $totalSales = 0;
//  foreach ( $dataRow as $dataCell ) $totalSales += $dataCell;
//  $maxTotal = ( $totalSales > $maxTotal ) ? $totalSales : $maxTotal;
//}
//
//$yScale = $maxTotal / $chartHeight;
//
//// Compute the bar width
//$barWidth = ( 1 / $xScale ) / 1.5;
//
//// Add the axes:
//
//$pdf->SetFont( 'Arial', '', 10 );
//
//// X axis
//$pdf->Line( $chartXPos + 30, $chartYPos, $chartXPos + $chartWidth, $chartYPos );
//
//for ( $i=0; $i < count( $rowLabels ); $i++ ) {
//  $pdf->SetXY( $chartXPos + 40 +  $i / $xScale, $chartYPos );
//  $pdf->Cell( $barWidth, 10, $rowLabels[$i], 0, 0, 'C' );
//}
//
//// Y axis
//$pdf->Line( $chartXPos + 30, $chartYPos, $chartXPos + 30, $chartYPos - $chartHeight - 8 );
//
//for ( $i=0; $i <= $maxTotal; $i += $chartYStep ) {
//  $pdf->SetXY( $chartXPos + 7, $chartYPos - 5 - $i / $yScale );
//  $pdf->Cell( 20, 10, '$' . number_format( $i ), 0, 0, 'R' );
//  $pdf->Line( $chartXPos + 28, $chartYPos - $i / $yScale, $chartXPos + 30, $chartYPos - $i / $yScale );
//}
//
//// Add the axis labels
//$pdf->SetFont( 'Arial', 'B', 12 );
//$pdf->SetXY( $chartWidth / 2 + 20, $chartYPos + 8 );
//$pdf->Cell( 30, 10, $chartXLabel, 0, 0, 'C' );
//$pdf->SetXY( $chartXPos + 7, $chartYPos - $chartHeight - 12 );
//$pdf->Cell( 20, 10, $chartYLabel, 0, 0, 'R' );
//
//// Create the bars
//$xPos = $chartXPos + 40;
//$bar = 0;
//
//foreach ( $data as $dataRow ) {
//
//  // Total up the sales figures for this product
//  $totalSales = 0;
//  foreach ( $dataRow as $dataCell ) $totalSales += $dataCell;
//
//  // Create the bar
//  $colourIndex = $bar % count( $chartColours );
//  $pdf->SetFillColor( $chartColours[$colourIndex][0], $chartColours[$colourIndex][1], $chartColours[$colourIndex][2] );
//  $pdf->Rect( $xPos, $chartYPos - ( $totalSales / $yScale ), $barWidth, $totalSales / $yScale, 'DF' );
//  $xPos += ( 1 / $xScale );
//  $bar++;
//}
//
//
// * /
//  Serve the PDF
//***/
//
//$pdf->Output( "report.pdf", "I" );

?>