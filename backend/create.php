<?php
  header("Content-Type : application/json");
  include("./conn.php");

  $title = $_POST["title"];
  $content = $_POST["content"];
  $category = $_POST["category"];

  $query = $pdo->prepare("INSERT INTO news (title, content, category) VALUES (:ti, :co, :ca)");
  $query->bindValue(":ti", $title);
  $query->bindValue(":co", $content);
  $query->bindValue(":ca", $category);
  $query->execute();

  if($query->rowCount() >= 1){
    echo json_encode(array(
      "status" => "ok",
      "message" => "sua neticia foi criada com sucesso!"
    ));
  } else {
    echo json_encode(array(
      "status" => "err",
      "message" => "algo deu errado!"
    ));
  }
?>