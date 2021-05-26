<?php
session_start();

include "../database/dbconnection.php";

if (isset($_GET["acao"]) && $_GET["acao"] == 'editar_curso') { //editar curso

    $id_curso = $_GET["idcurso"];

    $novo_nome = $_POST["nome"];
    $nova_faculdade = $_POST["faculdade"];

    $sql_id_ies = "SELECT id FROM ies WHERE nome = '$nova_faculdade'";
    $resultado_id_ies = mysqli_query($ligacao, $sql_id_ies);
    $linha_id_ies = $resultado_id_ies->fetch_assoc();
    $novo_ies_id = $linha_id_ies['id'];

    $nova_provas_ingresso = $_POST["provas_ingresso"];
    $nova_nota_candidatura = $_POST["notaCandidatura"];
    $nova_prova_ingresso = $_POST["provaIngresso"];
    $nova_media = $_POST["media"];
    $nova_vagas = $_POST["vagas"];
    $novo_grau = $_POST["grau"];

    $observacoes = '';
    $plano_estudos = '';

    if ($novo_grau == "Mestrado Integrado") {
        $nova_duracao = "10 Semestres";
        $novo_ects = "300";
    } else {
        $nova_duracao = "6 Semestres";
        $novo_ects = "180";
    }

    $nova_area = $_POST["area"];

    $sql = "UPDATE curso SET ies_id='$novo_ies_id', nome='$novo_nome', faculdade='$nova_faculdade', prova_ingresso='$nova_provas_ingresso', notaCandidatura='$nova_nota_candidatura', provaIngresso='$nova_prova_ingresso', 
    media='$nova_media', vagas='$nova_vagas', Observações='$observacoes', Grau='$novo_grau', Duração='$nova_duracao', ECTS='$novo_ects', Área='$nova_area', plano_estudos='$plano_estudos'
    WHERE id='$id_curso'";
    $preparar = $ligacao->prepare($sql);
    $preparar->execute();
    header("location: ../listas/listar_info_curso.php?editar=sucesso&idcurso=$id_curso");
} 

else if (isset($_GET["acao"]) && $_GET["acao"] == 'apagar_curso') { //apagar curso

    $id_curso = $_GET["id_curso"];

    $sql = "DELETE FROM curso WHERE id='$id_curso'";
    $preparar = $ligacao->prepare($sql);
    $preparar->execute();
    header("location: ../listas/listar_cursos.php?apagar=sucesso");
} 

else if (isset($_GET["acao"]) && $_GET["acao"] == "editar_ies") { //editar IES

    $id_ies = $_GET ["idies"];

    $novo_nome = $_POST["nome"];
    $nova_morada = $_POST["morada"];
    $novo_email = $_POST["email"];
    $novo_contacto = $_POST["contacto"];
    $nova_descricao = $_POST["descricao"];
    $novo_website = $_POST["website"];
    $novo_distrito = $_POST["distrito"];

    $sql = "UPDATE ies SET nome='$novo_nome', morada='$nova_morada', contacto_email='$novo_email', contacto_telefone='$novo_contacto', descricao='$nova_descricao',
    pagina_oficial='$novo_website' WHERE id='$id_ies'";
    $preparar = $ligacao->prepare($sql);
    $preparar->execute();
    header("location: ../listas/listar_info_ies.php?editar=sucesso&iesid=$id_ies");
}

else if (isset($_GET["acao"]) && $_GET["acao"] == "apagar_ies") { //apagar IES

    $id_ies = $_GET["id_ies"];
    echo $id_ies;

    $sql = "DELETE FROM ies WHERE id='$id_ies'";
    $preparar = $ligacao->prepare($sql);
    $preparar->execute();
    header ("location: ../listas/listar_ies.php?apagar=sucesso");
}