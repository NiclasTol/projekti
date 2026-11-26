<?php
$message = "";

if( $_SERVER["REQUEST_METHOD"] === "POST" ) {
    $username = trim( Request::post_string( "username" ) );
    $password = trim( Request::post_string( "password" ) );

    if( strlen( $username ) < 4 ) {
        $message= "käyttäjänimi on liian lyhyt";
    } elseif( strlen( $password ) < 8 ) {
        $message = "salasana on liian lyhyt";
    } elseif( username_exists( $username, $db ) ) {
        $message = "Käyttäjänimi on jo käytössä";
    } else {
        $user = new User(
            username: $username,
            password: $password,

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