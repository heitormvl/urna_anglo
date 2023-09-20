// On load
jQuery(function ($) {

    // Instala atalhos para Enter e Backspace
    $('html').on('keydown', function (e) {
        if (e.keyCode == 13) {
            confirmar();
        }
        else if (e.keyCode == 8) {
            corrigir();
        }
    });

    // Botões de dígitos
    $('button.digito').on('click', function () {

        const digito = parseInt($(this).text());
        const visor1 = $('#digito1');
        const visor2 = $('#digito2');

        if (!visor1.val()) {
            visor1.val(digito);
        }
        else if (!visor2.val()) {
            visor2.val(digito);
            exibirCandidato(true);
        }
    });

    // Botões de comandos
    $('button.comando[data-cmd="branco"]').on('click', votoBranco);
    $('button.comando[data-cmd="corrigir"]').on('click', corrigir);
    $('button.comando[data-cmd="confirmar"]').on('click', confirmar);
});


function exibirCandidato(exibir) {
    if (exibir) {
        if (!validarCandidato()) { return; }
        $('.dados-candidato').removeClass('d-none');
        $('.foto').removeClass('d-none');
        $('.rodape').removeClass('d-none');
    }
    else {
        $('.dados-candidato').addClass('d-none');
        $('.foto').addClass('d-none');
        $('.rodape').addClass('d-none');
        $('.voto-especial').addClass('d-none');
    }
}

function confirmar() {
    if (!voto()) {
        return;
    }
    // Toca o áudio de Confirmar
    const audio = new Audio('audio/confirma-urna.mp3');
    audio.play();
    // No evento Ended do áudio, submete o formulário
    audio.onended = function () {
        $('#frm_votacao').submit();
    };
}

function corrigir() {
    $('#digito1').val('');
    $('#digito2').val('');
    voto('');
    exibirCandidato(false);
}

function votoBranco() {
    exibirCandidato(false);
    $('.voto-especial.voto-branco').removeClass('d-none');
    voto('00');
}

function votoNulo() {
    exibirCandidato(false);
    $('.voto-especial.voto-nulo').removeClass('d-none');
    voto('999');
}

function validarCandidato() {

    const numCandidato = $('#digito1').val() + $('#digito2').val();

    // Checa se o número do candidato existe
    if (!candidatos[numCandidato]) {
        votoNulo();
        return false;
    }

    const candidato = candidatos[numCandidato];

    // // Checa o ID da turma
    // const idTurma = $_GET['turma'];
    // if (candidato.id_turma_candidato != idTurma) {
    //     votoNulo();
    //     return false;
    // }

    $('#nome_candidato').text(candidato.nome_candidato);
    $('#partido_candidato').text(candidato.sigla_partido_candidato + " - " + candidato.nome_partido_candidato);
    $('.foto-candidato').css('background-image', 'url(images/' + candidato.foto_candidato + ')');

    voto(numCandidato);

    return true;
}

function voto(numCandidato) {
    if (numCandidato == undefined) {
        return $('#numero_candidato').val();
    }
    $('#numero_candidato').val(numCandidato);
}
