/*

Quando carregar em cursos passa variavel a 1 e da display de todos os cursos

if x=1{


$sql = "SELECT DISTINCT nome FROM `curso` order by substring_index(nome, ' ', -1)";
$resultado = mysqli_query($ligacao, $sql);

}


Quando carrega numa faculdade especifica passa variavel a 2 e da display dos cursos da faculdade em questao

$faculdade = $_POST['faculdade']
if x=2{

$sql = "SELECT nome FROM curso WHERE faculdade = '$faculdade'";

}
*/