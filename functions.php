<?php
$settings = require( "settings.php" );

$db = new PDO(
    dsn: "mysql:dbname=" . $settings ["dbname"],
    username: $settings ["username"], 
    password: $settings ["password"], 
);

function delete_user( int $user_id, PDO $db ): void {
    $stmt = $db->prepare( "DELETE FROM users WHERE id = :id" );
    
    $stmt->execute( [
        ":id" => $user_id,
    ] );
}

function get_orders( $db ) {
    return $db->query( "SELECT * FROM orders" )->fetchAll();

}

function add_order( $company, $comment, $db ) {
   $stmt = $db->prepare("INSERT INTO orders (company, comment) VALUES (?, ?)");
    $stmt->execute([ $company, $comment ]); 
}


function user_id_exists( string $user_id, PDO $db ): bool {
    $stmt = $db->prepare( "SELECT id FROM users WHERE id = :id LIMIT 1" );

    $stmt->execute( [
        ":id" => $user_id, 
    ] );

    $user = $stmt->fetch( PDO::FETCH_ASSOC);

    if( ! $user ) {
        return false;
    } else {
        return true;
    }
}

function get_current_user_id(): ?int {
    return $_SESSION["user_id"] ?? null;
}

function username_exists( string $username, PDO $db ): bool {
    $stmt = $db->prepare( "SELECT id  FROM users WHERE username = :username LIMIT 1" );

    $stmt ->execute( [
        ":username" => $username 
    ] );

    $user = $stmt ->fetch ( PDO::FETCH_ASSOC);
    if( ! $user ) {
        return false;
    } else {
        return true;
    }
}

function add_user ( User $user, PDO $db ): int {
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
        ":username" => $user->username,
        ":password" => password_hash( $user->password, PASSWORD_DEFAULT ),
    ] );

    return $db->lastInsertId();
}

/**
 * @return array<User>
 */
function get_users( PDO $db ): array {
    $stmt = $db->query( "SELECT id, username, password FROM users ORDER BY username" );

    $results = $stmt->fetchAll( PDO::FETCH_ASSOC );

    $users = [];

    foreach( $results as $result ) {
        $user = new User (
            username: $result["username"],
            password: $result["password"],
            id: $result["id"],
        );

        $users[] = $user;
    }

    return $users;
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


