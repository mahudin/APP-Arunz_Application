



  function statusChangeCallback(response) {

    if (response.status === 'connected') {
		testAPI();
    } else if (response.status === 'not_authorized') {
    } else {
      FB.login(function(response) {
          FB.api('/me?fields=id,first_name,last_name,gender,age_range,email,locale,birthday,hometown', function (response) {

                  var birthday_dot = response.birthday.split("/");
                  console.log(response);
                  document.getElementById("email").value = response.email;
                  document.getElementById("imie").value = response.first_name;
                  document.getElementById("nazwisko").value = response.last_name;
                  if (response.gender == "male") {
                      document.getElementById("mezczyzna").checked = true;
                  }
                  else {
                      document.getElementById("kobieta").checked = true;
                  }
                  document.getElementById("miasto").value = response.hometown.name;
              });
      });
    }
  }

  function checkLoginState() {

	FB.init({
    		appId      : '1539013296395133',
    		cookie     : true,  // enable cookies to allow the server to access // the session
    		xfbml      : true,  // parse social plugins on this page
    		version    : 'v2.6' // use graph api version 2.5
  	});
    	FB.getLoginStatus(function(response) {
      		statusChangeCallback(response);
    	});
  }

  window.fbAsyncInit = function() {

  	FB.getLoginStatus(function(response) {
    		statusChangeCallback(response);
  	});
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  function testAPI() {

    FB.api('/me?fields=id,first_name,last_name,gender,age_range,email,locale,birthday,hometown', function(response) {
          var birthday_dot = response.birthday.split("/");
          console.log(response);
          document.getElementById("email").value=response.email;
          document.getElementById("imie").value=response.first_name;
          document.getElementById("nazwisko").value=response.last_name;
          if(response.gender=="male")
          {
            document.getElementById("mezczyzna").checked=true;
          }
          else
          {
            document.getElementById("kobieta").checked=true;
          }
          document.getElementById("miasto").value=response.hometown.name;

});
    
  }
