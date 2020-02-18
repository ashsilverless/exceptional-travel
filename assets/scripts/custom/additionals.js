jQuery(document).ready(function( $ ) {
	$(".silverless-slider__item:first").addClass("first-slide").delay(3000).queue(function(next){
	    $(this).removeClass("first-slide");
	    $(this).addClass('is-active');
	});
    var toggleSlide = function(){
      $(".silverless-slider__item.is-active").removeClass("is-active").next().add(".silverless-slider__item:first").last().addClass("is-active");
      $(".silverless-slider__item.first-slide").removeClass("first-slide");
    }
    setInterval(toggleSlide, 10000);

//========== Amend Read More to include a Read Less function

	$('.open-trigger').on('click', function() {
		$('.row').removeClass('expand-content');
		$(this).closest('.row').addClass('expand-content');
		$('.open-trigger').css('opacity', '1');
		$(this).css('opacity', '0');
    });

	$('.close-trigger').on('click', function() {
		$(this).closest('.row').removeClass('expand-content');
		$(this).css('opacity', '1');
		$('.open-trigger').css('opacity', '1');
    });

//==========  Trigger for months & destination shortcuts thumb section

	$('.shortcut-trigger').on('click', function() {
		$('.shortcut-thumbs').toggleClass('reveal');
    });

//==========  Adjust maps section

var hoverColor =  ('#dcb070');
var normalColor = ('#828282');
var textColor = ('#e6e6e6');

setTimeout(function() {

if($('#world-map-desktop').length) {

  $("#on-desktop-map-africa").hover(function(){
  $(this).css("fill", hoverColor);

});

$("#on-desktop-map-australia").click(function(){
    $("#world-map-desktop path").css("fill", '#707070').css("stroke", '#707070');
    $("#unused path").css("fill", '#a4a4a4').css("stroke", '#a4a4a4');
    $("#on-desktop-map-australia path").css("fill", '#dcb070').css("stroke", '#dcb070');
    $('#myMapTab a[href="#map-australasia-desktop"]').tab('show');

});

$("#on-desktop-map-south-east-asia").click(function(){
    $("#world-map-desktop path").css("fill", '#707070').css("stroke", '#707070');
    $("#unused path").css("fill", '#a4a4a4').css("stroke", '#a4a4a4');
    $("#on-desktop-map-south-east-asia path").css("fill", '#dcb070').css("stroke", '#dcb070');
    $('#myMapTab a[href="#map-south-east-asia-desktop"]').tab('show');
});

$("#on-desktop-map-africa").click(function(){
    $("#world-map-desktop path").css("fill", '#707070').css("stroke", '#707070');
    $("#unused path").css("fill", '#a4a4a4').css("stroke", '#a4a4a4');
    $("#on-desktop-map-africa path").css("fill", '#dcb070').css("stroke", '#dcb070');
    $('#myMapTab a[href="#map-africa-desktop"]').tab('show');
});

$("#on-desktop-map-arabia").click(function(){
    $("#world-map-desktop path").css("fill", '#707070').css("stroke", '#707070');
    $("#unused path").css("fill", '#a4a4a4').css("stroke", '#a4a4a4');
    $("#on-desktop-map-arabia path").css("fill", '#dcb070').css("stroke", '#dcb070');
    $('#myMapTab a[href="#map-arabia-desktop"]').tab('show');
});

$("#on-desktop-map-indian-ocean").click(function(){
    $("#world-map-desktop path").css("fill", '#707070').css("stroke", '#707070');
    $("#unused path").css("fill", '#a4a4a4').css("stroke", '#a4a4a4');
    $("#on-desktop-map-indian-ocean path").css("fill", '#dcb070').css("stroke", '#dcb070');
    $('#myMapTab a[href="#map-indian-ocean-desktop"]').tab('show');
});

$("#on-desktop-map-india-beyond-sl").click(function(){
    $("#world-map-desktop path").css("fill", '#707070').css("stroke", '#707070');
    $("#unused path").css("fill", '#a4a4a4').css("stroke", '#a4a4a4');
    $("#on-desktop-map-india-beyond-sl path").css("fill", '#dcb070').css("stroke", '#dcb070');
    $('#myMapTab a[href="#map-india-beyond-desktop"]').tab('show');
});

$("#on-desktop-map-south-america").click(function(){
    $("#world-map-desktop path").css("fill", '#707070').css("stroke", '#707070');
    $("#unused path").css("fill", '#a4a4a4').css("stroke", '#a4a4a4');
    $("#on-desktop-map-south-america path").css("fill", '#dcb070').css("stroke", '#dcb070');
    $('#myMapTab a[href="#map-south-america-desktop"]').tab('show');
});

$("#on-desktop-map-central-america").click(function(){
    $("#world-map-desktop path").css("fill", '#707070').css("stroke", '#707070');
    $("#unused path").css("fill", '#a4a4a4').css("stroke", '#a4a4a4');
    $("#on-desktop-map-central-america path").css("fill", '#dcb070').css("stroke", '#dcb070');
    $('#myMapTab a[href="#map-central-america-desktop"]').tab('show');
});


$("#on-desktop-map-antarctic").click(function(){
    $("#world-map-desktop path").css("fill", '#707070').css("stroke", '#707070');
    $("#unused path").css("fill", '#a4a4a4').css("stroke", '#a4a4a4');
    $("#on-desktop-map-antarctic path").css("fill", '#dcb070').css("stroke", '#dcb070');
    $("#on-desktop-map-arctic path").css("fill", '#dcb070').css("stroke", '#dcb070');
    $('#myMapTab a[href="#map-polar-regions-desktop"]').tab('show');
});

$("#on-desktop-map-arctic").click(function(){
    $("#world-map-desktop path").css("fill", '#707070').css("stroke", '#707070');
    $("#unused path").css("fill", '#a4a4a4').css("stroke", '#a4a4a4');
    $("#on-desktop-map-antarctic path").css("fill", '#dcb070').css("stroke", '#dcb070');
    $("#on-desktop-map-arctic path").css("fill", '#dcb070').css("stroke", '#dcb070');
    $('#myMapTab a[href="#map-polar-regions-desktop"]').tab('show');
});

$("#on-desktop-map-antarctic").hover(function(){
    $("#on-desktop-map-antarctic path").css("fill", '#dcb070').css("stroke", '#dcb070');
    $("#on-desktop-map-arctic path").css("fill", '#dcb070').css("stroke", '#dcb070');
}, function() {
    $("#on-desktop-map-antarctic path").css("fill", '#707070').css("stroke", '#707070');
    $("#on-desktop-map-arctic path").css("fill", '#707070').css("stroke", '#707070');
});

$("#on-desktop-map-arctic").hover(function(){
    $("#on-desktop-map-antarctic path").css("fill", '#dcb070').css("stroke", '#dcb070');
    $("#on-desktop-map-arctic path").css("fill", '#dcb070').css("stroke", '#dcb070');
}, function() {
    $("#on-desktop-map-antarctic path").css("fill", '#707070').css("stroke", '#707070');
    $("#on-desktop-map-arctic path").css("fill", '#707070').css("stroke", '#707070');
});

$("#on-desktop-map-polar-regions").hover(function(){
    $("#ARC").css("fill", '#dcb070').css("stroke", '#dcb070');
    $("#ANT").css("fill", '#dcb070').css("stroke", '#dcb070');
}, function() {
    $("#on-desktop-map-antarctic path").css("fill", '#707070').css("stroke", '#707070');
    $("#on-desktop-map-arctic path").css("fill", '#707070').css("stroke", '#707070');
});

$("#on-desktop-map-central-america").hover(function(){
    $("#on-desktop-map-central-america path").css("fill", '#dcb070').css("stroke", '#dcb070');
}, function() {
    $("#on-desktop-map-central-america path").css("fill", '#707070').css("stroke", '#707070');
});

$("#on-desktop-map-south-america").hover(function(){
    $("#on-desktop-map-south-america path").css("fill", '#dcb070').css("stroke", '#dcb070');
}, function() {
    $("#on-desktop-map-south-america path").css("fill", '#707070').css("stroke", '#707070');
});

}

if($('#world-map-mobile').length) {

                        $("#on-mobile-map-south-east-asia").click(function(){
	                          $("#world-map-desktop path").css("fill", '#707070').css("stroke", '#707070');
                            $("#world-map-mobile path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-mobile-map-south-east-asia path").css("fill", '#dcb070').css("stroke", '#dcb070');
                            $('#myMapTabNone a[href="#map-south-east-asia-mobile"]').tab('show');
                        });

                        $("#on-mobile-map-australia").click(function(){
                            $("#world-map-mobile path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-mobile-map-australia path").css("fill", '#dcb070').css("stroke", '#dcb070');
                            $('#myMapTabNone a[href="#map-australasia-mobile"]').tab('show');
                        });

                        $("#on-mobile-map-africa").click(function(){
                            $("#world-map-mobile path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-mobile-map-africa path").css("fill", '#dcb070').css("stroke", '#dcb070');
                            $('#myMapTabNone a[href="#map-africa-mobile"]').tab('show');
                        });

                        $("#on-mobile-map-arabia").click(function(){
                            $("#world-map-mobile path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-mobile-map-arabia path").css("fill", '#dcb070').css("stroke", '#dcb070');
                            $('#myMapTabNone a[href="#map-arabia-mobile"]').tab('show');
                        });

                        $("#on-mobile-map-indian-ocean").click(function(){
                            $("#world-map-mobile path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $('#myMapTabNone a[href="#map-indian-ocean-mobile"]').tab('show');
                        });

                        $("#on-mobile-map-india-beyond").click(function(){
                            $("#world-map-mobile path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-mobile-map-india-beyond path").css("fill", '#dcb070').css("stroke", '#dcb070');
                            $('#myMapTabNone a[href="#map-india-beyond-mobile"]').tab('show');
                        });

                        $("#on-mobile-map-latin-america").click(function(){
                            $("#world-map-mobile path.cls-1").css("fill", '#9e9e9e').css("stroke", '#9e9e9e');
                            $("#on-mobile-map-latin-america path").css("fill", '#dcb070').css("stroke", '#dcb070');
                            $('#myMapTabNone a[href="#map-latin-america-mobile"]').tab('show');
                        });

                }

if($('.taxonomy-destinations-page #on-desktop-map-south-america').length) {

$("#AR, #BR, #CH, #EC, #PE, #CO").css("fill", normalColor);

//=====================
if($('.country-argentina.active').length) {
  $("#AR").css("fill", hoverColor);
} else {
  $(".country-argentina").hover(function(){
    $("#AR").css("fill", hoverColor);
      }, function() {
        $("#AR").css("fill", normalColor);
      });
}

$("#AR").hover(function(){
  $(".country-argentina").css("color", hoverColor);
  $("#AR").css('fill', hoverColor);
}, function() {
  $("#AR").css("fill", normalColor);
  $(".country-argentina").css("color", textColor);
});
//=====================
if($('.country-brazil.active').length) {
  $("#BR").css("fill", hoverColor);
} else {
  $(".country-brazil").hover(function(){
    $("#BR").css("fill", hoverColor);
      }, function() {
        $("#BR").css("fill", normalColor);
      });
}

$("#BR").hover(function(){
  $(".country-brazil").css("color", hoverColor);
  $("#BR").css('fill', hoverColor);
}, function() {
  $("#BR").css("fill", normalColor);
  $(".country-brazil").css("color", textColor);
});

//=====================
if($('.country-colombia.active').length) {
  $("#CO").css("fill", hoverColor);
} else {
  $(".country-colombia").hover(function(){
    $("#CO").css("fill", hoverColor);
      }, function() {
        $("#CO").css("fill", normalColor);
      });
}

$("#CO").hover(function(){
  $(".country-colombia").css("color", hoverColor);
  $("#CO").css('fill', hoverColor);
}, function() {
  $("#CO").css("fill", normalColor);
  $(".country-colombia").css("color", textColor);
});
//=====================

 if($('.country-chile.active').length) {
  $("#CH").css("fill", hoverColor);
} else {
  $(".country-chile").hover(function(){
    $("#CH").css("fill", hoverColor);
      }, function() {
        $("#CH").css("fill", normalColor);
      });
}

$("#CH").hover(function(){
  $(".country-chile").css("color", hoverColor);
  $("#CH").css('fill', hoverColor);
}, function() {
  $("#CH").css("fill", normalColor);
  $(".country-chile").css("color", textColor);
});
//=====================
  if($('.country-ecuador.active').length) {
  $("#EC").css("fill", hoverColor);
} else {
  $(".country-ecuador").hover(function(){
    $("#EC").css("fill", hoverColor);
      }, function() {
        $("#EC").css("fill", normalColor);
      });
}

$("#EC").hover(function(){
  $(".country-ecuador").css("color", hoverColor);
  $("#EC").css('fill', hoverColor);
}, function() {
  $("#EC").css("fill", normalColor);
  $(".country-ecuador").css("color", textColor);
});
//=====================
  if($('.country-peru.active').length) {
  $("#PE").css("fill", hoverColor);
} else {
  $(".country-peru").hover(function(){
    $("#PE").css("fill", hoverColor);
      }, function() {
        $("#PE").css("fill", normalColor);
      });
}

$("#PE").hover(function(){
  $(".country-peru").css("color", hoverColor);
  $("#PE").css('fill', hoverColor);
}, function() {
  $("#PE").css("fill", normalColor);
  $(".country-peru").css("color", textColor);
});
//=====================

}//End South America

if($('.taxonomy-destinations-page #map-polar-regions').length) {

$("#ant_1_, #arc_1_, sval_1_").css("fill", normalColor);

//=====================
  if($('.country-antarctica.active').length) {
  $("#ant_1_").css("fill", hoverColor);
} else {
  $(".country-antarctica").hover(function(){
    $("#ant_1_").css("fill", hoverColor);
      }, function() {
        $("#ant_1_").css("fill", normalColor);
      });
}

$("#ant_1_").hover(function(){
  $(".country-antarctica").css("color", hoverColor);
  $("#ant_1_").css('fill', hoverColor);
}, function() {
  $("#ant_1_").css("fill", normalColor);
  $(".country-antarctica").css("color", textColor);
});
//=====================
if($('.country-the-arctic.active').length) {
  $("#arc_1_").css("fill", hoverColor);
} else {
  $(".country-the-arctic").hover(function(){
    $("#arc_1_").css("fill", hoverColor);
      }, function() {
        $("#arc_1_").css("fill", normalColor);
      });
}

$("#arc_1_").hover(function(){
  $(".country-the-arctic").css("color", hoverColor);
  $("#arc_1_").css('fill', hoverColor);
}, function() {
  $("#arc_1_").css("fill", normalColor);
  $(".country-the-arctic").css("color", textColor);
});
//=====================
if($('.country-norway.active').length) {
  $("#sval_1_").css("fill", hoverColor);
} else {
  $(".country-norway").hover(function(){
    $("#sval_1_").css("fill", hoverColor);
      }, function() {
        $("#sval_1_").css("fill", normalColor);
      });
}

$("#sval_1_").hover(function(){
  $(".country-norway").css("color", hoverColor);
  $("#sval_1_").css('fill', hoverColor);
}, function() {
  $("#sval_1_").css("fill", normalColor);
  $(".country-norway").css("color", textColor);
});
//=====================
}//End Polar

if($('.taxonomy-destinations-page #map__central-america').length) {

$("#CR, #CU, #ME").css("fill", normalColor);

//=====================
if($('.country-costa-rica.active').length) {
  $("#CR").css("fill", hoverColor);
} else {
  $(".country-costa-rica").hover(function(){
    $("#CR").css("fill", hoverColor);
      }, function() {
        $("#CR").css("fill", normalColor);
      });
}

$("#CR").hover(function(){
  $(".country-costa-rica").css("color", hoverColor);
  $("#CR").css('fill', hoverColor);
}, function() {
  $("#CR").css("fill", normalColor);
  $(".country-costa-rica").css("color", textColor);
});
//=====================
if($('.country-mexico.active').length) {
  $("#ME").css("fill", hoverColor);
} else {
  $(".country-mexico").hover(function(){
    $("#ME").css("fill", hoverColor);
      }, function() {
        $("#ME").css("fill", normalColor);
      });
}

$("#ME").hover(function(){
  $(".country-mexico").css("color", hoverColor);
  $("#ME").css('fill', hoverColor);
}, function() {
  $("#ME").css("fill", normalColor);
  $(".country-mexico").css("color", textColor);
});
//=====================
if($('.country-cuba.active').length) {
  $("#CU").css("fill", hoverColor);
} else {
  $(".country-cuba").hover(function(){
    $("#CU").css("fill", hoverColor);
      }, function() {
        $("#CU").css("fill", normalColor);
      });
}

$("#CU").hover(function(){
  $(".country-cuba").css("color", hoverColor);
  $("#CU").css('fill', hoverColor);
}, function() {
  $("#CU").css("fill", normalColor);
  $(".country-cuba").css("color", textColor);
});
//=====================
}//End Central America

if($('.taxonomy-destinations-page #map__indian-ocean').length) {

$("#MLD, #SCH, #ME").css("fill", normalColor);

if($('.country-maldives.active').length) {
    $("#map__indian-ocean #MLD .st0").css("stroke", '#dcb070');
    $("#map__indian-ocean #MLD .st0").css("fill", '#dcb070');
} else {
    $(".country-maldives").hover(function(){
        $("#map__indian-ocean #MLD .st0").css("stroke", '#dcb070');
        $("#map__indian-ocean #MLD .st0").css("fill", '#dcb070');
    }, function() {
        $("#map__indian-ocean #MLD .st0").css("stroke", '#939191');
        $("#map__indian-ocean #MLD .st0").css("fill", '#939191');
    });
}
$("#map__indian-ocean #MLD").hover(function(){
    $(".country-maldives").css("color", '#dcb070');
}, function() {
    $(".country-maldives").css("color", '#ebebeb');
});

if($('.country-seychelles.active').length) {
    $("#map__indian-ocean #SCH .st0").css("stroke", '#dcb070');
    $("#map__indian-ocean #SCH .st0").css("fill", '#dcb070');
} else {
    $(".country-seychelles").hover(function(){
        $("#map__indian-ocean #SCH .st0").css("stroke", '#dcb070');
        $("#map__indian-ocean #SCH .st0").css("fill", '#dcb070');
    }, function() {
        $("#map__indian-ocean #SCH .st0").css("stroke", '#939191');
        $("#map__indian-ocean #SCH .st0").css("fill", '#939191');
    });
}
$("#map__indian-ocean #SCH").hover(function(){
    $(".country-seychelles").css("color", '#dcb070');
}, function() {
    $(".country-seychelles").css("color", '#ebebeb');
});

if($('.country-mauritius.active').length) {
    $("#map__indian-ocean #MRT-p .st0").css("stroke", '#dcb070');
    $("#map__indian-ocean #MRT-p .st0").css("fill", '#dcb070');
} else {
    $(".country-mauritius").hover(function(){
        $("#map__indian-ocean #MRT-p .st0").css("stroke", '#dcb070');
        $("#map__indian-ocean #MRT-p .st0").css("fill", '#dcb070');
    }, function() {
        $("#map__indian-ocean #MRT-p .st0").css("stroke", '#939191');
        $("#map__indian-ocean #MRT-p .st0").css("fill", '#939191');
    });
}
$("#map__indian-ocean #MRT-p").hover(function(){
    $(".country-mauritius").css("color", '#dcb070');
}, function() {
    $(".country-mauritius").css("color", '#ebebeb');
});
}//End Indian Ocean

if($('.taxonomy-destinations-page #map__australia').length) {

$("#AUSN, #AUSW, #AUSNE, #AUSS, #AUSV, #AUSQ, #AUST").css("fill", normalColor);

    if($('.country-northern-territory.active').length) {
        $("#map__australia #AUSN").css("fill", '#dcb070');
    } else {
        $(".country-northern-territory").hover(function(){
            $("#map__australia #AUSN").css("fill", '#dcb070');
        }, function() {
            $("#map__australia #AUSN").css("fill", '#939191');
        });
    }
    $("#map__australia #AUSN").hover(function(){
        $(".country-northern-territory").css("color", '#dcb070');
    }, function() {
        $(".country-northern-territory").css("color", '#ebebeb');
    });

    if($('.country-western-australia.active').length) {
        $("#map__australia #AUSW").css("fill", '#dcb070');
    } else {
        $(".country-western-australia").hover(function(){
            $("#map__australia #AUSW").css("fill", '#dcb070');
        }, function() {
            $("#map__australia #AUSW").css("fill", '#939191');
        });
    }
    $("#map__australia #AUSW").hover(function(){
        $(".country-western-australia").css("color", '#dcb070');
    }, function() {
        $(".country-western-australia").css("color", '#ebebeb');
    });

    if($('.country-new-south-wales.active').length) {
        $("#map__australia #AUSNE").css("fill", '#dcb070');
    } else {
        $(".country-new-south-wales").hover(function(){
            $("#map__australia #AUSNE").css("fill", '#dcb070');
        }, function() {
            $("#map__australia #AUSNE").css("fill", '#939191');
        });
    }
    $("#map__australia #AUSNE").hover(function(){
        $(".country-new-south-wales").css("color", '#dcb070');
    }, function() {
        $(".country-new-south-wales").css("color", '#ebebeb');
    });

    if($('.country-south-australia.active').length) {
        $("#map__australia #AUSS").css("fill", '#dcb070');
    } else {
        $(".country-south-australia").hover(function(){
            $("#map__australia #AUSS").css("fill", '#dcb070');
        }, function() {
            $("#map__australia #AUSS").css("fill", '#939191');
        });
    }
    $("#map__australia #AUSS").hover(function(){
        $(".country-south-australia").css("color", '#dcb070');
    }, function() {
        $(".country-south-australia").css("color", '#ebebeb');
    });

    if($('.country-victoria.active').length) {
        $("#map__australia #AUSV").css("fill", '#dcb070');
    } else {
        $(".country-victoria").hover(function(){
            $("#map__australia #AUSV").css("fill", '#dcb070');
        }, function() {
            $("#map__australia #AUSV").css("fill", '#939191');
        });
    }
    $("#map__australia #AUSV").hover(function(){
        $(".country-victoria").css("color", '#dcb070');
    }, function() {
        $(".country-victoria").css("color", '#ebebeb');
    });

    if($('.country-queensland.active').length) {
        $("#map__australia #AUSQ").css("fill", '#dcb070');
    } else {
        $(".country-queensland").hover(function(){
            $("#map__australia #AUSQ").css("fill", '#dcb070');
        }, function() {
            $("#map__australia #AUSQ").css("fill", '#939191');
        });
    }
    $("#map__australia #AUSQ").hover(function(){
        $(".country-queensland").css("color", '#dcb070');
    }, function() {
        $(".country-queensland").css("color", '#ebebeb');
    });

    if($('.country-tasmania.active').length) {
        $("#map__australia #AUST").css("fill", '#dcb070');
    } else {
        $(".country-tasmania").hover(function(){
            $("#map__australia #AUST").css("fill", '#dcb070');
        }, function() {
            $("#map__australia #AUST").css("fill", '#939191');
        });
    }
    $("#map__australia #AUST").hover(function(){
        $(".country-tasmania").css("color", '#dcb070');
    }, function() {
        $(".country-tasmania").css("color", '#ebebeb');
    });
}//End Australia

if($('.taxonomy-destinations-page #map__australasia').length) {

$("#AU, #NZ, #PG").css("fill", normalColor);

    if($('.country-australia.active').length) {
        $("#map__australasia #AU").css("fill", '#dcb070');
    } else {
        $(".country-australia").hover(function(){
            $("#map__australasia #AU").css("fill", '#dcb070');
        }, function() {
            $("#map__australasia #AU").css("fill", '#939191');
        });
    }
    $("#map__australasia #AU").hover(function(){
        $(".country-australia").css("color", '#dcb070');
    }, function() {
        $(".country-australia").css("color", '#ebebeb');
    });

    if($('.country-new-zealand.active').length) {
        $("#map__australasia #NZ").css("fill", '#dcb070');
    } else {
        $(".country-new-zealand").hover(function(){
            $("#map__australasia #NZ").css("fill", '#dcb070');
        }, function() {
            $("#map__australasia #NZ").css("fill", '#939191');
        });
    }
    $("#map__australasia #NZ").hover(function(){
        $(".country-new-zealand").css("color", '#dcb070');
    }, function() {
        $(".country-new-zealand").css("color", '#ebebeb');
    });

    if($('.country-papua-new-guinea.active').length) {
        $("#map__australasia #PG").css("fill", '#dcb070');
    } else {
        $(".country-papua-new-guinea").hover(function(){
            $("#map__australasia #PG").css("fill", '#dcb070');
        }, function() {
            $("#map__australasia #PG").css("fill", '#939191');
        });
    }
    $("#map__australasia #PG").hover(function(){
        $(".country-papua-new-guinea").css("color", '#dcb070');
    }, function() {
        $(".country-papua-new-guinea").css("color", '#ebebeb');
    });
}//End Australasia

if($('.taxonomy-destinations-page #map__arabia').length) {

$("#JO, #AE, #OM").css("fill", normalColor);

    if($('.country-jordan.active').length) {
        $("#map__arabia #JO").css("fill", '#dcb070');
    } else {
        $(".country-jordan").hover(function(){
            $("#map__arabia #JO").css("fill", '#dcb070');
        }, function() {
            $("#map__arabia #JO").css("fill", '#939191');
        });
    }
    $("#map__arabia #JO").hover(function(){
        $(".country-jordan").css("color", '#dcb070');
    }, function() {
        $(".country-jordan").css("color", '#ebebeb');
    });

    if($('.country-united-arab-emirates.active').length) {
        $("#map__arabia #AE").css("fill", '#dcb070');
    } else {
        $(".country-united-arab-emirates").hover(function(){
            $("#map__arabia #AE").css("fill", '#dcb070');
        }, function() {
            $("#map__arabia #AE").css("fill", '#939191');
        });
    }
    $("#map__arabia #AE").hover(function(){
        $(".country-united-arab-emirates").css("color", '#dcb070');
    }, function() {
        $(".country-united-arab-emirates").css("color", '#ebebeb');
    });

    if($('.country-oman.active').length) {
        $("#map__arabia #OM").css("fill", '#dcb070');
    } else {
        $(".country-oman").hover(function(){
            $("#map__arabia #OM").css("fill", '#dcb070');
        }, function() {
            $("#map__arabia #OM").css("fill", '#939191');
        });
    }
    $("#map__arabia #OM").hover(function(){
        $(".country-oman").css("color", '#dcb070');
    }, function() {
        $(".country-oman").css("color", '#ebebeb');
    });
}//End Arabia

if($('.taxonomy-destinations-page #map__india-beyond').length) {

$("#BT, #IN, #LK, #NP, #TIB, #KA").css("fill", normalColor);

    if($('.country-bhutan.active').length) {
        $("#map__india-beyond #BT").css("fill", '#dcb070');
    } else {
        $(".country-bhutan").hover(function(){
            $("#map__india-beyond #BT").css("fill", '#dcb070');
        }, function() {
            $("#map__india-beyond #BT").css("fill", '#939191');
        });
    }
    $("#map__india-beyond #BT").hover(function(){
        $(".country-bhutan").css("color", '#dcb070');
    }, function() {
        $(".country-bhutan").css("color", '#ebebeb');
    });

    if($('.country-india.active').length) {
        $("#map__india-beyond #IN, #map__india-beyond #KA").css("fill", '#dcb070');
    } else {
        $(".country-india").hover(function(){
            $("#map__india-beyond #IN, #map__india-beyond #KA").css("fill", '#dcb070');
        }, function() {
            $("#map__india-beyond #IN, #map__india-beyond #KA").css("fill", '#939191');
        });
    }
    $("#map__india-beyond #IN, #map__india-beyond #KA").hover(function(){
        $(".country-india").css("color", '#dcb070');
    }, function() {
        $(".country-india").css("color", '#ebebeb');
    });

    if($('.country-sri-lanka.active').length) {
        $("#map__india-beyond #LK").css("fill", '#dcb070');
    } else {
        $(".country-sri-lanka").hover(function(){
            $("#map__india-beyond #LK").css("fill", '#dcb070');
        }, function() {
            $("#map__india-beyond #LK").css("fill", '#939191');
        });
    }
    $("#map__india-beyond #LK").hover(function(){
        $(".country-sri-lanka").css("color", '#dcb070');
    }, function() {
        $(".country-sri-lanka").css("color", '#ebebeb');
    });

    if($('.country-nepal.active').length) {
        $("#map__india-beyond #NP").css("fill", '#dcb070');
    } else {
        $(".country-nepal").hover(function(){
            $("#map__india-beyond #NP").css("fill", '#dcb070');
        }, function() {
            $("#map__india-beyond #NP").css("fill", '#939191');
        });
    }
    $("#map__india-beyond #NP").hover(function(){
        $(".country-nepal").css("color", '#dcb070');
    }, function() {
        $(".country-nepal").css("color", '#ebebeb');
    });

    if($('.country-tibet.active').length) {
        $("#map__india-beyond #TIB").css("fill", '#dcb070');
    } else {
        $(".country-tibet").hover(function(){
            $("#map__india-beyond #TIB").css("fill", '#dcb070');
        }, function() {
            $("#map__india-beyond #TIB").css("fill", '#939191');
        });
    }
    $("#map__india-beyond #TIB").hover(function(){
        $(".country-tibet").css("color", '#dcb070');
    }, function() {
        $(".country-tibet").css("color", '#ebebeb');
    });
}//End India & Beyond

if($('.taxonomy-destinations-page #map__south-east-asia').length) {

$("#ID, #MM, #TH, #VN, #MY, #KH, #LA").css("fill", normalColor);

//=====================
if($('.country-indonesia.active').length) {
  $("#ID").css("fill", hoverColor);
} else {
  $(".country-indonesia").hover(function(){
    $("#ID").css("fill", hoverColor);
      }, function() {
        $("#ID").css("fill", normalColor);
      });
}

$("#ID").hover(function(){
  $(".country-indonesia").css("color", hoverColor);
  $("#ID").css('fill', hoverColor);
}, function() {
  $("#ID").css("fill", normalColor);
  $(".country-indonesia").css("color", textColor);
});
//=====================

    if($('.country-myanmar.active').length) {
        $("#map__south-east-asia #MM").css("fill", '#dcb070');
    } else {
        $(".country-myanmar").hover(function(){
            $("#map__south-east-asia #MM").css("fill", '#dcb070');
        }, function() {
            $("#map__south-east-asia #MM").css("fill", '#939191');
        });
    }
    $("#map__south-east-asia #MM").hover(function(){
        $(".country-myanmar").css("color", '#dcb070');
    }, function() {
        $(".country-myanmar").css("color", '#ebebeb');
    });

    if($('.country-thailand.active').length) {
        $("#map__south-east-asia #TH").css("fill", '#dcb070');
    } else {
        $(".country-thailand").hover(function(){
            $("#map__south-east-asia #TH").css("fill", '#dcb070');
        }, function() {
            $("#map__south-east-asia #TH").css("fill", '#939191');
        });
    }
    $("#map__south-east-asia #VN").hover(function(){
        $(".country-thailand").css("color", '#dcb070');
    }, function() {
        $(".country-thailand").css("color", '#ebebeb');
    });

    if($('.country-vietnam.active').length) {
        $("#map__south-east-asia #VN").css("fill", '#dcb070');
    } else {
        $(".country-vietnam").hover(function(){
            $("#map__south-east-asia #VN").css("fill", '#dcb070');
        }, function() {
            $("#map__south-east-asia #VN").css("fill", '#939191');
        });
    }
    $("#map__south-east-asia #VN").hover(function(){
        $(".country-vietnam").css("color", '#dcb070');
    }, function() {
        $(".country-vietnam").css("color", '#ebebeb');
    });

    if($('.country-malaysia.active').length) {
        $("#map__south-east-asia #MY").css("fill", '#dcb070');
    } else {
        $(".country-malaysia").hover(function(){
            $("#map__south-east-asia #MY").css("fill", '#dcb070');
        }, function() {
            $("#map__south-east-asia #MY").css("fill", '#939191');
        });
    }
    $("#map__south-east-asia #MY").hover(function(){
        $(".country-malaysia").css("color", '#dcb070');
    }, function() {
        $(".country-malaysia").css("color", '#ebebeb');
    });

    if($('.country-cambodia.active').length) {
        $("#map__south-east-asia #KH").css("fill", '#dcb070');
    } else {
        $(".country-cambodia").hover(function(){
            $("#map__south-east-asia #KH").css("fill", '#dcb070');
        }, function() {
            $("#map__south-east-asia #KH").css("fill", '#939191');
        });
    }
    $("#map__south-east-asia #LA").hover(function(){
        $(".country-laos").css("color", '#dcb070');
    }, function() {
        $(".country-laos").css("color", '#ebebeb');
    });

    if($('.country-laos.active').length) {
        $("#map__south-east-asia #LA").css("fill", '#dcb070');
    } else {
        $(".country-laos").hover(function(){
            $("#map__south-east-asia #LA").css("fill", '#dcb070');
        }, function() {
            $("#map__south-east-asia #LA").css("fill", '#939191');
        });
    }
    $("#map__south-east-asia #KH").hover(function(){
        $(".country-cambodia").css("color", '#dcb070');
    }, function() {
        $(".country-cambodia").css("color", '#ebebeb');
    });
}//End South East Asia

if($('.taxonomy-destinations-page #map__africa').length) {

$("#KE, #BW, #CG, #ET, #MG, #MW, #MZ, #MA, #NA, #RW, #TZ, UG, #ZA, #ZM, #ZW, #ST, #EG").css("fill", normalColor);

  if($('.country-kenya.active').length) {
      $("#map__africa #KE").css("fill", '#dcb070');
  } else {
      $(".country-kenya").hover(function(){
          $("#map__africa #KE").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #KE").css("fill", '#939191');
      });
  }
  $("#map__africa #KE").hover(function(){
      $(".country-kenya").css("color", '#dcb070');
  }, function() {
      $(".country-kenya").css("color", '#ebebeb');
  });


  if($('.country-botswana.active').length) {
      $("#map__africa #BW").css("fill", '#dcb070');
  } else {
      $(".country-botswana").hover(function(){
          $("#map__africa #BW").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #BW").css("fill", '#939191');
      });
  }
  $("#map__africa #BW").hover(function(){
      $(".country-botswana").css("color", '#dcb070');
  }, function() {
      $(".country-botswana").css("color", '#ebebeb');
  });

  if($('.country-republic-of-congo.active').length) {
      $("#map__africa #CG").css("fill", '#dcb070');
  } else {
      $(".country-republic-of-congo").hover(function(){
          $("#map__africa #CG").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #CG").css("fill", '#939191');
      });
  }
  $("#map__africa #CG").hover(function(){
      $(".country-republic-of-congo").css("color", '#dcb070');
  }, function() {
      $(".country-republic-of-congo").css("color", '#ebebeb');
  });


  if($('.country-algeria.active').length) {
      $("#map__africa #DZ").css("fill", '#dcb070');
  } else {
      $(".country-algeria").hover(function(){
          $("#map__africa #DZ").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #DZ").css("fill", '#939191');
      });
  }
  $("#map__africa #DZ").hover(function(){
      $(".country-algeria").css("color", '#dcb070');
  }, function() {
      $(".country-algeria").css("color", '#ebebeb');
  });


  if($('.country-ethiopia.active').length) {
      $("#map__africa #ET").css("fill", '#dcb070');
  } else {
      $(".country-ethiopia").hover(function(){
          $("#map__africa #ET").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #ET").css("fill", '#939191');
      });
  }
  $("#map__africa #ET").hover(function(){
      $(".country-ethiopia").css("color", '#dcb070');
  }, function() {
      $(".country-ethiopia").css("color", '#ebebeb');
  });


  if($('.country-madagascar.active').length) {
      $("#map__africa #MG").css("fill", '#dcb070');
  } else {
      $(".country-madagascar").hover(function(){
          $("#map__africa #MG").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #MG").css("fill", '#939191');
      });
  }
  $("#map__africa #MG").hover(function(){
      $(".country-madagascar").css("color", '#dcb070');
  }, function() {
      $(".country-madagascar").css("color", '#ebebeb');
  });

  if($('.country-malawi.active').length) {
      $("#map__africa #MW").css("fill", '#dcb070');
  } else {
      $(".country-malawi").hover(function(){
          $("#map__africa #MW").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #MW").css("fill", '#939191');
      });
  }
  $("#map__africa #MW").hover(function(){
      $(".country-malawi").css("color", '#dcb070');
  }, function() {
      $(".country-malawi").css("color", '#ebebeb');
  });

  if($('.country-mozambique.active').length) {
      $("#map__africa #MZ").css("fill", '#dcb070');
  } else {
      $(".country-mozambique").hover(function(){
          $("#map__africa #MZ").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #MZ").css("fill", '#939191');
      });
  }
  $("#map__africa #MZ").hover(function(){
      $(".country-mozambique").css("color", '#dcb070');
  }, function() {
      $(".country-mozambique").css("color", '#ebebeb');
  });

  if($('.country-morocco.active').length) {
      $("#map__africa #MA").css("fill", '#dcb070');
  } else {
      $(".country-morocco").hover(function(){
          $("#map__africa #MA").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #MA").css("fill", '#939191');
      });
  }
  $("#map__africa #MA").hover(function(){
      $(".country-morocco").css("color", '#dcb070');
  }, function() {
      $(".country-morocco").css("color", '#ebebeb');
  });

  if($('.country-namibia.active').length) {
      $("#map__africa #NA").css("fill", '#dcb070');
  } else {
      $(".country-namibia").hover(function(){
          $("#map__africa #NA").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #NA").css("fill", '#939191');
      });
  }
  $("#map__africa #NA").hover(function(){
      $(".country-namibia").css("color", '#dcb070');
  }, function() {
      $(".country-namibia").css("color", '#ebebeb');
  });

  if($('.country-rwanda.active').length) {
      $("#map__africa #RW").css("fill", '#dcb070');
  } else {
      $(".country-rwanda").hover(function(){
          $("#map__africa #RW").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #RW").css("fill", '#939191');
      });
  }
  $("#map__africa #RW").hover(function(){
      $(".country-rwanda").css("color", '#dcb070');
  }, function() {
      $(".country-rwanda").css("color", '#ebebeb');
  });

  if($('.country-tanzania.active').length) {
      $("#map__africa #TZ").css("fill", '#dcb070');
  } else {
      $(".country-tanzania").hover(function(){
          $("#map__africa #TZ").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #TZ").css("fill", '#939191');
      });
  }
  $("#map__africa #TZ").hover(function(){
      $(".country-tanzania").css("color", '#dcb070');
  }, function() {
      $(".country-tanzania").css("color", '#ebebeb');
  });

  if($('.country-uganda.active').length) {
      $("#map__africa #UG").css("fill", '#dcb070');
  } else {
      $(".country-uganda").hover(function(){
          $("#map__africa #UG").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #UG").css("fill", '#939191');
      });
  }
  $("#map__africa #UG").hover(function(){
      $(".country-uganda").css("color", '#dcb070');
  }, function() {
      $(".country-uganda").css("color", '#ebebeb');
  });

  if($('.country-south-africa.active').length) {
      $("#map__africa #ZA").css("fill", '#dcb070');
  } else {
      $(".country-south-africa").hover(function(){
          $("#map__africa #ZA").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #ZA").css("fill", '#939191');
      });
  }
  $("#map__africa #ZA").hover(function(){
      $(".country-south-africa").css("color", '#dcb070');
  }, function() {
      $(".country-south-africa").css("color", '#ebebeb');
  });

  if($('.country-zambia.active').length) {
      $("#map__africa #ZM").css("fill", '#dcb070');
  } else {
      $(".country-zambia").hover(function(){
          $("#map__africa #ZM").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #ZM").css("fill", '#939191');
      });
  }
  $("#map__africa #ZM").hover(function(){
      $(".country-zambia").css("color", '#dcb070');
  }, function() {
      $(".country-zambia").css("color", '#ebebeb');
  });

  if($('.country-zimbabwe.active').length) {
      $("#map__africa #ZW").css("fill", '#000');
  } else {
      $(".country-zimbabwe").hover(function(){
          $(" #map__africa #ZW").css("fill", '#000');
      }, function() {
          $("#map__africa #ZW").css("fill", '#939191');
      });
  }
  $("#map__africa #ZW").hover(function(){
      $(".country-zimbabwe").css("color", '#000');
  }, function() {
      $(".country-zimbabwe").css("color", '#ebebeb');
  });

  if($('.country-sao-tome-principe.active').length) {
      $("#map__africa #ST").css("fill", '#dcb070');
  } else {
      $(".country-sao-tome-principe").hover(function(){
          $("#map__africa #ST").css("fill", '#dcb070');
      }, function() {
          $("#map__africa #ST").css("fill", '#939191');
      });
  }
  $("#map__africa #ST").hover(function(){
      $(".country-sao-tome-principe").css("color", '#dcb070');
  }, function() {
      $(".country-sao-tome-principe").css("color", '#ebebeb');
  });
}//End Africa

}, 500);

//==========  Scroll highlight section to top on click

	$(".facts__regions .nav-tabs").click(function() {
	    $('html, body').animate({
	        scrollTop: $(".facts__regions").offset().top -100
	    }, 1000);
	});



//==========  Replace Owl Config for Footer slider

            var owlPartnersSection = $('.partners__carousel_revised');
            owlPartnersSection.owlCarousel({
                loop: false,
                margin: 15,
                lazyLoad: true,
                dots: false,
                autoplay:false, //This was set to true in custom.js
                autoplayTimeout:3000,
                autoplayHoverPause:true,
                responsiveClass: true,
                responsiveRefreshRate: true,
                responsive : {
                    0 : {
                        items: 2
                    },
                    576 : {
                        items: 3
                    },
                    // 768 : {
                    //     items: 4
                    // },
                    992 : {
                        items: 6
                    }
                }
            });
}); // Closing Jquery staterment - do not remove
