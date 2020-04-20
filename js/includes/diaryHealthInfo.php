<?php
include("header.php");  //yhteysolio
include("forms/healthForm.php");
include_once("functions/healthyCalculator.php");
?>
<!doctype html>

<html lang="en">
<head>
<title>Terveystietolomake</title>
<meta charset="UTF-8"/>
</head>
<body>
    <div></div>
    welcome
    <?php 
    echo("<p>** User: " .$_SESSION['suserName']. " " . $_SESSION['suserEmail']);
    
    ?>
    
<?php
    //Tallennetaanko terveystiedot
    if(isset($_POST['submitHealthydata'])){
        if($_POST['givenAge'] > 64 && $_POST['givenHeight'] > 50 && $_POST['givenHeight'] <= 250 && $_POST['givenWeight'] >= 4.5 && $_POST['givenWeight'] <= 250 && $_POST['givenWaistCircuit'] >= 30 && $_POST['givenWaistCircuit'] <= 250 && $_POST['givenSystolic'] >= 50 && $_POST['givenSystolic']<=250 && $_POST['givenDiastolic'] >= 50 && $_POST['givenDiastolic'] <= 250){
            $_SESSION['gender'] = $_POST['givenGender'];
            $_SESSION['age'] = $_POST['givenAge'];
            $_SESSION['height'] = $_POST['givenHeight'];
            $_SESSION['weight'] = $_POST['givenWeight'];
            $_SESSION['waistCircuit'] = $_POST['givenWaistCircuit'];
            //lasketaan bmi, bmin varoitus ja vyötärömitan varoitus, bmi vaikuttaa onko henkilö yli 65v
            $_SESSION['bmi']= getBmi($_SESSION['weight'],$_SESSION['height']);
            $_SESSION['bmiWarning']= getBmiWarning($_SESSION['bmi'],$_SESSION['age']);
            $_SESSION['waistCircuitWarning'] = getWaistCircuitWarning($_SESSION['waistCircuit'],$_SESSION['gender'],$_SESSION['age']);
            $_SESSION['systolic'] = $_POST['givenSystolic'];
            $_SESSION['diastolic'] = $_POST['givenDiastolic'];
            $_SESSION['bloodPressureWarning'] = getBloodPressureWarning($_SESSION['systolic'],$_SESSION['diastolic']);
        }else{
            echo("Anna ikä 55-100, pituus 50-250cm, paino 4.5-200 kg, vyötärön ympärys 30-200 cm, verenpaineet 50-250");
        }
    }
    //Tulostetaan terveystiedot jos bmi on laskettu
    if(isset($_SESSION['bmi'])){
        echo("<h2>Terveystietolomakkeelle syötetyt tiedot:</h2>");
        echo("<p>Ikä: " . $_SESSION['age']."<br />");
        echo("<p>Paino kg: " . $_SESSION['weight']."<br />");
        echo("<Pituus m: " . $_SESSION['height']."<br />");
        echo("Painoindeksi: " . $_SESSION['bmi']."<br />");
        echo(" - " . $_SESSION['bmiWarning'] ."<br />");
        echo("Vyötärönympärys cm : " . $_SESSION['waistCircuit']."<br />");
        echo(" - ". $_SESSION['waistCircuitWarning'] ."<br/>");
        echo("Yläpaine Hgmm: " . $_SESSION['systolic']."<br />");
        echo("Alapaine Hgmm: " . $_SESSION['diastolic']."</p><hr />");
     }
?>
<?php
    include("forms/saveHealthFormData.php");
    if(isset($_POST['buttonSave']) && strlen($_SESSION['name']) >=2){
        echo("Tiedot tallennettu onnistuneesti.");
    }
    //Halutaanko tuhota sessiomuuttujiin tallennetut tiedot ja poistaa sessio pois käytöstä?
    if(isset($_POST['buttonDestroy'])){
        session_unset();
        session_destroy();
    //Palataan takaisin tälle samalle sivulle jolloin sessio käynnistyy uudelleen
        header("Location: " . $_SERVER['PHP_SELF']);
    }
?>
<?php
 //kirjautuneen käyttäjän userID?
    $data1['email'] = $_SESSION['suserEmail'];
    $sql1 = "SELECT userID FROM testi_projekti where userEmail =  :email";
    $kysely1=$DBH->prepare($sql1);
    $kysely1->execute($data1);
    $tulos1=$kysely1->fetch();
    $currentUserID=$tulos1[0];
    echo"rivi 76 $currentUserID";
    $_SESSION['userID']=$currentUserID;
    ?>

    
<?php
if(isset($_POST['submitHealthydata'])){
   try {
       echo"rivi 82";
       var_dump($_SESSION);
        $data2['userID']=$_SESSION['userID'];
        $data2['gender']=$_POST['givenGender'];
        $data2['age']=$_POST['givenAge'];
        $data2['height']=$_POST['givenHeight'];
        $data2['weight']=$_POST['givenWeight'];
        $data2['bmi']=getBmi($_POST['givenWeight'],$_POST['givenHeight']);
        $data2['bmiWarning']=getBmiWarning($data2['bmi'],$_POST['givenAge']);
        $data2['waistCircuit']=$_POST['givenwaistCircuit'];
        $data2['waistCircuitWarning']=getWaistCircuitWarning($_POST['givenWaistCircuit'],$_POST['givenGender'],$_POST['givenAge']);
        $data2['systolic']=$_POST['givenSystolic'];
        $data2['diastolic']=$_POST['givenDiastolic'];
        $data2['bloodPressureWarning']=getBloodPressureWarning($_POST['givenSystolic'],$_POST['givenDiastolic']);
        echo" rivi 94";
        var_dump($data2);
    $sql2="INSERT INTO testi_projekti_terveystiedot ('userID','gender', 'age', 'height', 'weight', 'bmi', 'bmiWarning', 'waistCircuit', 'waistCircuitWarning', 'systolic', 'diastolic', 'bloodPressureWarning')
    VALUES (:UserId: gender, :age, :height, :weight, :bmi, :bmiWarning, :waistCircuit, :waistCircuitWarning, :systolic, :diastolic, :bloodPressureWarning);";
     $kysely2 = $DBH->prepare($sql2); 
     $kysely2->execute($data2);
   } catch(PDOException $e) {
    file_put_contents('log/DBErrors.txt', 'index.php: '.$e->getMessage()."\n", FILE_APPEND);
   }
  }
?>


<hr/>
</body>
</html>