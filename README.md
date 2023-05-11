# Sistema de cadastro de currículos com PHP e banco de dados MySQL.

Este é um projeto WEB em PHP com arquitetura MVC.

# Configurando banco de dados

Para configurar o banco de dados, siga as etapas abaixo:

- Crie um banco de dados com o nome "database".
- Certifique-se de que seu servidor esteja em execução.
- Importe o arquivo "db.sql" disponível neste repositório para o banco de dados "database". 
- O arquivo "db.sql" criará todas as tabelas necessárias para a aplicação.
- Abra os arquivos localizado no diretório "/App/DAO/".
- Altere os parâmetros de conexão do banco de dados no arquivo 


Seguindo estas etapas, você configurará com sucesso o banco de dados para a aplicação. 

Certifique-se de verificar todas as etapas cuidadosamente para evitar quaisquer erros ou problemas de configuração.

**Observação:** Se você estiver usando o Docker Compose para criar e executar contêineres, **não será necessário criar manualmente um banco de dados ou importar o arquivo "db.sql".** O Docker Compose lidará com o processo de criação do banco de dados e da importação do arquivo "db.sql" automaticamente. Certifique-se de verificar o arquivo "docker-compose.yml" para confirmar que as configurações do serviço de banco de dados estão definidas corretamente.

# Executando

Para executar este projeto, copie o arquivos do diretório abaixo para a pasta do seu servidor web:
```bash
    /App
```

Se preferir utilizar um container Docker, já está configurado um container no arquivo docker-compose.yml. 
Para iniciá-lo, execute o seguinte comando:

```bash
    docker-compose up -d
```

A aplicação será executada na porta 80, e o acesso da aplicação estará disponível na seguinte URL:

```bash
    http://localhost
```
