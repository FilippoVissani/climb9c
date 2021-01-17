function isDesktop(){
    return $(window).width() >= 1366;
}

$(document).ready(function(){

    $("img#menu-toggler").click(function(){
        $( "div#menu" ).slideDown();
        if (!isDesktop()) {
            $( "div.container-fluid" ).slideUp();
        }
    });

    $("img#menu-back").click(function(){
        if($( "ul#menu-list" ).is(":visible")){
            $( "div#menu" ).slideUp();
            if (!isDesktop()) {
                $( "div.container-fluid" ).slideDown();
            }
        }else{
            $("ul#submenu-list").slideUp();
            $("ul#menu-list").slideDown();
        }
    });

    $("ul#menu-list > li").click(function(){
        $("ul#menu-list").slideUp();
        $("ul#submenu-list").slideDown();
    });
});
