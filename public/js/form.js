// form submit        
$(document).ready(function () {   
  // report form submit     
  $("#reportForm").submit(function (event) {
  event.preventDefault();      
  var formData = $(this).serialize()
  var url = 'http://localhost/xpeedStudio/reports/addSubmit';
  //console.log(url);

    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        dataType: "json",
        encode: true
    }).done(function (data) {
        //console.log(data);

        if (!data.success) {
          if (data.errors.amount) {
            $("#amount").addClass("is-invalid");
            $("#amount-group").append(
              '<div class="invalid-feedback">' + data.errors.amount + "</div>"
            );
          }
          if (data.errors.buyer) {
            $("#buyer").addClass("is-invalid");
            $("#buyer-group").append(
              '<div class="invalid-feedback">' + data.errors.buyer + "</div>"
            );
          }
          if (data.errors.buyer_email) {
            $("#buyer_email").addClass("is-invalid");
            $("#buyer-email-group").append(
              '<div class="invalid-feedback">' + data.errors.buyer_email + "</div>"
            );
          }
          if (data.errors.receipt_id) {
            $("#receipt_id").addClass("is-invalid");
            $("#receipt-group").append(
              '<div class="invalid-feedback">' + data.errors.receipt_id + "</div>"
            );
          }
          if (data.errors.items) {
            $("#items").addClass("is-invalid");
            $("#items-group").append(
              '<div class="invalid-feedback">' + data.errors.items + "</div>"
            );
          }
          if (data.errors.phone) {
            $("#phone").addClass("is-invalid");
            $("#phone-group").append(
              '<div class="invalid-feedback">' + data.errors.phone + "</div>"
            );
          }
          if (data.errors.city) {
            $("#city").addClass("is-invalid");
            $("#city-group").append(
              '<div class="invalid-feedback">' + data.errors.city + "</div>"
            );
          }
          if (data.errors.note) {
            $("#note").addClass("is-invalid");
            $("#note-group").append(
              '<div class="invalid-feedback">' + data.errors.note + "</div>"
            );
          }
          
        } else {
          document.getElementById("reportForm").reset();    
          $(".success").html(
            '<div class="alert alert-success alert-dismissible fade show" role="alert">'+ data.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
          );
        }
    });
    $(".form-control").removeClass("is-invalid");
    $(".invalid-feedback").remove();

  });

  // delete report 
  $(".delete-report").click(function (event) {
    event.preventDefault();    
    var report_id = $(this).attr('data-id');
    var url = 'http://localhost/xpeedStudio/reports/delete';
    var thisRow = $(this).closest('tr');
    

    $.ajax({
      type: "POST",
      url: url,
      data: {
        report_id: report_id
      },
      dataType: "json",
      encode: true
      }).done(function (data) {          
          if (!data.success) {
            $(".custom-message").html(
              '<div class="alert alert-warning alert-dismissible fade show" role="alert">'+ data.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            );
          } else {
            thisRow.remove();
            $(".custom-message").html(
              '<div class="alert alert-success alert-dismissible fade show" role="alert">'+ data.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            );
          }
     });
  });

  // register form submit
  $("#registerForm").submit(function (event) {
    event.preventDefault();      
    var formData = $(this).serialize()
    var url = 'http://localhost/xpeedStudio/users/registerSubmit';
  
      $.ajax({
          type: "POST",
          url: url,
          data: formData,
          dataType: "json",
          encode: true
      }).done(function (data) {
          //console.log(data);
  
          if (!data.success) {
            if (data.errors.name) {
              $("#name").addClass("is-invalid");
              $("#name-group").append(
                '<div class="invalid-feedback">' + data.errors.name + "</div>"
              );
            }
            if (data.errors.email) {
              $("#email").addClass("is-invalid");
              $("#email-group").append(
                '<div class="invalid-feedback">' + data.errors.email + "</div>"
              );
            }
            if (data.errors.password) {
              $("#password").addClass("is-invalid");
              $("#password-group").append(
                '<div class="invalid-feedback">' + data.errors.password + "</div>"
              );
            }
            if (data.errors.confirm_password) {
              $("#confirm_password").addClass("is-invalid");
              $("#confirm-password-group").append(
                '<div class="invalid-feedback">' + data.errors.confirm_password + "</div>"
              );
            }
                        
          } else {
            document.getElementById("registerForm").reset();    
            $(".success").html(
              '<div class="alert alert-success alert-dismissible fade show" role="alert">'+ data.message + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            );
          }
      });
      $(".form-control").removeClass("is-invalid");
      $(".invalid-feedback").remove();
  
    });

  // search report
  $("#searchForm").submit(function (event) {
    event.preventDefault();    
    var from_date = $('#from_date').val();    
    var to_date = $('#to_date').val();
    var user_id = $('#user_id').val();
    if( from_date == '' || to_date == '' ){
      alert('Select From Date and To Date');
      return false;
    }    
    var url = 'http://localhost/xpeedStudio/reports/search';
    $.ajax({
      type: "POST",
      url: url,
      data: {
        from_date: from_date,
        to_date: to_date,
        user_id: user_id,
      },
      dataType: "json",
      encode: true
      }).done(function (data) {          
          if (data.success) {
            $('#report-table').html(data.result);
          }
     });
  });

});


