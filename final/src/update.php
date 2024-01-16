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
// 更新用のフォーム表示
$pdo = new PDO($connect, USER, PASS);
if (isset($_POST["update"])) {
    $musicIDToUpdate = $_POST["update"];
    
    // テキストボックス表示用のデータ取得
    $selectStatement = $pdo->prepare("SELECT * FROM MusicInfo WHERE MusicID = :musicID");
    $selectStatement->execute(array(":musicID" => $musicIDToUpdate));
    $row = $selectStatement->fetch(PDO::FETCH_ASSOC);

    echo '<form method="post" action="update.syori.php">';
    echo '<input type="hidden" name="update" value="' . $musicIDToUpdate . '">';
    echo '<label for="newSongTitle">新しい曲名:</label>';
    echo '<input type="text" name="newSongTitle" value="' . $row['SongTitle'] . '"><br>';
    echo '<label for="newArtistName">新しいアーティスト:</label>';
    echo '<input type="text" name="newArtistName" value="' . $row['ArtistName'] . '"><br>';
    echo '<button type="submit">更新する</button>';
    echo '</form>';
}
?>
</body>
</html>