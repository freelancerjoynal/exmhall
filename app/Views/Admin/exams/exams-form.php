
<div class="page-content">
	<div class="container-fluid">

			<!-- start page title -->
			<div class="row align-items-center">
					<div class="col-sm-6">
							<div class="page-title-box">
									<h4 class="font-size-18"> <?php echo isset($exam_details['quiz_id']) ? 'Edit Exam' : 'Add Exam';?> </h4>
									<ol class="breadcrumb mb-0">
											<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
											<li class="breadcrumb-item"><a href="javascript:void(0);">Exams</a></li>
											<li class="breadcrumb-item active"> <?php echo isset($exam_details['quiz_id']) ? 'Edit' : 'Add';?> </li>
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
										<input type="hidden" name="id" value="<?php echo isset($exam_details['quiz_id']) ? $exam_details['quiz_id'] : '';?>">
										
										 
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
												<label for="example-text-input" class="col-form-label"> Class <span class="text-danger">*</span></label>
												</div>
												<div class="col-sm-10">
												
													<select class="form-control" name="class_id" required>
													<option value=""> Select any item </option>
													<?php if(!empty($all_classes)) { ?>
													<?php foreach($all_classes as $class_data) { ?>
													<?php 
														$is_selected = '';
														if(isset($exam_details['class_id']) && $exam_details['class_id'] == $class_data["id"]) {
															$is_selected = 'selected';
														}
													?>
													  <option value="<?php echo $class_data["id"]?>" <?php echo $is_selected?>> <?php echo $class_data["class_name"]?> </option>
													<?php } ?>
													<?php } ?>
													  
												   </select>	
												</div>
											</div>
											
											<div class="form-group row">
												<div class="col-sm-2">
												<label for="example-text-input" class="col-form-label"> Subject <span class="text-danger">*</span></label>
												</div>
												<div class="col-sm-10">
												
													<select class="form-control" name="subject_id" data-subject="<?php echo isset($exam_details["subject_id"]) ? $exam_details["subject_id"] : ''?>" required>
													<option value=""> Select any item </option>
												   </select>	
												</div>
											</div>
											
											<div class="form-group row">
												<div class="col-sm-2">
												<label for="example-text-input" class="col-form-label"> Topic <span class="text-danger">*</span></label>
												</div>
												<div class="col-sm-10">
												
													<select class="form-control" name="topic_id" data-topic="<?php echo isset($exam_details["topic_id"]) ? $exam_details["topic_id"] : ''?>" required>
													<option value=""> Select any item </option>
												   </select>	
												</div>
											</div>
											
											
											<div class="form-group row">

													<div class="col-sm-2">
													<label for="example-text-input" class="col-form-label"> Exam name <span class="text-danger">*</span></label>
													</div>
													<div class="col-sm-10">
															<input class="form-control" type="text" name="quiz_name" value="<?php echo isset($exam_details['quiz_name']) ? $exam_details['quiz_name'] : '';?>" maxlength="200" required>
													</div>	
											</div>
											
											<div class="form-group row">

													<div class="col-sm-2">
													<label for="example-text-input" class="col-form-label"> Time limit (Minutes) <span class="text-danger">*</span></label>
													</div>
													<div class="col-sm-10">
															<input class="form-control" type="number" name="time_limit" value="<?php echo isset($exam_details['time_limit']) ? $exam_details['time_limit'] : '';?>" maxlength="4" required>
													</div>	
											</div>
											
											 <div class="form-group row container-product-buttons ">
													<div class="col-sm-2">
													</div>
													<div class="col-sm-10">
															<?php if(isset($exam_details['quiz_id'])) : ?>
															<button class="btn btn-primary w-md waves-effect waves-light" type="submit">Update</button>
															<?php else: ?>
															<button class="btn btn-primary w-md waves-effect waves-light" type="submit">Insert</button>
															<?php endif; ?>
															<a href="<?php echo base_url('admin/exams');?>">
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
