$('#additional_qualification_form').ready(event =>
  $('#additional_qualification_form').hide(),
);
$('#additional_qualification_yes').click(event =>
  $('#additional_qualification_form').slideDown(),
);
$('#additional_qualification_no').click(event =>
  $('#additional_qualification_form').slideUp(),
);

$('form').submit(event => {
  $(':disabled').each(event => $(this).removeAttr('disabled'));
});
