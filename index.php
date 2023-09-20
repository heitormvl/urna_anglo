<?php

$pdo = require 'connect.php';

$candidatos = $pdo->query('SELECT * FROM vw_candidatos')->fetchAll(PDO::FETCH_ASSOC);

$arrCandidatos = [];

if ($candidatos) {
    foreach ($candidatos as $candidato) {
        $arrCandidatos[$candidato['numero_candidato']] = [
            'nome_candidato' => $candidato['nome_candidato'],
            'nome_partido_candidato' => $candidato['nome_partido_candidato'],
            'sigla_partido_candidato' => $candidato['sigla_partido_candidato'],
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
</head>

<script type="text/javascript">
    const candidatos = <?= $json ?>;
</script>

<body>
    <div class="container-fluid">
        <div class="tela">
            <div class="row">
                <div class="col-8">
                    <h2 class="cargo">
                        Representante de Turma
                    </h2>
                    <form action="confirmar_voto.php" method="POST" class="pt-3">
                        <input type="text" name="digito1" id="digito1" >
                        <input type="text" name="digito2" id="digito2">
                        <input type="hidden" name="numero_candidato" id="numero_candidato">
                        <div class="dados-candidato d-none">
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
                <div class="col-4 foto d-none">
                    <div class="foto-candidato"></div>
                </div>
            </div>
            <div class="keypad">
                <!-- Adicione botões para os números de 0 a 9, Branco, Corrige e Confirmar -->
                <div>
                    <button class="btn btn-primary btn-block digito">1</button>
                    <button class="btn btn-primary btn-block digito">2</button>
                    <button class="btn btn-primary btn-block digito">3</button>
                </div>
                <div>
                    <button class="btn btn-primary btn-block digito">4</button>
                    <button class="btn btn-primary btn-block digito">5</button>
                    <button class="btn btn-primary btn-block digito">6</button>
                </div>
                <div>
                    <button class="btn btn-primary btn-block digito">7</button>
                    <button class="btn btn-primary btn-block digito">8</button>
                    <button class="btn btn-primary btn-block digito">9</button>
                </div>
                <div>
                    <button class="btn btn-primary btn-block digito">0</button>
                </div>
                <div class="comandos">
                    <button class="btn btn-primary btn-block comando">Branco</button>
                    <button class="btn btn-primary btn-block comando">Corrige</button>
                    <button class="btn btn-primary btn-block comando">Confirma</button>
                </div>
            </div>
            <div class="row rodape mt-4 p-1 d-none">
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
    <script src="script.js"></script>
</body>

</html>