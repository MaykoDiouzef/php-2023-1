<?php
  include_once '../acesso/verifica_sessao.php';

if (!$_SESSION['logado']) {
   header('Location: ../acesso/formulario_login.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Inicial</title>
</head>

<body>
  <form action="inserir_curso.php" method="get">
    Nome: <br>
    <input type="text" name="nome" id="nome"> <br><br>

    Descrição: <br>
    <input type="text" name="descricao" id="descricao"> <br><br>

    Carga horária: <br>
    <input type="number" name="carga_horaria" id="carga_horaria"> <br><br>

    Data de inicio: <br>
    <input type="date" name="data_inicio" id="data_inicio"> <br><br>

    Data de fim: <br>
    <input type="date" name="data_fim" id="data_fim"> <br><br>

    <input type="submit" value="Salvar">
  </form>
</body>

</html>
