var isDesktop=false;

function setDesktop(){
    isDesktop = ($(window).width() >= 1366) ? true : false;
}

function checkDesktop(){
    if(isDesktop){
        $("#search-bar").addClass("w-50");
    }else{
        $("#search-bar").removeClass("w-50");
    }
}

$(document).ready(function(){

    setDesktop();
    checkDesktop();

    $(window).resize(function(){
        setDesktop();
        checkDesktop();
    });

    $("img#menu-toggler").click(function(){
        $( "div#menu" ).slideDown();
        if (!isDesktop) {
            $( "div.container-fluid" ).slideUp();
        }
    });

    $("img#menu-back").click(function(){
        if($( "ul#menu-list" ).is(":visible")){
            $( "div#menu" ).slideUp();
            if (!isDesktop) {
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
