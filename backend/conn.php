<?php
  try {
    $pdo = new PDO("pgsql: host=localhost; dbname=data_news", "root", 1234);
  } catch (PDOException $e) {
    die($e);
  }
?>