<?php
require "db-connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete"])) {
    $pdo = new PDO($connect, USER, PASS);
    
    $musicIDToDelete = $_POST["delete"];

    // 削除のロジック
    $deleteStatement = $pdo->prepare("DELETE FROM MusicInfo WHERE MusicID = :musicID");
    $deleteStatement->execute(array(":musicID" => $musicIDToDelete));

    // リダイレクト
    header("Location: music.php");
    exit();
}
?>