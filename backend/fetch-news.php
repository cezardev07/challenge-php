<?php
  header("Content-Type : application/json");
  include("./conn.php");

  $fetch_news = $pdo->prepare("SELECT * FROM news ORDER BY id ASC");
  $fetch_news->execute();
  
  echo json_encode($fetch_news->fetchAll(PDO::FETCH_ASSOC));
?>