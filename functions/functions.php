<?php
//Painoindeksi =paino jaettuna pituuden neliöllä
function getBmi($weight, $height){
    return $weight/($height*$height);
}

//Ylipainovaroitus jos bmi >25
function getBmiWarning($bmi){
    if($bmi>25){
        return "ylipaino";
    }else{
        return "ei ylipainoa";
    }
}
//Vyötärön pulleusvaroitus: naiset ja muut yli 90 cm, miehet yli 100 cm
function getWaistCircuitWarning($wasteCircuit, $gender){
   if($gender=="mies" && $wasteCircuit>100
       ||($gender=="nainen" || $gender=="muu") && $wasteCircuit>90 ){
       return "pullea vyötärö";
   }else{
       return "normaali vyötärö";
   }
}
   //Verenpainevaroitus, ok jos systolic alle 130 ja diastolic alle 90 ?
function getBloodPressureWarning($systolic, $diastolic){
      if($systolic<130 && $diastolic <90){
         return "paineet kunnossa";
      }else{
         return "paineet koholla"; 
     }
}
?>