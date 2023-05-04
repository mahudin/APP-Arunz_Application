/**
 * Created by root on 27.08.2016.
 */
   $(document).ready(function(){

       $('#przejdz_dalej').click(function(){
           var numer_karty = $('#numer_karty').val();
           var data_waznosci = $('#data_waznosci').val();
           var kod_karty = $("#cvv_cvc").val();
           $("#error_codecard").html("");
           if(numer_karty !='' && data_waznosci !='')
           {
               var patt1 = new RegExp("^([0-9]{4}[0-9]{4}[0-9]{4}[0-9]{4}|[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4})$");
               if (patt1.test(numer_karty)) {
                   var patt2 = new RegExp("^[0-9]{3}$");
                   if (patt2.test(kod_karty)) {
                       $('#dane_do_karty').submit();
                   }
                   else{
                       $("#error_codecard").append("<p>Podany kod karty jest nieprawidłowy!</p>");
                       return false;
                   }
               }
               else
               {
                   $("#error_nrcard").append("<p>Podany numer karty jest nieprawidłowy!</p>");
                   return false;
               }
           }
           else
           {
               $("#error_nrcard").append("<p>Wypełnij wszystkie pola!</p>");
               return false;
           }
           return false;
       });
    });