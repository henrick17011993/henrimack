<!DOCTYPE html>
<html lang="pt-br">

<head>
<<<<<<< HEAD
=======

>>>>>>> 27d3988e75865ef6028949983a861ddc7f28d092
    <meta charset="UTF-8">
    <title>Henrimack.com</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="./js/main.js"></script>
<<<<<<< HEAD
=======

>>>>>>> 27d3988e75865ef6028949983a861ddc7f28d092
</head>

<body>
    <?php
    require "php/funcoes.php";
<<<<<<< HEAD
    $dadosTabela = array();
    if (isset($_GET['id'])) {
        $dadosTabela = BuscaDados($_GET['id']);
    }
    ?>
=======
    if ($_GET['id']) {
        $dadosTabela = BuscaDados($_GET['id']);
    }
    ?>

>>>>>>> 27d3988e75865ef6028949983a861ddc7f28d092
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
<<<<<<< HEAD
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
=======
            <fieldset>
                <legend>Tipos de cadeiras</legend>
                <form>
                    <label for="">Selecione :</label>
                    <select <?= $dadosTabela["TIPO"] ?> <?= $_GET["acao"] &&  $_GET["acao"] == "r" ? "readonly" : ""; ?>
                        name="Tipo" id="Tipo" required="True" >
                        <option value=""> Categoria </option>
                        <option value="Estofados">Estofados</option>
                        <option value="Escritorio">Escritório</option>
                        <option value="Decoracao">Decoração</option>
                        <option value="Gamers">Gamers</option>
                    </select>
                </form>

                <div class="div-input" id="divNome">
                    <label for="Modelos">Modelo :</label>
                    <input type="text" value="<?= $dadosTabela["MODELOS"] ?>"
                        <?= $_GET["acao"] &&  $_GET["acao"] == "r" ? "readonly" : ""; ?> name="Modelos" id="Modelos"required="True" >
                </div>

                <div class="div-input" id="divNome">
                    <label for="Cor">Cor :</label>
                    <input type="text" value=" <?= $dadosTabela["COR"] ?>"
                        <?= $_GET["acao"] &&  $_GET["acao"] == "r" ? "readonly" : ""; ?> name="Cor" id="Cor" required="True">
                </div>
                <div class="div-input" id="divNome">
                    <label for="Valor">Valor :</label>
                    <input type="number"value="<?= $dadosTabela["VALOR"] ?>"
                        <?= $_GET["acao"] &&  $_GET["acao"] == "r" ? "readonly" : ""; ?> name="Valor" id="Valor"required="True">
                </div>
            </fieldset>

            <?php if ($_GET['acao'] != "r") : ?>
            <div class="buttons">
                <?php if ($_GET['acao'] == "u") : ?>
                <button id="btnAtualizar" type="submit" data-id="<?= $_GET['id'] ?>">atualizar</button>
                <?php else : ?>
                <button id="btnButton" type="submit">enviar</button>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>

    </main>
    <footer>
        <span>&copy; Feito por Henrique</span>

    </footer>


>>>>>>> 27d3988e75865ef6028949983a861ddc7f28d092
</body>

</html>