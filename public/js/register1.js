/**
 * Created by root on 27.08.2016.
 */






   $(document).ready(function(){


       var elements = document.getElementsByTagName("INPUT");
       for (var i = 0; i < elements.length; i++) {
           elements[i].oninvalid = function(e) {
               e.target.setCustomValidity("");
               if (!e.target.validity.valid) {
                   e.target.setCustomValidity("This field cannot be left blank");
               }
           };
           elements[i].oninput = function(e) {
               e.target.setCustomValidity("");
           };
       }

       function generatePassword() {
           var length = 8,
               charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
               retVal = "";
           for (var i = 0, n = charset.length; i < length; ++i) {
               retVal += charset.charAt(Math.floor(Math.random() * n));
           }
           return retVal;
       }

       function jakosc_hasla(val)
       {
           var haslo=val;
           var haslo_slabe = new RegExp("^[a-z]+$");
           var haslo_srednie1 = new RegExp("^[a-zA-Z]+$");
           var haslo_srednie2 = new RegExp("^[a-z0-9]+$");
           var haslo_mocne = new RegExp("^[a-zA-Z0-9]+$");
           if(haslo_slabe.test(haslo)) {
               $("#jakosc_hasla").html("<div class='haslo_slabe'>Słabe</div>");
           }
           else if(haslo_srednie1.test(haslo) || haslo_srednie2.test(haslo)) {
               $("#jakosc_hasla").html("<div class='haslo_srednie'>Średnie</div>");
           }
           else if(haslo_mocne.test(haslo)) {
               $("#jakosc_hasla").html("<div class='haslo_mocne'>Mocne</div>");
           }
       }

       $('#generuj_haslo').click(function(){

          $("#haslo").val(generatePassword());
           var haslo=$("#haslo").val();
           jakosc_hasla(haslo);
       });

       $('#widocznosc_haslo').click(function(){
           //alert($("#haslo").attr("type"));
           if($("#haslo").attr("type")=="password") {
               $(this).val("Ukryj");
               $("#haslo").prop("type","text");// ="text";//,"text");
           }
           else if($("#haslo").attr("type")=="text") {
               $(this).val("Pokaż");
               $("#haslo").prop("type","password");
           }
       });

       $('#haslo').keydown(function(){
           var haslo=$(this).val();
          jakosc_hasla(haslo);
       });

       $("#regulamin_button").click(function(){
          // alert($("#przejdz_dalej").attr("disabled"));
           $("#przejdz_dalej").attr("disabled")?$("#przejdz_dalej").removeAttr( "disabled" ):$("#przejdz_dalej").attr("disabled","true");
          //$("#przejdz_dalej").attr("disabled","false");
       });

       $('#przejdz_dalej').click(function(){
           var my_email=$('#email').val();
           if($("#haslo").val()!=$("#powtorz_haslo").val())
           {
               $("#error_pass").html("");
               $("#error_pass").append("<p>Podane hasła różnią się od siebie!</p>");
               return false;
           }
               $.ajax({
                       url: "check_email",
                       type : "POST",
                       data: { email : my_email },
                       dataType: "json"
                   })
                   .done(function(data) {
                       if(data > 0) {
                           $("#error_email").html("");
                           $("#error_email").append("<p>Podany email już istnieje w bazie!</p>");
                           e.stopPropagation();
                           return false;
                       }
                       else if(data == 0) {
                           if($("#haslo").val().length>=6) {
                               $("#error_pass").html("");
                               $("#error_imie").html("");
                               $("#error_nazwisko").html("");
                               $("#error_states").html("");
                               $("#error_miasto").html("");
                               $("#error_street").html("");
                               $("#error_telefon").html("");
                               $("#error_zip_code").html("");
                               if($("#imie").val()==""){
                                   $("#error_imie").append("<p>Brakuje imienia</p>");
                               }
                               if($("#nazwisko").val()==""){
                                   $("#error_nazwisko").append("<p>Brakuje nazwiska</p>");
                               }
                               if($("#states").val()==""){
                                   $("#error_states").append("<p>Brakuje województwa</p>");
                               }
                               if($("#miasto").val()==""){
                                   $("#error_miasto").append("<p>Brakuje miasta</p>");
                               }
                               if($("#street").val()==""){
                                   $("#error_street").append("<p>Brakuje ulicy</p>");
                               }
                               if($("#telefon").val()==""){
                                   $("#error_telefon").append("<p>Brakuje numeru telefonu</p>");
                               }
                               if($("#zip_code").val()==""){
                                   $("#error_zip_code").append("<p>Brakuje kodu pocztowego</p>");
                               }

                          if( $("#imie").val()==""||$("#nazwisko").val()==""||$("#states").val()==""||$("#miasto").val()==""||$("#street").val()==""||$("#telefon").val()==""||$("#zip_code").val()==""){
                              return false;
                          }
                          else{
                              $('#dane_podstawowe').submit();
                          }




                           }
                           else {
                               $("#error_pass").html("");
                               $("#error_pass").append("<p>Podane hasło jest za krótkie(min.6 znaków)!</p>");
                               e.stopPropagation();
                               return false;
                           }
                       }
                   });
           e.stopPropagation();
           return false;
       });
   });