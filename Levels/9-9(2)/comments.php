<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $comment = $_POST['comment'];

    if (!empty($username) && !empty($comment)) {
        $stmt = $pdo->prepare("INSERT INTO comments (username, comment) VALUES (:username, :comment)");
        $stmt->execute([
                'username' => $username,
                'comment' => $comment
        ]);
    }
}

$stmt = $pdo->prepare("SELECT * FROM comments ORDER BY created_at DESC");
$stmt->execute();
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments Page</title>
    <link rel="stylesheet" href="../../assets/comments.css">
</head>
<body>
<h1>Leave a Comment</h1>
<form action="comments.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <label for="comment">Comment:</label>
    <textarea id="comment" name="comment" required></textarea>
    <button type="submit">Submit</button>
</form>
<h2>Comments:</h2>
<?php foreach ($comments as $comment): ?>
    <div class="comment">
        <p><strong><?= $comment['username'] ?></strong> at <?= $comment['created_at'] ?></p>
        <p><?= nl2br($comment['comment']) ?></p>
    </div>
<?php endforeach; ?>
</body>
</html>
