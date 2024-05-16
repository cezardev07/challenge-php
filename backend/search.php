<?php
  header("Content-Type : application/json");
  include("./conn.php");  
  $search = $_POST["search"];

  $query = $pdo->prepare("SELECT * FROM news WHERE title ILIKE :search ORDER BY id ASC");
  $query->bindValue(":search", "%".$search."%", PDO::PARAM_STR);
  $query->execute();

  echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));
?>