<?php
include("header.php"); 

$sql="SELECT wsk_projekti_terveystiedot (gender, age, height, weight, bmi, bmiWarning, waistCircuit, waistCircuitWarning, systolic, diastolic, bloodPressureWarning, timeOfMeasurement FROM wsk_projekti_terveystiedot";
$kysely=$DBH->prepare($sql);                
$kysely->execute();
    echo("<br><table>
        <tr>
            <th>Sukupuoli</th>
            <th>Ikä</th>
            <th>Pituus</th>
            <th>Paino</th>
            <th>Painoindeksi</th>
            <th>Paino arvio</th>
            <th>Vyötärönympärys</th>
            <th>Vyötärönympärys arvio</th>
            <th>Verenpaineen yläpaine</th>
            <th>Verenpaine alapaine</th>
            <th>Verenpaine arvio</th>
            <th>Ajankohta</th>
        </tr>");
    while ($row=$kysely->fetch()){    
            echo("<tr><td>".$row["gender"]."</td>
            <td>".$row["age"]."</td>
            <td>".$row["height"]."</td>
            <td>".$row["weight"]."</td>
            <td>".$row["bmi"]."</td>
            <td>".$row["bmiWarning"]."</td>
            <td>".$row["waistCircuit"]."</td>
            <td>".$row["waistCircuitWarning"]."</td>
            <td>".$row["systolic"]."</td>
            <td>".$row["diastolic"]."</td>
            <td>".$row["bloodPressureWarning"]."</td>
            <td>".$row["timeOfMeasurement"]."</td>");
        }
    echo("</table>");

?>