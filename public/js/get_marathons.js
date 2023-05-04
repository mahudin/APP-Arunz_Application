/**
 * Created by root on 02.09.2016.
 */
$(document).ready(function(){
    var jqxhr;
    $('.expend_marathon').on('click',function(){

       var idk=$(this).attr('name');
       $("#marathon" + idk + "extended").show();
       $(this).hide();
    });
	
    $('.rolling_marathon').on('click',function(){
        var idk = $(this).attr('name');
        $("#expend"+idk).show();

        $(".bieg" + idk + " > .marathon_tlo ").animate({ height : "250px" },500);
        $(".biegextended" + idk).hide();
        $("#expand"+idk).show();
    });

    $(".marathon_tlo").css("background-color","#F8F8F8");
    $(".marathon_tlo").css("color","#673ab7","important");
    $(".marathon_tlo").find("h4").css("color","black","important");
    $(".marathon_tlo").find(".szczegoly").css("border-color","#673ab7");
    $(".marathon_tlo").find(".szczegoly").css("color","#673ab7");

    $.ajax({
            url: "is_after_attention_more_information",
            type: "POST",
            data: {email: $("#fmail").val()},
            dataType: "json"
    })
    .done(function (data) {
            if (data == 0) {
                if (!(readCookie("once") == 1)) {
                    writeCookie("once", 1, 1);
                    $('[data-popup="popup-3"]').fadeIn(350);
                }
            }
    }).fail(function(e){ console.log(e.responseText); });


    $("#ustaw").on('click', function() {
        $('[data-popup="popup-3"]').fadeOut(350);
        $('[data-popup="popup-4"]').fadeIn(350);

        $.ajax({
            method: "GET",
            url: "home_get_past_roads"
        }).done(function( msg ) {
            var roads= JSON.parse(msg);
            var wlasc_roads = [];
            for (var l = 0; l < roads.length ;l++) {
                var roads_detail = {value : roads[l], data: roads[l]};
                wlasc_roads[l] = roads_detail;
            }
            
            $('#wydarzenia_search2').autocomplete({
                source: wlasc_roads,
                select: function (suggestion,ei) {
                    var thehtml = ""+ ei.item.value+"";
                    $('#my-events').html($('#my-events').html() + thehtml + "\n");
                }
            });
        });
    });

    $(".szczegoly").on('click',function(){
        var moj_id=$(this).prev().val();

        $(".biegextended" + moj_id).show();
        var wysokosc = 500 + $(".uwaga"+moj_id).height() + 20;
        $(".bieg" + moj_id + " > .marathon_tlo ").animate({height:wysokosc + "px"}, 500);
    });
});