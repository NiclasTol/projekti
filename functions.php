<?php
$db = new PDO(
    dsn: "mysql:dbname=projekti",
    username:  "testiprojekti", 
    password: "Mansikka123", 
);
function add_user ( string $username, string $password, PDO $db ): int {
    $stmt = $db->prepare( "
INSERT INTO users (
    username, 
    password
    ) VALUES (
     :username, 
     :password
     
     )
" );
$stmt->execute( [
    ":username" => $username ,
     ":password" => password_hash( $password, PASSWORD_DEFAULT ),
] );

    return $db->lastInsertId();
}
function authenticate_user( string $username, string $password, PDO $db ): ?int {
     $stmt = $db->prepare( "SELECT id, password FROM users WHERE username = :username LIMIT 1" );

$stmt ->execute( [
    ":username" => $username 
] );

    $user = $stmt ->fetch ( PDO::FETCH_ASSOC);
    if( ! $user) {
        return null;
    }
   if( ! password_verify( $password, $user ["password"] ) ) {
    return null;
   }
   
   return $user ["id"];
}


