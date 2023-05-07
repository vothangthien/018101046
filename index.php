<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
     <title><?php echo isset($title) ? $title : "Trang chủ"; ?></title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>
<body>
      <header>

      </header>
      <main>
               <?php
                    $page=isset($_GET["page"]) ? $_GET["page"] :'login';
                     switch($page){
                        case"Home":
                              include './page/Home.php';
                              break;
                         default:
                         include './ACConut/login.php';
                         break;
                     }
               ?>
      </main>

      <footer>

      </footer>

</body>
</html>