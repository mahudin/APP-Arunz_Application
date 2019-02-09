
  function testAPI() {
      FB.api('/me?fields=id,first_name,last_name,gender,age_range,email,locale,birthday,hometown',
        function(response) {
          var emailek=response.email;
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
              if(xhttp.responseText==0)
              {
                window.location="register1";
              }
              else
              {
                window.location="home/marathons";
              }
            }
          };
          xhttp.open("POST", "fb_check_email", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("email="+emailek);
    });
  }

  function statusChangeCallbackPopup(response) {
    if (response.status === 'connected') {
      testAPI();
    } else if (response.status === 'not_authorized') {
    } else {
      FB.login(function(response){
        FB.api('/me?fields=id,first_name,last_name,gender,age_range,email,locale,birthday,hometown',
            function(response) {
              var emailek=response.email;
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                  if(xhttp.responseText==0)
                  {
                    window.location="register1";
                  }
                  else
                  {
                    window.location="home/marathons";
                  }
                }
              };
              xhttp.open("POST", "fb_check_email", true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("email="+emailek);
            })
      });

    }
  }

  function checkLoginStatePopup() {

	FB.init({
    		appId      : '1539013296395133',
    		cookie     : true,  // enable cookies to allow the server to access // the session
    		xfbml      : true,  // parse social plugins on this page
    		version    : 'v2.6' // use graph api version 2.5
  	});
    	FB.getLoginStatus(function(response) {
      		statusChangeCallbackPopup(response);
    	});
  }

  window.fbAsyncInit = function() {

  	FB.getLoginStatus(function(response) {
    		statusChangeCallbackPopup(response);
  	});
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));