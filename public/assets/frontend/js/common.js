$(document).ready(function() {
	
	
	/* =============	STUDENT REGISTRATION	================== */
	
	$(document).on('submit', '.form-student-registration', function(e) {
		
		e.preventDefault();
		$('form').removeClass('active-form');
		$(this).addClass('active-form');
		$('.active-form .reg-form-err').html('').addClass('hide');
		
		var password = $('.form-student-registration.active-form [name=password]').val();
		var confirmPassword = $('.form-student-registration.active-form [name=confirm_password]').val();
		
		if(typeof(password) !== 'undefined' && password != '' && (password.trim() == confirmPassword)) {
			
			var formData = $('form.form-student-registration.active-form').serialize();
			
			$('form.form-student-registration.active-form [type=submit]').prop('disabled', true);
			
			$.ajax({
				type:"POST",
				url: baseURL + "student-registration-save",
				data: formData,
				success: function(res){
					$('form.form-student-registration.active-form [type=submit]').prop('disabled', false);
					res = JSON.parse(res);
					if(res['status'] == 1) {
						window.location.href = baseURL + 'profile';
					}
				},
				error: function(err){
					$('form.form-student-registration.active-form [type=submit]').prop('disabled', false);
					console.log(err);
				}
			});
			
			
		}
		else {
			$('.active-form .reg-form-err').html('Password and confirm password are not same').removeClass('hide');
			return false;
		}
		
		
	});
	
	
	$(document).on('submit', '.form-student-login', function(e) {  
		
		e.preventDefault();
		$('form').removeClass('active-form');
		$(this).addClass('active-form');
		$('.active-form .login-form-err').html('').addClass('hide');
			
			var formData = $('form.form-student-login.active-form').serialize();
			
			$('form.form-student-login.active-form [type=submit]').prop('disabled', true);
			
			$.ajax({
				type:"POST",
				url: baseURL + "student-login-auth",
				data: formData,
				success: function(res){
					$('form.form-student-login.active-form [type=submit]').prop('disabled', false);
					res = JSON.parse(res);
					if(res['status'] == 1) {
						window.location.href = baseURL + 'profile';
					}
					else {
						$('.active-form .login-form-err').html('Invalid email or password').removeClass('hide');
						return false;
					}
				},
				error: function(err){
					$('form.form-student-login.active-form [type=submit]').prop('disabled', false);
					console.log(err);
				}
			});
		
	});
		
	
	/*========	EXAM COUNTER	=======*/
	if(typeof(examStartTime) !== 'undefined' && examStartTime != '') {
		countdownTimer(examStartTime);
		
		var questionPerPage = 20; 
		var totalQuestions = $('.form-student-exam [name=total_questions]').val();
		$('.form-student-exam [name=question_show]').val(questionPerPage);
		
		/*	=================	STUDENT EXAM PANEL	==============	*/
		$('.form-student-exam').on('click', '.next', function(){
			
			/*var questionId = $(this).closest('.feature-block').attr('id');
			var nextId = Number(questionId)+1;
			$('.form-student-exam .feature-block').addClass('hide');
			$('.form-student-exam').find('#'+nextId).removeClass('hide');*/
			
			var question_show = $('.form-student-exam [name=question_show]').val();
			var question_will_show = Number(question_show) + questionPerPage;
			$('.form-student-exam [name=question_show]').val(question_will_show);
			
			$('.feature-block').each(function(){
			
				var currentObj = $(this);
				var id = currentObj.attr('id');
				
				if(id > question_show && id <= question_will_show) {
					currentObj.removeClass('hide');
					console.log(question_will_show);
					if(id == question_will_show || id == totalQuestions) {
						currentObj.find('.next').removeClass('hide');
						currentObj.find('.previous').removeClass('hide');
					}
					else {
						currentObj.find('.next').addClass('hide');
						currentObj.find('.previous').addClass('hide');
					}
					
				}
				else {
					currentObj.addClass('hide');
				}
			
			});
			
		});
		
		$('.form-student-exam').on('click', '.previous', function(){
			
			/*var questionId = $(this).closest('.feature-block').attr('id');
			var prevId = Number(questionId)-1;
			$('.form-student-exam .feature-block').addClass('hide');
			$('.form-student-exam').find('#'+prevId).removeClass('hide');*/
			
			var question_show = $('.form-student-exam [name=question_show]').val();
			var question_will_show = Number(question_show) - questionPerPage;
			$('.form-student-exam [name=question_show]').val(question_will_show);
			
			$('.feature-block').each(function(){
			
				var currentObj = $(this);
				var id = currentObj.attr('id');
				
				if(id > (Number(question_will_show) - questionPerPage) && id <= question_will_show) {
					currentObj.removeClass('hide');
				}
				else {
					currentObj.addClass('hide');
				}
			
			});
			
			
		});
		
		
		
		$('.feature-block').each(function() {
			
			var currentObj = $(this);
			var id = currentObj.attr('id');
			
			if(id <= questionPerPage) {
				currentObj.removeClass('hide');
				currentObj.find('.previous').addClass('hide');
				
				if(id == questionPerPage) {
					currentObj.find('.next').removeClass('hide');
				}
				else {
					currentObj.find('.next').addClass('hide');
				}
				
			}
			else {
				currentObj.addClass('hide');
			}
			
		});
		
		
	}
	
	
	/*	Exam listing advance filter	*/
	$(document).on('change', '.form-exam-advance-filter [name=class_id]', function(){
		
		var ob = $(this);
		var classID = $('.form-exam-advance-filter [name=class_id] option:selected').attr('value');
			console.log('abbb ', classID);
			$.ajax({
				type: "post", 
				url: baseURL + "ajax-get-subject-list",
				beforeSend: function(){
					ob.attr('disabled', 'disabled');
				},
				data: {class_id: classID},
				success:function(res){
					
					ob.removeAttr('disabled');
					if(res != '') {
						var data = JSON.parse(res);
						$('.form-exam-advance-filter [name=subject_id]').html(data);
						$('.form-exam-advance-filter [name=subject_id]').trigger('change');
					}
				}
			});
		
	});
	
	$(document).on('change', '.form-exam-advance-filter [name=subject_id]', function(){
		
		var ob = $(this);
		var subjectID = $('.form-exam-advance-filter [name=subject_id] option:selected').attr('value');
			
			$.ajax({
				type: "post",
				url: baseURL + "ajax-get-topic-list",
				beforeSend: function(){
					ob.attr('disabled', 'disabled');
				},
				data: {subject_id:subjectID},
				success:function(res){
					
					ob.removeAttr('disabled');
					if(res != '') {
						var data = JSON.parse(res);
						$('.form-exam-advance-filter [name=topic_id]').html(data);
					}
				}
			});
		
	});
	
	
	$(document).on('click', '.form-exam-advance-filter .exam__result-filter', function(){
		
		examAdvanceFilter();
	});
	
	$(document).on('click', '.form-exam-advance-filter .exam__result-clear', function(){
		
		$('form.form-exam-advance-filter')[0].reset();
		examAdvanceFilter();
	});
	
	
});




	/* ==============	TIMER COUNTDOWN	============ */
function countdownTimer(examStartTime) {
		
     var interval = setInterval(function() {
			
			var timer = examStartTime.split(':');
			//by parsing integer, I avoid all extra string processing
			var minutes = parseInt(timer[0], 10);
			var seconds = parseInt(timer[1], 10);
			--seconds;
			minutes = (seconds < 0) ? --minutes : minutes;
			seconds = (seconds < 0) ? 59 : seconds;
			seconds = (seconds < 10) ? '0' + seconds : seconds;
			$('.exam-countdown').html(minutes + ':' + seconds + ' minutes remaining').show();
			$('.form-student-exam [name=exam_countdown]').val(Number(minutes * 60) + Number(seconds));  /* Convert into seconds */
			if (minutes < 0) clearInterval(interval);
			//check if both minutes and seconds are 0
			if ((seconds <= 0) && (minutes <= 0)) clearInterval(interval);
			examStartTime = minutes + ':' + seconds;
			
			if (examStartTime == "0:00") { 
					
					$('.form-student-exam').trigger('submit');
					$('.form-student-exam input, button').attr('disabled', 'disabled').prop('disabled', true);
					clearInterval(interval);
					$('.exam-countdown').html('Your session has expired');
			}
				
    }, 1000);
}


function examAdvanceFilter() {

var formData = $('form.form-exam-advance-filter').serialize();
			
	$.ajax({
		type: "post",
		url: baseURL + "ajax-exam-advance-filter",
		beforeSend: function(){
			
		},
		data: formData,
		success:function(res){
			
			$('.exam-filter-dynamic-content').html(res);
		}
	});
	
}


