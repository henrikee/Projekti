<?php
include("includes/navLogin.php");
include("includes/boxLogin.php");
include("includes/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Document</title>
</head>
<body>
<?php
//Lomakkeen submit painettu?
if(isset($_POST['submitUser'])){
  //***Tarkistetaan email myös palvelimella
  if(!filter_var($_POST['givenEmail'], FILTER_VALIDATE_EMAIL)){
   $_SESSION['swarningInput']="Illegal email";
  }else{
    unset($_SESSION['swarningInput']);  
     try {
      //Tiedot kannasta, hakuehto
      $data['email'] = $_POST['givenEmail'];
      $STH = $DBH->prepare("SELECT userName, userEmail, userPwd FROM wsk_projekti WHERE userEmail = :email;");
      $STH->execute($data);
      $STH->setFetchMode(PDO::FETCH_OBJ);
      $tulosOlio=$STH->fetch();
      //lomakkeelle annettu salasana + suola
      $givenPasswordAdded = $_POST['givenPassword'].$added; //$added löytyy config.php
 
       //Löytyikö email kannasta?   
       if($tulosOlio!=NULL){
          //email löytyi
         // var_dump($tulosOlio);
          if(password_verify($givenPasswordAdded,$tulosOlio->userPwd)){
              $_SESSION['sloggedIn']="yes";
              $_SESSION['suserName']=$tulosOlio->userName;
              $_SESSION['suserEmail']=$tulosOlio->userEmail;
              header("Location: Main.php"); //Palataan pääsivulle kirjautuneena
          }else{
            $_SESSION['swarningInput']="Wrong password";
          }
      }else{
        $_SESSION['swarningInput']="Wrong email";
      }
     } catch(PDOException $e) {
        file_put_contents('log/DBErrors.txt', 'createAccount.php: '.$e->getMessage()."\n", FILE_APPEND);
        $_SESSION['swarningInput'] = 'Database problem';
    }
  }
}
?>

<?php
//***Luovutetaanko ja palataan takaisin pääsivulle alkutilanteeseen
//ilma  rekisteröintiä?
if(isset($_POST['submitBack'])){
  session_unset();
  session_destroy();
  header("Location: signup.php");
}
?>

<?php
  //***Näytetäänkö lomakesyötteen aiheuttama varoitus?
if(isset($_SESSION['swarningInput'])){
  echo("<p class=\"warning\">ILLEGAL INPUT: ". $_SESSION['swarningInput']."</p>");
}
?>

</body>
</html>