
<!--SECTION START-->
<section>
		<div class="pro-cover">
		</div>
		<div class="pro-menu">
				<div class="container">
						<div class="col-md-10 col-md-offset-1">
								<ul>
										<li><a href="<?php echo base_url('profile')?>">Profile</a></li>
										<li><a href="<?php echo base_url('exams')?>" class="pro-act">Exams</a></li>
										<li><a href="<?php echo base_url('logout')?>">Logout</a></li>
								</ul>
						</div>
				</div>
		</div>
		<div class="stu-db">
				<div class="container pg-inn"> 
						 
						<div class="col-md-10 col-md-offset-1">
								<div class="udb">
									<div class="udb-sec udb-time">
											<h4> <?php echo $exams_details['quiz_name']?> </h4>
											<h6> <?php echo $exams_details['class_name']?> / <?php echo $exams_details['subject_name']?> / <?php echo $exams_details['topic_name']?> </h6>
											<h6> Part - <?php echo $student_exam_final_result['part_id']?> </h6>
											<p>
											Total Questions: <?php echo $student_exam_final_result['total_questions']?> <br>
											Total Marks: <?php echo $student_exam_final_result['total_marks']?> <br>
											Obtained Marks: <?php echo $student_exam_final_result['total_obtained_marks']?> <br>
											Percentage: <?php echo $student_exam_final_result['percentage']?> %
											</p>
											
											<?php if($student_exam_final_result['part_id'] < 5) { ?>
											<a href="<?php echo base_url('exam' . '/' . $exams_details['quiz_id'])?>"> <button type="button" class="btn waves-effect waves-light sdb-btn"> Start Part - <?php echo $student_exam_final_result['part_id'] + 1?>  Exam</button> </a>
											<?php } ?>
											
											
													<div class="row"> 
														<div class="col-md-12">
															<img src="">
														</div>
														<div class="col-md-12">
														
														<div class="student-exam-panel">

														<?php 
															if(!empty($student_exam_result)) {
																$count = 0;
																foreach($student_exam_result as $question) {
																	
																	$correct_answers = json_decode($question['correct_answers'], true);
																	$wrong_answers = json_decode($question['wrong_answers'], true);
																	$answers_arr = array_merge($correct_answers, $wrong_answers);
																	//shuffle($answers_arr);
																	
																	$answer_bg_class = 'ans-bg-warning';
																	if(isset($question['student_result']['correct_answer'])) {
																		
																		if(isset($question['student_result']['is_skipped']) && $question['student_result']['is_skipped']) {
																			$answer_bg_class = 'ans-bg-warning';
																		}
																		else if(isset($question['student_result']['is_correct']) && $question['student_result']['is_correct']) {
																			$answer_bg_class = 'ans-bg-correct';
																		}
																		else {
																			$answer_bg_class = 'ans-bg-wrong';
																		}
																		
																	}
															?>
																
																<div class="feature-block">
																		<div class="questions-panel">
																			<?php echo $count+1;?>) <?php echo $question['question'];?>
																			<?php echo isset($question['student_result']['is_skipped']) && $question['student_result']['is_skipped'] ? ' (Skipped)' : '';?>
																		</div>
																		<div class="answers-panel">
																		
																		<?php
																		if($answers_arr) {
																			foreach($answers_arr as $key => $answer_str) {
																				
																			$is_checked = '';
																			if(isset($question['student_result']['answer']) && $question['student_result']['answer'] == $answer_str) {
																				$is_checked = 'checked';
																			}
																			
																		?>
																			
																			<div class="form-check">
																			<label class="form-check-label <?php echo $is_checked != '' ? $answer_bg_class : '';?>" for="option<?php echo $question['question_id'] . $key;?>">
																				<input type="radio" class="form-check-input" <?php echo $is_checked?> disabled>
																				<?php echo $answer_str;?>
																			</label>
																			</div>
			
																		<?php 
																			}
																		}
																		?>
																		
																		<p> Correct Answer: <?php echo isset($question['student_result']['correct_answer']) ? $question['student_result']['correct_answer'] : '';?> </p>
																			
																		</div>
																		
																		<?php if(count($student_exam_result) > $count+1) { ?>
																		<hr style="border: 1px solid #0000004a">
																		<?php } ?>
																		
																</div>
																
																<?php 
																	$count++;
																	}
																}
																?>
															
															</div>
														</div>
													</div>
													
									</div>
							</div>
					</div>
			</div>
		</div>
</section>
<!--SECTION END-->
