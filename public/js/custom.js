//wow js 
wow = new WOW(
    {
    boxClass:     'wow',      // default
    animateClass: 'animated', // default
    offset:       0,          // default
    mobile:       true,       // default
    live:         true,        // default
    resetAnimation: true
    }
   )
 wow.init();
 // end of wow js





$(document).ready(function(){
    $('.menu').click(function(e){
        e.preventDefault();
        // console.log('done');
       $('.main-nav').fadeToggle(700);
       $('.card').fadeToggle(700);
       $('.custom').hide();

    });

    $('.button-new').click(function(e){
        e.preventDefault();
        $('.modal-nav').fadeIn(700);
        
    })
     $('.close').click(function(e){
        e.preventDefault();
        $('.modal-nav').fadeOut(700);
        
    });


     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     $('#proceed').click(function(event) {
       event.preventDefault();
       // alert('hey');

       var meter = $('input[name=meter_num]').val();
       var amount = $('input[name=amount]').val();
       var card_num = $('input[name=card_num]').val();
       var cvc = $('input[name=cvc]').val();
       var cvc = $('input[name=card-expiration]').val();


       // if (meter == '' || card_num == '' || amount == ''  || cvc == '' || card-expiration == '' ) {
       // toastr.info('Please fill in all fields to contiune');
        
       // }else{

         $.ajax({
           url: '/purchase',
           type: 'POST',
          data: {
             'meter': $('input[name=meter_num]').val(),
             'amount': $('input[name=amount]').val(),
             'card_num': $('input[name=card_num]').val(),
             'cvc': $('input[name=cvc]').val(),
             'expiration': $('input[name=card-expiration]').val()
           },
         })
         .done(function(response) {
           console.log(response);
           $('#trans-form').fadeOut('500');
           $('#code').fadeIn('100');
           $('#stripe_button').fadeIn('100');
           $('#code').html(response);
           $('.recent').load(location.href + '.recent');
           console.log($('#code').html(response));
         })
         .fail(function() {
           console.log("error");
         })
         .always(function() {
           console.log("complete");
         });
         
         
       // }

       //stripe

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
         $('.modal-nav').fadeOut('500');
         var amount = $('input[name=amount]').val();
         try {
             handler.open({
                 name: 'Lamp',
                 amount: amount,
                 billingAddress: true,
                 // email: agreeEmail
             });
         } catch (e) {
             alert(e);
         }
       });

       // Close Checkout on page navigation:
       window.addEventListener('popstate', function() {
         handler.close();
       });


       //end




     });


});
