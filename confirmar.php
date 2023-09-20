<?php

$pdo = require 'connect.php';

// INSERE 

$query = $pdo->prepare('INSERT INTO resultados (turma, candidato) VALUES (:id_turma, :numero_candidato)');
$query->bindValue(':id_turma', intval($_POST['id_turma']));
$query->bindValue(':numero_candidato', intval($_POST['numero_candidato']));
$query->execute();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="refresh" content="5;url=index.php"> -->
    <title>Urna Eletrônica Anglo</title>
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<script type="text/javascript">
    const candidatos = <?= $json ?>;
</script>

<body>
    <div class="container-fluid">
        <div class="tela">
            <div class="fim">
                <h1>FIM</h1>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const audio = new Audio('audio/fim-urna.mp3');
        audio.play();
        audio.onended = function() {
            window.setTimeout(function() {
                window.location.href = '/votacao.php?turma=<?= $_POST['id_turma'] ?>';
            }, 5000);
        };
    </script>
</body>

</html>