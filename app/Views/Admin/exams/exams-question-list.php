
<div class="page-content">
		<div class="container-fluid">

				<!-- start page title -->
				<div class="row align-items-center">
						<div class="col-sm-6">
								<div class="page-title-box">
										<h4 class="font-size-18"> Exams Questions </h4>
										<ol class="breadcrumb mb-0">
												<li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
												<li class="breadcrumb-item"><a href="javascript:void(0);">Exams Questions</a></li>
												<li class="breadcrumb-item active"> List </li>
										</ol>
								</div>
						</div>
				</div>     
				<!-- end page title -->

			 

				<div class="row">
						<div class="col-12">
								<div class="card">
										<div class="card-body">
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
											
												<table id="admin_login_customers_table" class="table table-striped table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; font-size: 12px;">
													<thead>
													<tr>
															<th>Exam</th>
															<th>Part</th>
															<th>Question</th>
															<!--<th>Correct Answer</th>
															<th>Wrong Asnwer</th>-->
															<th>Marks</th>
															<th>Last update</th>
															<th>Action</th>
															
													</tr>
													</thead>
													<tbody>
														<?php 
															if(!empty($exam_questions_list)) {
																
																$count = 1;
																foreach($exam_questions_list as $exam_question_details) {
														?>
														<tr>
															<td><?php echo $exam_question_details['quiz_name'];?> </td>
															<td style="min-width: 70px"> Part - <?php echo $exam_question_details['part_id'];?> </td>
															<td> <?php echo $exam_question_details['question'];?>  </td>
															<!--<td> <?php echo $exam_question_details['correct_answers'];?>  </td>
															<td> <?php echo $exam_question_details['wrong_answers'];?>  </td>-->
															<td> <?php echo $exam_question_details['correct_marks'];?>  </td>
															<td><?php echo get_formatted_date($exam_question_details['last_update'], true);?> </td>
															<td> 
																<a href="<?php echo base_url('/admin/exam-question-edit/' . $exam_question_details['question_id'])?>">Edit </a>
																&nbsp / &nbsp 
																<a href="<?php echo base_url('/admin/exam-question-delete/' . $exam_question_details['question_id'])?>">Delete</a> 
															</td>
														</tr>
														<?php
																$count++;
																}
															}
														?>
													</tbody>
											</table>
										</div>
								</div>
						</div> <!-- end col -->
				</div> <!-- end row -->

				

		</div> <!-- container-fluid -->
</div>
