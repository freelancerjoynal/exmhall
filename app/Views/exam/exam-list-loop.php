										
<?php if(!empty($exams_list)) { ?>
<ul>
		
		<?php foreach($exams_list as $exam_details) { ?>
		<li class="l-info-pack-plac"> <i class="fa fa-clock-o" aria-hidden="true"></i>
				
				<div class="row">
					<div class="col-sm-6">
						<h5> <?php echo $exam_details['quiz_name']?> </h5>
						<h6> <?php echo $exam_details['class_name']?> / <?php echo $exam_details['subject_name']?> / <?php echo $exam_details['topic_name']?> </h6>
						<span>Total Questions: <?php echo $exam_details['questions_count']?></span>
					</div>
					<div class="col-sm-4">
						<span><?php echo hoursandmins($exam_details['time_limit'], '%02d Hours, %02d Minutes')?></span>
					</div>
					<div class="col-sm-2">
						<a href="<?php echo base_url('exam/' . $exam_details['quiz_id']);?>"> <button type="button" class="btn waves-effect waves-light sdb-btn"> Exam Start </button> </a>
					</div>
				</div>
		 </li>
		 <?php } ?>
</ul>
<?php } else { ?>

	<p style="text-align: center; font-size: 20px; padding-top: 30px"> No exams found </p>

<?php }  ?>