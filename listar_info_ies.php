/*


$iesid = $_POST['iesid'];
$sql = "SELECT nome, morada, contacto_email, contacto_telefone, descricao, pagina_oficial, distrito FROM ies WHERE id='iesid';
$resultado = mysqli_query($ligacao, $sql);
$linha = $resultado->fetch_assoc();

echo $linha["nome"];
echo $linha["morada"];
echo $linha["contacto_email"];
echo $linha["contacto_telefone"];
echo $linha["descricao"];
echo $linha["pagina_oficial"];
echo $linha["distrito"];

*/