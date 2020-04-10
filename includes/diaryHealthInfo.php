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
    <?php
        echo $_SESSION['username'];
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
// Halutanko talletetaa tiedot kantaan?
if(isset($_POST['submitHealthydata'])){
    //Parametrit taulukkona array
    $data = ['gender'=> $_SESSION['gender'],
        'age'=> $_SESSION['age'],
        'height'=>$_SESSION['height'],
        'weight'=>$_SESSION['weight'],
        'bmi'=>$_SESSION['bmi'],
        'bmiWarning'=>$_SESSION['bmiWarning'],                    
        'waistCircuit'=>$_SESSION['waistCircuit'],
        'waistCircuitWarning'=>$_SESSION['waistCircuitWarning'],
        'systolic'=>$_SESSION['systolic'],
        'diastolic'=>$_SESSION['diastolic'],
        'bloodPressureWarning'=>$_SESSION['bloodPressureWarning']];
    
    try{
      //kysely
       $stmt = $DBH->prepare("INSERT INTO wsk_projekti_terveystiedot (gender, age, height, weight, bmi, bmiWarning, waistCircuit, waistCircuitWarning, systolic, diastolic, bloodPressureWarning)
      VALUES (:gender, :age, :height, :weight, :bmi, :bmiWarning, :waistCircuit, :waistCircuitWarning, :systolic, :diastolic, :bloodPressureWarning);");
      $stmt->execute($data);
    
      session_unset();
      session_destroy();
      //Palataan takaisin tälle sivulle
      header("Location: ". $_SERVER['PHP_SELF']);
    }catch(PDOException $e){
        echo "Tallennusvirhe: " . $e->getMessage(); 
        file_put_contents('log/DBErrors.txt', 'DB saving: '.$e->getMessage()."\n", FILE_APPEND);
    }
}
?>
<hr/>
</body>
</html>