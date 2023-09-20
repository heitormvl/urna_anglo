<?php

$pdo = require 'connect.php';

$turma = $pdo->query('SELECT * FROM turma WHERE id_turma = ' . intval($_GET['turma']))->fetch(PDO::FETCH_ASSOC);
$apuracao = $pdo->query('SELECT * FROM vw_apuracao WHERE turma = ' . intval($_GET['turma']))->fetchAll(PDO::FETCH_ASSOC);

$brancos = 0;
$nulos = 0;

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Urna Eletrônica Anglo</title>
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Apuração da votação da turma <?= $turma['nome_turma'] ?></h1>
        <h2>Resultado</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Sigla</th>
                    <th>Partido</th>
                    <th>Candidato</th>
                    <th>Votos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($apuracao as $candidato) : ?>
                    <?php if ($candidato['candidato'] == 0)
                    {
                        $brancos = $candidato['qtd_votos'];
                        continue;
                    }
                    elseif ($candidato['candidato'] == 999)
                    {
                        $nulos = $candidato['qtd_votos'];
                        continue;
                    }
                    ?>
                    <tr>
                        <td><?= $candidato['sigla_partido_candidato'] ?></td>
                        <td><?= $candidato['nome_partido_candidato'] ?></td>
                        <td><?= $candidato['nome_candidato'] ?></td>
                        <td><?= $candidato['qtd_votos'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Resumo</h2>
        <ul>
        <li><strong>Total de votos:</strong> <?= array_sum(array_column($apuracao, 'qtd_votos')) ?></li>
        <li><strong>Total de votos válidos:</strong> <?= array_sum(array_column($apuracao, 'qtd_votos')) - $brancos - $nulos ?></li>
        <li><strong>Total de votos brancos:</strong> <?= $brancos ?></li>
        <li><strong>Total de votos nulos:</strong> <?= $nulos ?></li>
        </ul>
    </div>
</body>

</html>