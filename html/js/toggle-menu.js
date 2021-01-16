$(document).ready(function(){
    $("img#menu-toggler").click(function(){
        $( "div.container-fluid" ).slideToggle( "slow" );
        $( "div#menu" ).slideToggle( "slow" );
    });
    $("img#menu-back").click(function(){
        $( "div.container-fluid" ).slideToggle( "slow" );
        $( "div#menu" ).slideToggle( "slow" );
    });
});