if($('.taxonomy-destinations-page #map__south-east-asia').length) {
    if($('.country-indonesia.active').length) {
        $("#map__south-east-asia #ID").css("fill", '#ff');
    } else {
        $(".country-indonesia").hover(function(){
            $("#map__south-east-asia #ID").css("fill", '#ff');
        }, function() {
            $("#map__south-east-asia #ID").css("fill", '#fff');
        });
    }
    $("#map__south-east-asia #ID").hover(function(){
        $(".country-indonesia").css("color", '#fff');
    }, function() {
        $(".country-indonesia").css("color", '#fff');
    });
    }
