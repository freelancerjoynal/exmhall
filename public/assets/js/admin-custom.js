$(document).ready(function(){

	var pageURL = window.location.href;
	
		/* CK editor init */
	if($('#product_description').length > 0) {
		CKEDITOR.replace( 'product_description' );
	}
	
	/* Init tags input */
	$("input[name=correct_answer]").tagsinput({
		maxTags: 1,
	 });
	 
	 $("input[name=wrong_answer]").tagsinput({
		maxTags: 3,
	 });
		
		
	// Onload call [ Only for exam edit page ]
	if(pageURL.indexOf('/exams/exam-edit/') >= 0)
	setTimeout(function(){
		
		$('[name=class_id]').trigger('change');
		$('[name=subject_id]').trigger('change');
		
	}, 1000);
	
	// Onload call [ Only for topic edit page ]
	if(pageURL.indexOf('/masters/topic-edit/') >= 0)
	setTimeout(function(){
		
		$('[name=class_id]').trigger('change');
		
	}, 1000);
	
	$(document).on('change', '[name=class_id]', function(){
		
		var ob = $(this);
		var classID = $('[name=class_id] option:selected').attr('value');
		var selectedSubjectID = $('[name=subject_id]').attr('data-subject');
			
			$.ajax({
				type: "post",
				url: baseURL + "admin/ajax-get-subject-list",
				beforeSend: function(){
					ob.attr('disabled', 'disabled');
				},
				data: {class_id: classID, selected_subject_id: selectedSubjectID},
				success:function(res){
					
					ob.removeAttr('disabled');
					if(res != '') {
						var data = JSON.parse(res);
						$('[name=subject_id]').html(data);
						$('[name=subject_id]').trigger('change');
					}
				}
			});
		
		
	});
	
	$(document).on('change', '[name=subject_id]', function(){
		
		var ob = $(this);
		var subjectID = $('[name=subject_id] option:selected').attr('value');
		var selectedTopicID = $('[name=topic_id]').attr('data-topic');
			
			$.ajax({
				type: "post",
				url: baseURL + "/admin/ajax-get-topic-list",
				beforeSend: function(){
					ob.attr('disabled', 'disabled');
				},
				data: {subject_id:subjectID, selected_topic_id: selectedTopicID},
				success:function(res){
					
					ob.removeAttr('disabled');
					if(res != '') {
						var data = JSON.parse(res);
						$('[name=topic_id]').html(data);
					}
				}
			});
		
		
	});
	
	
	
	
});