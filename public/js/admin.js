$(document).ready(function() {
  $('.sideMenuToggler').on('click', function() {
    $('.wrapper').toggleClass('active');
    $('.icon.expandView')[0].innerText =
      $('.icon.expandView')[0].innerText != 'arrow_back'
        ? 'arrow_back'
        : 'arrow_forward';
  });

  var initialHideIcon = function() {
    $('.icon.expandView')[0].innerText =
      $(window).width() < 768 ? 'arrow_forward' : 'arrow_back';
  };

  var adjustSidebar = function() {
    $('.sidebar').slimScroll({
      height:
        document.documentElement.clientHeight - $('.navbar').outerHeight(),
    });
  };

  adjustSidebar();
  initialHideIcon();
  $(window).resize(function() {
    adjustSidebar();
    initialHideIcon();
  });
});

// Table Row href
$(document).ready(function() {
  $('tr[data-href]').click(function() {
    window.location.href = $(this).data('href');
  });
});
