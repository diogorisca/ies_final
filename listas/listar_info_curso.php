            $sql = "SELECT * FROM curso WHERE nome = '$nome', faculdade = '$faculdade'";
            $resultado = mysqli_query($ligacao, $sql);

            echo $linha["provaIngresso"];
            echo $linha["notaCandidatura"];
            echo $linha["provaIngresso"];
            echo $linha["media"];
            echo $linha["vagas"];
            echo $linha["Observa��es"];
            echo $linha["Grau"];
            echo $linha["Dura��o"];
            echo $linha["ECTS"];
            echo $linha["�rea"];
            echo $linha["plano_estudos"];


            <!--

Varios campos especificos vao precisar de queries especificas, para criar simula��o podemos dar display de tudo

Nesta pagina devera existir um botao que diga simular candidatura, assim que o utilizador o prima, chama a fun��o
simula�ao e da display de uma tabela com a ordem de suposta entrada para o curso.

-->