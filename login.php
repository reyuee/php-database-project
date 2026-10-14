<?php
require 'db.php';
require 'header.php';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $db->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
    $stmt->execute([$_POST['username'], $_POST['password']]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
        exit;
    }
    $msg = 'Fel användarnamn eller lösenord.';
}

?>
<div class="w3-container w3-white w3-margin w3-padding-large">
  <h3>Logga in</h3>
  <p><?= $msg ?></p>
  <form method="post">
    <input class="w3-input w3-border" type="text" name="username" placeholder="Användarnamn" required>
    <input class="w3-input w3-border" type="password" name="password" placeholder="Lösenord" required>
    <button type="submit" class="w3-button w3-black w3-margin-top">Logga in</button>
  </form>
</div>
</main>
</div>
</div>
</body>
</html>
