<?php

$users = get_users( $db );
?>

<h3>Käyttäjät</h3>

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
            <a href="/index.php?page=users&delete=' .  $user["id"] .  '">Poista</a>
         </td>
     </tr>
     ';
}
?>
  
</table>

