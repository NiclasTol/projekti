<?php
$message = "";
if( isset( $_POST["company"]) && isset ( $_POST["comment"] ) ) {
   add_order ($_POST["company"], $_POST["comment"], $db );
   $message = "Tilaus lisätty";
}
?>

<h3>Lisää tilaus</h3>
<?php echo $message;
 ?>
<form method='post'>
    Yritys: <input type="text" name="company" /><br />
    Kommentti: <input type="text" name="comment" /><br />
    <button> Lisää tilaus </button>

</form>