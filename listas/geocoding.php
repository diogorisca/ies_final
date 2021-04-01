<?php
include '../database/dbconnection.php';

$iesid = $_POST['iesid'];
$sql = "SELECT morada FROM ies WHERE id='$iesid";
$resultado = $ligacao->query($sql);
$linha = $resultado->fetch_assoc();

?>
<html>

<iframe width="600" height="450" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?q=<?php echo $linha["morada"]; ?>&key=AIzaSyCde12RAX3KGlMl0X7E29Hu8weTOT9s_I0">
</iframe>

</html>

