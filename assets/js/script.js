$(function () {

    $(document).ready(function () {
        initGame();
        restart();
        returnCardToShowFruitWhenClicked();
    });

    let returnCardToShowFruitWhenClicked = () => {
        $(document).on('click', '.card:not(.operating):not(.fixed)', function () {
            let numberCard = $(this).data('card');
            let game = $('#memory');
            if (window.memory.interval === undefined) {
                timer();
            }

            if (game.hasClass('first')) {
                stockOnLocalStorage(2, numberCard);
                game.removeClass('first');
                $(this).addClass('show');
                $('.card').addClass('operating');
                YouDontGetPair();
            } else {
                stockOnLocalStorage(1, numberCard);
                game.addClass('first');
                $(this).addClass('show').addClass('operating');
            }

        })

    };

    let YouDontGetPair = () => {
        let card1 = localStorage.getItem('memory_card_1');
        let card2 = localStorage.getItem('memory_card_2');

        if (card1 !== card2) {
            setTimeout(function () {
                $('.f' + card1).removeClass('show');
                $('.f' + card2).removeClass('show');
                allCardIsDecovered();
                $('.card').removeClass('operating');

            }, 500)
        } else {
            setTimeout(function () {
                $('.f' + card1).addClass('fixed');
                $('.card').removeClass('operating');
                allCardIsDecovered();
            }, 500)

        }
    };

    let stockOnLocalStorage = (card, number) => {
        localStorage.setItem('memory_card_' + card, number);
    };

    let restart = () => {
        $('.restart').click(function () {
            window.location.href = '';
        })
    };

    let initGame = () => {
        // carte a null
        stockOnLocalStorage(1, null);
        stockOnLocalStorage(2, null);

        //init timer 2:00
        $('.timer .text_timer').text('240')
    };

    let timer = () => {
        let depart = 240;
        let total = depart;
        let departprogress = 0;
        window.memory.interval = setInterval(function () {
            depart--;
            departprogress++;
            $('.timer .text_timer').text(depart);


            $('.progressbar').attr('style', 'width:' + (departprogress * 100 / total) + '%');
            if (depart <= 0) {
                clearInterval(window.memory.interval);
                $('.card').addClass('operating');
                $('.state').text('DEFAITE !');
            }
        }, 1000)
    };

    let allCardIsDecovered = () => {
        let numberTotal = $('.card').length;
        let numberFound = $('.card.fixed').length;

        $('.found_not_found').text((numberFound / 2) + '/' + (numberTotal / 2));

        if (numberFound === numberTotal) {
            // gagné
            clearInterval(window.memory.interval);
            $('.state').text('VICTOIRE !');
            $.ajax({
                url: 'timer.php',
                method: 'get',
                data: {timer: $('.timer .text_timer').text()},
                dataType: 'json',
                success: function (data) {
                    if (data.error !== undefined) {
                        if (data.error === true) {
                            console.error(data);
                        } else {
                            console.log(data);
                        }

                    }
                },
                error: function (err) {
                    console.error(err);
                }
            })
        }
    }

});
