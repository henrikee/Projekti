<?php
include("header.php");
include("forms/formDiary.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Päiväkirjamerkintä</title>
</head>
<body>
<?php
    echo $_SESSION['username'];
?>
<?php 
//Tallennetaan merkintä päiväkirjaan
if(isset($_POST['submitEx'])){
    $_SESSION['fDate'] = $_POST['givenDate'];
    $_SESSION['fExercise'] = $_POST['givenEx'];
    $_SESSION['fLength'] = $_POST['givenLength'];
    $_SESSION['fPulse'] = $_POST['givenPulse'];
    $_SESSION['fMeal'] = $_POST['givenMeal'];
    $_SESSION['fSleep'] =$_POST['givenSleep'];
    $_SESSION['fSleepLength'] = $_POST['givenSleepLength'];
}
?>
<?php
//tiedot Tietokantaan?
?>


<?php
 if(isset($_POST['ResetEx'])){
    session_unset();
    session_destroy();
//Palataan takaisin tälle samalle sivulle jolloin sessio käynnistyy uudelleen
    header("Location: " . $_SERVER['PHP_SELF']);
}
?>
</body>
</html>