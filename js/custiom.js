$(function(){
    'use strict';

    var userError    =   true,//settting error status
        
        emailError   =   true,
        
        msgError     =   true;

    
    $('.username').blur(function() {

        if ($(this).val().length < 4){ //show error
            // $(this).css('border', '1px solid #f00');
            $(this).css('border', '1px solid #f00').parent().find('.custom-alert').fadeIn(200)
            .end().parent().find('.astrisx').fadeIn(100);
            // $(this).parent().find('.astrisx').fadeIn(100);
            userError = true;

        }else { //no errors

            // $(this).css('border', '1px solid #080');
            $(this).css('border', '1px solid #080').parent().find('.custom-alert').fadeOut(200)
            .end().parent().find('.astrisx').fadeOut(100);
            // $(this).parent().find('.astrisx').fadeOut(100);
            userError= false;

        }
        

    });

    $('.email').blur(function() {
        if ($(this).val() === ''){

            // $(this).css('border', '1px solid #f00');

            $(this).css('border', '1px solid #f00').parent().find('.custom-alert').fadeIn(200)
            .end().find('astrisx').fadeIn(100);
            // $(this).parent().find('astrisx').fadeIn(100);

            emailError= true;

        }else {

            //$(this).css('border, 1px solid #080');
            $(this).css('border', '1px solid #080').parent().find('.custom-alert').fadeOut(200)
            .end().find('.astrisx').fadeOut(100);
            // $(this).parent().find('.astrisx').fadeOut(100);
            emailError= false;

        }
        

    });

    $('.message').blur(function() {
        if ($(this).val().length < 10) {

            // $(this).css('border', '1px solid #f00');
            $(this).css('border', '1px solid #f00').parent().find('.custom-alert').fadeIn(200)
            .end().find('astrisx').fadeIn(100);
            msgError= true;

        }else {

            // $(this).css('border', '1px solid #080');
            $(this).css('border', '1px solid #080').parent().find('.custom-alert').fadeOut(200)
            .end().find('.astrisx').fadeOut(100);

            msgError= false;

        }
    });

    //submit form validatoin

    $('.contact-form').submit(function (e) {
        if (userError === true || emailError === true || msgError === true){
            e.preventDefault();

            $('.username, .email, .message').blur();
        }
        
    });
    
});