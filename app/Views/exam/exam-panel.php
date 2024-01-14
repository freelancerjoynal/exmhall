
<!--SECTION START-->
<?php 
$question_per_page = 2;
?>
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
											
											<div class="row"> 
												<div class="col-md-6">
													<h6> <?php echo $exams_details['class_name']?> / <?php echo $exams_details['subject_name']?> / <?php echo $exams_details['topic_name']?> </h6>
													<h6> Part - <?php echo $part_id?> </h6>
													Total Questions: <?php echo $exams_details['questions_count']?>
												</div>
												<div class="col-md-6">
													<div class="exam-countdown" style="text-align: right"></div>
												</div>
											</div>
											
											<!--<p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>-->
											
											
													
													<div class="row"> 
														<div class="col-md-12">
														
														<div class="student-exam-panel">
														<form class="form-student-exam" action="<?php echo base_url('exam-answers-submit')?>" method="POST">
														<input type="hidden" name="exam_id" value="<?php echo $exams_details['quiz_id'];?>">
														<input type="hidden" name="exam_countdown" value="0">
														<input type="hidden" name="question_show" value="0">
														<input type="hidden" name="total_questions" value="<?php echo !empty($exams_questions_list) ? count($exams_questions_list) : 0;?>">
														
														<?php 
															if(!empty($exams_questions_list)) {
																$count = 0;
																$page_number = 1;
																foreach($exams_questions_list as $question) {
																	
																	$correct_answers = json_decode($question['correct_answers'], true);
																	$wrong_answers = json_decode($question['wrong_answers'], true);
																	$answers_arr = array_merge($correct_answers, $wrong_answers);
																	shuffle($answers_arr);
															?>
																
																<div class="feature-block <?php //echo $count != 0 ? 'hide' : '';?>" id="<?php echo $count+1;?>">
																		<div class="questions-panel">
																			<?php echo $count+1;?>) <?php echo $question['question'];?>
																		</div>
																		<div class="answers-panel">
																		
																		<?php
																		if($answers_arr) {
																			foreach($answers_arr as $key => $answer_str) {
																		?>
																			
																			<div class="form-check">
																			<label class="form-check-label" for="option<?php echo $question['question_id'] . $key;?>">
																				<input type="radio" class="form-check-input" value="<?php echo $answer_str;?>" id="option<?php echo $question['question_id'] . $key;?>" name="exam_question[<?php echo $question['question_id'];?>]">
																				<?php echo $answer_str;?>
																			</label>
																			</div>
			
																		<?php 
																			}
																		}
																		?>
																			
																		</div>
																		
																		
																		<div class="questions-papper-footer text-right">
																			<?php if($count > 0) : ?>
																			 <button class="previous btn btn-warning" type="button">Previous</button> &nbsp   
																			<?php endif; ?>
																			 
																			 <?php if(count($exams_questions_list) == $count+1) : ?>
																			 <button class="btn btn-success" type="submit">Finish</button>
																			 <?php else: ?>
																			 <button class="next btn btn-success" type="button">Next</button>
																			 <?php endif; ?>
																		</div>
																		
																</div>
																
																<?php 
																	$count++;
																	}
																}
																?>
															</form>
															
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


<script type="text/javascript">
<?php 
	//$exams_details["time_limit"] = 1;
	$time_limit = isset($exams_details["time_limit"]) && $exams_details["time_limit"] ? $exams_details["time_limit"] : 0;  // Seconds
	//$minutes = round(($time_limit / 60)); // Minutes
	$minutes = round($time_limit); // Minutes
	$seconds = ($time_limit % 60);  // Seconds
	
	// FIXED 20 MINUTES FOR NOW
	$minutes = 20; // Minutes
	$seconds = 01;  // Seconds
	
	
?>
var examStartTime = '<?php echo $minutes . ":" . $seconds?>';

</script>
