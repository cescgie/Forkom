
jQuery(document).ready(function($) {

    $(".dpk-container").mixItUp();

    var inputText;
    var $matching = $();
    var delay = (function(){
        var timer = 0;
        return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        };
    })();

    $("#dpk-input").keyup(function(){
        delay(function(){
            inputText = $("#dpk-input").val().toLowerCase();

            if ((inputText.length) > 0) {
                $( '.mix').each(function() {
                    $this = $("this");

                    if($(this).children('.pengajian_kota').text().toLowerCase().match(inputText)) {
                        $matching = $matching.add(this);
                    }
                    else {
                        $matching = $matching.not(this);
                    }
                });
                $(".dpk-container").mixItUp('filter', $matching);
            }

            else {
                $(".dpk-container").mixItUp('filter', 'all');
            }
        }, 200 );
    });
});