<?php
$message = "";

if( $_SERVER["REQUEST_METHOD"] === "POST" ) {
    $company = trim( Request::post_string( "company" ) );
    $comment = trim( Request::post_string( "comment" ) );

    if( strlen( $company ) === 0 ) {
        $message = "Yritys puuttuu";
    } elseif( strlen( $comment ) === 0 ) {
        $message = "Kommentti puuttuu";
    } else {
        $order = new Order(
            company: $company,
            comment: $comment,
        );

        add_order( $order, $db );
        $message = "Tilaus lisätty";
    }
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