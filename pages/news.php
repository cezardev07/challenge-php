<article>
  <?php
    try {
      require_once("./backend/conn.php");
      
      if(isset($_GET["news"])) {
        $id = $_GET["news"];
        $query = $pdo->prepare("SELECT * FROM news WHERE id = :news");
        $query->bindValue(":news", $id);
        $query->execute();

        if($query->rowCount() > 0) {
          $news = $query->fetch(PDO::FETCH_ASSOC);
          echo '<div class="title">';
            echo '<h1>' . $news['title'] . '</h1>';
            echo '<button data-id="'.$news['id'].'"> apagar noticia </button>';
          echo '</div>';
          echo '<div class="content">';
            echo '<p>' . $news['content'] . '</p>';
          echo '</div>';
        } else {
          echo "<article><a href='index.php'>Notícia não encontrada, clique aqui para voltar ao início</a></article>";
        }
      } else {
        echo "<article><a href='index.php'>Notícia não encontrada, clique aqui para voltar ao início</a></article>";
      }
    } catch (PDOException $e) {
      die($e);
    }
  ?>
</article>