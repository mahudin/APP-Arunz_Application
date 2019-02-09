/**
 * Created by root on 02.09.2016.
 */
$(document).ready(function(){
   var jqxhr;
    $('.expend_marathon').on('click',function(){

       var idk=$(this).attr('name');
       $("#marathon"+idk+"extended").show();
       $(this).hide();
   });
    $('.rolling_marathon').on('click',function(){
        var idk=$(this).attr('name');
       // alert(idk);
        $("#expend"+idk).show();

        $(".bieg"+idk+" > .marathon_tlo ").animate({height:"250px"},500);
        //$("#marathon"+idk+"").hide();
        $(".biegextended"+idk).hide();
        $("#expand"+idk).show();
    });

    /*$(".marathon_tlo").on('mouseover',function(){
       $(this).css("background-color","#673ab7");
        $(this).css("color","white","important");
        $(this).find("h4").css("color","white","important");
        $(this).find(".szczegoly").css("border-color","white");
        $(this).find(".szczegoly").css("color","white");
    });*/

   // $(".marathon_tlo")
    $(".marathon_tlo").css("background-color","#F8F8F8");
    $(".marathon_tlo").css("color","#673ab7","important");
    $(".marathon_tlo").find("h4").css("color","black","important");
    $(".marathon_tlo").find(".szczegoly").css("border-color","#673ab7");
    $(".marathon_tlo").find(".szczegoly").css("color","#673ab7");
    //});
    //alert($("#fmail").val());


     $.ajax({
            url: "is_after_attention_more_information",
            type: "POST",
            data: {email: $("#fmail").val()},
            dataType: "json"
        })
        .done(function (data) {
            console.log("data: "+data);
            if (data > 0) {

                //alert(data);
            }
            else if(data == 0){
                console.log("read="+readCookie("once"));
                if(!(readCookie("once")==1)){
                    writeCookie("once",1,1);
                    $('[data-popup="popup-3"]').fadeIn(350);
                }


                //console.log("dupa");

            }
        }).fail(function(e){ console.log(e.responseText); });



    $("#ustaw").on('click',function(){
        $('[data-popup="popup-3"]').fadeOut(350);
        $('[data-popup="popup-4"]').fadeIn(350);

        $.ajax({
            method: "GET",
            url: "home_get_past_roads"
        }).done(function( msg ) {
            console.log(msg);
            var roads= JSON.parse(msg);// msg.split(",");
            var wlasc_roads=[];
            for(var l=0;l<roads.length;l++) {
                var roads_detail={value : roads[l], data: roads[l]};
                wlasc_roads[l]=roads_detail;
            }
            console.log("read1="+readCookie("once"));

            console.log("read2="+readCookie("once"));
            console.log(roads);
            $('#wydarzenia_search2').autocomplete({
                source: wlasc_roads,
                select: function (suggestion,ei) {
                    var thehtml = ""+ ei.item.value+"";
                    $('#my-events').html($('#my-events').html()+thehtml+"\n");
                }
            });
            console.log("cholera koniec");
        });
    });

    $(".szczegoly").on('click',function(){
            var moj_id=$(this).prev().val();
            console.log("moj_id: "+moj_id);

            $(".biegextended"+moj_id).show();
            var wysokosc=500+$(".uwaga"+moj_id).height()+20;
            $(".bieg"+moj_id+" > .marathon_tlo ").animate({height:wysokosc+"px"},500);
    });

});