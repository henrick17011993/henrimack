<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Henrimack.com</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="./js/main.js"></script>
</head>

<body>
    <?php
    require "php/funcoes.php";
    $dadosTabela = array();
    if (isset($_GET['id'])) {
        $dadosTabela = BuscaDados($_GET['id']);
    }
    ?>
    <header>
        <h1>Henrimack</h1>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="sobrenos.php">Sobre Nós</a></li>
            <li><a href="contato.php">Contate-nos</a></li>
        </ul>
    </header>
    <main>
        <div class="show">
            <div class="card-head">
                <h3>Cadastro</h3>
                <a href="./" id="btnVoltar">voltar</a>
            </div>
            <hr>
            <form method="POST">
                <fieldset>
                    <legend>Tipos de cadeiras</legend>
                    <div class="div-input">
                        <label for="Tipo">Tipo</label>
                        <select <?= isset($dadosTabela["TIPO"]) ? 'value="' . $dadosTabela["TIPO"] . '"' : ''; ?> <?= isset($_GET["acao"]) && $_GET["acao"] == "r" ? "disabled" : ""; ?> name="Tipo" id="Tipo" required="True">
                            <option value="">Escolha a Categoria</option>
                            <option value="Estofados" <?= isset($dadosTabela["TIPO"]) && $dadosTabela["TIPO"] === "Estofados" ? "selected" : ""; ?>>Estofados</option>
                            <option value="Escritorio" <?= isset($dadosTabela["TIPO"]) && $dadosTabela["TIPO"] === "Escritorio" ? "selected" : ""; ?>>Escritório</option>
                            <option value="Decoracao" <?= isset($dadosTabela["TIPO"]) && $dadosTabela["TIPO"] === "Decoracao" ? "selected" : ""; ?>>Decoração</option>
                            <option value="Gamers" <?= isset($dadosTabela["TIPO"]) && $dadosTabela["TIPO"] === "Gamers" ? "selected" : ""; ?>>Gamers</option>
                        </select>
                    </div>
                    <div class="div-input">
                        <label for="Modelos">Modelo</label>
                        <input type="text" value="<?= isset($dadosTabela["MODELOS"]) ? $dadosTabela["MODELOS"] : ""; ?>" <?= isset($_GET["acao"]) && $_GET["acao"] == "r" ? "readonly" : ""; ?> name="Modelos" id="Modelos" required="True">
                    </div>
                    <div class="div-input">
                        <label for="Cor">Cor</label>
                        <input type="text" value="<?= isset($dadosTabela["COR"]) ? $dadosTabela["COR"] : ""; ?>" <?= isset($_GET["acao"]) && $_GET["acao"] == "r" ? "readonly" : ""; ?> name="Cor" id="Cor" required="True">
                    </div>
                    <div class="div-input">
                        <label for="Valor">Valor</label>
                        <input type="number" value="<?= isset($dadosTabela["VALOR"]) ? $dadosTabela["VALOR"] : ""; ?>" <?= isset($_GET["acao"]) && $_GET["acao"] == "r" ? "readonly" : ""; ?> name="Valor" id="Valor" required="True">
                    </div>
                </fieldset>

                <?php $isEditable = !isset($_GET['acao']) || $_GET['acao'] != "u"; ?>
                <?php if ($isEditable) : ?>
                    <div class="buttons">
                        <button id="btnButton" type="button">Enviar</button>
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['acao']) && $_GET['acao'] == "u") : ?>
                    <div class="buttons">
                        <button id="btnAtualizar" type="button" data-id="<?= $_GET['id'] ?>">Atualizar</button>
                        <input type="submit" value="Salvar" style="display: none;">
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </main>
    <footer>
        <span>&copy; Feito por Henrique</span>
    </footer>
</body>

</html>