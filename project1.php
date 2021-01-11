<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    #slides{height:400px;}
.mySlides {
    display:none;
    width:100%;
    height:400px;
}
</style>
</head>
<div id="slides" class="w3-content w3-section" style="max-width:100%; margin:0;">
    <img class="mySlides" src="src/images/construction1.jpeg" alt="pix1">
  <img class="mySlides" src="src/images/construction2.jpeg" alt="pix2">
  <img class="mySlides" src="src/images/construction3.jpeg" alt="pix3">
</div>
<hr>
<div style="width:100%;">
    <table style="width:100%">
        <tr>
            <td>Project Description</td>
            <td id="descrp1"></td>
        </tr>
        <tr>
            <td>Client:</td>
            <td>Purechem Industries Limited</td>
        </tr>
        <tr>
            <td>Location</td>
            <td>Onigbedu, Ewekoro LGA, Ogun State</td>
        </tr>
        <tr>
            <td>Project Duration</td>
            <td></td>
        </tr>
    </table>
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 1 seconds
}
</script>
