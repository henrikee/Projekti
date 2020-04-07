<?php
//Painoindeksi =paino jaettuna pituuden neliöllä, koska pituus on cm jako tehdään 10000
function getBmi($weight, $height){
    $doublebmi = $weight/(($height*$height)/10000);
    //tulostetaan painoindeksi vain kaksidesimaalisena lukuna
    $doublebmi = number_format($doublebmi, 2);
    return $doublebmi;
}

//Yli- ja alipainovaroitukset ikä huomioon ottaen: lähteet https://www.terveyskirjasto.fi/terveyskirjasto/tk.koti?p_artikkeli=dlk01001 ja https://www.terveyskirjasto.fi/terveyskirjasto/tk.koti?p_artikkeli=dlk01153
function getBmiWarning($bmi, $age){
    while($age > 64){
        if($bmi > 40){
            return "Ylipainosi on todella vaarallista.";
        }
        if($bmi > 37){
            return "Sinulla on vaarallisen paljon ylipainoa.";
        }
        if($bmi > 32){
            return "Sinulla on merkittävää ylipainoa.";
        }
        if($bmi > 28){
            return "Sinulla on lievää ylipainoa.";
        }
        if($bmi < 23){
            return "Sinulla on lievää alipainoa.";
        }
        if($bmi < 22){
            return "Sinulla on merkittävää alipainoa.";
        }
        if($bmi < 19){
            return "Alipainosi on todella vaarallista.";
        }else{
            return "Painosi on juuri sopiva!";
        }
    }
    while($age < 65){
        if($bmi > 40){
            return "Ylipainosi on todella vaarallista.";
        }
        if($bmi > 35){
            return "Sinulla on vaarallisen paljon ylipainoa.";
        }
        if($bmi > 30){
            return "Sinulla on merkittävää ylipainoa.";
        }
        if($bmi > 25){
            return "Sinulla on lievää ylipainoa.";
        }
        if($bmi < 19){
            return "Sinulla on lievää alipainoa.";
        }
        if($bmi < 18){
            return "Sinulla on merkittävää alipainoa.";
        }
        if($bmi < 15){
            return "Alipainosi on todella vaarallista.";
        }else{
            return "Painosi on juuri sopiva!";
        }
    }
}
//Keskivartalolihavuuden varoitukset ikä ja sukupuoli huomioon ottaen
function getWaistCircuitWarning($wasteCircuit, $gender, $age){
    //lihava keskivartalo varoitukset yli 64v.
    while($age > 64){
        if($gender=="mies" && $wasteCircuit>105 || ($gender=="nainen" || $gender=="muu") && $wasteCircuit>95 ){
            return "Sinulla on lievää keskivartalolihavuutta.";
        }
        if($gender=="mies" && $wasteCircuit>115 || ($gender=="nainen" || $gender=="muu") && $wasteCircuit>105 ){
            return "Keskivartalolihavuutesi saattaa aiheuttaa terveysriskin.";
        }
        if($gender=="mies" && $wasteCircuit>125 || ($gender=="nainen" || $gender=="muu") && $wasteCircuit>115 ){
            return "Keskivartalolihavuutesi aiheuttaa terveysriskin.";
        }
    //kapea keskivartalo varoitukset yli 64v
        if($gender=="mies" && $wasteCircuit<95 || ($gender=="nainen" || $gender=="muu") && $wasteCircuit<85 ){
            return "Vyötärösi on kapeahko. Tarkista, että painoindeksisi on terveen rajoissa.";
        }
        if($gender=="mies" && $wasteCircuit<90 || ($gender=="nainen" || $gender=="muu") && $wasteCircuit<80 ){
            return "Vyötärösi kapeus saatta kertoa alipainosta. Tarkista painoindeksisi, sillä alipaino on ikäihmiselle vaarallista.";
        }else{
            return "Keskivartalosi on oikein sopusuhtainen. Hyvää työtä!";
        }
    }
    //lihava keskivartalo varoitukset alle 64v.
    while($age < 65){
        if($gender=="mies" && $wasteCircuit>100 || ($gender=="nainen" || $gender=="muu") && $wasteCircuit>90){
            return "Sinulla on lievää keskivartalolihavuutta.";
        }
        if($gender=="mies" && $wasteCircuit>105 || ($gender=="nainen" || $gender=="muu") && $wasteCircuit>95){
            return "Keskivartalolihavuutesi saattaa aiheuttaa terveysriskin.";
        }
        if($gender=="mies" && $wasteCircuit>110 || ($gender=="nainen" || $gender=="muu") && $wasteCircuit>100 ){
            return "Keskivartalolihavuutesi aiheuttaa terveysriskin.";
        }
    //kapea vyötärö varoitukset alle 65v
        if($gender=="mies" && $wasteCircuit<90 || ($gender=="nainen" || $gender=="muu") && $wasteCircuit<80 ){
            return "Vyötärösi on kapeahko. Tarkista, että painoindeksisi on terveen rajoissa.";
        }
        if($gender=="mies" && $wasteCircuit<85 || ($gender=="nainen" || $gender=="muu") && $wasteCircuit<75 ){
            return "Vyötärösi kapeus saatta kertoa alipainosta. Tarkista painoindeksisi, sillä alipaino on ikääntyvälle vaarallista.";
        }else{
            return "Keskivartalosi on oikein sopusuhtainen. Hyvää työtä!";
        }
    }
}
   //Verenpainevaroitus, ok jos systolic alle 130 ja diastolic alle 90 ?
function getBloodPressureWarning($systolic, $diastolic){
      if($systolic<130 && $diastolic <85){
         return "Verenpaineesi on kunnossa!";
      }
      if($systolic>129 && $systolic<140 && $diastolic>85 && $diastolic<90){
        return "Verenpaineesi on tyydyttävä.";
     }
     if($systolic>139 && $systolic<160 && $diastolic>89 && $diastolic<100){
        return "Verenpaineesi on lievästi koholla.";
     }
     if($systolic>159 && $systolic<180 && $diastolic>99 && $diastolic<110){
        return "Verenpaineesi on melko kohonnut.";
     }
     if($systolic>179 && $diastolic>109){
        return "Verenpaineesi on huomattavasti koholla.";
     }else{
         return "Verenpaineesi on koholla."; 
     }
}
?>
