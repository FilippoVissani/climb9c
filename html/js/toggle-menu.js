$(document).ready(function(){
    $("img#menu-toggler").click(function(){
        $( "div#menu" ).slideToggle( "slow" );
        if ($(window).width() < 1366) {
            $( "div.container-fluid" ).slideToggle( "slow" );
        }
    });

    $("img#menu-back").click(function(){
        $( "div#menu" ).slideToggle( "slow" );
        if ($(window).width() < 1366) {
            $( "div.container-fluid" ).slideToggle( "slow" );
        }
    });
});
