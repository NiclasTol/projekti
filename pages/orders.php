<?php
$orders = get_orders ( $db );
?>

<h3>Tilaukset</h3>
<p><a href="/index.php?page=add_order">Lisää uusi tilaus</a></p>
<table border="1" cellpadding="5">
    <tr>
        <th>Yritys</th>
        <th>Kommentti</th>
    </tr>
    <?php 
foreach (  $orders as $order ) {
    echo '
       <tr>
            <td>'. htmlspecialchars( $order["company"] ) . '</td>
            <td>'. htmlspecialchars( $order["comment"] ) . '</td>
         
     </tr>
     ';
}
?>
  
</table>