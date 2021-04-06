include '../database/dbconnection.php';

$curso_id = $_GET['idcurso'];
$utilizador_id = $_GET['iduser'];



"SELECT notaFinal from simulacao WHERE curso_id = '$curso_id' ORDER BY notaFinal DESC"