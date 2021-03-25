
    $(document).ready(function(){
        $("#flip").click(function(){
            $("#panel").slideToggle("slow");
        });

        $('h4').click(function() {
            $(this).css({
                'font-size' : '130%',
                'color' : '#F00'

            });
        });

    });

