<?php
  header("Content-Type : application/json");
  include("./conn.php");

  $id = $_POST["id"];

  if($id){
    try {
      $query = $pdo->prepare("DELETE FROM news WHERE id = :id");
      $query->bindValue(":id", $id);
      $query->execute();
      echo json_encode("noticia deletada com sucesso!");
    } catch (PDOException $e) {
      echo json_encode("A noticia não foi deletado, algo deu errado!");
    }
  } else {
    echo json_encode("id não encontrado!");
  }
?>