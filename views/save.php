<?php

include "../include/session.php";
include "../include/connection.php";
header('Content-Type: text/html; charset=utf-8');

$user_id = $_SESSION["codigo"];
$row = [];
try {
  $sql = "SELECT p.titulo, g.fecha_agregacion FROM guardado g LEFT JOIN publicacion p ON g.fk_publicacion = p.codigo WHERE g.fk_usuario = 1;";
  $connection = conexion();
  $query = mysqli_query($connection, $sql);
  $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

  var_dump($rows);
} catch (Exception $e){
  echo $e;
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardados</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Zain:ital,wght@0,200;0,300;0,400;0,700;0,800;0,900;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="website icon" type="png" href="../images/user.png">
    <link rel="stylesheet" href="../styles/lside-bar.css">
    <link rel="stylesheet" href="../styles/save.css">
</head>
<body>
    <div id="container">
    <?php include "lside-bar.php"?>
        <div id="center">
          <div id="info-container">
           
            <div id="up-title">Guardados</div> 

            <div id="filter-info">
              <p>Filtrar por</p>
              <!-- Filtros --> 
              <form id="filters-container">
                <select name="filter-parameter">
                  <option name="filter-parameter" value="">Fecha de añadido</option>
                  <option name="filter-parameter">Votos</option>
                </select>
                <select name="filter-orientation">
                  <option name="filter-orientation">Ascendente</option>
                  <option name="filter-orientation">Descendente</option>
                </select>
                <button class="bttn-modificar">Filtrar</button>
              </form>
              </div>

              <div id="data-container">

            <?php foreach($rows as $data){ ?>
                <a class="idea-container">
                  <div class="idea-info">
                      <div class="idea-image">
                        <image src="https://i.etsystatic.com/9018194/r/il/490710/5040623246/il_570xN.5040623246_8wle.jpg" alt="idea image" />
                      </div>
                      <h3 class="idea-title"><?php echo $data["titulo"] ?></h3>
                      <p><b>Agregado el:</b><br> <?php echo $data["fecha_agregacion"] ?></p>
                      <div class="idea-votes">
                        <img class="vote-star" src="../images/star full.png" />
                        <img class="vote-star" src="../images/star full.png" />
                        <img class="vote-star" src="../images/star half.png" />
                        <img class="vote-star" src="../images/star empty.png" />
                        <img class="vote-star" src="../images/star empty.png" />
                      </div>
                  </div>
                </a>

            <?php } ?>
                </div>
          </div>
        </div>
    </div>
</body>
</html>




