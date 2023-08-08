<?php

function conect()
{
    try {
        return new PDO("mysql:host=localhost;dbname=cadeira", "root");
    } catch (PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
        exit();
    }
}

function show()
{
    $conn = conect();
    $SQL = "SELECT * FROM henrimack";
    return $conn->query($SQL, PDO::FETCH_ASSOC)->fetchAll();
}

function BuscaDados($id)
{
    $conn = conect();
    $SQL = "SELECT * FROM henrimack WHERE IDTIPO = :id";
    $query = $conn->prepare($SQL);
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}


function editar($post)
{
    $conn = conect();
    $SQL = "UPDATE henrimack 
            SET TIPO = :TIPO, MODELOS = :MODELOS, COR = :COR, VALOR = :VALOR 
            WHERE IDTIPO = :id";
    $query = $conn->prepare($SQL);
    $query->bindParam(":id", $post["id"], PDO::PARAM_INT);
    $query->bindParam(":TIPO", $post["tipo"]);
    $query->bindParam(":MODELOS", $post["modelos"]);
    $query->bindParam(":COR", $post["cor"]);
    $query->bindParam(":VALOR", $post["valor"]);
    return $query->execute(); // Retorna true em caso de sucesso ou false em caso de falha
}

function Deleta($post)
{
    $conn = conect();
    $SQL = "DELETE FROM henrimack WHERE IDTIPO = :id";
    $query = $conn->prepare($SQL);
    $query->bindParam(":id", $post["id"], PDO::PARAM_INT);
    return $query->execute(); // Retorna true em caso de sucesso ou false em caso de falha
}

function insere($post)
{
    $conn = conect();
    $SQL = "INSERT INTO henrimack (TIPO, MODELOS, COR, VALOR)
            VALUES (:TIPO, :MODELOS, :COR, :VALOR)";

    $query = $conn->prepare($SQL);
    $query->bindParam(":TIPO", $post["tipo"]);
    $query->bindParam(":MODELOS", $post["modelos"]);
    $query->bindParam(":COR", $post["cor"]);
    $query->bindParam(":VALOR", $post["valor"]);
    return $query->execute(); // Retorna true em caso de sucesso ou false em caso de falha
}

if (isset($_GET['funcao'])) {
    $funcao = $_GET['funcao'];
    if ($funcao == "insere") {
        $resultado = insere($_POST);
        echo $resultado ? "Operação de inserção realizada com sucesso." : "Erro ao inserir os dados.";
    } elseif ($funcao == "editar") {
        $resultado = editar($_POST);
        echo $resultado ? "Operação de atualização realizada com sucesso." : "Erro ao atualizar os dados.";
    } elseif ($funcao == "Deleta") {
        $resultado = Deleta($_POST);
        echo $resultado ? "Operação de exclusão realizada com sucesso." : "Erro ao excluir os dados.";
    } else {
        echo "Função desconhecida.";
    }
}
