<script>
var isDesktop=false;

function setDesktop(){
    isDesktop = ($(window).width() >= 1366) ? true : false;
}

function checkDesktop(){
    if(isDesktop){
        $("#search-bar").addClass("w-25");
        $("div.carousel-item > div > img").addClass("w-25");
        $("div#home-card").addClass("w-50");
    }else{
        $("#search-bar").removeClass("w-25");
        $("div.carousel-item > div > img").removeClass("w-25");
        $("div#home-card").removeClass("w-50");
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

    <?php foreach($templateParams["categories"] as $category): ?>
        $("img#menu-back").click(function(){
            if($( "ul#menu-categories" ).is(":visible")){
                $( "div#menu" ).slideUp();
                if (!isDesktop) {
                    $( "div.container-fluid" ).slideDown();
                }
            }else{
                $("ul#<?php echo $category["id"] ?>-subcategory").slideUp();
                $("ul#menu-categories").slideDown();
            }
        });

        $("li#<?php echo $category["id"] ?>-category").click(function(){
            $("ul#menu-categories").slideUp();
            $("ul#<?php echo $category["id"] ?>-subcategory").slideDown();
        });
    <?php endforeach; ?>
});
</script>
