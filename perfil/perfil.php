/*
visualizar perfil

$id=$_POST['id']

$sql = "SELECT nome, cartao_cidadao, data_nascimento, email, contacto, media_acesso, notaBIO, notaFQ, notaMAT, notaPT,
notaGeoM, morada FROM utilizador WHERE id='$id'"
$resultado = mysqli_query($ligacao, $sql);
$linha = $resultado->fetch_assoc();
echo $linha["nome"];
echo $linha["cartao_cidadao"];
echo $linha["data_nascimento"];
echo $linha["email"];
echo $linha["contacto"];
echo $linha["media_acesso"];
echo $linha["notaBIO"];
echo $linha["notaFQ"];
echo $linha["notaMAT"];
echo $linha["notaPT"];
echo $linha["notaGeoM"];
echo $linha["morada"];
*/


/*
Editar perfil

$id = $_POST['id']
$contacto = $_POST['contacto'];
$morada = $_POST['morada'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$media = $_POST['media'];

$notaA = $_POST['notaA'];
$notaB = $_POST['notaB'];
$notaC = $_POST['notaC'];
$notaD = $_POST['notaD'];
$notaE = $_POST['notaE'];


$sql = UPDATE utilizador SET email ='$email', contacto ='$contacto', media_acesso ='$media', notaBIO ='$notaA', 
        notaFQ ='$notaB', notaMAT='$notaC', notaPT='$notaD', notaGeoM ='$notaE', morada ='$morada', pass ='$pass'
        WHERE id = '$id'

$resultado = mysqli_query($ligacao, $sql);

*/