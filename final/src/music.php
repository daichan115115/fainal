<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <?php require "db-connect.php"; ?>
</head>
<body>
    <h1>私の好歌一覧</h1>
    <hr>

    <?php
    echo '<table>';
    echo '<tr><th>曲id</th><th>曲名</th><th>アーティスト</th><th>操作</th></tr>';
    
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from MusicInfo');
    $sql->execute();
    echo '<form action="add.php" method="post">';
    echo '<button type="submit">曲とアーティスト名を追加</button>';
    echo  '</form>';
    foreach ($sql as $row) {
        $id = $row['MusicID'];
        echo '<tr>';
        echo '<td>', $id, '</td>';
        echo '<td>', $row['SongTitle'], '</td>';
        echo '<td>', $row['ArtistName'], '</td>';
        echo '<td>';
        echo '<form method="post" action="delete.php">';
        echo '<input type="hidden" name="delete" value="' . $id . '">';
        echo '<button type="submit">削除</button>';
        echo '</form>';
        
        echo '<form method="post" action="update.php">';
        echo '<input type="hidden" name="update" value="' . $id . '">';
        echo '<button type="submit">更新</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
    
    echo '</table>';
    ?>

    <?php
    // 更新用のフォーム表示
    if (isset($_POST["update"])) {
        echo '<form method="post" action="update.php">';
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