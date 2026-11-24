<?php 
require ( "functions.php");


$message = "";
 
    if ( isset( $_POST["username"]) && isset( $_POST ["password"] ) ) {
        $user_id = authenticate_user ( $_POST["username"], $_POST["password"], $db );

        if( !$user_id) {
            $message = "Käyttäjätunnus tai salasana väärin";         
        } else {
            $message = "Tervetuloa!";
            $_SESSION["user_id"] = $user_id;

              header ( "Location: /");
            exit;
    }
    }
?>

<!DOCTYPE html>
<html lang="fi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kirjautuminen</title>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
}
form {
  width: 300px;
  margin: 80px auto;
  padding: 20px;
  background-color: white;
  border: 1px solid #ccc;
  border-radius: 8px;
}
h1 {
  text-align: center;
}
label {
  display: block;
  margin-top: 10px;
}
input[type="text"], input[type="password"] {
  width: 100%;
  padding: 8px;
  margin-top: 5px;
  box-sizing: border-box;
}
button {
  width: 100%;
  margin-top: 20px;
  padding: 10px;
  background-color: #2c7be5;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
button:hover {
  background-color: #1a5fc0;
}
#viesti {
  margin-top: 15px;
  text-align: center;
}
</style>
</head>
<body>

<form method="post" action="/">
<h1>Kirjaudu sisään</h1>

<label for="username">Käyttäjätunnus:</label>
<input type="text" name="username" required>

<label for="password">Salasana:</label>
<input type="password" name="password" required>

<button type="submit">Kirjaudu</button>

<p id="viesti">
        <?php echo $message;  ?>
    
       
</p>
</form>

</body>
</html>