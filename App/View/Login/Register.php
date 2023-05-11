<!DOCTYPE html>
<html>
  <head>
    <title>Cadastro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <div class="container">
      <h1>Cadastro Login</h1>
      <form method="post" action="/login/save">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Salva</button>
      </form>
    </div>
  </body>
</html>
