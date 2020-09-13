jQuery(document).ready(function () {
		$('.pop').hide();

if($(".message_box").val() == "You can login now."){
	$(".pop").show();
		gsap.from(".pop", {
			duration: 2,
			opacity: 0,
			rotation: 360,
			y: -1000,
			ease: "bounce"
		});
	}
	





$(".close").click(function () {
		$(".pop").hide();
	});


$("#submit_btn").click(function (e) {
		e.preventDefault();
		e.stopPropagation();
		
		var delay = 2000;
			
				var name = $('#name').val();
				var roll = $('#roll').val();
				var email = $('#email').val();
				var pass = $('#password').val();
				$.ajax({
					type: "POST",
					url: "insert.php",
					data: "name=" + name + "&roll=" + roll + "&email=" + email + "&pass=" + pass,
					beforeSend: function () {
						$('.message_box').html(
							'<img src="ajax-loader.gif" width="25" height="25"/>'
						);
					},
					success: function (data) {
						setTimeout(function () {
							$('.message_box').html(data);
						}, delay);

					}
				});
		});	


		jQuery("#password").keyup(function () {
			passwordStrength(jQuery(this).val());
		});

	});


	function flag() {
		if (((document.getElementById('jak_pstrength_text').innerHTML == 'Looks Good') || (document.getElementById('jak_pstrength_text').innerHTML == 'Strong mate!')) && ($('#compare').text() == 'Matching') && ($('#compare_reg').text() == '') && ($('#compare_email').text() == '') && ($('#compare_name').text() == '')) {
			return true;
		} else {
			return false;
		}
	}

	/* Password strength indicator */
	function passwordStrength(password) {
		password = $("#password").val();
		var msg = ['Not Acceptable', 'Very Weak', 'Weak', 'Standard', 'Looks Good', 'Strong mate!'];

		var desc = ['0%', '20%', '40%', '60%', '80%', '100%'];

		var descClass = ['', 'bg-danger', 'bg-danger', 'bg-warning', 'bg-success', 'bg-success'];

		var score = 0;

		// if password bigger than 6 give 1 point
		if (password.length > 6) score++;

		// if password has both lower and uppercase characters give 1 point	
		if ((password.match(/[a-z]/)) && (password.match(/[A-Z]/))) score++;

		// if password has at least one number give 1 point
		if (password.match(/\d+/)) score++;

		// if password has at least one special caracther give 1 point
		if (password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) score++;

		// if password bigger than 12 give another 1 point
		if (password.length > 9) score++;

		// Display indicator graphic
		$(".jak_pstrength").removeClass(descClass[score - 1]).addClass(descClass[score]).css("width", desc[score]);

		// Display indicator text
		$("#jak_pstrength_text").html(msg[score]);
		// if ($("#jak_pstrength_text").value == 'Looks Good' || $("#jak_pstrength_text").value == 'Strong mate!') {
		// 	document.getElementById('submit_btn').disabled = false;
		// } else {
		// 	document.getElementById('submit_btn').disabled = true;
		// }

		// Output the score to the console log, can be removed when used live.
		console.log(desc[score]);
		check();
		if (!flag()) {
			document.getElementById('submit_btn').disabled = true;
		} else {
			document.getElementById('submit_btn').disabled = false;
		}
	}


var reg=function(){
	const regExp=/^[0-9]{4}[L 0-9][0-9]{2}$/i;
	let value=$("#roll").val();
	if(regExp.test(value)){
		//document.getElementById('compare_reg').style.color = 'green';
		 $("#compare_reg").text("");
		//document.getElementById('submit_btn').disabled = false;
	}
	else{
		document.getElementById('compare_reg').style.color = 'red';
		$("#compare_reg").text("Invalid Roll No.");
		//document.getElementById('submit_btn').disabled = true;
	}
	if(!flag()){
		document.getElementById('submit_btn').disabled = true;
	}
	else{
		document.getElementById('submit_btn').disabled = false;
	}
}

var check = function () {
	if ((document.getElementById('password').value ==
			document.getElementById('confirm_password').value)            ) {
				if($("#password").val()=='')
					{
						$("#compare").empty();
					}

					else{
		document.getElementById('compare').style.color = 'green';
		document.getElementById('compare').innerHTML = 'Matching';
					}
		// if ((document.getElementById('jak_pstrength_text').innerHTML == 'Looks Good' || document.getElementById('jak_pstrength_text').innerHTML == 'Strong mate!') && (document.getElementById('compare_reg').innerHTML == 'Valid Roll No.') ) {
		// 	document.getElementById('submit_btn').disabled = false;
			//document.getElementById('submit_btn').disabled = false;
		//}
	} else {
		if($("#password").val()=='')
					{
						$("#compare").empty();
					}
					else{
		document.getElementById('compare').style.color = 'red';
		document.getElementById('compare').innerHTML = 'Not Matching!';
					}//document.getElementById('submit_btn').disabled = true;

	}
	if(!flag()){
		document.getElementById('submit_btn').disabled = true;
	}
	else{
		document.getElementById('submit_btn').disabled = false;
	}


};


var name_val = function (){

	const pattern=/^[A-Za-z ]+$/;
	if($('#name').val() == ""){
		document.getElementById('compare_name').style.color = 'red';
		document.getElementById('compare_name').innerHTML = 'This field can\'t be empty';
	}
	else if(!pattern.test($("#name").val()) ){
		document.getElementById('compare_name').style.color = 'red';
		document.getElementById('compare_name').innerHTML = 'Only alphabets are allowed';	
	}
	else{
		document.getElementById('compare_name').innerHTML = '';
	}
	if(!flag()){
		document.getElementById('submit_btn').disabled = true;
	}
	else{
		document.getElementById('submit_btn').disabled = false;
	}
}



var show = function () {
	alert("Hello" + FirstTime );
};



function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};



var compare_email=function(){
	
	let value=$("#email").val();
	if(isValidEmailAddress(value)){
		// document.getElementById('compare_email').style.color = 'green';
		$("#compare_email").text("");
		//document.getElementById('submit_btn').disabled = false;
	}
	else{
		document.getElementById('compare_email').style.color = 'red';
		$("#compare_email").text("Invalid Email!");
		//document.getElementById('submit_btn').disabled = true;
	}

	if(!flag()){
		document.getElementById('submit_btn').disabled = true;
	}
	else{
		document.getElementById('submit_btn').disabled = false;
	}
}











