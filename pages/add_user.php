<?php
$message = "";

if( isset( $_POST["username"]) && isset ( $_POST["password"] ) ) {
   if( username_exists( $_POST["username"], $db ) ) {
        $message = "Käyttäjänimi on jo käytössä";
   } else {
    $user = new User(
       username: $_POST["username"],
       password: $_POST["password"],

    );
        add_user( $user, $db );
        $message = "käyttäjä lisätty";

   }
}
?>

<h3>Lisää käyttäjä</h3>
<?php echo $message;
 ?>
<form method='post'>
    Käyttäjänimi: <input type="text" name="username" /><br />
    Salasana: <input type="password" name="password" /><br />
    <button> Lisää käyttäjä </button>

</form>