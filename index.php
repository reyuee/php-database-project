<?php
require 'db.php';
require 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['username'])) {
    $title = trim($_POST['title'] ?? '');
    $text  = trim($_POST['text'] ?? '');

    if ($title !== '' && $text !== '') {
        $stmt = $db->prepare('INSERT INTO posts (username, title, text) VALUES (?, ?, ?)');
        $stmt->execute([$_SESSION['username'], $title, $text]);
        header('Location: index.php');
        exit;
    }
}

$posts = $db->query('SELECT * FROM posts ORDER BY pub_date DESC')->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if (isset($_SESSION['username'])): ?>
  <form method="post" class="w3-container w3-white w3-margin w3-padding-large">
    <h3>Skriv ett inlägg</h3>
    <input class="w3-input w3-border" type="text" name="title" placeholder="Titel" required maxlength="100">
    <textarea class="w3-input w3-border" name="text" placeholder="Text" required></textarea>
    <button type="submit" class="w3-button w3-black w3-margin-top">Publicera</button>
  </form>
<?php else: ?>
  <p class="w3-container"><a href="login.php">Logga in</a> för att skriva ett inlägg.</p>
<?php endif; ?>

<?php foreach ($posts as $row): ?>
  <article class="w3-container w3-white w3-margin w3-padding-large">
    <div class="w3-center">
      <h3><?= $row['title'] ?></h3>
      <h5><?= $row['username'] ?>, <span class="w3-opacity"><?= $row['pub_date'] ?></span></h5>
    </div>
    <div class="w3-justify">
      <p><?= nl2br($row['text']) ?></p>
    </div>
  </article>
<?php endforeach; ?>

</main>
</div>
</div>
</body>
</html>
