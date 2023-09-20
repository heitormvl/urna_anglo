<?php

$pdo = require 'connect.php';

$candidatos = $pdo->query('SELECT * FROM vw_candidatos')->fetchAll(PDO::FETCH_ASSOC);

$arrCandidatos = [];

if ($candidatos) {
    foreach ($candidatos as $candidato) {
        $arrCandidatos[] = [
            'nome_candidato' => $candidato['nome_candidato'],
            'nome_partido_candidato' => $candidato['nome_partido_candidato'],
            'sigla_partido_candidato' => $candidato['sigla_partido_candidato'],
            'numero_candidato' => $candidato['numero_candidato'],
            'foto_candidato' => $candidato['foto_candidato'],
            'nome_turma' => $candidato['nome_turma']
        ];
    }
}

$json = json_encode($arrCandidatos);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Urna Eletrônica Anglo</title>
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="tela">
            <div class="row">
                <div class="col-8">
                    <h2 class="cargo">
                        Representante de Turma
                    </h2>
                    <form action="confirmar_voto.php" method="POST" class="pt-3">
                        <input type="number" name="digito1" id="digito1">
                        <input type="number" name="digito2" id="digito2">
                        <div class="dados_candidato">
                            <div class="dados">
                                <span>
                                    Nome:
                                </span>
                                <span class="dado" id="nome_candidato">Fulano</span>
                            </div>
                            <div class="dados">
                                <span>
                                    Partido:
                                </span>
                                <span class="dado" id="partido_candidato">Partido X - PX</span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-4">
                    <div class="foto-candidato"></div>
                </div>
            </div>
            <div class="row rodape mt-4 p-1">
                <div class="col-12">
                    <div>
                        PRESSIONE A TECLA <code>ENTER</code> PARA CONFIRMAR ESTE VOTO
                    </div>
                    <div>
                        PRESSIONE A TECLA <code>BACKSPACE</code> PARA CORRIGIR ESTE VOTO
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>