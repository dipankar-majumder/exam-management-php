$(document).ready(function() {
  $('.sideMenuToggler').on('click', function() {
    $('.wrapper').toggleClass('active');
    console.log($('.icon.expandView')[0].innerText);
    $('.icon.expandView')[0].innerText == 'arrow_back'
      ? ($('.icon.expandView')[0].innerText = 'arrow_forward')
      : ($('.icon.expandView')[0].innerText = 'arrow_back');
  });

  var adjustSidebar = function() {
    $('.sidebar').slimScroll({
      height:
        document.documentElement.clientHeight - $('.navbar').outerHeight(),
    });
  };

  adjustSidebar();
  $(window).resize(function() {
    adjustSidebar();
  });
});
