
function dropdown() {
    if (!$(this).find('.buttonIcon').hasClass('rotated')) {
        $(this).find('.buttonIcon').addClass('rotated');
        $(this).parent().parent().find('.gameDropContent').removeClass('gameDropHidden');
        $(this).addClass('contentVisible');
    }
    else {
        $(this).find('.buttonIcon').removeClass('rotated');
        $(this).parent().parent().find('.gameDropContent').addClass('gameDropHidden');
        $(this).removeClass('contentVisible');
    }
}

function changeScoreColor() {
    let scoreElem = $('#gameScore');
    let score = parseFloat(scoreElem.text);

    if (score < 3)
        scoreElem.css('color' ,'#700000');
    else if (score < 5)
        scoreElem.css('color', '#af6300');
    else if (score < 6.5)
        scoreElem.css('color', '#d8b800');
    else if (score < 8)
        scoreElem.css('color', '#4aac09');
    else if (score < 9)
        scoreElem.css('color', '#007716');
    else
        scoreElem.css('color', '#004d0e');
}

function modoAvaliar() {
    $(this).find('.scoreStar').removeClass('mouseOut');
}

function modoMostrarAvaliacao() {
    $(this).find('.scoreStar').addClass('mouseOut');
}

function toggleLista() {
    $.ajax({
        url: BASE_URL + 'form/adicionaNaLista.php',
        method: 'GET',
        data: {
            gameID: gameID,
            naLista: naLista
        },
        success: function(result) {
            result = parseInt(result);

            if (result) {
                naLista = 1;
                $('#listaBtn').html('<i class="bi bi-check-lg"></i> Minha lista');
            } else {
                naLista = 0;
                $('#listaBtn').html('<i class="bi bi-plus-square"></i> Minha lista');
            }
        }
    });
}

function avaliaJogo() {
    let notaNova = parseFloat($(this).val());
    $.ajax({
        url: BASE_URL + 'form/avaliaJogo.php',
        method: 'GET',
        data: {
            gameID: gameID,
            avaliado: avaliado,
            nota: notaNova
        },
        success: function(result) {
            result = parseFloat(result);
            $('.scoreStarActive').removeClass('scoreStarActive');
            $('.scoreStar')[notaNova - 1].classList.add('scoreStarActive');
            $('#gameScore').html(result.toFixed(2));
            avaliado = 1;
        }
    });
}

$('.buttonDrop').on('click', dropdown);

$('#starScoreContainer').on('mouseenter', modoAvaliar);
$('#starScoreContainer').on('mouseleave', modoMostrarAvaliacao);

$('#listaBtn').on('click', toggleLista);

$('.scoreStar').on('click', avaliaJogo);

$('#novoComentario').on('input', function() {
    $('#novoComentario').attr('placeholder', ' ');
    if ($(this).val().trim() != '')
        $('#enviaComentarioBtn').addClass('active');
    else
        $('#enviaComentarioBtn').removeClass('active');
});

$('#novoComentario').on('focus', function() {
    $('#novoComentarioBtnContainer').show();
});

$('#cancelaComentarioBtn').on('click', function() {
    $('#novoComentario').attr('placeholder', 'Adicione um comentário...');
    $('#novoComentario').val('');
    $('#novoComentarioBtnContainer').hide();
});