
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Projeto star wars</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>

    <div class="container">
      <img src="./images/logo.png" alt="logo" class="logo" />
    </div>
    <div class="input-txt">
      <form action="index.php" method="post">
      <input
        type="text"
        class="txt-src"
        name="search"
        placeholder="Busque seu filme star wars favorito..."
      />
      <button onclick="chamarLog()" name="submit"><img src="./images/search.png" class="search-logo" alt="" ></button>
      </form>
    </div>

    <table>
              <thead>
                <tr>
                <button><th class="img" id="myImage">Imagem</th></button>
                <th>Nome</th>
                <th>Data de lançamento</th>
                </tr>
              </thead>

              <tbody id="data-output">
                <?php
                if(isset($_POST['submit']) && isset($_POST['search'])) {
                  try {
                    $con = new PDO('mysql:host=localhost;dbname=starwarsfilmes','root', '');

                    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $query = 'select * FROM swfilms WHERE nomefilme LIKE ?';

                    $resultado = $con->prepare($query);
                    
                    $resultado->bindValue(1, '%'.$_POST['search'].'%' , PDO::PARAM_STR);

                    $resultado->execute();

                    $linhas = $resultado->fetchAll(PDO::FETCH_CLASS);

                    if ($resultado->rowCount() > 0) {
                      echo '<table>';
                      echo '<tr>';
                      echo '<th>Numero do episodio</th>';
                      echo '<th>Sinopse</th>';
                      echo '<th>Data de lançamento</th>';
                      echo '<th>Diretor</th>';
                      echo '<th>Produtor</th>';
                      echo '<th>Nome dos personagens</th>';
                      echo '</tr>';

                      foreach($linhas as $row){
                      
                        echo '<tr>';
                        echo '<td>' . $row->nomeFilme . '</td>';
                        echo '<td>' . $row->sinopse . '</td>';
                        echo '<td>' . $row->dataLancamento . '</td>';
                        echo '<td>' . $row->diretor . '</td>';
                        echo '<td>' . $row->produtor . '</td>';
                        echo '<td>' . $row->nomePersonagens . '</td>';
                        echo '</tr>';
                      }

                      echo '</table>';
                    } else {
                      echo 'Não existe...';
                    }

                  } catch (PDOException $e) {
                    
                    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
                };
                  
                };
                  

                  ?>
              </tbody>
    </table>

    <script src="script.js"></script>
    <?php
  if(!isset($_POST['submit'])) {
?>
<script type="text/javascript">
  getFilmes();
</script>
<?php
  }
?>
  </body>
</html>