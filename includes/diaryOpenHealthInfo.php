<?php
include("header.php"); 
?>

<!doctype html>

<html lang="en">
<head>
<title>Terveystietolomake</title>
<meta charset="UTF-8"/>
</head>
<body>
    <div></div>
    <?php
        echo $_SESSION['username'];
    ?>
    <?php


$sql="SELECT gender, age, height, weight, bmi, bmiWarning, waistCircuit, waistCircuitWarning, systolic, diastolic, bloodPressureWarning FROM testi_projekti_terveystiedot WHERE userID = '".$_SESSION['userID']."'";
$kysely=$DBH->prepare($sql);                
$kysely->execute();
    echo("<br><table class='hdata'>
        <tr>
            <th class='HDth'>Sukupuoli</th>
            <th class='HDth'>Ikä</th>
            <th class='HDth'>Pituus</th>
            <th class='HDth'>Paino</th>
            <th class='HDth'>Painoindeksi</th>
            <th class='HDth'>Paino arvio</th>
            <th class='HDth'>Vyötärönympärys</th>
            <th class='HDth'>Vyötärönympärys arvio</th>
            <th class='HDth'>Verenpaineen yläpaine</th>
            <th class='HDth'>Verenpaine alapaine</th>
            <th class='HDth'>Verenpaine arvio</th>
            
        </tr>");
    while ($row=$kysely->fetch()){   
        
            echo("<tr>
            <td class='HDtd'>".$row["gender"]."</td>
            <td class='HDtd'>".$row["age"]."</td>
            <td class='HDtd'>".$row["height"]."</td>
            <td class='HDtd'>".$row["weight"]."</td>
            <td class='HDtd'>".$row["bmi"]."</td>
            <td class='HDtd'>".$row["bmiWarning"]."</td>
            <td class='HDtd'>".$row["waistCircuit"]."</td>
            <td class='HDtd'>".$row["waistCircuitWarning"]."</td>
            <td class='HDtd'>".$row["systolic"]."</td>
            <td class='HDtd'>".$row["diastolic"]."</td>
            <td class='HDtd'>".$row["bloodPressureWarning"]."</td>");
           echo("</tr>");

           
        }
    echo("</table>");

?>