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
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $songTitle = $_POST["songTitle"];
    $artistName = $_POST["artistName"];

    // データベースに曲とアーティスト名を追加するクエリ
    $insertStatement = $pdo->prepare("INSERT INTO MusicInfo (SongTitle, ArtistName) VALUES (:songTitle, :artistName)");
    $insertStatement->bindParam(':songTitle', $songTitle);
    $insertStatement->bindParam(':artistName', $artistName);

    if ($insertStatement->execute()) {
        echo "曲とアーティスト名が追加されました。";
        echo '<br><a href="music.php">楽曲一覧に戻る</a>';
    } else {
        echo "追加に失敗しました。";
        echo '<br><a href="music.php">楽曲一覧に戻る</a>';
    }
}
?>

</body>
</html>