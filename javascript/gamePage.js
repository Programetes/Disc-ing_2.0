
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


$('.buttonDrop').on('click', dropdown);

$('#starScoreContainer').on('mouseenter', modoAvaliar);
$('#starScoreContainer').on('mouseleave', modoMostrarAvaliacao);