<?php require "db-connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>楽曲とアーティスト名を追加</title>
</head>
<body>

<h1>楽曲とアーティスト名を追加</h1>

<form method="post" action="add.syori.php">
    <label for="songTitle">楽曲名:</label>
    <input type="text" name="songTitle" required><br>

    <label for="artistName">アーティスト名:</label>
    <input type="text" name="artistName" required><br>

    <button type="submit">追加する</button>
</form>

</body>
</html>
