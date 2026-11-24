<?php
require_once __DIR__ . "/../functions.php";

$users = get_users( $db );
?>

<h3>Käyttäjät</h3>

<p><a href="/index.php?page=add_user">Lisää uusi käyttäjä</a></p>

<?php if ( empty( $users ) ): ?>
    <p>Käyttäjiä ei vielä ole.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th scope="col">Käyttäjänimi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ( $users as $user ): ?>
                <tr>
                    <td><?= htmlspecialchars( $user["username"], ENT_QUOTES, "UTF-8" ) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>