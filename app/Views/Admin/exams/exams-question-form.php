
<div class="page-content">
	<div class="container-fluid">

			<!-- start page title -->
			<div class="row align-items-center">
					<div class="col-sm-6">
							<div class="page-title-box">
									<h4 class="font-size-18"> <?php echo isset($exam_question_details['question_id']) ? 'Edit Exam Question' : 'Add Exam Question';?> </h4>
									<ol class="breadcrumb mb-0">
											<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
											<li class="breadcrumb-item"><a href="javascript:void(0);">Exams Question</a></li>
											<li class="breadcrumb-item active"> <?php echo isset($exam_question_details['question_id']) ? 'Edit' : 'Add';?> </li>
									</ol>
							</div>
					</div>
			</div>     
			<!-- end page title -->

			<div class="row">
					<div class="col-12">
							<div class="card">
									<div class="card-body">
										
										<form action="<?php echo $form_action;?>" method="post" enctype='multipart/form-data'>
										<?= csrf_field();?>
										<input type="hidden" name="id" value="<?php echo isset($exam_question_details['question_id']) ? $exam_question_details['question_id'] : '';?>">
										
										 
										<?php if(session()->getFlashdata('error') !== NULL) : ?>
										<div class="form-group">
											<div class="alert alert-danger custom-alert">
												<strong>Warning!</strong> <?php echo session()->getFlashdata('error');?>
											</div>
										</div>
										<?php elseif(session()->getFlashdata('success') !== NULL) : ?>
										<div class="form-group">
											<div class="alert alert-success custom-alert">
												<strong>Success!</strong> <?php echo session()->getFlashdata('success');?>
											</div>
										</div>
										<?php endif; ?>
											
											
											
											<div class="form-group row">
												<div class="col-sm-2">
												<label for="example-text-input" class="col-form-label"> Exam <span class="text-danger">*</span></label>
												</div>
												<div class="col-sm-10">
												
													<select class="form-control" name="quiz_id" required>
													<option value=""> Select any item </option>
													<?php if(!empty($all_exams)) { ?>
													<?php foreach($all_exams as $exam_data) { ?>
													<?php 
														$is_selected = '';
														if(isset($exam_question_details['quiz_id']) && $exam_question_details['quiz_id'] == $exam_data["quiz_id"]) {
															$is_selected = 'selected';
														}
													?>
													  <option value="<?php echo $exam_data["quiz_id"]?>" <?php echo $is_selected?>> <?php echo $exam_data["quiz_name"]?> [<?php echo $exam_data["class_name"]?>, <?php echo $exam_data["subject_name"]?>, <?php echo $exam_data["topic_name"]?>] </option>
													<?php } ?>
													<?php } ?>
													  
												   </select>	
												</div>
											</div>
											
											<div class="form-group row">
												<div class="col-sm-2">
												<label for="example-text-input" class="col-form-label"> Part <span class="text-danger">*</span></label>
												</div>
												<div class="col-sm-10">
												
													<select class="form-control" name="part_id" required>
														<option value=""> Select any item </option>
														<option value="1" <?php echo isset($exam_question_details['part_id']) && $exam_question_details['part_id'] == 1 ? 'selected' : '';?>> Part - 1 </option>
														<option value="2" <?php echo isset($exam_question_details['part_id']) && $exam_question_details['part_id'] == 2 ? 'selected' : '';?>> Part - 2 </option>
														<option value="3" <?php echo isset($exam_question_details['part_id']) && $exam_question_details['part_id'] == 3 ? 'selected' : '';?>> Part - 3 </option>
														<option value="4" <?php echo isset($exam_question_details['part_id']) && $exam_question_details['part_id'] == 4 ? 'selected' : '';?>> Part - 4 </option>
														<option value="5" <?php echo isset($exam_question_details['part_id']) && $exam_question_details['part_id'] == 5 ? 'selected' : '';?>> Part - 5 </option>
												   </select>	
												</div>
											</div>
											
											<div class="form-group row">

													<div class="col-sm-2">
													<label for="example-text-input" class="col-form-label"> Question <span class="text-danger">*</span></label>
													</div>
													<div class="col-sm-10">
															<input class="form-control" type="text" name="question" value="<?php echo isset($exam_question_details['question']) ? $exam_question_details['question'] : '';?>" maxlength="200" required>
													</div>	
											</div>
											
											<div class="form-group row">

													<div class="col-sm-2">
													<label for="example-text-input" class="col-form-label"> Correct Answer <span class="text-danger">*</span></label>
													</div>
													<div class="col-sm-10">
															<?php
															$correct_answers = array();
															if(isset($exam_question_details['correct_answers']) && $exam_question_details['correct_answers']) {
																$correct_answers = json_decode($exam_question_details['correct_answers'], true);
																$correct_answers = !empty($correct_answers) ? $correct_answers : array();
															}
															?>
															<input class="form-control" type="text" name="correct_answer" value="<?php echo implode(',', $correct_answers);?>" maxlength="200" required>
													</div>	
											</div>
											
											<div class="form-group row">

													<div class="col-sm-2">
													<label for="example-text-input" class="col-form-label"> Wrong Answers <span class="text-danger">*</span></label>
													</div>
													<div class="col-sm-10">
															<?php
															$wrong_answers = array();
															if(isset($exam_question_details['wrong_answers']) && $exam_question_details['wrong_answers']) {
																$wrong_answers = json_decode($exam_question_details['wrong_answers'], true);
																$wrong_answers = !empty($wrong_answers) ? $wrong_answers : array();
															}
															?>
															<input class="form-control" type="text" name="wrong_answer" value="<?php echo implode(',', $wrong_answers);?>" required>
													</div>	
											</div>
											
											<div class="form-group row">

													<div class="col-sm-2">
													<label for="example-text-input" class="col-form-label"> Marks <span class="text-danger">*</span></label>
													</div>
													<div class="col-sm-10">
															<input class="form-control" type="number" name="marks" value="<?php echo isset($exam_question_details['correct_marks']) ? $exam_question_details['correct_marks'] : '';?>" maxlength="4" required>
													</div>	
											</div>
											
											 <div class="form-group row container-product-buttons ">
													<div class="col-sm-2">
													</div>
													<div class="col-sm-10">
															<?php if(isset($exam_question_details['question_id'])) : ?>
															<button class="btn btn-primary w-md waves-effect waves-light" type="submit">Update</button>
															<?php else: ?>
															<button class="btn btn-primary w-md waves-effect waves-light" type="submit">Insert</button>
															<?php endif; ?>
															<a href="<?php echo base_url('admin/exam-questions');?>">
																<button class="btn btn-primary w-md waves-effect waves-light" type="button">Cancel</button>
															</a>
															
															
													</div>
											</div>
											
										</form>	
									
									</div>
							</div>
					</div> <!-- end col -->
			</div> <!-- end row -->

			

	</div> <!-- container-fluid -->
</div>
