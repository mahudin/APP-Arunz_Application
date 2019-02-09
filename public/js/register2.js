/**
 * Created by root on 27.08.2016.
 */

   $(document).ready(function(){

       $("#wydarzenia_search").autocomplete({
           source: "getdata",
           minLength: 1,
           select: function( event, ui ) {
               $('#udzial_w_wydarzeniach').html(ui.item.id);
           }
       });

         /*  $.ajax({
               method: "GET",
               url: "get_available_roads",
               dataType: "json",

           })
           .done(function( msg ) {
               var roads= msg.splice(",");
               var wlasc_roads=[];
               for(var l=0;l<roads.length;l++) {
                   var roads_detail={value : roads[l], data: roads[l]};
                   wlasc_roads[l]=roads_detail;
               }
               $('#wydarzenia_search').autocomplete({
                   lookup: wlasc_roads,
                   onSelect: function (suggestion) {
                       var thehtml = ""+ suggestion.value+"";
                       $('#udzial_w_wydarzeniach').html($('#udzial_w_wydarzeniach').html()+thehtml+"\n");// add(thehtml);// (thehtml);// (thehtml);
                   }
                });
           });*/

      /* $('#wydarzenia_search').autocomplete({
           lookup: currencies,
           onSelect: function (suggestion) {
               var thehtml = ""+ suggestion.value+"";
               $('#udzial_w_wydarzeniach').html($('#udzial_w_wydarzeniach').html()+thehtml+"\n");// add(thehtml);// (thehtml);// (thehtml);
           }
       });*/

       $('#przejdz_dalej').click(function(){
          var biegam_od=$('#biegam_od').val();
          var miesiecznie_przebiegam=$('#miesiecznie_przebiegam').val();
          var biegam_poniewaz=$('#biegam_poniewaz').val();
          var udzial_w_wydarzeniach=$('#udzial_w_wydarzeniach').val();
           if(biegam_od !='' && miesiecznie_przebiegam !='' && biegam_poniewaz!='') {
                  writeCookie('biegam_od', email, 1);
                  writeCookie('miesiecznie_przebiegam', haslo, 1);
                  writeCookie('biegam_poniewaz',imie,1);
                  writeCookie('udzial_w_wydarzeniach',nazwisko,1);
                  window.location='register3';
           }
           else {
               alert("Wypełnij wszystkie pola!");
               return false;
           }
       });
    });