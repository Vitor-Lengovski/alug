<?php
    require_once "/var/www/html/site/class/casa.php";
    $casa = new Casa();
    $casas = $casa->listar();
    echo "<pre>";
    var_dump($casas);
    echo "</pre>";
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <table border="1">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Morador Principal</th>
                    <th>Valor</th>
                    <th>Pago</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // for ($i=0; $i < sizeof($casas) ; $i++) { 
                    //     echo "<tr>
                    //         <td>{$casas[$i]['numero']}</td>
                    //         <td>{$casas[$i]['morador']}</td>
                    //         <td>{$casas[$i]['valor']}</td>
                    //         <td class='icon_check' onclick='return pagar({$casas[$i]['idConta']})'></td>

                    //         <td><a href='novaCasa.php?id={$casas[$i]['idCasa']}' class='icon_pencil'></a></td>
                    //         <td><a href='novaCasa.php' class='icon_trash'></a></td>
                    //       </tr>";
                    // }
                  ?>
            </tbody>
        </table>    
        <div>
            <button id="show">a</button>
        </div>
        <div>
            <form action="processa/casa.php" method="POST">
                Morador Principal <input type="text" name="morador" id="morador"><br>
                Valor do aluguel <input type="number" name="aluguel" id="aluguel"><br>
                Número de moradores	<input type="number" name="moradores" id="moradores"><br>
                Número da casa <input type="number" name="numero" id="numero"><br>
                Localizacao <input type="text" name="localizacao" id="localizacao"><br>
                <input type="submit" value="Salvar">
            </form>
        </div>
        <div>
            <?php
            for($i=0; $i<sizeof($casas); $i++){

            }
            ?>
        </div>
    </body>
</html>
