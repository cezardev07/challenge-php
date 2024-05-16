<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News</title>
  <link rel="stylesheet" href="./source/style.css">
  <script src="./source/script.js" defer></script>
</head>
<body>
  <header>
    <div class="wrapper">
      <div class="logo">
        <a href="index.php">Logo</a>
      </div>
      <nav>
        <a href="?page=create">
          cadastrar noticias
        </a>
        <a href="index.php">
          exibir noticias
        </a>
        <input type="text" placeholder="Pesquisar...">
      </nav>
    </div>
  </header>
  <main>
    <?php
      switch($_REQUEST["page"]){
        case "create":
          include("./pages/create.php");
          break;
        case "article":
          include("./pages/news.php");
          break;
        default:
          include("./pages/home.php");
          break;
      }
    ?>
  </main>
  <footer>
    <h2>desenvolvido por programador</h2>
  </footer>
  <script 
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer"></script>
</body>
</html>