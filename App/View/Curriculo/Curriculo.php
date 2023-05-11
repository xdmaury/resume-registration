<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Formulário de Cadastro de Currículo</title>
    </head>
    <body>
        <h1>Formulário de Cadastro de Currículo</h1>
        <form action="curriculoRegistre" method="POST">
            <fieldset>
                <legend>Dados Login</legend>
                <div id="container-dados-login">
                    <div class="campo-login">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" required>
                        <label for="password">Senha:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Dados Pessoais</legend>
                <div id="container-dados-pessoais">
                    <!--  public $id, $login_id, $nome, $cpf, $data_nascimento, $sexo, $estado_civil, $escolaridade;-->
                    <div class="campo-dados">

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
            <fieldset>
                <legend>Formação Acadêmica</legend>
                <div id="container-cursos">
                    <div class="campo-curso">
                        <h4>Curso ou Especialização</h4>
                        <label for="nome_curso">Nome</label>
                        <input type="text" id="nome_curso" name="cursos[][nome]" required />
                        <label for="instituicao_curso">Instituição</label>
                        <input type="text" id="instituicao_curso" name="cursos[][instituicao]" required />
                        <label for="data_inicio_curso">Data de Início</label>
                        <input type="date" id="data_inicio_curso" name="cursos[][dataInicio]" required />
                        <label for="data_conclusao_curso">Data de Conclusão</label>
                        <input type="date" id="data_conclusao_curso" name="cursos[][dataConclusao]" required />
                    </div>
                </div>
                <button type="button" onclick="addCampoCurso()">Adicionar Curso</button>
            </fieldset>

            <fieldset>
                <legend>Experiência Profissional</legend>
                <div id="container-experiencias">
                    <div class="campo-experiencia">
                        <label for="cargo_experiencia">Cargo</label>
                        <input type="text" id="cargo_experiencia" name="experiencias[][cargo]" required />
                        <label for="empresa_experiencia">Empresa</label>
                        <input type="text" id="empresa_experiencia" name="experiencias[][empresa]" required />
                        <label for="data_inicio_experiencia">Data de Início</label>
                        <input type="date" id="data_inicio_experiencia" name="experiencias[][dataInicio]" required />
                        <label for="data_saida_experiencia">Data de Saída</label>
                        <input type="date" id="data_saida_experiencia" name="experiencias[][dataSaida]" />
                        <label for="descricao_experiencia">Descrição</label>
                        <textarea id="descricao_experiencia" name="experiencias[][descricao]" rows="4" cols="50" required></textarea>
                    </div>
                </div>
                <button type="button" id="add-experiencia" onclick="addCampoExperiencia()">
                    Adicionar Experiência
                </button>
                <div id="container-experiencias"></div>
            </fieldset>

            <fieldset>
                <legend>Pretensão salarial</legend>
                <div id="container-pretensao-salarial">
                    <div class="campo-pretensao-salarial">
                        <label for="pretensao_salarial">Valor:</label>
                        <input type="text" id="pretensao_salarial" name="pretensao_salarial" required />
                    </div>
                </div>
            </fieldset>

            <button type="submit">Enviar</button>
        </form>
        <script>
            // Função para adicionar novos campos de curso
            function addCampoCurso() {
                var containerCursos = document.getElementById("container-cursos");
                var novoCampoCurso = document.createElement("div");
                novoCampoCurso.setAttribute("class", "campo-curso");

                novoCampoCurso.innerHTML = `
                   <hr>
                   <h4>Curso ou Especialização</h4>
                   <label for="nome_curso">Nome</label>
                   <input type="text" id="nome_curso" name="cursos[][nome]" required>
                   <label for="instituicao_curso">Instituição</label>
                   <input type="text" id="instituicao_curso" name="cursos[][instituicao]" required>
                   <label for="data_inicio_curso">Data de Início</label>
                   <input type="date" id="data_inicio_curso" name="cursos[][dataInicio]" required>
                   <label for="data_conclusao_curso">Data de Conclusão</label>
                   <input type="date" id="data_conclusao_curso" name="cursos[][dataConclusao]" required>
               `;

                containerCursos.appendChild(novoCampoCurso);
            }

            // Função para adicionar novos campos de experiência profissional
            function addCampoExperiencia() {
                var containerExperiencias = document.getElementById("container-experiencias");
                var novoCampoExperiencia = document.createElement("div");
                novoCampoExperiencia.setAttribute("class", "campo-experiencia");

                novoCampoExperiencia.innerHTML = `
                   <hr>
                   <label for="cargo_experiencia">Cargo</label>
                   <input type="text" id="cargo_experiencia" name="experiencias[][cargo]" required>
                   <label for="empresa_experiencia">Empresa</label>
                   <input type="text" id="empresa_experiencia" name="experiencias[][empresa]" required>
                   <label for="data_inicio_experiencia">Data de Início</label>
                   <input type="date" id="data_inicio_experiencia" name="experiencias[][dataInicio]" required>
                   <label for="data_saida_experiencia">Data de Saída</label>
                   <input type="date" id="data_saida_experiencia" name="experiencias[][dataSaida]">
                   <label for="descricao_experiencia">Descrição</label>
                   <textarea id="descricao_experiencia" name="experiencias[][descricao]" rows="4" cols="50" required></textarea>
               `;

                containerExperiencias.appendChild(novoCampoExperiencia);
            }
        </script>
    </body>
</html>
