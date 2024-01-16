<?php require "db-connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
$pdo = new PDO($connect, USER, PASS);
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
    $musicIDToUpdate = $_POST["update"];
    $newSongTitle = $_POST["newSongTitle"];
    $newArtistName = $_POST["newArtistName"];

    // データベース更新クエリ
    $updateStatement = $pdo->prepare("UPDATE MusicInfo SET SongTitle = :newSongTitle, ArtistName = :newArtistName WHERE MusicID = :musicID");
    $updateStatement->bindParam(':newSongTitle', $newSongTitle);
    $updateStatement->bindParam(':newArtistName', $newArtistName);
    $updateStatement->bindParam(':musicID', $musicIDToUpdate);

    if ($updateStatement->execute()) {
        echo "データが更新されました。";
        echo '<br><a href="music.php">楽曲一覧に戻る</a>';
    } else {
        echo "データの更新に失敗しました。";
        echo '<br><a href="music.php">楽曲一覧に戻る</a>';
    }
}
?>
</body>
</html>