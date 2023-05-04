
  var didScroll;
  var lastScrollTop = 0;
  var delta = 5;
  var navbarHeight = $('header').outerHeight();

  $(window).scroll(function(event){
    didScroll = true;
  });

  setInterval(function() {
    if (didScroll) {
      hasScrolled();
      didScroll = false;
    }
  }, 250);

  function hasScrolled() {
    var st = $(this).scrollTop();

    if(Math.abs(lastScrollTop - st) <= delta)
      return;

    if (st > lastScrollTop && st > navbarHeight) {
      $('header').animate({
        top: "-100"
      },250);
    } else {
   
      if(st + $(window).height() < $(document).height()) {
        $('header').animate({
          top: "0"
        },250);
      }
    }
    lastScrollTop = st;
  }