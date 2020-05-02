
var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h6"
    , bodyTag: "section"
    , transitionEffect: "none"
    , titleTemplate: '#title# <span class="step">#index#</span>'
    , labels: {
        finish: "Submit"
    }
    , onStepChanging: function (event, currentIndex, newIndex) {
				console.log(indx);
				switch( indx ) {
				  case 0:
					if( complete_page[0] == 1 ){
							return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid());
					}else if ( erro == 0 ) {
							alert("กรุณาทำการ Get data Sale ก่อน!!");							
					} else {
							alert("การดึงข้อมูลเกิดความผิดพลาด กรุณาตรวจสอบ");
					}
					//alert( $('#steps-uid-0-t-'+indx+' .step').html()  + " - " + indx );
					break;
				  case 1:
					if( complete_page[1] == 1 ) {
							return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid());
					} else {
							alert("กรณารอสักครู่ ระบบกำลังตรวจสอบข้อมูล");
					}
					//alert( $('#steps-uid-0-t-'+indx+' .step').html()  + " - " + indx );
					break;
				  case 2:
					if( complete_page[2] == 1 ) {
							return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid());
					}else{
							alert( "กรุณาทำการ  Upload File material ก่อน!!!" );
					}
					//alert( $('#steps-uid-0-t-'+indx+' .step').html()  + " - " + indx );
					break;
				  case 3:
					if( complete_page[3] == 1 ) {
							return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid());
					}
					break;
				  case "5":
					if( complete_page[4] == 1 ) {
							return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid());
					}
					break;					
				  default:
					// code block
				}		
		//console.log(index);

		//return form.validate().settings.ignore = ":disabled", form.valid()
	
	}
    , onFinishing: function (event, currentIndex) {
		
        return form.validate().settings.ignore = ":disabled", form.valid()
    }
    , onFinished: function (event, currentIndex) {
		 location.reload();
         swal("Your Form Submitted!", "Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor.");
    }
}), $(".validation-wizard").validate({
    ignore: "input[type=hidden]"
    , errorClass: "text-danger"
    , successClass: "text-success"
    , highlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , errorPlacement: function (error, element) {
        error.insertAfter(element)
    }
    , rules: {
        email: {
            email: !0
        }
    }
})