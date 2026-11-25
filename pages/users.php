<?php
$message = "";
if (  isset( $_GET["delete"] ) ) {
    $user_id = intval( $_GET["delete"] );

    if( $user_id === get_current_user_id()) {
        $message = "Et voi poistaa itseäsi!";
    }  elseif( ! user_id_exists( $user_id, $db ) ) {
        $message = "Käyttäjää ei löydy";
    } else {
        delete_user( $user_id, $db );
        $message = "Käyttäjä poistettu";
    }
}

$users = get_users( $db );
?>

<h3>Käyttäjät</h3>

<?php echo $message; ?>

<p><a href="/index.php?page=add_user">Lisää uusi käyttäjä</a></p>
<table border="1" cellpadding="5">
    <tr>
        <th>Nimi</th>
        <th>Toiminnot</th>
    </tr>
    <?php 
foreach (  $users as $user ) {
    echo '
       <tr>
            <td>'. htmlspecialchars( $user["username"] ) . '</td>
         <td>
            <a href="/index.php?page=users&delete=' . intval (  $user["id"] ) .  '">Poista</a>
         </td>
     </tr>
     ';
}
?>
  
</table>

