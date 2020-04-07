<?php
include("includes/navMain.php");
include("includes/header.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html lang="en">
<head>
    <title>Päiväkirja</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/diary.css">
    <link href="themes/light.css" rel="stylesheet" />
</head>
<body>
<span id="date"></span>
<header>
    <h1>Päiväkirja</h1>
    <h3>Tee merkintä kalenteriin painamalla halutusta päivästä.</h3>
</header>
<section>
<div id="calendar" style="position: absolute; width: 70%; height: 60%;"></div>
<div>
    <form method="get">
        <button class="infoformbtn" type="submit" value="Täytä terveystiedot" name="buttonFillHealthInfo">Täytä terveystietolomake</button>
    </form>
    <?php
        if(isset($_GET['buttonFillHealthInfo'])){
            include("includes/diaryHealthInfo.php");
        }
    ?>
</div>
</section>


<script src="js/MindFusion.Scheduling.js" type="text/javascript"></script>
<script src="js/GoogleSchedule.js" type="text/javascript"></script>
<script src="js/TimeForm.js" type="text/javascript"></script>
<script>
    var date = new Date();
    document.getElementById("date").innerHTML = "Tänään on "+date.getDate()+'.'+(date.getMonth()+1)+'.'+date.getFullYear();
    

//avaa kalenteri
  //  function openCalendar(){
  //      var x = document.getElementById("calendar");
  //      if (x.style.display === "none") {
  //      x.style.display = "block";
  //      }else{
  //      x.style.display = "none";
  //      }
  //  }

//???olisiko tämä funktio mitä käytetään päiväkirjamerkintöjen etsimiseen????
//getDiaryEntry.php tekemättä -> vaatii databasen
    function showDiaryEntry(str) {
        var xhttp;  
        if (str == "") {
        document.getElementById("diaryEntry").innerHTML = "";
        return;
        }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("diaryEntry").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "getDiaryEntry.php?q="+str, true);
    xhttp.send();
    }
</script>
<a id="link" href="http://MindFusion.Scheduling.js">http://MindFusion.Scheduling.js</a>
<a id= "link" href="http://GoogleSchedule.js">http://GoogleSchedule.js</a>
</body>
</html>