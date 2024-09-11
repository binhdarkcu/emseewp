<?php /* Template Name: New Assessment Quiz */?>

<?php get_header();?>
	<section>
		<article>
			<div class="container">
				<div class="content">
					<form action="" method="post">
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
												<h5 class="question-title"><?=$question['question_title']?>
                                                    <?php if(!empty($question['tooltip'])) { ?>
                                                                                                            <div class="custom-tooltip">
                                                                                                                <div class="tooltip-icon bi bi-info-circle"> <span class="tooltiptext"><?php echo $question['tooltip'];?></span></div>
                                                                                                            </div>
                                                                                                        <?php } ?>
                                                </h5>
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
												<h5 class="question-title"><?=$question['question_title']?>
                                                    <?php if(!empty($question['tooltip'])) { ?>
                                                                                                            <div class="custom-tooltip">
                                                                                                                <div class="tooltip-icon bi bi-info-circle"> <span class="tooltiptext"><?php echo $question['tooltip'];?></span></div>
                                                                                                            </div>
                                                                                                        <?php } ?>
                                                </h5>
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
												<h5 class="question-title"><?=$question['question_title']?>
                                                   <?php if(!empty($question['tooltip'])) { ?>
                                                                                                           <div class="custom-tooltip">
                                                                                                               <div class="tooltip-icon bi bi-info-circle"> <span class="tooltiptext"><?php echo $question['tooltip'];?></span></div>
                                                                                                           </div>
                                                                                                       <?php } ?>
                                                </h5>
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
												<h5 class="question-title"><?=$question['question_title']?>
                                                    <?php if(!empty($question['tooltip'])) { ?>
                                                                                                            <div class="custom-tooltip">
                                                                                                                <div class="tooltip-icon bi bi-info-circle"> <span class="tooltiptext"><?php echo $question['tooltip'];?></span></div>
                                                                                                            </div>
                                                                                                        <?php } ?>
                                                </h5>
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
												<h5 class="question-title"><?=$question['question_title']?>
                                                    <?php if(!empty($question['tooltip'])) { ?>
                                                                                                            <div class="custom-tooltip">
                                                                                                                <div class="tooltip-icon bi bi-info-circle"> <span class="tooltiptext"><?php echo $question['tooltip'];?></span></div>
                                                                                                            </div>
                                                                                                        <?php } ?>
                                                </h5>
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
												<h5 class="question-title"><?=$question['question_title']?>
                                                    <?php if(!empty($question['tooltip'])) { ?>
                                                        <div class="custom-tooltip">
                                                            <div class="tooltip-icon bi bi-info-circle"> <span class="tooltiptext"><?php echo $question['tooltip'];?></span></div>
                                                        </div>
                                                    <?php } ?>
                                                </h5>
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
											<h5 class="question-title"><?=$question['question_title']?>
                                                <?php if(!empty($question['tooltip'])) { ?>
                                                <div class="custom-tooltip">
                                                    <div class="tooltip-icon bi bi-info-circle"> <span class="tooltiptext"><?php echo $question['tooltip'];?></span></div>
                                                </div>
                                                <?php } ?>
                                            </h5>
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
											<h5 class="question-title"><?=$question['question_title']?>
                                                <?php if(!empty($question['tooltip'])) { ?>
                                                <div class="custom-tooltip">
                                                    <div class="tooltip-icon bi bi-info-circle"> <span class="tooltiptext"><?php echo $question['tooltip'];?></span></div>
                                                </div>
                                                <?php } ?>
                                            </h5>
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
                                                <h5 class="question-title"><?=$question['question_title']?>
                                                    <?php if(!empty($question['tooltip'])) { ?>
                                                    <div class="custom-tooltip">
                                                        <div class="tooltip-icon bi bi-info-circle"> <span class="tooltiptext"><?php echo $question['tooltip'];?></span></div>
                                                    </div>
                                                    <?php } ?>
                                                </h5>
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
