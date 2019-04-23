 

$(document).ready(function() {	
   //get const

var current,prev_btn,next_btn;
var left,opacity,scale;

$('.next').click(function(){
    current = $(this).parent();
    next_btn = $(this).parent().next();
    // console.log(current);
    // console.log(next_btn);


   //activate next step on progressbar using the index of next_btn
   $('.progressbar li').eq($('section').index(next_btn)).addClass('active');

   //show the next div

     next_btn.show();
     //console.log(next_btn.show());
     // hide the current div with style
    $('#meter').html($('input[name=meter_num]').val());
    $('#phone').html($('input[name=phone_num]').val());
    $('#amount').html('# '+$('input[name=amount]').val());
    $('#payment').html($('#myselect option:selected').text());

    var meter = $('input[name=meter_num]').val();
    var phone = $('input[name=phone_num]').val();
    var amount = $('input[name=amount]').val();


    if (meter == '' || phone == '' || amount == '' ) {
    toastr.info('Please fill in all fields to contiune');
      $('.progressbar li').eq($('section').index(next_btn)).removeClass('active');
        
      next_btn.hide();
    }else{
      next_btn.show();
    
     current.animate({opacity:0},{
         step:function(now, mx){
             //scale = 1 - (1 - now ) * 0.2;

             //left = (now * 50)+"%";

             opacity = 1 - now;
             //current.css({'transform': 'scale('+scale+')'});
             next_btn.css({'opacity': opacity});
             
         },
         duration: 800,
         complete:(() =>{
             current.hide();
         }),
         easing: 'easeInOutBack'
     });

      current.hide();
    }

});
// previous section
$('.prev').click(function(){
    current = $(this).parent();
    prev_btn = $(this).parent().prev();


   //deactivate next step on progressbar using the index of prev_btn
   $('.progressbar li').eq($('section').index(current)).removeClass('active');

   //show the next div

   prev_btn.show();
   //console.log(prev_btn.show());
   // hide the current div with style

   current.animate({opacity:0},{
       step:function(now, mx){
           //scale = 0.8 - (1 - now ) * 0.2;

           //left = (1 - now * 50)+"%";

           opacity = 1 - now;
        //    current.css({'left':left});
           prev_btn.css({'opacity': opacity});
           
       },
       duration: 800,
       complete:(() =>{
           current.hide();
       }),
       easing: 'easeInOutBack'
   });


});

$('.done').click(() =>{
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });


  // $data = array(
  //   'meter': $('input[name=meter_num]').val(),
  //   );
  // console.log(data);

  
  $.ajax({
    url: '/purchase',
    type: 'POST',
    data: {
     'meter': $('input[name=meter_num]').val(),
     'phone':$('input[name=phone_num]').val(),
     'amount': $('input[name=amount]').val(),
     'payment':$('#myselect option:selected').text(),
     'email': $('input[name=email]').val()
    },
  })
  .done(function(response) {
   $('#code').html(response);
    console.log($('#code').html(response));
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    $('.done').hide();
    $('#stripe_button').show();
    console.log("complete");
  });



})




        var handler = StripeCheckout.configure({
            key: 'pk_test_wNfSAzIlWCpffru0OdTG628U',
            image: '/images/lamplogo.png',
            locale: 'auto',
            token: function(token) {
                var domain = window.location.protocol + '//' + window.location.hostname;
                console.log(token);
                $.ajax({
                    data: {
                      'code': $('#code').text(),
                      'meter': $('input[name=meter_num]').val(),
                        'token':token
                        },
                    url: '/payment/stripeCharge',
                    type: 'POST'
                }).done(function(order_id) {
                  console.log(order_id);
                    if (order_id == 'reject') {
                        toastr.info('Payment Pending Checking');
                        console.log('Rejected');
                    } else if (order_id == 'pending') {
                         toastr.info('Payment Pending Checking');
                        console.log('Pending Checking');
                       // window.location.replace(domain + '/payment/pendingChecking');
                    } else if (order_id == 'error') {
                        toastr.warning('Payment Error');
                        console.log('Error');
                       // window.location.replace(domain + '/payment/error');
                    } else {
                        toastr.success('Payment Successful');
                        sendSms();
                        console.log('Success');

                        //window.location.replace(domain + '/payment/success?order_id='+order_id);
                    }
                }).fail(function(response) {
                    console.log('FAIL', response);
                    toastr.warning('Payment Error');
                   // window.location.replace(domain + '/payment/error');
                });
                // You can access the token ID with `token.id`.
                // Get the token ID to your server-side code for use.
            }
        });

        document.getElementById('stripe_button').addEventListener('click', function(e) {
          e.preventDefault();
          var agreeEmail = $('input[name=email]').val();
          var amount = $('input[name=amount]').val();
          try {
              handler.open({
                  name: 'Lamp',
                  amount: amount,
                  billingAddress: true,
                  email: agreeEmail
              });
          } catch (e) {
              alert(e);
          }
        });

        // Close Checkout on page navigation:
        window.addEventListener('popstate', function() {
          handler.close();
        });

        function sendSms() {
          // var code = $('#code').text();

          // $.ajax({
          //   url: '/confirmationsms',
          //   type: 'POST',
          //   data: {
          //    code,
             
          //   },
          // })
          // .done(function(response) {
          //   toastr.info(response);
          //  // console.log(response);
          // })
          // .fail(function() {
          //   console.log("error");
          // })
          // .always(function() {
            
          // })  ;
        }

  


});



