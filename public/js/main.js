$(document).ready(function(){
	
    $('#sign-in').click(function(){
		window.location.href='/register';
    });

	$( ".datepicker" ).datepicker();
		$( ".datepicker" ).datepicker("option", "dateFormat", "yy-mm-dd" );

		$( ".datepicker_profil" ).datepicker();
		$( ".datepicker_profil" ).datepicker("option", "dateFormat", "yy-mm-dd" );
		$( ".datepicker_profil" ).datepicker('setDate', new Date("yy-mm-dd",$( ".datepicker_profil").val())  );

		$('img.svg').each(function(){
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');

            jQuery.get(imgURL, function(data) {
                var $svg = jQuery(data).find('svg');

                if(typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
				
                if(typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass+' replaced-svg');
                }

                $svg = $svg.removeAttr('xmlns:a');

                $img.replaceWith($svg);

            }, 'xml');

        });

			$('#myNavbar div.kraina').on('click', function(e)  {

				if($(this).attr('name')=="/about_us")
				{
					return window.location=$(this).attr('name');
				}
				else if($('#twoje_konto').attr('val')=="on")
				{
					$('[data-popup=popup-1]').fadeIn(250);
					$(".remember_pass").on('click',function(e){
						$('[data-popup=popup-1]').fadeOut(25);
						$('[data-popup=popup-2]').fadeIn(250);
						return false;
					});
					return false;
				}
				else
				{
					return window.location=$(this).attr('name');
				}
			});

				$('[data-popup-open]').on('click', function(e)  {
	       				 var targeted_popup_class = jQuery(this).attr('data-popup-open');
	       				 $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);
						 e.preventDefault();
				});

				$('.popup').on('click', function(e)  {

					if( e.target.id != "popek" &&
						e.target.id != "faceb" && 
						e.target.id != "gmail" &&
						e.target.id != "fmail" && 
						e.target.id != "fhaslo" &&
						e.target.id != "flog" &&
						e.target.id != "gmail" &&
						e.target.id != "fremail" &&
						e.target.id != "login_user_form" &&
						e.target.id != "opis_gorny" &&
							e.target.id !="napis_instr_captcha" &&
							e.target.id != "popek2" &&
							e.target.id != "fremail" &&
							e.target.id != "input_captcha" &&
							e.target.id != "remember_pass_user_form" &&
							e.target.id != "opis_gorny2" &&
							e.target.id != "repass_button_new" &&
							e.target.id != "popek3" &&
							e.target.id != "opis_gorny3" &&
							e.target.id != "trzeci_naglowek" &&
							e.target.id != "ustaw" &&
							e.target.id != "popek4" &&
							e.target.id != "opis_gorny4" &&
							e.target.id != "czwarty_naglowek" &&
							e.target.id != "wyslij_preferencje" &&
							e.target.id != "my-events" &&
							e.target.id != "walking_for" &&
							e.target.id != "walking_because" &&
							e.target.id != "walking_count" &&
							e.target.id !="label_walking_for" &&
							e.target.id !="label_walking_because" &&
							e.target.id !="label_walking_count" &&
							e.target.id !="label_my-events" &&
							e.target.id !="label_shirt_size" &&
							e.target.id !="wydarzenia_search2"&&
							e.target.id !="wydarzenia_search" &&
							e.target.id !="shirt_size" &&
							e.target.id != "non-touch1" &&
							e.target.tagName != "OPTION"
							) //e.target.id != "faceb" || e.target.id != "gmail" ||
					{
						if(e.target.id !="wydarzenia_search2" &&
							e.target.id !="wydarzenia_search" &&
							e.target.id != "my-events" &&
							e.target.id != "walking_for" &&
							e.target.id != "walking_because" &&
							e.target.id != "walking_count" &&
							e.target.id !="label_walking_for" &&
							e.target.id !="label_walking_because" &&
							e.target.id !="label_walking_count" &&
							e.target.id !="label_my-events" &&
							e.target.id !="label_shirt_size" &&
							e.target.id !="shirt_size")
						{
							e.preventDefault();
						}
						else if(e.target.class == "non-touch"){
							e.preventDefault();
						}
						else if(e.target.id =="wyslij_preferencje"){

							var zawartosc=$("#my-events").val();
							// var czesci=zawartosc.split("\n");
							console.log("Zawartość: "+zawartosc);
							if(zawartosc!=""){
								$.ajax({
									method: "POST",
									url: "set_my_roads",
									data: {dane:zawartosc}
								}).done(function( msg ) {
									console.log(msg);
								}).fail(function(e){console.log(e.responseText);});
							}
							console.log("Zawartość2: "+$("#shirt_size").val());
							$.ajax({
								method: "POST",
								url: "update_profile_additional",
								data: {
									idu:$("#idu").val(),
									shirt_size:$("#shirt_size").val(),
									walking_because:$("#walking_because").val(),
									walking_for:$("#walking_because").val(),
									walking_count:$("#walking_count").val(),
								}
							}).done(function( msg ) {
								console.log(msg);
								$('[data-popup="popup-4"]').fadeOut(350);
							}).fail(function(e){console.log(e.responseText);});

							$('[data-popup="popup-4"]').fadeOut(350);
						}

							$('[data-popup="popup-1"]').fadeOut(350);
							$('[data-popup="popup-2"]').fadeOut(350);
							$('[data-popup="popup-3"]').fadeOut(350);
							$('[data-popup="popup-4"]').fadeOut(350);

					}
    			});

	$('#remember_pass_user_form').on('submit',function(e){

		if($("#g-recaptcha-response").val()!="")
		{
			var jqxhr =
			$.ajax({url: "check_email",type : "POST",
				data: { email : $("#fremail").val()},dataType: "json"})
					.done (function(data) {
						if(data > 0 )
						{
							//alert(data);
							 $.ajax({url: "send_email",type : "POST",
								data: { email : $("#fremail").val()},dataType: "json"})
									 .done(function(datasa){
										// alert(datasa);
										 $('[data-popup="popup-2"]').fadeOut(350);
									 }).fail(function(e){ console.log(e.responseText); });
						}
						else
						{
							$("#error_email").html("");
							$("#error_email").append("<div style='text-align:center;'>" +
									"Nie mamy takiego użytkownika w naszej bazie danych! </div>");
							return false;
						}
					})
					.fail (function(e){ console.log(e.responseText); });
			return false;
		}
		else
		{
			return false;
		}
	});

	$('.popupek').on('click', function(e)  {
		e.preventDefault();
	});

	$('.pas_m').on('click',function(){
		$('body').on('click', function(e)  {
			if(e.target.id != "popek") {}
			var targeted_popup_class = jQuery(this).attr('data-popup-close');
			$('[data-popup="' + targeted_popup_class + '"]').fadeOut(250);
			e.stopPropagation();
		});
	});

    $('a').on('click',function(){	
		window.location.href=$(this).attr('href');
    });




	$( "#flog" ).on('click',function() {
		$("#fmail_errors").html("");
		$("#fhaslo_errors").html("");
		if($("#fmail").val()!="" && $('#fhaslo').val()!="") {

			var patt1 = new RegExp("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]{1,})*\.([a-zA-Z]{2,}){1}$");
			temp = $("#fmail").val();
			if (patt1.test(temp)) {
				$.ajax({
					url: "check_email_and_password",
					type : "POST",
					data: { email : $("#fmail").val(),pass:$('#fhaslo').val() },
					dataType: "json"
				})
				.done(function(data) {
					$("#fmail_errors").html("");
					if(data > 0) 
					{
						$.ajax({
							url: "check_compatibility",
							type : "POST",
							data: { email : $("#fmail").val(), pass:$('#fhaslo').val() },
							dataType: "json"
						})
						.done(function(data) {
							if(data > 0) {
								$("#login_user_form").submit();
								return true;
							}
							else
							{
								$("#fhaslo_errors").append("<div style='text-align:center;'>" +
										"Podane hasło jest nieprawidłowe, spróbuj jeszcze raz " +
										"lub <a class='remember_pass'>Przypomnij hasło</a></div>");
							}
						})
						.fail(function(e){ console.log(e.responseText); });
						return false;
					}
					else if(data==0)
					{
						var wysokosc=$("#popek").css("height");
						$("#popek").css("height",wysokosc+50 ,'important');

						$("#fhaslo_errors").append("<div style='text-align:center;'>" +
												"Podane hasło jest nieprawidłowe, spróbuj jeszcze raz " +
												"lub <a class='remember_pass'>Przypomnij hasło</a></div>");
						return false;
					}
					return false;
				})
				.fail(function(e){ console.log(e.responseText); });
			} 
			else 
			{
				var wysokosc=$("#popek").css("height");
				$("#popek").css("height",wysokosc+50 ,'important');
				$("#fmail_errors").append("<div style='text-align:center;'>" +
						"Wprowadzony adres jest niepoprawny! </div>");
				return false;
			}
		}
		else
		{
			var wysokosc=$("#popek").css("height");
			$("#popek").css("height",wysokosc+50 ,'important');
			$("#fmail_errors").append("<div style='text-align:center;'>" +
					" Wartości pól adresu email oraz hasła są puste! </div>");
		}

		return false;
	});

	$("#usprawnij_system_podpowiedzi").on('click',function(){
		$('[data-popup="popup-3"]').fadeIn(350);
	});

	$("#wyslij_preferencje").on('click',function(){

		var zawartosc=$("#my-events").val();

		if(zawartosc!=""){
			$.ajax({
				method: "POST",
				url: "set_my_roads",
				data: {dane:zawartosc}
			}).done(function( msg ) {
				console.log(msg);
			}).fail(function(e){console.log(e.responseText);});
		}

		$.ajax({
			method: "POST",
			url: "update_profile_additional",
			data: {
				idu:$("#idu").val(),
				shirt_size:$("#shirt_size").val(),
				walking_because:$("#walking_because").val(),
				walking_for:$("#walking_because").val(),
				walking_count:$("#walking_count").val(),
			}
		}).done(function( msg ) {
			console.log(msg);
			$('[data-popup="popup-4"]').fadeOut(350);
		
		}).fail(function(e){console.log(e.responseText);});
		$("#usprawnij_system_podpowiedzi").css("display","none");
		$('[data-popup="popup-4"]').fadeOut(350);

	});

	$("#ustaw").on('click',function(){
		$('[data-popup="popup-3"]').fadeOut(350);
		$('[data-popup="popup-4"]').fadeIn(350);

		$.ajax({
			method: "GET",
			url: "home_get_past_roads"
		}).done(function( msg ) {
			var roads = JSON.parse(msg);// msg.split(",");
			var wlasc_roads = [];
			for(var l=0; l<roads.length; l++) {
				var roads_detail={value : roads[l], data: roads[l]};
				wlasc_roads[l]=roads_detail;
			}
			$('#wydarzenia_search2').autocomplete({
				source: wlasc_roads,
				select: function (suggestion,ei) {
					var thehtml = ""+ ei.item.value+"";
					$('#my-events').html($('#my-events').html()+thehtml+"\n");
				}
			});
		});
	});

		$.ajax({
			method: "GET",
			url: "get_available_roads"
		}).done(function( msg ) {
				var roads= JSON.parse(msg);
				var wlasc_roads=[];
				for(var l=0;l<roads.length;l++) {
					var roads_detail={value : roads[l], data: roads[l]};
					wlasc_roads[l]=roads_detail;
				}
				$('#wydarzenia_search').autocomplete({
					source: wlasc_roads,
					select: function (suggestion,ei) {
						var thehtml = ""+ ei.item.value+"";
						$('#udzial_w_wydarzeniach').html($('#udzial_w_wydarzeniach').html()+thehtml+"\n");
					}
				});
			});

}).showUp('.navbar', {
	upClass: 'navbar-show',
	downClass: 'navbar-hide'
});