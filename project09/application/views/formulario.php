<?php
defined('BASEPATH') or exit('URL inválida.');
?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <?php echo validation_errors(); ?>

    <?php echo form_open('geral'); ?>

    <p>Usuário:</p>
    <input type="text" name="text_usuario" value="">

    <p>email:</p>
    <input type="email" name="text_email" value="">

    <p>Senha 1:</p>
    <input type="password" name="text_senha_1" value="">

    <p>Senha 2:</p>
    <input type="password" name="text_senha_2" value="">

    <div><input type="submit" value="Enviar"></div>

    <?php echo form_close(); ?>

</body>

</html>