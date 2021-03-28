<!--

Varios campos especificos vao precisar de queries especificas, para criar simula��o podemos dar display de tudo

$faculdade = $_POST['faculdade']
$nome = $_POST['nome']

$sql = "SELECT * FROM curso WHERE nome = '$nome' and faculdade = '$faculdade'";


Nesta pagina devera existir um botao que diga simular candidatura, assim que o utilizador o prima, chama a fun��o
simula�ao e da display de uma tabela com a ordem de suposta entrada para o curso.

-->