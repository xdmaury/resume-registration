<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuario</title>
    
</head>
<body>
    <form action="curriculoRegistre" method="POST">
        <fieldset>
            <legend>Dados Pessoais</legend>
            <div id="container-dados-pessoais">
                <div class="campo-dados">
                    <input type="hidden" name="login_id" value="<?php echo $_GET['login_id']; ?>">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required />
                       
                    <label for="cpf">CPF:</label>
                    <input  type="text" id="cpf" name="cpf" required ></input>

                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="date" id="data_nascimento" name="data_nascimento" required ></input>

                    <label for="sexo">Sexo:</label>
                    <input type="text" id="sexo" name="sexo" required ></input>

                    <label for="estado_civil">Estado Civil:</label>
                    <input type="text" id="estado_civil" name="estado_civil" required ></input>

                    <label for="escolaridade">Escolaridade:</label>
                    <input type="text" id="escolaridade" name="escolaridade" required />
                </div>
            </div>
        </fieldset>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>