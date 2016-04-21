'use strict';

var sendEmail = function(){
    var form = $('#ca-form');
    form.submit(function(){

      var user_name = $('#ca-name').val();
      var user_mail = $('#ca-email').val();
      var user_subject = $('#ca-subject').val();
      var user_message = $('#ca-message').val();

      $.ajax(
        {
            type : 'POST',
            url : 'send.php',
            beforeSend : function(){
                $('.ca-loading').show();
            }
        })

        .done(function(response){
            $('.ca-loading').hide();
            $('#dd-formfeedback').text('Sent successfully' + response);
            form.trigger('reset');
        })

        .fail(function(){
            $('.ca-loading').hide();
            $('#dd-formfeedback').text('Oops!! Somenthing went wrong!!');
        })

      return false; // prevent page refresh
    });
};

$('document').ready(function(){

var mailgunURL;

mailgunURL = window.location.protocol + "//" + window.location.hostname + ':8080/send.php';

$('#mailgun').on('submit',function(e) {
  e.preventDefault();

  $('#mailgun *').fadeOut(200);
  $('#mailgun').prepend('Your submission is being processed...');

  $.ajax({
    type     : 'POST',
    cache    : false,
    url      : mailgunURL,
    data     : $(this).serialize(),
    success  : function(data) {
      responseSuccess(data);
      console.log(data);
    },
    error  : function(data) {
      console.log('Silent failure.');
    }
  });

  return false;

});

function responseSuccess(data) {

  data = JSON.parse(data);

  if(data.status === 'success') {
    $('#mailgun').html('Submission sent succesfully.');
  } else {
    $('#mailgun').html('Submission failed, please contact directly.');
  }

}

});
