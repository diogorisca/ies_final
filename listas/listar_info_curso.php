            $sql = "SELECT * FROM curso WHERE nome = '$nome', faculdade = '$faculdade'";
            $resultado = mysqli_query($ligacao, $sql);

            echo $linha["provaIngresso"];
            echo $linha["notaCandidatura"];
            echo $linha["provaIngresso"];
            echo $linha["media"];
            echo $linha["vagas"];
            echo $linha["Observações"];
            echo $linha["Grau"];
            echo $linha["Duração"];
            echo $linha["ECTS"];
            echo $linha["Área"];
            echo $linha["plano_estudos"];


            <!--

Varios campos especificos vao precisar de queries especificas, para criar simulaï¿½ï¿½o podemos dar display de tudo

Nesta pagina devera existir um botao que diga simular candidatura, assim que o utilizador o prima, chama a funï¿½ï¿½o
simulaï¿½ao e da display de uma tabela com a ordem de suposta entrada para o curso.

-->