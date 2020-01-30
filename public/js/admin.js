$(document).ready(function() {
  $('.sideMenuToggler').on('click', function() {
    console.log(
      $(this)[0].className == 'navbar-toggler sideMenuToggler'
        ? 'arrow_forword'
        : 'arrow_back',
    );
    $('.wrapper').toggleClass('active');
    console.log($('.icon.expandView')[0].innerText);
    $('.icon.expandView')[0].innerText != 'arrow_back'
      ? ($('.icon.expandView')[0].innerText = 'arrow_back')
      : ($('.icon.expandView')[0].innerText = 'arrow_forward');
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

// Table Row href
$(document).ready(function() {
  $('tr[data-href]').click(function() {
    window.location.href = $(this).data('href');
  });
});
