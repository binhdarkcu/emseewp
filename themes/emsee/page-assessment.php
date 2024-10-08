<?php /* Template Name: New Assessment Quiz */?>

<?php get_header();?>
	<section>
		<article>
			<div class="container">
				<div class="content">
					<form action="" method="post" id="new-assessment-form">
					    <?php wp_nonce_field('question_result_form', 'question_result_nonce'); ?>
						<div class="assessment-section">
							<h1 class="cnt-title cnt-title--blue align-center">Getting to know you</h1>
							<div class="questionnaire-progress is-step-1">
								<div class="questionnaire-progress__labels" id="questionnaire-start">
									<span data-step='1' class="questionnaire-progress__label question-step is-highlighted">Details</span>
									<span data-step='2' class="questionnaire-progress__label question-step">Menstrual</span>
									<span data-step='3' class="questionnaire-progress__label question-step">Symptoms</span>
									<span data-step='4' class="questionnaire-progress__label question-step">Personal History</span>
									<span data-step='5' class="questionnaire-progress__label question-step">Contact</span>
								</div>
							</div>
							<h2 id="percentLabel" class="questionnaire-progress__title mb-sm"></h2>
							<div class="questionnaire-progress__bar">
								<div id="progressBar" class="questionnaire-progress__bar__current percent-indicator" style="width: 20%"></div>
							</div>
							<div id="questionnaire_1" class="questionnaire-section section-one current">
								<div class="question-wrapper">
								    <?php
								        $question1 = get_field('question1', 'option');
								        $question2 = get_field('question2', 'option');
								    ?>
								    <input type="hidden" name="ma_action" value="menopausal_new_assessment_form">
									<div class="form-row">
										<label class="question-title"><?= $question1;?><span class="required-label"> *</span></label>
										<input class="form-field-text" type="text" name="user_name" id="user_name" value="" autocomplete="off"/>
									</div>
									<div class="form-row">
										<label class="question-title"><?= $question2;?><span class="required-label"> *</span></label>
										<input class="form-field-text" maxlength="3" type="number" name="user_age" id="user_age" value=""/>
									</div>
									<div class="questionnaire-actions">
										<div class="middle-actions">
											<button data-progress="40" data-next-tab="2" class="disable btn btn--lg btn--orange questionnaire-continue">Next</button>
										</div>
									</div>
								</div>
							</div>
							<div id="questionnaire_2" class="questionnaire-section section-two">
								<div class="question-wrapper">
									<div id="questionnaire_21" class="questionnaire-children showing">
										<div class="std-content align-center">
											<p>The timing of your last period, <span class="fill-username" id="fillUserName"></span>, helps us to determine which stage of the menopausal transition you are in: premenopause, perimenopause or postmenopause.It's possible that more than one category might apply to your situation; simply choose the one that fits best.</p>
										</div>
										<hr /> <?php
                                    $question3 = get_field('question3', 'option');
                                    foreach( $question3 as $key=>$question ) {
                                    ?> <div data-question="3" class="question-item display">
											<div class="std-content">
												<h5 class="question-title"><?=$question['question_title']?> <i class="tooltip-icon bi bi-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $question['tooltip'];?>"></i> </h5>
											</div>
											<div class="form-group">
											    <?php
                                                   $index = 1;
                                                   $getAnswers = $question['answers'];
                                                   foreach( $getAnswers as $key=>$field ) {?>
                                                        <div class="form-check">
                                                            <input data-question="3" data-answer="3<?=$index;?>" value="<?= $field['answer_option'];?>" class="form-check-input" id="question3<?=$index;?>" type="radio" name="page2_question3">
                                                            <label class="form-check-label" for="question3<?=$index;?>"> <?= $field['answer_option']; ?> </label>
                                                        </div>
                                                <?php $index++; } ?>
											</div>
										</div> <?php
                                    }
                                    ?> <?php
                                    $question4 = get_field('question4', 'option');
                                    foreach( $question4 as $key=>$question ) {
                                    ?> <div data-question="4" class="question-item">
											<div class="std-content">
												<h5 class="question-title"><?=$question['question_title']?> <i class="tooltip-icon bi bi-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $question['tooltip'];?>"></i> </h5>
											</div>
											<div class="form-group">
											<?php
                                               $index = 1;
                                               $getAnswers = $question['answers'];
                                               foreach( $getAnswers as $key=>$field ) {?>
                                                <div class="form-check">
                                                    <input data-question="4" data-answer="4<?=$index;?>" value="<?= $field['answer_option'];?>" class="form-check-input" id="question4<?=$index;?>" type="radio" name="page2_question4">
                                                    <label class="form-check-label" for="question4<?=$index;?>"> <?= $field['answer_option']; ?> </label>
                                                </div>
                                            <?php $index++; } ?>
											</div>
										</div> <?php
                                    }
                                    ?> <div class="questionnaire-actions">
											<div class="middle-actions">
												<button data-progress="20" data-back-tab="1" class="btn btn--lg btn--blue-light questionnaire-back">Back</button>
												<button data-progress="60" data-next-tab="3" class="btn-hide btn btn--lg btn--orange has-result-next-tab">Next</button>
											</div>
										</div>
									</div>
									<div id="questionnaire_22" class="questionnaire-children">
										<div class="std-content align-center">
											<p>Hormonal contraception can stop your periods thereby masking your true menopausal status, so it’s important we understand your current contraceptive medication so you can receive an accurate diagnosis. </p>
										</div> <?php
                                    $question5 = get_field('question5', 'option');
                                    foreach( $question5 as $key=>$question ) {
                                    ?> <div data-question="5" class="question-item display">
											<div class="std-content">
												<h5 class="question-title"><?=$question['question_title']?> <i class="tooltip-icon bi bi-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $question['tooltip'];?>"></i> </h5>
											</div>
											<div class="form-group">
											<?php
                                               $index = 1;
                                               $getAnswers = $question['answers'];
                                               foreach( $getAnswers as $key=>$field ) {?>
                                                        <div class="form-check">
                                                            <input data-question="5" data-answer="5<?=$index;?>" value="<?= $field['answer_option'];?>" class="form-check-input" id="question5<?=$index;?>" type="radio" name="page3_question5">
                                                            <label class="form-check-label" for="question5<?=$index;?>"> <?= $field['answer_option']; ?> </label>
                                                        </div>
                                            <?php $index++; } ?>
                                            </div>
										</div> <?php
                                    }
                                    ?> <?php
                                    $question6 = get_field('question6', 'option');
                                    foreach( $question6 as $key=>$question ) {
                                    ?> <div data-question="6" class="question-item">
											<div class="std-content">
												<h5 class="question-title"><?=$question['question_title']?> <i class="tooltip-icon bi bi-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $question['tooltip'];?>"></i> </h5>
											</div>
											<div class="form-group">
											<?php
                                               $index = 1;
                                               $getAnswers = $question['answers'];
                                               foreach( $getAnswers as $key=>$field ) {?>
                                                        <div class="form-check">
                                                            <input data-question="6" data-answer="6<?=$index;?>" value="<?= $field['answer_option'];?>" class="form-check-input" id="question6<?=$index;?>" type="radio" name="page3_question6">
                                                            <label class="form-check-label" for="question6<?=$index;?>"> <?= $field['answer_option']; ?> </label>
                                                        </div>
                                                <?php $index++; } ?>
                                            </div>
										</div> <?php
                                    }
                                    ?> <?php
                                    $question7 = get_field('question7', 'option');
                                    foreach( $question7 as $key=>$question ) {
                                    ?> <div data-question="7" class="question-item">
											<div class="std-content">
												<h5 class="question-title"><?=$question['question_title']?> <i class="tooltip-icon bi bi-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $question['tooltip'];?>"></i> </h5>
											</div>
											<div class="form-group">
											<?php
                                               $index = 1;
                                               $getAnswers = $question['answers'];
                                               foreach( $getAnswers as $key=>$field ) {?>
                                                        <div class="form-check">
                                                            <input data-question="7" data-answer="7<?=$index;?>" value="<?= $field['answer_option'];?>" class="form-check-input" id="question7<?=$index;?>" type="radio" name="page3_question7">
                                                            <label class="form-check-label" for="question7<?=$index;?>"> <?= $field['answer_option']; ?> </label>
                                                        </div>
											<?php $index++; } ?>
											</div>
										</div> <?php
                                    }
                                    ?> <?php
                                    $question8 = get_field('question8', 'option');
                                    foreach( $question8 as $key=>$question ) {
                                    ?> <div data-question="8" class="question-item">
											<div class="std-content">
												<h5 class="question-title"><?=$question['question_title']?> <i class="tooltip-icon bi bi-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $question['tooltip'];?>"></i> </h5>
											</div>
											<div class="form-group">
											<?php
                                               $index = 1;
                                               $getAnswers = $question['answers'];
                                               foreach( $getAnswers as $key=>$field ) {?>
                                                        <div class="form-check">
                                                            <input data-question="8" data-answer="8<?=$index;?>" value="<?= $field['answer_option'];?>" class="form-check-input" id="question8<?=$index;?>" type="radio" name="page3_question8">
                                                            <label class="form-check-label" for="question8<?=$index;?>"> <?= $field['answer_option']; ?> </label>
                                                        </div>
                                                <?php $index++; } ?>
                                            </div>
										</div> <?php
                                    }
                                    ?> <div class="questionnaire-actions">
											<div class="middle-actions">
												<button data-progress="40" data-back-question-page="1" data-back-tab="2" class="btn btn--lg btn--blue-light questionnaire-back">Back</button>
												<button data-progress="60" data-next-tab="3" class="btn-hide btn btn--lg btn--orange has-result-next-tab">Next</button>
											</div>
										</div>
									</div>
								</div>
								<input id="menopause-assessment-result" type="hidden" name="menopause-assessment-result" value=""/>
							</div>
							<div id="questionnaire_3" class="questionnaire-section section-three"> <?php
                              $your_symptoms = get_field('your_symptoms', 'option');
                              $symptoms_list= $your_symptoms[0]['symptoms_list'];
                              ?> <div class="question-wrapper">
									<div class="std-content align-center">
										<?php echo $your_symptoms[0]['symptons_description'];?>
									</div>
									<div class="symptoms_list">
										<div class="symptom_header">
											<div class="column col1">&nbsp;</div>
											<div class="column col2">Not at all</div>
											<div class="column col3">A little</div>
											<div class="column col4">Quite a bit</div>
											<div class="column col5">Extremely</div>
										</div> <?php
                                    $symptom_questions = 0;
                                    $output_index = 5;
                                    foreach($symptoms_list as $symptom) {
                                       $output_index++;
                                       $symptom_content = $symptom['symptom_content'];
                                       $symptom_questions += count($symptom_content);
                                    ?> <div class="symptom-item symptom-group"  data-output="menopause_assessment_output_<?=$output_index?>"  data-group="<?= sanitize_title($symptom['symptom_title']); ?>">
											<div class="symptom-title"> <?php echo $symptom['symptom_title'];?> </div> <?php
                                       foreach($symptom_content as $symptom_row) {
                                       ?> <div class="symptom-row">
												<div class="column col1"><?=$symptom_row['symptom_item']?></div>
												<div class="column col2">
													<div class="middle">
														<input checked class="answer-checkbox symptom-radio" value="Not at all" type="radio" name="symptoms_list[<?=sanitize_title($symptom['symptom_title'])?>][<?= sanitize_title($symptom_row['symptom_item']); ?>]">
													</div>
												</div>
												<div class="column col3">
													<div class="middle">
														<input class="answer-checkbox symptom-radio" value="A little" type="radio" name="symptoms_list[<?=sanitize_title($symptom['symptom_title'])?>][<?= sanitize_title($symptom_row['symptom_item']); ?>]">
													</div>
												</div>
												<div class="column col4">
													<div class="middle">
														<input class="answer-checkbox symptom-radio" value="Quite a bit" type="radio" name="symptoms_list[<?=sanitize_title($symptom['symptom_title'])?>][<?= sanitize_title($symptom_row['symptom_item']); ?>]">
													</div>
												</div>
												<div class="column col5">
													<div class="middle">
														<input class="answer-checkbox symptom-radio" value="Extremely" type="radio" name="symptoms_list[<?=sanitize_title($symptom['symptom_title'])?>][<?= sanitize_title($symptom_row['symptom_item']); ?>]">
													</div>
												</div>
											</div> <?php } ?>
										</div> <?php } ?>
										<?php
                                           foreach($symptoms_list as $symptom) {
                                           ?>
                                                <input id="<?=sanitize_title($symptom['symptom_title']);?>" type="hidden" name="<?=sanitize_title($symptom['symptom_title']);?>" value=""/>
                                            <?php } ?>
									</div>
									<div class="questionnaire-actions">
										<div class="middle-actions">
											<button data-progress="40" data-back-tab="2" class="btn btn--lg btn--blue-light questionnaire-back">Back</button>
											<button id="submitButton"  data-progress="60" data-next-tab="4" class="btn btn--lg btn--orange questionnaire4-next">Continue</button>
										</div>
									</div>
								</div>
							</div>
							<div id="questionnaire_4" class="questionnaire-section section-four">
								<div class="question-wrapper"> <?php
                                 $question9 = get_field('question9', 'option');

                                 foreach( $question9 as $key=>$question ) {
                                 ?> <div data-question="11" class="question-item display">
										<div class="std-content">
												<h5 class="question-title"><?=$question['question_title']?> <i class="tooltip-icon bi bi-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $question['tooltip'];?>"></i> </h5>
											</div>
										<div class="form-group">
										<?php
                                        $index = 1;
                                        $getAnswers = $question['answers'];
                                        $question9Description = $question['question_description'];
                                        ?>
                                        <div class="question-description">
                                            <?=$question9Description;?>
                                        </div>
                                        <?php
                                        foreach( $getAnswers as $key=>$field ) {?>
                                                <div class="form-check">
                                                    <input data-question="9" data-answer="9<?=$index;?>" value="<?= $field['answer_option'];?>" class="form-check-input" id="question9<?=$index;?>" type="radio" name="page4_question9">
                                                    <label class="form-check-label" for="question9<?=$index;?>"> <?= $field['answer_option']; ?> </label>
                                                </div>
										<?php $index++; } ?>
										</div>
									</div> <?php $index++; } ?>

								<?php
                                 $question10 = get_field('question10', 'option');
                                 foreach( $question10 as $key=>$question ) {
                                 ?> <div data-question="10" class="question-item display">
										<div class="std-content">
												<h5 class="question-title"><?=$question['question_title']?> <i class="tooltip-icon bi bi-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $question['tooltip'];?>"></i> </h5>
											</div>
										<div class="form-group">
										<?php
                                        $index = 1;
                                        $getAnswers = $question['answers'];
                                        $question9Description = $question['question_description'];
                                        ?>
                                        <div class="question-description">
                                            <?=$question9Description;?>
                                        </div>
                                        <?php
                                        foreach( $getAnswers as $key=>$field ) {?>
                                                <div class="form-check">
                                                    <input data-question="10" data-answer="10<?=$index;?>" value="<?= $field['answer_option'];?>" class="form-check-input" id="question10<?=$index;?>" type="radio" name="page4_question10">
                                                    <label class="form-check-label" for="question10<?=$index;?>"> <?= $field['answer_option']; ?> </label>
                                                </div>
										<?php $index++; } ?>
										</div>
									</div> <?php $index++; } ?>

									<?php
                                    $question11 = get_field('question11', 'option');
                                    foreach( $question11 as $key=>$question ) {
                                    ?> <div data-question="11" class="question-item display">
                                            <div class="std-content">
												<h5 class="question-title"><?=$question['question_title']?> <i class="tooltip-icon bi bi-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $question['tooltip'];?>"></i> </h5>
											</div>
                                            <div class="form-group">
                                            <?php
                                               $index = 1;
                                               $getAnswers = $question['answers'];
                                               foreach( $getAnswers as $key=>$field ) {?>
                                                        <div class="form-check">
                                                            <input data-question="11" data-answer="11<?=$index;?>" value="<?= $field['answer_option'];?>" class="form-check-input" id="question11<?=$index;?>" type="radio" name="page4_question11">
                                                            <label class="form-check-label" for="question11<?=$index;?>"> <?= $field['answer_option']; ?> </label>
                                                        </div>
                                            <?php $index++; } ?>
                                            </div>
                                        </div> <?php
                                    }
                                    ?>
								</div>
								<input id="menopause-assessment-result-q9" type="hidden" name="menopause-assessment-result-q9" value=""/>
								<input id="menopause-assessment-result-q10" type="hidden" name="menopause-assessment-result-q10" value=""/>
								<div class="questionnaire-actions">
									<div class="middle-actions">
										<button data-back-tab="3" class="btn btn--lg btn--blue-light questionnaire-back">Back</button>
										<button data-has-result-tab="1" data-progress="80" data-next-tab="5" class="btn-hide btn btn--lg btn--orange questionnaire-next has-result-next-tab">Continue</button>
									</div>
								</div>
							</div>
							<div id="questionnaire_5" class="your-detail questionnaire-section section-five">
								<div class="question-wrapper">
									<div class="std-content">
										<p>Thank you for completing AMC’s menopause health assessment! To receive your personalised assessment report please provide your contact details below:</p>
									</div>
									<div class="form-row">
										<label>Email: <span class="required-label"> *</span></label>
										<input required class="form-field-text" type="email" value="" name="user_email" autocomplete="off"/>
									</div>
									<div class="form-row">
                                        <label>Mobile: <span class="required-label"> *</span></label>
                                        <input required class="form-field-text" type="phone" value="" name="user_phone" />
                                    </div>
                                    <div class="form-row">
                                        <label>Preferred time to contact: </label>
                                        <input required class="form-field-text" type="text" value="anytime" name="preferred_time" />
                                    </div>

									<div class="form-row">
										<label>State: <span class="required-label"> *</span></label>
										<select required class="form-field-text" name="user_state">
										    <option value="">Select a state</option>
										    <?php
                                            $user_states = get_field('user_state', 'option');
                                            foreach( $user_states as $key=>$state ) {
                                            ?>
											<option value="<?=$state['state_name']?>"><?=$state['state_name']?></option>
											<?php } ?>
										</select>
									</div>

									<div class="form-row">
										<div class="form-check">
											<input checked class="form-check-input" id="receive-menopause" type="checkbox" name="">
											<label class="form-check-label" for="receive-menopause"> I wish to opt-in to receive free menopause resources </label>
										</div>
									</div>
									<div class="form-row">
										<div class="form-check">
											<input checked class="form-check-input" id="contacted-phone" type="checkbox" name="">
											<label class="form-check-label" for="contacted-phone"> I would like to be contacted by phone to receive additional information and arrange a consultation with a doctor who specializes in menopause care </label>
										</div>
									</div>
									<div class="questionnaire-actions">
										<div class="middle-actions">
											<button data-back-tab="4" class="btn btn--lg btn--blue-light questionnaire-back">Back</button>
											<button data-progress="100" data-next-tab="5" class="btn btn--lg btn--orange questionnaire-submit">Submit</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</article>
	</section>

<?php get_footer();?>
<?php
if(isset($_POST['ma_action']) && $_POST['ma_action'] = 'menopausal_new_assessment_form') {

	if($_POST['user_email'] && $_POST['user_name']) :
		$user_name = sanitize_text_field($_POST['user_name']);
		$user_email = sanitize_email($_POST['user_email']);
		$user_age = $_POST['user_age'];
		$question_3 = isset($_POST['page2_question3']) ? $_POST['page2_question3']: 'not found';
			$question_4 = isset($_POST['page2_question4']) ? $_POST['page2_question4']: 'not found';
			$question_5 = isset($_POST['page3_question5']) ? $_POST['page3_question5']: 'not found';
			$question_6 = isset($_POST['page3_question6']) ? $_POST['page3_question6']: 'not found';
			$question_7 = isset($_POST['page3_question7']) ? $_POST['page3_question7']: 'not found';
			$question_8 = isset($_POST['page3_question8']) ? $_POST['page3_question8']: 'not found';
			$question_9 = isset($_POST['page4_question9']) ? $_POST['page4_question9']: 'not found';
			$question_10 = isset($_POST['page4_question10']) ? $_POST['page4_question10']: 'not found';
			$question_11 = isset($_POST['page4_question11']) ? $_POST['page4_question11']: 'not found';
			// output 1->5
			$menstrual_result = $_POST['menopause-assessment-result'];
			// output 6->9
			$physical_symptoms_result = $_POST['physical-symptoms'];
			$moods_mental_health_result = $_POST['moods-mental-health'];
			$cognition_sleep_result = $_POST['cognition-sleep'];
			$genitourinary_sexual_result = $_POST['genitourinary-sexual'];
			// output 10->11
			$menstrual_result_q9 = $_POST['menopause-assessment-result-q9'];
			$menstrual_result_q10 = $_POST['menopause-assessment-result-q10'];
			$tab2_output_report = get_field($menstrual_result, 'option');
			// output_report_6_9
			$tab3_physical_output_report = get_field($physical_symptoms_result, 'option');
			$tab3_moods_mental_health_output_report = get_field($moods_mental_health_result, 'option');
			$tab3_cognition_sleep_output_report = get_field($cognition_sleep_result, 'option');
			$tab3_genitourinary_sexual_output_report = get_field($genitourinary_sexual_result, 'option');
			// output_report_10_11
			$tab4_output_report_q9 = get_field($menstrual_result_q9, 'option');
			$tab4_output_report_q10 = get_field($menstrual_result_q10, 'option');
			$has_report_6_to_9 = !empty($tab3_physical_output_report) || !empty($tab3_moods_mental_health_output_report) || !empty($tab3_cognition_sleep_output_report) || !empty($tab3_genitourinary_sexual_output_report);
			$has_report_9_or_10 = !empty($tab4_output_report_q9) || !empty($tab4_output_report_q10);
			$output_report_1_5 = !empty($tab2_output_report) ? $tab2_output_report : '';
			$output_report_6 = !empty($tab3_physical_output_report) ? $tab3_physical_output_report : '';
			$output_report_7 = !empty($tab3_moods_mental_health_output_report) ? $tab3_moods_mental_health_output_report : '';
			$output_report_8 = !empty($tab3_cognition_sleep_output_report) ? $tab3_cognition_sleep_output_report : '';
			$output_report_9 = !empty($tab3_genitourinary_sexual_output_report) ? $tab3_genitourinary_sexual_output_report : '';
			$output_report_10 = !empty($tab4_output_report_q9) ? $tab4_output_report_q9 : '';
			$output_report_11 = $tab4_output_report_q10;

			$emails_data = array(
				'user_name' => $user_name,
				'email' => $user_email,
				'output_report_1_5' => !empty($tab2_output_report) ? $tab2_output_report : '',
				'output_report_6' => !empty($tab3_physical_output_report) ? $tab3_physical_output_report : '',
				'output_report_7' => !empty($tab3_moods_mental_health_output_report) ? $tab3_moods_mental_health_output_report : '',
				'output_report_8' => !empty($tab3_cognition_sleep_output_report) ? $tab3_cognition_sleep_output_report : '',
				'output_report_9' => !empty($tab3_genitourinary_sexual_output_report) ? $tab3_genitourinary_sexual_output_report : '',
				'output_report_10' => !empty($tab4_output_report_q9) ? $tab4_output_report_q9 : '',
				'output_report_11' => $tab4_output_report_q10
			);
			$url = 'https://api.theamc.com.au/api/Lead/NewLead';
			$enquiryType = 'Menopause';
			$leadSource = 'Website Assessment';

			$data_string = json_encode($emails_data);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$subject = 'Your Personalised Menopause Health Report';
			$receive = array('leads@menopausecentre.com.au'); //leads@menopausecentre.com.au
			ob_start();
?>
	<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Menopause Health Assessment Report</title>
        </head>
        <body style="">
        <table cellspacing="0" cellpadding="0" border="0" width="640px" style="padding: 0; margin: 0 auto; color:#000;">
            <tr>
                <td width="100%">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <td width="10px"></td>
                        <td width="620px">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td height="10px"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="font-family: Arial;font-size: 16px;font-style: normal; color: #000;">
                                            Hi, <?php echo $user_name; ?>
                                        </p>
                                        <p style="margin: 0;font-size: 16px;font-family: Arial; color: #000;">
                                            Thank you for completing AMC’s Menopause Health Assessment. <br/><br/>
                                        </p>
                                        <p style="margin: 0;font-size: 16px;font-family: Arial; color: #000;">
                                            Your personalised health report provides an overview of where you are on your menopause journey based on the information you shared. This report is designed to offer you meaningful insights into your current health and to facilitate discussions with your GP about the best treatment options for you.
                                            <br/><br/>
                                        </p>
                                        <p style="margin: 0;font-size: 16px;font-family: Arial; color: #000;">
                                            <b>Important:</b> Some outcomes may vary if you are currently using continuous hormonal contraceptives or other treatments. Additionally, please be aware that some responses may not be fully applicable to your specific circumstances, as the assessment is based on the limited and general information provided.
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td>
                                       <p style="padding: 0;margin: 0;font-size: 16px;font-family: Arial; color: #000;">
                                           <?= $output_report_1_5;?> <br/>
                                       </p>
                                       <p style="padding: 0;margin: 0;font-size: 16px;font-family: Arial; color: #000;">
                                          <?= $output_report_6;?>
                                          <?= $output_report_7;?>
                                          <?= $output_report_8;?>
                                          <?= $output_report_9;?>
                                       </p>
                                       <p style="padding: 0;margin: 0;font-size: 16px;font-family: Arial; color: #000;">
                                          <?= $output_report_10;?>
                                          <?= $output_report_11;?>
                                       </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="24px"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="margin: 0;font-size: 16px;font-family: Arial; color: #000;">
                                            <b>Note:</b> Your healthcare provider can assist in designing a menopause management plan that not only alleviates your symptoms but also supports your long-term health and well-being, ensuring that you remain healthy throughout your menopause transition and beyond.
                                            As you review this report with your GP, we encourage you to take this opportunity to discuss your overall health and ensure your screening tests are current. This could also include assessments for cardiovascular health, bone density, and other conditions that may become more relevant during this stage of life.
                                            <br/><br/>
                                        </p>
                                        <p style="margin: 0;font-size: 16px;font-family: Arial; color: #000;">
                                            We understand that navigating this phase of life can bring up many questions and concerns, and we're here to support you through the transition. If you're seeking expert guidance, you can book a consultation with one of our experienced Menopause Doctors at Australian Menopause Centre.
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10px"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <p style="margin: 0;font-size: 16px;font-family: Arial; color: #000;">
                                            If you have any questions before your consultation, please don't hesitate to reach out.<br/><br/>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="margin: 0;font-size: 16px;font-family: Arial; color: #000;">
                                            Warm regards,<br/>
                                            The AMC Team
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td width="10px"></td>
                    </table>
                </td>
            </tr>
        </table>
        </body>
        </html>
<?php
	$message = ob_get_clean();
        $to = $_POST['user_email'];
        $headers = 'From: Australian Menopause Centre <reply@menopausecentre.com.au>' . "\r\n" ;
        $headers .='Reply-To: reply@menopausecentre.com.au'. "\r\n" ;
        $headers .='X-Mailer: PHP/' . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";

        wp_mail($to, $subject, $message, $headers);

        $message = '
                <strong>'.$subject.'</strong><br /><br />
                <strong> User name: </strong>'.$user_name.'<br />
                <strong> Email: </strong>'.$user_email.'<br />
                <strong> Age: </strong>'.$user_age.'<br />

                <strong> Q3. When was your last Period? </strong>'.$question_3.'<br />
                <strong> Q4. Do you still have your ovaries intact? </strong>'.$question_4.'<br />
                <strong> Q5. Are you currently on any hormonal birth control? </strong>'.$question_5.'<br />
                <strong> Q6. Do you experience hot flashes or night sweats when you are not taking hormonal contraception? </strong>'.$question_6.'<br />
                <strong> Q7. Have you had your uterus removed (hysterectomy), an IUD implant, or endometrial ablation? </strong>'.$question_7.'<br />
                <strong> Q8. Please select the option that best applies to you? </strong>'.$question_8.'<br />


                ';
    //<strong> Q9. Do you have any of the following health conditions? </strong>'.$question_4.'<br />
      //          <strong> Q10. Do you still have your ovaries intact? </strong>'.$question_4.'<br />
                $message .='Referer: '. $_SERVER['HTTP_REFERER'] .'<br />';

                $headers = 'From: ' . ucfirst($user_name).' <noreply@menopausecentre.com.au>' . "\r\n" ;
                $headers .='Reply-To: '. $_POST['user_email'] . "\r\n" ;
                $headers .='X-Mailer: PHP/' . phpversion();
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8\r\n";

        for ($i = 0; $i < count($receive); $i++) :

            $to = $receive[$i];
            wp_mail($to, $subject, $message, $headers);
        endfor;

        if (isset($_POST['user_email'])) {
            require('MPC_MailChimp.php');
            $MailChimp = new Mpc_MailChimp('2331e78a566d934791f331a8bcfa27d8-us7');
            $result = $MailChimp->post('lists/c1bab8f4f7/members', array(
                    'email_address'	=> $_POST['user_email'],
                    'status'		=> 'subscribed',
                    'merge_fields'	=> array(
                        'FNAME'	=> $_POST['user_name'],
                        'MMERGE3'	=> $_POST['user_name'],
                        'MMERGE5'	=> 'AMC Website',
                        'MMERGE11'	=> date("Y-m-d")
                    ),
                    'interests'		=> array('bef08cff06' => true,'04155d69ca'=>true)
            ));
        }

        $thank_you_location = home_url().'/thank-you-quiz';
        header('Location: ' . $thank_you_location);
        //echo '<script type="text/javascript">window.location.href = "' . $thank_you_location . '";</script>';
        die();
    else :
        header('Location: '.$_SERVER['HTTP_REFERER']);
        die();
    endif;
        die;
        exit;

  }
?>
