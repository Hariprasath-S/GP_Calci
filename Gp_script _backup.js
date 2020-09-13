var delay = 2000;
const tl = gsap.timeline();
const options = {
  linkSelector:
    'a[href^="' +
    window.location.origin +
    '"]:not([data-no-swup]), a[href^="./"]:not([data-no-swup]), a[href^="#"]:not([data-no-swup])'
};
const swup = new Swup(options);
let GPAs = Array(8).fill(0.00);
let rad=0, app = 1,app_cgp=1;
cgpa_val = parseFloat(cgpa_val);

tl.from('.header', {
		duration: 1,
		opacity: 0,
		y: -100,
		ease: 'elastic'
	})
	.from(".transition-left", {
		duration: 1,
		opacity: 0,
		x: -100,
		ease: 'elastic'
	}, '-=0.9')
	.from('.transition-up', {
		duration: 1,
		opacity: 0,
		x: 200,
		ease: 'back'
	}, '=-0.5')
	.from('.transition-right', {
		duration: 1,
		opacity: 0,
		x: -200,
		ease: 'back'
	}, '=-0.5')
	.from('.footer', {
		duration: 1,
		opacity: 0,
		y: 100,
		ease: 'elastic'
	});


jQuery(document).ready(function () {
	
//FETCH GPAS
	$.ajax({                                      
          url: 'fetch_gpas.php',                  
          data: "",                        
          dataType: 'json',             
          success: function(data)          
          {
             GPAs[0] = data[0];
             GPAs[1] = data[1];
             GPAs[2] = data[2];
             GPAs[3] = data[3];
             GPAs[4] = data[4];
             GPAs[5] = data[5];       
             GPAs[6] = data[6];
         
            //alert(GPAs);
          } 
        });
$.ajax({                                      
          url: 'fetch_gpa8.php',                  
          data: "",                        
          dataType: 'json',             
          success: function(data)          
          {
             GPAs[7] = data[0];        
            //alert(GPAs);
          } 
        });


	const swiper = new Swiper('.swiper-container', {
		effect: 'cube',
		grabCursor: true,
		cubeEffect: {
		  shadow: false,
		  slideShadows: false,
		  shadowOffset: 0,
		  shadowScale: 0,
		},
		pagination: {
		  el: '.swiper-pagination',
		},
	  
			  navigation: {
				  nextEl: '.swiper-button-next',
				  prevEl: '.swiper-button-prev',
				}
			
			});
		  
  
/********SEMESTER VAIABLES***************/
//SEM1


	
	$(".semrow,.result,#gp-submit-btn,.pop,.cgpa-row,#gpa-rows").hide();
	if(parseInt(dark)){
		$('html').addClass("dark-mode");
		jQuery("#icon").removeClass("fa fa-toggle-off");
			jQuery("#icon").addClass("fa fa-toggle-on");
	}
	else{
		$('html').removeClass("dark-mode");
		jQuery("#icon").removeClass("fa fa-toggle-on");
			jQuery("#icon").addClass("fa fa-toggle-off");
	}

	if (FirstTime)
		$("#prof-sec").hide();

	jQuery("a.other").click(function () {
		setTimeout(function () {
			$("html").removeClass("is-animating");
		}, 990);
	});

	jQuery("a.other").click(function () {
		setTimeout(function () {
			location.reload(true);
		}, 1300);
	});

	jQuery(".burger").click(function () {
		jQuery("nav").toggleClass("open");
		$(".burger").toggleClass("open");
	});

	
	$("#theme").click(function () {

		$("html").toggleClass("dark-mode");
	});

	jQuery("#theme").click(function () {

		if ($("#icon").hasClass("fa fa-toggle-on")) {
			dark=0;

			jQuery("#icon").removeClass("fa fa-toggle-on");
			jQuery("#icon").addClass("fa fa-toggle-off");
			

		} else {
			dark=1;
			jQuery("#icon").removeClass("fa fa-toggle-off");
			jQuery("#icon").addClass("fa fa-toggle-on");


		}
		//alert(dark);
		$.ajax({
								type: "POST",
								url: "dark_mode0.php",
								data: {
									darkmode: dark
								},
								success: function(data){
									//alert("dark");
								}
						});
	});

	jQuery(document).on('focus', 'input', function () {
		jQuery(this).parent('div').addClass("beforeTrans");
	});
	jQuery(document).on('blur', 'input', function () {
		if (jQuery(this).val() == "")
			jQuery(this).parent('div').removeClass("beforeTrans");
	});


	// $("#submit_btn").click(function (e) {
	// 	e.preventDefault();
	// 	e.stopPropagation();
	// 	$(".pop").show();
	// 	gsap.from(".pop", {
	// 		duration: 2,
	// 		opacity: 0,
	// 		rotation: 360,
	// 		y: -1000,
	// 		ease: "bounce"
	// 	})
	// });


	// $(".close").click(function () {
	// 	$(".pop").hide();
	// });

	jQuery("#sem").change(function () {
		$(".semrow,.result").hide();
		$('input[name="choice"]').prop('checked', false);
		$(".cgpa-row,#gpa-rows").hide();
		$("#gp-submit-btn").hide();
		//alert(cgpa_val);


		if (parseInt(FirstTime)) {
			alert("Note: You cannot change sem later! Please select your current sem carefully");
			cur_sem = $("#sem").val();
			if (parseInt(cur_sem) != 1) {
				$(".cgpa-row").show();

				//alert("Enter your Current CGPA & Click the Tick button");

				gsap.from(".cgpa-row", {
					duration: 1,
					y: -100,
					ease: 'bounce'
				});
				return;
			} else {

				let semrow = '.semrow' + '.sem' + $("#sem").val();
				$(semrow).show();
				//$(".cgpa-row,#gpa-rows,#gpa-rows,#gpa-rows").show();
				$("#gp-submit-btn").show();
				let st = semrow + ",#gp-submit-btn";
				gsap.from(st, {
					duration: 1,
					y: -100,
					ease: 'bounce'
				});
			}

		} else {
			if ($("#sem").val() <= (parseInt(cur_sem))) {

				let semrow = '.semrow' + '.sem' + $("#sem").val();
				$(semrow).show();
				//$(".cgpa-row,#gpa-rows,#gpa-rows,#gpa-rows").show();
				$("#gp-submit-btn").show();
				let st = semrow + ",#gp-submit-btn";
				gsap.from(st, {
					duration: 1,
					y: -100,
					ease: 'bounce'
				});
			} else if ($("#sem").val() == (parseInt(cur_sem) + 1)) {
				let semrow = '.semrow' + '.sem' + $("#sem").val();
				$(semrow).show();
				//$(".cgpa-row,#gpa-rows,#gpa-rows,#gpa-rows").show();
				$("#gp-submit-btn").show();
				let st = semrow + ",#gp-submit-btn";
				gsap.from(st, {
					duration: 1,
					y: -100,
					ease: 'bounce'
				});

			} else {
				alert("Your Current Sem is " + (parseInt(cur_sem) + 1));
				return;
			}
		}

	});



	$("input:radio").change(function () {
		$("#gpa-rows").empty();
		$(".semrow,#gp-submit-btn").hide();
		rad = $("input[type='radio']:checked").val();

		if (parseInt(rad)) {
			let sel, i = 1;
			for (i = 1; i <= cur_sem; i++) {
				sel = '.semrow.sem' + i;
				$(sel).show();
			}
			gsap.from(".semrow", {
				duration: 1,
				y: -100,
				ease: 'bounce'
			});
			$("#gp-submit-btn").show();

		} else {

			$("#gpa-rows").show();

			let i = 1,
				html;
			for (i; i < cur_sem; i++) {


				html = '<div class="col-8 offset-md-1 col-md-4 justify-content-center form-group text" >' +
					'<input type="text" id="gpa' + i + '" class=" " required>' +
					'<label for="gpa' + i + '"><span class="content">Your Sem ' + i + ' GPA</span></label>' +
					'</div>';

				$("#gpa-rows").append(html);

			}

			let btn = '<div class="col-12 text-center">' +
				'<button id="gpa-select-btn" class="btn btn-lg"><i class="fa fa-check"></i>&nbsp;Submit</button>' +
				'</div>';
			$("#gpa-rows").append(btn);
			
			gsap.from("#gpa-rows", {
				duration: 1,
				y: -100,
				ease: 'bounce'
			});

		}



	});

	$(document).on('click', '#gpa-select-btn', function () {

		if (FirstTime) {
			let selector, i, value, nan, error = false,
				err_msg;
			for (i = 1; i < cur_sem; i++) {
				selector = '#gpa' + i;
				value = GPAs[i - 1] = $(selector).val();

				nan = isNaN(value);
				if (nan || value > 10 || value < 0) {
					err_msg = "Only Numbers(0-10)  are allowed";
					error = true;
					break;
				} else if (value == '') {
					err_msg = 'Please Fill out all the Inputs';
					error = true;
					break;
				}


			}
			for (i = 0; i < cur_sem; i++) {
				cgpa_val = parseFloat(cgpa_val) + parseFloat(GPAs[i]);
				//alert(GPAs[i] +' '+cgpa_val);
			}
			//alert(i+' '+GPAs[0]+ ' '+cgpa_val);
			cgpa_val = parseFloat(cgpa_val) / (parseFloat(cur_sem) - 1);
			//alert(cgpa_val);
			if (error) {
				alert(err_msg);
			} else {

				let semrow = '.semrow' + '.sem' + $("#sem").val();
				$(semrow).show();
				$("#gp-submit-btn").show();
				gsap.from(semrow + ",#gp-submit-btn", {
					duration: 1,
					y: -100,
					ease: 'bounce'
				});
			}
		//alert(GPAs);
			var jsonString = JSON.stringify(GPAs);
			console.log(jsonString);
			$.ajax({
   				type: "POST",
   				url: "update_gpas.php",
   				dataType: "text",
   				data: {
   					GPA:jsonString,
   					current_sem: parseInt(cur_sem)
   				},
   				success: function(){
   					//alert("OK");
   				}
			});

		}

	});






	$("#gp-submit-btn").click(function () {


		if (FirstTime && parseInt(rad)) {
			let sel = '.semrow.sem' + cur_sem,sel2=sel+' p',
				html = '<p style="color:green;font-weight:bolder;font-size:larger;" class="text-center"> Your Sem  ' + cur_sem + ' GPA is   ' + GPAs[(cur_sem)-1] + '  </p>';
			$(sel2).empty();				
			let i, total = 0;
			for (i = 0; i < cur_sem; i++) {
				GPAs[i] = gp_calc((i + 1).toString());
				//alert(gp_calc((i+1).toString()));
				total = parseFloat(total) + parseFloat(gp_calc((i + 1).toString()));

				

			}
			//alert(GPAs[i-1]+"  "+total);
			cgpa_val=total/i;
			show_res(GPAs[i - 1], cgpa_val);
			
			//if (parseInt(app))
				//$(sel).append(html);
			//app = 0;


		} else {

			if (parseInt(cur_sem) + 1 == parseInt($("#sem").val())) {
				cur_sem++;
				//alert(cur_sem);
			}
			///////Update GPAs
			let value = $("#sem").val();
			value = GPAs[$("#sem").val() - 1] =parseFloat(gp_calc(value));
			let cgpa = cgpa_val = (sum_gpas()) / (cur_sem);
			//alert(GPAs);
			//alert(sum_gpas() + " " + parseFloat(cgpa_val) + " " + value + " " + cur_sem);
			show_res(value, cgpa);
			if (parseInt(cur_sem) > parseInt($("#sem").val())&& cgpa_val>0) {
				let sel = '.semrow.sem' + $("#sem").val(),
					html = '<p style="color:green;font-weight:bolder;font-size:larger;" class="text-center"> Your Updated CGPA is   ' + cgpa_val.toFixed(2) + '  </p>';
				if (parseInt(app_cgp))
					$(sel).append(html);
				app_cgp = 0;
			}
		}

		$("#cs").text($("#sem").val());

		setTimeout( function (){
      $.ajax({                                      
          url: 'newuser_fetch.php',                  
          data: "",                        
          dataType: 'json',             
          success: function(data)          
          {
             FirstTime = data[0];        
            $('#output').html("<b>user</b>"+FirstTime); 
          } 
        });
    },2000);




	//load GPAs to DB

	});

	function sum_gpas() {
		let i = 0,
			sum = 0.00;
		for (i; i < cur_sem; i++) {
			sum += parseFloat(GPAs[i]);
		}
		return sum;
	}


	

	function gp_calc(exp) {

		let totalCredits, gpa, totalGp;

		$(".submit-gp-btn").show();

		switch (exp) {
			case '1':
				totalGp = $("#sem1-eng").val() * $("#sem1-eng").attr("data-credit") +
					$("#sem1-cal").val() * $("#sem1-cal").attr("data-credit") +
					$("#sem1-phy").val() * $("#sem1-phy").attr("data-credit") +
					$("#sem1-c").val() * $("#sem1-c").attr("data-credit") +
					$("#sem1-c-lab").val() * $("#sem1-c-lab").attr("data-credit") +
					$("#sem1-phy-lab").val() * $("#sem1-phy-lab").attr("data-credit") +
					$("#sem1-wor-lab").val() * $("#sem1-wor-lab").attr("data-credit");
				totalCredits = Number($("#sem1-eng").attr("data-credit")) + Number($("#sem1-cal").attr("data-credit")) +
					Number($("#sem1-phy").attr("data-credit")) + Number($("#sem1-c").attr("data-credit")) +
					Number($("#sem1-c-lab").attr("data-credit")) + Number($("#sem1-phy-lab").attr("data-credit")) +
					Number($("#sem1-wor-lab").attr("data-credit"));


				break;
			case '2':
				totalGp = $("#sem2-che").val() * $("#sem2-che").attr("data-credit") +
					$("#sem2-mat").val() * $("#sem2-mat").attr("data-credit") +
					$("#sem2-eee").val() * $("#sem2-eee").attr("data-credit") +
					$("#sem2-che-lab").val() * $("#sem2-che-lab").attr("data-credit") +
					$("#sem2-eee-lab").val() * $("#sem2-eee-lab").attr("data-credit") +
					$("#sem2-eg").val() * $("#sem2-eg").attr("data-credit");
				totalCredits = Number($("#sem2-che").attr("data-credit")) + Number($("#sem2-mat").attr("data-credit")) +
					Number($("#sem2-eee").attr("data-credit")) + Number($("#sem2-eg").attr("data-credit")) +
					Number($("#sem2-che-lab").attr("data-credit")) + Number($("#sem2-eee-lab").attr("data-credit"));
				break;
			case '3':
				totalGp = $("#sem3-mat").val() * $("#sem3-mat").attr("data-credit") +
					$("#sem3-dld").val() * $("#sem3-dld").attr("data-credit") +
					$("#sem3-ece").val() * $("#sem3-ece").attr("data-credit") +
					$("#sem3-mpmc").val() * $("#sem3-mpmc").attr("data-credit") +
					$("#sem3-dsa").val() * $("#sem3-dsa").attr("data-credit") +
					$("#sem3-oops").val() * $("#sem3-oops").attr("data-credit") +
					$("#sem3-evs").val() * $("#sem3-evs").attr("data-credit") +
					$("#sem3-dld-lab").val() * $("#sem3-dld-lab").attr("data-credit") +
					$("#sem3-dsa-lab").val() * $("#sem3-dsa-lab").attr("data-credit");

				totalCredits = Number($("#sem3-mat").attr("data-credit")) + Number($("#sem3-dld").attr("data-credit")) +
					Number($("#sem3-ece").attr("data-credit")) + Number($("#sem3-mpmc").attr("data-credit")) +
					Number($("#sem3-dsa").attr("data-credit")) + Number($("#sem3-oops").attr("data-credit")) +
					Number($("#sem3-evs").attr("data-credit")) + Number($("#sem3-dld-lab").attr("data-credit")) +
					Number($("#sem3-dsa-lab").attr("data-credit"));
				break;
			case '4':
				totalGp = $("#sem4-rmt").val() * $("#sem4-rmt").attr("data-credit") +
					$("#sem4-eds").val() * $("#sem4-eds").attr("data-credit") +
					$("#sem4-coa").val() * $("#sem4-coa").attr("data-credit") +
					$("#sem4-dbms").val() * $("#sem4-dbms").attr("data-credit") +
					$("#sem4-ict").val() * $("#sem4-ict").attr("data-credit") +
					$("#sem4-os").val() * $("#sem4-os").attr("data-credit") +
					$("#sem4-coi").val() * $("#sem4-coi").attr("data-credit") +
					$("#sem4-dbms-lab").val() * $("#sem4-dbms-lab").attr("data-credit") +
					$("#sem4-os-lab").val() * $("#sem4-os-lab").attr("data-credit");

				totalCredits = Number($("#sem4-rmt").attr("data-credit")) + Number($("#sem4-eds").attr("data-credit")) +
					Number($("#sem4-dbms").attr("data-credit")) + Number($("#sem4-coa").attr("data-credit")) +
					Number($("#sem4-ict").attr("data-credit")) + Number($("#sem4-os").attr("data-credit")) +
					Number($("#sem4-coi").attr("data-credit")) + Number($("#sem4-dbms-lab").attr("data-credit")) +
					Number($("#sem4-os-lab").attr("data-credit"));


				break;
			case '5':
				totalGp = $("#sem5-tec").val() * $("#sem5-tec").attr("data-credit") +
					$("#sem5-web").val() * $("#sem5-web").attr("data-credit") +
					$("#sem5-dcn").val() * $("#sem5-dcn").attr("data-credit") +
					$("#sem5-ada").val() * $("#sem5-ada").attr("data-credit") +
					$("#sem5-pe1").val() * $("#sem5-pe1").attr("data-credit") +
					$("#sem5-oe1").val() * $("#sem5-oe1").attr("data-credit") +
					$("#sem5-dcn-lab").val() * $("#sem5-dcn-lab").attr("data-credit") +
					$("#sem5-web-lab").val() * $("#sem5-web-lab").attr("data-credit");

				totalCredits = Number($("#sem5-tec").attr("data-credit")) + Number($("#sem5-web").attr("data-credit")) +
					Number($("#sem5-dcn").attr("data-credit")) + Number($("#sem5-ada").attr("data-credit")) +
					Number($("#sem5-pe1").attr("data-credit")) + Number($("#sem5-oe1").attr("data-credit")) +
					Number($("#sem5-dcn-lab").attr("data-credit")) + Number($("#sem5-web-lab").attr("data-credit"));


				break;
			case '6':
				totalGp = $("#sem6-ml").val() * $("#sem6-ml").attr("data-credit") +
					$("#sem6-sof").val() * $("#sem6-sof").attr("data-credit") +
					$("#sem6-dsp").val() * $("#sem6-dsp").attr("data-credit") +
					$("#sem6-pe2").val() * $("#sem6-pe2").attr("data-credit") +
					$("#sem6-oe2").val() * $("#sem6-oe2").attr("data-credit") +
					$("#sem6-oe3").val() * $("#sem6-oe3").attr("data-credit") +
					$("#sem6-ml-lab").val() * $("#sem6-ml-lab").attr("data-credit") +
					$("#sem6-ops-lab").val() * $("#sem6-ops-lab").attr("data-credit");

				totalCredits = Number($("#sem6-ml").attr("data-credit")) + Number($("#sem6-sof").attr("data-credit")) +
					Number($("#sem6-dsp").attr("data-credit")) + Number($("#sem6-pe2").attr("data-credit")) +
					Number($("#sem6-oe2").attr("data-credit")) + Number($("#sem6-oe3").attr("data-credit")) +
					Number($("#sem6-ml-lab").attr("data-credit")) + Number($("#sem6-ops-lab").attr("data-credit"));

					

				break;
			case '7':
		  totalGp = $("#sem7-prof").val() * $("#sem7-prof").attr("data-credit") +
					$("#sem7-cns").val() * $("#sem7-cns").attr("data-credit") +
					$("#sem7-iot").val() * $("#sem7-iot").attr("data-credit") +
					$("#sem7-pe3").val() * $("#sem7-pe3").attr("data-credit") +
					$("#sem7-pe4").val() * $("#sem7-pe4").attr("data-credit") +
					$("#sem7-oe4").val() * $("#sem7-oe4").attr("data-credit") +
					$("#sem7-iot-lab").val() * $("#sem7-iot-lab").attr("data-credit") +
					$("#sem7-mini").val() * $("#sem7-mini").attr("data-credit");

				totalCredits = Number($("#sem7-prof").attr("data-credit")) + Number($("#sem7-cns").attr("data-credit")) +
					Number($("#sem7-oe4").attr("data-credit")) + Number($("#sem7-iot").attr("data-credit")) +
					Number($("#sem7-pe3").attr("data-credit")) + Number($("#sem7-pe4").attr("data-credit")) +
					Number($("#sem7-iot-lab").attr("data-credit")) + Number($("#sem7-mini").attr("data-credit"));


					 


				break;

			case '8':
				totalGp = $("#sem8-pe5").val() * $("#sem8-pe5").attr("data-credit") +
					$("#sem8-pe6").val() * $("#sem8-pe6").attr("data-credit") +
					$("#sem8-proj").val() * $("#sem8-proj").attr("data-credit");

				totalCredits = Number($("#sem8-pe5").attr("data-credit")) + Number($("#sem8-pe6").attr("data-credit")) +
					Number($("#sem8-proj").attr("data-credit"));

				break;
		}


		gpa = Number(totalGp) / Number(totalCredits);
		return parseFloat(gpa);

	}


	function show_res(gpa, cgpa) {
var eng=$("#sem1-eng option:selected").text();
		var calc=$("#sem1-cal option:selected").text();
		var phy=$("#sem1-phy option:selected").text();
		var c=$("#sem1-c option:selected").text();
		var clab=$("#sem1-c-lab option:selected").text();
		var phylab=$("#sem1-phy-lab option:selected").text();
		var work=$("#sem1-wor-lab option:selected").text();
		//SEM2
		var che=$("#sem2-che option:selected").text();
		var mat=$("#sem2-mat option:selected").text();
		var eee=$("#sem2-eee option:selected").text();
		var chemlab=$("#sem2-che-lab option:selected").text();
		var eeelab=$("#sem2-eee-lab option:selected").text();
		var eg=$("#sem2-eg option:selected").text();
		//SEM3
		var ptas=$("#sem3-mat option:selected").text();
		var dld=$("#sem3-dld option:selected").text();
		var ece=$("#sem3-ece option:selected").text();
		var mpmc=$("#sem3-mpmc option:selected").text();
		var dsa=$("#sem3-dsa option:selected").text();
		var oops=$("#sem3-oops option:selected").text();
		var ese=$("#sem3-evs option:selected").text();
		var dldlab=$("#sem3-dld-lab option:selected").text();
		var dsalab=$("#sem3-dsa-lab option:selected").text();
		//SEM4
		var rmt=$("#sem4-rmt option:selected").text();
		var eds=$("#sem4-eds option:selected").text();
		var coa=$("#sem4-coa option:selected").text();
		var dbms=$("#sem4-dbms option:selected").text();
		var ict=$("#sem4-ict option:selected").text();
		var os=$("#sem4-os option:selected").text();
		var coi=$("#sem4-coi option:selected").text();
		var dbmslab=$("#sem4-dbms-lab option:selected").text();
		var oslab=$("#sem4-os-lab option:selected").text();
		//SEM5
		var tec = $("#sem5-tec option:selected").text();
		var web = $("#sem5-web option:selected").text();
		var dcn = $("#sem5-dcn option:selected").text();
		var ada = $("#sem5-ada option:selected").text();
		var pe1 = $("#sem5-pe1 option:selected").text();
		var oe1 = $("#sem5-oe1 option:selected").text();
		var dcnlab = $("#sem5-dcn-lab option:selected").text();
		var weblab = $("#sem5-web-lab option:selected").text();
		//SEM6
		var ml = $("#sem6-ml option:selected").text();
		var sof = $("#sem6-sof option:selected").text();
		var dsp = $("#sem6-dsp option:selected").text();
		var pe2 = $("#sem6-pe2 option:selected").text();
		var oe2 = $("#sem6-oe2 option:selected").text();
		var oe3 = $("#sem6-oe3 option:selected").text();
		var mllab = $("#sem6-ml-lab option:selected").text();
		var ostlab = $("#sem6-ops-lab option:selected").text();
		//SEM7
		var prof=$("#sem7-prof option:selected").text();
		var cns=$("#sem7-cns option:selected").text();
		var iot=$("#sem7-iot option:selected").text();
		var pe3=$("#sem7-pe3 option:selected").text();
		var pe4=$("#sem7-pe4 option:selected").text();
		var oe4=$("#sem7-oe4 option:selected").text();
		var iotlab=$("#sem7-iot-lab option:selected").text();
		var mini=$("#sem7-mini option:selected").text();
		//SEM8
		var pe5=$("#sem8-pe5 option:selected").text();
		var pe6=$("#sem8-pe6 option:selected").text();
		var proj=$("#sem8-proj option:selected").text();


		//alert(cgpa_val);
			if (cgpa_val >= 0) {
		switch(parseInt($("#sem").val())){
			case 1:
					//alert("1");
						
						////alert(eng+" "+calc+" "+phy+" "+c+" ");
						
					$.ajax({
									type: "POST",
									url: "sem1_insert.php",
									data: {
										eng: eng,
										calc: calc,
										phy: phy,
										c: c,
										clab: clab,
										phylab: phylab,
										work: work,
										cgp: cgpa,
										gp: GPAs[0],
										current_sem: parseInt(cur_sem)
									}
								});
				break;
			case 2:
				//alert("2");
				if(parseInt(rad))
				{
					//alert("Sem1selected");
					$.ajax({
									type: "POST",
									url: "sem1_insert.php",
									data: {
										eng: eng,
										calc: calc,
										phy: phy,
										c: c,
										clab: clab,
										phylab: phylab,
										work: work,
										cgp: cgpa,
										gp: GPAs[0],
										current_sem: parseInt(cur_sem)
									}
								});
				}
					
					//alert(che+" "+mat+" "+eeelab+" "+eg+" ");
				$.ajax({
								type: "POST",
								url: "sem2_insert.php",
								data: {
									che: che,
									mat: mat,
									eee: eee,
									chemlab: chemlab,
									eeelab: eeelab,
									eg: eg,
									cgp: cgpa,
									gp: GPAs[1],
									current_sem: parseInt(cur_sem)
								}
						});
				break;
			case 3:
				alert("3");
					if(parseInt(rad))
					{
						alert("RADIO");
						$.ajax({
									type: "POST",
									url: "sem1_insert.php",
									data: {
										eng: eng,
										calc: calc,
										phy: phy,
										c: c,
										clab: clab,
										phylab: phylab,
										work: work,
										cgp: cgpa,
										gp: GPAs[0],
										current_sem: parseInt(cur_sem)
									}
								});

						$.ajax({
								type: "POST",
								url: "sem2_insert.php",
								data: {
									che: che,
									mat: mat,
									eee: eee,
									chemlab: chemlab,
									eeelab: eeelab,
									eg: eg,
									cgp: cgpa,
									gp: GPAs[1],
									current_sem: parseInt(cur_sem)
								}
						});
					}
					//alert("sem3");
				$.ajax({
								type: "POST",
								url: "sem3_insert.php",
								data: {
									ptas: ptas,
									dld: dld,
									ece: ece,
									mpmc: mpmc,
									dsa: dsa,
									oops: oops,
									ese: ese,
									dldlab: dldlab,
									dsalab: dsalab,
									cgp: cgpa,
									gp: GPAs[2],
									current_sem: parseInt(cur_sem)
								}
						});
				break;
			case 4:
				//alert("4");
					if(parseInt(rad))
					{
						//alert("RADIO");
						$.ajax({
									type: "POST",
									url: "sem1_insert.php",
									data: {
										eng: eng,
										calc: calc,
										phy: phy,
										c: c,
										clab: clab,
										phylab: phylab,
										work: work,
										cgp: cgpa,
										gp: GPAs[0],
										current_sem: parseInt(cur_sem)
									}
								});
						$.ajax({
								type: "POST",
								url: "sem2_insert.php",
								data: {
									che: che,
									mat: mat,
									eee: eee,
									chemlab: chemlab,
									eeelab: eeelab,
									eg: eg,
									cgp: cgpa,
									gp: GPAs[1],
									current_sem: parseInt(cur_sem)
								}
						});
				$.ajax({
								type: "POST",
								url: "sem3_insert.php",
								data: {
									ptas: ptas,
									dld: dld,
									ece: ece,
									mpmc: mpmc,
									dsa: dsa,
									oops: oops,
									ese: ese,
									dldlab: dldlab,
									dsalab: dsalab,
									cgp: cgpa,
									gp: GPAs[2],
									current_sem: parseInt(cur_sem)
								}
						});
					}
				$.ajax({
								type: "POST",
								url: "sem4_insert.php",
								data: {
									rmt: rmt,
									eds: eds,
									coa: coa,
									ddm: dbms,
									ict: ict,
									os: os,
									coi: coi,
									ddmlab: dbmslab,
									oslab: oslab,
									cgp: cgpa,
									gp: GPAs[3],
									current_sem: parseInt(cur_sem)
								}
						});
				break;
			case 5:
				//alert("5");
					if(parseInt(rad))
					{
						//alert("RADIO");
						$.ajax({
									type: "POST",
									url: "sem1_insert.php",
									data: {
										eng: eng,
										calc: calc,
										phy: phy,
										c: c,
										clab: clab,
										phylab: phylab,
										work: work,
										cgp: cgpa,
										gp: GPAs[0],
										current_sem: parseInt(cur_sem)
									}
								});
						$.ajax({
								type: "POST",
								url: "sem2_insert.php",
								data: {
									che: che,
									mat: mat,
									eee: eee,
									chemlab: chemlab,
									eeelab: eeelab,
									eg: eg,
									cgp: cgpa,
									gp: GPAs[1],
									current_sem: parseInt(cur_sem)
								}
						});
				$.ajax({
								type: "POST",
								url: "sem3_insert.php",
								data: {
									ptas: ptas,
									dld: dld,
									ece: ece,
									mpmc: mpmc,
									dsa: dsa,
									oops: oops,
									ese: ese,
									dldlab: dldlab,
									dsalab: dsalab,
									cgp: cgpa,
									gp: GPAs[2],
									current_sem: parseInt(cur_sem)
								}
						});
				$.ajax({
								type: "POST",
								url: "sem4_insert.php",
								data: {
									rmt: rmt,
									eds: eds,
									coa: coa,
									ddm: dbms,
									ict: ict,
									os: os,
									coi: coi,
									ddmlab: dbmslab,
									oslab: oslab,
									cgp: cgpa,
									gp: GPAs[3],
									current_sem: parseInt(cur_sem)
								}
						});
					}
					$.ajax({
								type: "POST",
								url: "sem5_insert.php",
								data: {
									tech: tec,
									web: web,
									dcn: dcn,
									ada: ada,
									pe1: pe1,
									oe1: oe1,
									dcnlab: dcnlab,
									weblab: weblab,
									cgp: cgpa,
									gp: GPAs[4],
									current_sem: parseInt(cur_sem)
								}
							});
					break;

			case 6:
				//alert("6");
								if(parseInt(rad))
					{
						//alert("RADIO");
						$.ajax({
									type: "POST",
									url: "sem1_insert.php",
									data: {
										eng: eng,
										calc: calc,
										phy: phy,
										c: c,
										clab: clab,
										phylab: phylab,
										work: work,
										cgp: cgpa,
										gp: GPAs[0],
										current_sem: parseInt(cur_sem)
									}
								});
						$.ajax({
								type: "POST",
								url: "sem2_insert.php",
								data: {
									che: che,
									mat: mat,
									eee: eee,
									chemlab: chemlab,
									eeelab: eeelab,
									eg: eg,
									cgp: cgpa,
									gp: GPAs[1],
									current_sem: parseInt(cur_sem)
								}
						});
				$.ajax({
								type: "POST",
								url: "sem3_insert.php",
								data: {
									ptas: ptas,
									dld: dld,
									ece: ece,
									mpmc: mpmc,
									dsa: dsa,
									oops: oops,
									ese: ese,
									dldlab: dldlab,
									dsalab: dsalab,
									cgp: cgpa,
									gp: GPAs[2],
									current_sem: parseInt(cur_sem)
								}
						});
				$.ajax({
								type: "POST",
								url: "sem4_insert.php",
								data: {
									rmt: rmt,
									eds: eds,
									coa: coa,
									ddm: dbms,
									ict: ict,
									os: os,
									coi: coi,
									ddmlab: dbmslab,
									oslab: oslab,
									cgp: cgpa,
									gp: GPAs[3],
									current_sem: parseInt(cur_sem)
								}
						});
			
					$.ajax({
								type: "POST",
								url: "sem5_insert.php",
								data: {
									tech: tec,
									web: web,
									dcn: dcn,
									ada: ada,
									pe1: pe1,
									oe1: oe1,
									dcnlab: dcnlab,
									weblab: weblab,
									cgp: cgpa,
									gp: GPAs[4],
									current_sem: parseInt(cur_sem)
								}
							});
					}
					$.ajax({
								type: "POST",
								url: "sem6_insert.php",
								data: {
									ml: ml,
									soft: sof,
									dsp: dsp,
									pe2: pe2,
									oe2: oe2,
									oe3: oe3,
									mllab: mllab,
									ostlab: ostlab,
									cgp: cgpa,
									gp: GPAs[5],
									current_sem: parseInt(cur_sem)
								}
							});
					break;

			case 7:
				//alert("7");
				   if(parseInt(rad))
					{
						//alert("RADIO");
						$.ajax({
									type: "POST",
									url: "sem1_insert.php",
									data: {
										eng: eng,
										calc: calc,
										phy: phy,
										c: c,
										clab: clab,
										phylab: phylab,
										work: work,
										cgp: cgpa,
										gp: GPAs[0],
										current_sem: parseInt(cur_sem)
									}
								});
						$.ajax({
								type: "POST",
								url: "sem2_insert.php",
								data: {
									che: che,
									mat: mat,
									eee: eee,
									chemlab: chemlab,
									eeelab: eeelab,
									eg: eg,
									cgp: cgpa,
									gp: GPAs[1],
									current_sem: parseInt(cur_sem)
								}
						});
				$.ajax({
								type: "POST",
								url: "sem3_insert.php",
								data: {
									ptas: ptas,
									dld: dld,
									ece: ece,
									mpmc: mpmc,
									dsa: dsa,
									oops: oops,
									ese: ese,
									dldlab: dldlab,
									dsalab: dsalab,
									cgp: cgpa,
									gp: GPAs[2],
									current_sem: parseInt(cur_sem)
								}
						});
				$.ajax({
								type: "POST",
								url: "sem4_insert.php",
								data: {
									rmt: rmt,
									eds: eds,
									coa: coa,
									ddm: dbms,
									ict: ict,
									os: os,
									coi: coi,
									ddmlab: dbmslab,
									oslab: oslab,
									cgp: cgpa,
									gp: GPAs[3],
									current_sem: parseInt(cur_sem)
								}
						});
			
					$.ajax({
								type: "POST",
								url: "sem5_insert.php",
								data: {
									tech: tec,
									web: web,
									dcn: dcn,
									ada: ada,
									pe1: pe1,
									oe1: oe1,
									dcnlab: dcnlab,
									weblab: weblab,
									cgp: cgpa,
									gp: GPAs[4],
									current_sem: parseInt(cur_sem)
								}
							});
					
					$.ajax({
								type: "POST",
								url: "sem6_insert.php",
								data: {
									ml: ml,
									soft: sof,
									dsp: dsp,
									pe2: pe2,
									oe2: oe2,
									oe3: oe3,
									mllab: mllab,
									ostlab: ostlab,
									cgp: cgpa,
									gp: GPAs[5],
									current_sem: parseInt(cur_sem)
								}
							});
 					}					
					$.ajax({
								type: "POST",
								url: "sem7_insert.php",
								data: {
									ethics: prof,
									cns: cns,
									iot: iot,
									pe3: pe3,
									pe4: pe4,
									oe4: oe4,
									iotlab: iotlab,
									mini: mini,
									cgp: cgpa,
									gp: GPAs[6],
									current_sem: parseInt(cur_sem)
								}
							});
					break;

			case 8:
				//alert("8");
				    if(parseInt(rad))
					{
						//alert("RADIO");
						$.ajax({
									type: "POST",
									url: "sem1_insert.php",
									data: {
										eng: eng,
										calc: calc,
										phy: phy,
										c: c,
										clab: clab,
										phylab: phylab,
										work: work,
										cgp: cgpa,
										gp: GPAs[0],
										current_sem: parseInt(cur_sem)
									}
								});
						$.ajax({
								type: "POST",
								url: "sem2_insert.php",
								data: {
									che: che,
									mat: mat,
									eee: eee,
									chemlab: chemlab,
									eeelab: eeelab,
									eg: eg,
									cgp: cgpa,
									gp: GPAs[1],
									current_sem: parseInt(cur_sem)
								}
						});
				$.ajax({
								type: "POST",
								url: "sem3_insert.php",
								data: {
									ptas: ptas,
									dld: dld,
									ece: ece,
									mpmc: mpmc,
									dsa: dsa,
									oops: oops,
									ese: ese,
									dldlab: dldlab,
									dsalab: dsalab,
									cgp: cgpa,
									gp: GPAs[2],
									current_sem: parseInt(cur_sem)
								}
						});
				$.ajax({
								type: "POST",
								url: "sem4_insert.php",
								data: {
									rmt: rmt,
									eds: eds,
									coa: coa,
									ddm: dbms,
									ict: ict,
									os: os,
									coi: coi,
									ddmlab: dbmslab,
									oslab: oslab,
									cgp: cgpa,
									gp: GPAs[3],
									current_sem: parseInt(cur_sem)
								}
						});
			
					$.ajax({
								type: "POST",
								url: "sem5_insert.php",
								data: {
									tech: tec,
									web: web,
									dcn: dcn,
									ada: ada,
									pe1: pe1,
									oe1: oe1,
									dcnlab: dcnlab,
									weblab: weblab,
									cgp: cgpa,
									gp: GPAs[4],
									current_sem: parseInt(cur_sem)
								}
							});
					
					$.ajax({
								type: "POST",
								url: "sem6_insert.php",
								data: {
									ml: ml,
									soft: sof,
									dsp: dsp,
									pe2: pe2,
									oe2: oe2,
									oe3: oe3,
									mllab: mllab,
									ostlab: ostlab,
									cgp: cgpa,
									gp: GPAs[5],
									current_sem: parseInt(cur_sem)
								}
							});
 
					$.ajax({
								type: "POST",
								url: "sem7_insert.php",
								data: {
									ethics: prof,
									cns: cns,
									iot: iot,
									pe3: pe3,
									pe4: pe4,
									oe4: oe4,
									iotlab: iotlab,
									mini: mini,
									cgp: cgpa,
									gp: GPAs[6],
									current_sem: parseInt(cur_sem)
								}
							});

				}
					$.ajax({
								type: "POST",
								url: "sem8_insert.php",
								data: {
									pe5: pe5,
									pe6: pe6,
									proj: proj,
									cgp: cgpa,
									gp: GPAs[7],
									current_sem: parseInt(cur_sem)
								}
							});
					break;

			default:
				//alert("default");
		}
			if ($("#sem").val() != 1) {
				$(".result").show();
				var gpa1 = $("#gpa").text(gpa.toFixed(2));
				var cgpa1 = $("#cgpa").text(cgpa.toFixed(2));

				setTimeout(function () {
					$("#gpa,#cgpa").addClass("glow");
				}, 1990);


			} else {
				$(".result").show();
				var gpa1 = $("#gpa").text(gpa.toFixed(2));
				var cgpa1 = $("#cgpa").text(cgpa.toFixed(2));

				setTimeout(function () {
					$("#gpa,#cgpa").addClass("glow");
				}, 1990);

			}
		} 
		else {
			alert("Not all the select boxes have been Selected! ");
		}
	}

 let swipe,img=`<img id='vadivel' class='mx-auto mt-auto' src='vadivel.gif'/>`
for(i=cur_sem+1;i<=8;i++){
      
        swipe=`.slide${i}`;
        $(swipe).empty();
        hider = ` <div class="row row1 m-1 mb-2 p-3 justify-content-center align-items-center wel-font" style="font-weight: bolder;font-size: x-large;">
                            <div class="col-12 text-center"> Sem ${i}</div>
                        </div>`;
        $(swipe).append(hider);
        $(swipe).append(img)
    }




});