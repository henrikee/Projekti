<?php
include("includes/navSignup.php");
include("includes/header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/signup.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <title>Document</title>
</head>

<body>
  <div class="boxCreateAccount">
    <?php
    include("forms/formSignup.php");
    ?>
  </div>
    <!-- Lab 6 ja 3 koodit, tietenkin muokattu jotta toimii uusilla parametreilla -->
    <!-- Lab 6 and 3 codes modified in a way that it works with new parameters -->
  <?php
  //Lomakkeen submit painettu?
  //Is submit pressed?
  if (isset($_POST['submitUser'])) {
    //Tarkistetaan syötteet myös palvelimella
    //Checking input from server
    if (strlen($_POST['givenUsername']) < 4) {
      $_SESSION['swarningInput'] = "Illegal username (min 4 chars)";
    } else if (!filter_var($_POST['givenEmail'], FILTER_VALIDATE_EMAIL)) {
      $_SESSION['swarningInput'] = "Illegal email";
    } else if (strlen($_POST['givenPassword']) < 8) {
      $_SESSION['swarningInput'] = "Illegal password (min 8 chars)";
    } else if ($_POST['givenPassword'] != $_POST['givenPasswordVerify']) {
      $_SESSION['swarningInput'] = "Given password and verified not same";
    } else {
      unset($_SESSION['swarningInput']);
      //1. Tiedot sessioon
      //1. Data to the session
      $_SESSION['suserName'] = $_POST['givenUsername'];
      $_SESSION['sloggedIn'] = "yes";
      $_SESSION['semail'] = $_POST['givenEmail'];

      //2. Tiedot kantaan
      //2. Data to the server
     $data['name'] = $_POST['givenUsername'];
      $data['email'] = $_POST['givenEmail'];
      $added = '#â‚¬%&&/'; //suolataan annettu salasana/ add salt to the burned area
      $data['pwd'] = password_hash($_POST['givenPassword'] . $added, PASSWORD_BCRYPT);
      try {
        //***Email ei saa olla käytetty aiemmin
        //***Email must be new
        $sql = "SELECT COUNT(*) FROM testi_projekti where userEmail  =  " . "'" . $_POST['givenEmail'] . "'";
        $kysely = $DBH->prepare($sql);
        $kysely->execute();
        $tulos = $kysely->fetch();
        if ($tulos[0] == 0) { //email ei ole käytössä/email isnt used
          $STH = $DBH->prepare("INSERT INTO testi_projekti (userName, userEmail, userPwd) VALUES (:name, :email, :pwd);");
          $STH->execute($data);
          header("Location: Main.php"); //Palataan pääsivulle kirjautuneena/return to the mainpage
        } else {
          $_SESSION['swarningInput'] = "Email is reserved";
        }
      } catch (PDOException $e) {
        file_put_contents('log/DBErrors.txt', 'signInUser.php: ' . $e->getMessage() . "\n", FILE_APPEND);
        $_SESSION['swarningInput'] = 'Database problem';
      }





      //Luovutetaanko ja palataan takaisin pääsivulle alkutilanteeseen
      //Do we give up and return to the mainpage
      if (isset($_POST['submitBack'])) {
        session_unset();
        session_destroy();
        header("Location: signup.php");
      }
    }
    if (isset($_SESSION['swarningInput'])) {
      echo ("<h2>" . $_SESSION['swarningInput'] . "</h2>");
    }
  }
  ?>




</body>

</html>