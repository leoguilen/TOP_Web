(function(){
  'use strict';
  
  $(document).ready(function(){

  	let form = $('.bootstrap-form');

  	// On form submit take action, like an AJAX call
    $(form).submit(function(e){

        if(this.checkValidity() == false) {
            $(this).addClass('was-validated');
            e.preventDefault();
            e.stopPropagation();
        }

    });

    // On every :input focusout validate if empty
    $(':input').blur(function(){
    	let fieldType = this.type;

    	switch(fieldType){
    		case 'text': 
    		case 'password':
                validateText($(this));
                break;
    		case 'email':
                validateEmail($(this));
                break;
    		case 'radio':
    			validateRadioButton($(this));
    			break;
    		case 'select-one':
    			validateSelectOne($(this));
    			break;
    		default:
	    		break;
    	}
	});


	// On every :input focusin remove existing validation messages if any
    $(':input').click(function(){

    	$(this).removeClass('is-valid is-invalid');

	});

    // On every :input focusin remove existing validation messages if any
    $(':input').keydown(function(){

        $(this).removeClass('is-valid is-invalid');

    });

	// Reset form and remove validation messages
    $(':reset').click(function(){
        $(':input, :checked').removeClass('is-valid is-invalid');
    	$(form).removeClass('was-validated');
    });

  });

    // Validate Text and password
    function validateText(thisObj) {
        let fieldValue = thisObj.val();
        if(fieldValue.length > 1) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }

    // Validate Email
    function validateEmail(thisObj) {
        let fieldValue = thisObj.val();
        let pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

        if(pattern.test(fieldValue)) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }

    // Validate CheckBox
    function validateRadioButton(thisObj) {

        if($("#radioM").is("checked")){
            $("#radioM").addClass('is-valid');
            
        }
        if($("#radioF").is("checked")){
            $("#radioF").addClass('is-valid');
        }
    }

    // Validate Select One Tag
    function validateSelectOne(thisObj) {

        let fieldValue = thisObj.val();
        
        if(fieldValue.equals("")) {
            $(thisObj).addClass('is-valid');
        } else {
            $(thisObj).addClass('is-invalid');
        }
    }
})();
