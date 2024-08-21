<?php /* Template Name: Health Assessment Quiz */?> <html>

<head>
	<title><?php wp_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="author" content="Result Driven SEO" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> <?php wp_head(); ?>
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/assessment.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />

  	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/bootstrap.min.js"></script>

</head>

<body <?php body_class(); ?>>
	<section>
		<article>
			<div class="container">
				<div class="content">
				    <?php
				    ob_start();
				    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['question_result_nonce']) && wp_verify_nonce($_POST['question_result_nonce'], 'question_result_form')) {
                        if (isset($_POST['user_name']) && isset($_POST['user_age'])) {
                            // Sanitize and retrieve form data
                            $user_name = sanitize_text_field($_POST['user_name']);
                            $user_age = intval($_POST['user_age']);
                            $user_email = sanitize_email($_POST['user_email']);
                            $user_state = sanitize_text_field($_POST['user_state']);
                            $user_phone = sanitize_text_field($_POST['user_phone']);
                            $preferred_time = sanitize_text_field($_POST['preferred_time']);
                            $page2_question3 = sanitize_text_field($_POST['page2_question3']);
                            $page2_question4 = sanitize_text_field($_POST['page2_question4']);
                            $page3_question5 = sanitize_text_field($_POST['page3_question5']);
                            $page3_question6 = sanitize_text_field($_POST['page3_question6']);
                            $page3_question7 = sanitize_text_field($_POST['page3_question7']);
                            $page3_question8 = sanitize_text_field($_POST['page3_question8']);
                            $page4_question9 = sanitize_text_field($_POST['page4_question9']);
                            $page4_question10 = sanitize_text_field($_POST['page4_question10']);
                            $page4_question11 = sanitize_text_field($_POST['page4_question11']);
//                            $symptoms_data = $_POST['symptoms_list'];
                             $symptoms_data = $_POST['symptoms_list'];
                            // Process symptoms data
                            $grouped_symptoms_data = array();
                             if (!empty($symptoms_data)) {


                                 foreach ($symptoms_data as $group_name => $symptoms) {
                                     $grouped_symptoms = array("symptom_title" => ucfirst(str_replace('-', ' ', $group_name)), "symptom_content" => array());

                                     foreach ($symptoms as $symptom_name => $symptom_value) {
                                         $grouped_symptoms["symptom_content"][] = array(
                                             "symptom_name" => ucfirst(str_replace('-', ' ', $symptom_name)),
                                             "symptom_value" => $symptom_value
                                         );
                                     }

                                     $grouped_symptoms_data[] = $grouped_symptoms;
                                 }
                             }

                            // Create a new post in the "Question Result" post type
                            $post_data = array(
                                'post_title'    => $user_name . ' - ' . $user_age,
                                'post_type'     => 'questions-result',
                                'post_status'   => 'publish',
                            );

                            $post_id = wp_insert_post($post_data);

                            // Check if the post was successfully created
                            if ($post_id) {
                                // Insert ACF fields
                                update_field('user_name', $user_name, $post_id);
                                update_field('user_age', $user_age, $post_id);
                                update_field('user_email', $user_email, $post_id);
                                update_field('user_state', $user_state, $post_id);
                                update_field('user_phone', $user_phone, $post_id);
                                update_field('page2_question3', $page2_question3, $post_id);
                                update_field('page2_question4', $page2_question4, $post_id);
                                update_field('page3_question5', $page3_question5, $post_id);
                                update_field('page3_question6', $page3_question6, $post_id);
                                update_field('page3_question7', $page3_question7, $post_id);
                                update_field('page3_question8', $page3_question8, $post_id);
                                update_field('page4_question9', $page4_question9, $post_id);
                                update_field('page4_question10', $page4_question10, $post_id);
                                update_field('page4_question11', $page4_question11, $post_id);
                                update_field('preferred_time', $preferred_time, $post_id);

                                if (have_rows('symptoms_data', $post_id)) {
                                    // Clear existing data
                                    delete_field('symptoms_data', $post_id);
                                }
                                //update_field('symptoms_data', $symptoms_data, $post_id);
                                foreach ($grouped_symptoms_data as $group) {
                                    $row_index = add_row('symptoms_data', array(
                                        'symptom_title' => $group['symptom_title'],
                                    ), $post_id);

                                    // Loop through the symptom_content array
                                    foreach ($group['symptom_content'] as $symptom) {
                                        add_sub_row(array('symptoms_data', $row_index, 'symptom_content'), array(
                                            'symptom_name' => $symptom['symptom_name'],
                                            'symptom_value' => $symptom['symptom_value'],
                                        ), $post_id);
                                    }
                                }

                                // Redirect to the same page without the form data
                                echo '<script type="text/javascript">window.location.href = "' . home_url('/thank-you-quiz') . '";</script>';
                                exit;
                            } else {
                                // Handle errors
                                echo "There was an error saving the Question Result.";
                            }
                        }
                    }
                    ob_flush();
                    ?>
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
								<div id="progressBar" class="questionnaire-progress__bar__current percent-indicator"></div>
							</div>
							<div id="questionnaire_1" class="questionnaire-section section-one current">
								<div class="question-wrapper">
								    <?php
								        $question1 = get_field('question1', 'option');
								        $question2 = get_field('question2', 'option');
								    ?>
									<div class="form-row">
										<label class="question-title"><?= $question1;?></label>
										<input class="form-field-text" type="text" name="user_name" id="user_name" value="" autocomplete="off"/>
									</div>
									<div class="form-row">
										<label class="question-title"><?= $question2;?></label>
										<input class="form-field-text" maxlength="3" type="number" name="user_age" id="user_age" value=""/>
									</div>
									<div class="questionnaire-actions">
										<div class="middle-actions">
											<button data-progress="20" data-next-tab="2" class="disable btn btn--lg btn--orange questionnaire-continue">Next</button>
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
												<h5 class="question-title"><?=$question['question_title']?> <i class="tooltip-icon bi bi-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $question['tooltip'];?>"></i></h5>
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
												<h5 class="question-title"><?=$question['question_title']; ?> <i class="tooltip-icon bi bi-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $question['tooltip'];?>"></i></h5>
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
												<button data-back-tab="1" class="btn btn--lg btn--blue-light questionnaire-back">Back</button>
												<button data-progress="40" data-next-tab="3" class="btn-hide btn btn--lg btn--orange has-result-next-tab">Next</button>
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
												<h5 class="question-title"><?=$question['question_title']?> <i class="tooltip-icon bi bi-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $question['tooltip'];?>"></i></h5>
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
												<h5 class="question-title"><?=$question['question_title']?> <i class="tooltip-icon bi bi-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $question['tooltip'];?>"></i></h5>
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
												<h5 class="question-title"><?=$question['question_title']?> <i class="tooltip-icon bi bi-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $question['tooltip'];?>"></i></h5>
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
												<h5 class="question-title"><?=$question['question_title']?> <i class="tooltip-icon bi bi-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo $question['tooltip'];?>"></i></h5>
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
												<button data-back-question-page="1" data-back-tab="2" class="btn btn--lg btn--blue-light questionnaire-back">Back</button>
												<button data-progress="40" data-next-tab="3" class="btn-hide btn btn--lg btn--orange has-result-next-tab">Next</button>
											</div>
										</div>
									</div>
								</div>
								<input id="menopause-assessment-result" type="hidden" name="result" value=""/>
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
                                                <input id="<?=sanitize_title($symptom['symptom_title']);?>" type="hidden" name="result" value=""/>
                                            <?php } ?>
									</div>
									<div class="questionnaire-actions">
										<div class="middle-actions">
											<button data-back-tab="2" class="btn btn--lg btn--blue-light questionnaire-back">Back</button>
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
											<h5 class="question-title"><?=$question['question_title']?></h5>
											<i class="tooltip"><?php echo $question['tooltip'];?></i>
										</div>
										<div class="form-group">
										<?php
                                        $index = 1;
                                        $getAnswers = $question['answers'];
                                        foreach( $getAnswers as $key=>$field ) {?>
                                                <div class="form-check">
                                                    <input data-question="9" data-answer="9<?=$index;?>" value="<?= $field['answer_option'];?>" class="form-check-input" id="question9<?=$index;?>" type="checkbox" name="page4_question9">
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
											<h5 class="question-title"><?=$question['question_title']?></h5>
											<i class="tooltip"><?php echo $question['tooltip'];?></i>
										</div>
										<div class="form-group">
										<?php
                                        $index = 1;
                                        $getAnswers = $question['answers'];
                                        foreach( $getAnswers as $key=>$field ) {?>
                                                <div class="form-check">
                                                    <input data-question="10" data-answer="10<?=$index;?>" value="<?= $field['answer_option'];?>" class="form-check-input" id="question10<?=$index;?>" type="checkbox" name="page4_question10">
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
                                                <h5 class="question-title"><?=$question['question_title']?> </h5>
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
								<input id="menopause-assessment-result-q9" type="hidden" name="result" value=""/>
								<input id="menopause-assessment-result-q10" type="hidden" name="result" value=""/>
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
										<p>Thank you for completing EMSEE’s menopause health assessment! To receive your personalised assessment please provide your contact details below: </p>
									</div>
									<div class="form-row">
										<label>Email: </label>
										<input required class="form-field-text" type="email" value="" name="user_email" />
									</div>
									<div class="form-row">
                                        <label>Mobile: </label>
                                        <input required class="form-field-text" type="phone" value="" name="user_phone" />
                                    </div>
                                    <div class="form-row">
                                        <label>Preferred time to contact: </label>
                                        <input required class="form-field-text" type="text" value="anytime" name="preferred_time" />
                                    </div>

									<div class="form-row">
										<label>State: </label>
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
											<label class="form-check-label" for="contacted-phone"> I would like to be contacted by phone from AMC </label>
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
	<script>
	window.addEventListener("load", function(event) {
		$(document).ready(function() {
			var clsQuestionnaireSection = $('.questionnaire-section');
			var progressBar = $('#progressBar');
			var percentLabel = $('#percentLabel');
			var questionnaireStart = $('#questionnaire-start');
			var userAge = 0;
			var result1 = $('#result1').val();
			var result2 = $('#result2').val();
			var result3 = $('#result3').val();
			var result4 = $('#result4').val();
			var result5 = $('#result5').val();
			var result6 = $('#result6').val();
			var result7 = $('#result6').val();
			var result8 = $('#result8').val();
			var result9 = $('#result8').val();
			var result10 = $('#result10').val();
			var result11 = $('#result11').val();

			var hasResultAtStep = 0;

			function checkUserAndAge() {
			    let isValidJUserNameAndAge = true;
			    var tab1UserName = $('#user_name').val();
			    var tab1UserAge = $('#user_age').val();
			    if (tab1UserName === "") {
			        isValidJUserNameAndAge = false;
			    }
			    if (tab1UserAge === "" || tab1UserAge == 0 || tab1UserAge.length > 3) {
                    isValidJUserNameAndAge = false;
                }

                if (isValidJUserNameAndAge) {
                    $('.questionnaire-continue').removeClass('disable')
                } else {
                    $('.questionnaire-continue').addClass('disable')
                }
			}
			$('#user_name, #user_age').on('input', function() {
				checkUserAndAge();
			});
			// Handle next button

			$('.questionnaire-continue, .has-result-next-tab, .questionnaire4-next').on('click', function(e) {
				e.preventDefault();
				var dataNextQuestion = $(this).data('next-tab');
				var dataProgress = $(this).data('progress');
				clsQuestionnaireSection.removeClass('current');
				progressBar.width(dataProgress + '%');
				var moveNextQuestion = $('#questionnaire_' + dataNextQuestion);
				moveNextQuestion.addClass('current');
				var questionStep = questionnaireStart.find('.question-step');
				$(questionStep).removeClass('is-highlighted')
				$('.question-step[data-step=' + dataNextQuestion + ']').addClass('is-highlighted')
				if(dataNextQuestion == 2) {
					var getUserName = $('#user_name').val();
					var fillUserName = $('#fillUserName')
					fillUserName.text(getUserName);
				}
				userAge = $('#user_age').val();
			});
			// handle choose answer
			$('.question-item').each(function() {
				$(this).find('.form-check input[type="radio"]').change(function() {
					var currentQuestion = $(this).data('question');
					var answer = $(this).data('answer');
					if(currentQuestion == 3) {
						// handle question 3
						var resultQ3 = {
							31: 'menopause_assessment_output_2',
							32: 'menopause_assessment_output_3',
						}
						if(resultQ3[answer] != undefined) {
						    hasResultAtStep = 2;
							//$('#question-result').html('Output: ' + resultQ3[answer]);
							$('#menopause-assessment-result').val(resultQ3[answer]);
							$('.question-item[data-question="4"]').removeClass('display')
							$('.has-result-next-tab').removeClass('btn-hide')
						}
						if(answer == 33) {
						    hasResultAtStep = 0;
							//$('#question-result').html('')
							$('#menopause-assessment-result').val('');
							$('.has-result-next-tab').addClass('btn-hide')
							$('.question-item[data-question="4"]').addClass('display')
						}
					}
					//handle question 4
					if(currentQuestion == 4) {
						//Case 1: Below 40
						if(userAge <= 40) {
							var resultQ4 = {
								41: 'menopause_assessment_output_1',
								42: 'menopause_assessment_output_1',
								43: 'menopause_assessment_output_4'
							}
							if(resultQ4[answer] != undefined) {
							    hasResultAtStep = 2;
								//$('#question-result').html('Output: ' + resultQ4[answer]);
								$('#menopause-assessment-result').val(resultQ4[answer]);
								$('.has-result-next-tab').removeClass('btn-hide')
							}
						} else {
						    //Case 1: Above 58
                            if(userAge > 58 || answer == 43) {
                                $('#questionnaire_22').removeClass('showing')
                                //$('#question-result').html('Output: ' + result4);
                                $('#menopause-assessment-result').val('menopause_assessment_output_4');
                                $('.has-result-next-tab').removeClass('btn-hide')
                                hasResultAtStep = 2;
                            } else {
                                $('.questionnaire-children').removeClass('showing')
                                $('#questionnaire_22').addClass('showing');
                                $('.has-result-next-tab').addClass('btn-hide')
                                $('.question-item[data-question="6"]').removeClass('display')
                                $('.question-item[data-question="7"]').removeClass('display')
                                $('.question-item[data-question="8"]').removeClass('display')
                                $('.question-item[data-question="5"] input[type="radio"]').prop('checked', false);
                                $('.question-item[data-question="6"] input[type="radio"]').prop('checked', false);
                                $('.question-item[data-question="7"] input[type="radio"]').prop('checked', false);
                                //$('#question-result').html('')
                                $('#menopause-assessment-result').val('');
                                hasResultAtStep = 0;
                            }
						}

					}
					if(currentQuestion == 5) {
						$('.has-result-next-tab').addClass('btn-hide')
						$('#question-result').html('')
						$('.question-item[data-question="6"] input[type="radio"]').prop('checked', false);
						$('.question-item[data-question="7"] input[type="radio"]').prop('checked', false);
						$('.question-item[data-question="8"] input[type="radio"]').prop('checked', false);
						if(answer == 51) {
							$('.question-item[data-question="6"]').addClass('display')
							$('.question-item[data-question="7"]').removeClass('display')
							$('.question-item[data-question="8"]').removeClass('display')
						} else if(answer == 52) {
							$('.question-item[data-question="6"]').removeClass('display')
							$('.question-item[data-question="7"]').addClass('display')
							$('.question-item[data-question="8"]').removeClass('display')
						}
					}
					if(currentQuestion == 6) {
						$('.has-result-next-tab').removeClass('btn-hide')
						$('.question-item[data-question="7"]').removeClass('display')
						$('.question-item[data-question="8"]').removeClass('display')
						if(answer == 61) {
							//$('#question-result').html('Output: ' + result5);
							$('#menopause-assessment-result').val('menopause_assessment_output_5');
							hasResultAtStep = 2;
						} else if(answer == 62) {
							//$('#question-result').html('Output: ' + result2);
							$('#menopause-assessment-result').val('menopause_assessment_output_2');
							hasResultAtStep = 2;
						}
					}
					if(currentQuestion == 7) {
						if(answer == 71) {
							//$('#question-result').html('')
							$('#menopause-assessment-result').val('');
							$('.has-result-next-tab').addClass('btn-hide')
							$('.question-item[data-question="8"]').addClass('display')
							hasResultAtStep = 0;
						} else if(answer == 72) {
							$('.has-result-next-tab').removeClass('btn-hide')
							$('.question-item[data-question="8"]').removeClass('display')
							//$('#question-result').html('Output: ' + result4);
							$('#menopause-assessment-result').val('menopause_assessment_output_4');
							hasResultAtStep = 2;
						}
					}
					if(currentQuestion == 8) {
						$('.has-result-next-tab').removeClass('btn-hide')
						hasResultAtStep = 2;
						if(answer == 81) {
							//$('#question-result').html('Output: ' + result2);
							$('#menopause-assessment-result').val('menopause_assessment_output_2');
						} else if(answer == 82) {
							//$('#question-result').html('Output: ' + result5);
							$('#menopause-assessment-result').val('menopause_assessment_output_5');
						} else if(answer == 83) {
							if(userAge >= 52) {
								//$('#question-result').html('Output: ' + result4);
								$('#menopause-assessment-result').val('menopause_assessment_output_4');
							} else {
								//$('#question-result').html('Output: ' + result5);
								$('#menopause-assessment-result').val('menopause_assessment_output_5');
							}
						}
					}
				});
			});
			$('.section-four .question-item').each(function() {
				$(this).find('.form-check input[type="checkbox"]').change(function() {
					var currentQ = $(this).data('question');
					if(currentQ == 9) {
						//$('#result-question9').html('Output: ' + result10);
						$('#menopause-assessment-result-q9').val('menopause_assessment_output_10')
					} else if(currentQ == 10) {
						//$('#result-question10').html('Output: ' + result11);
						$('#menopause-assessment-result-q10').val('menopause_assessment_output_11')
					}
				})
			})
			// handle back button
			// case back tab
			$('.questionnaire-actions .questionnaire-back').click(function(e) {
				e.preventDefault();
				var backTab = $(this).data('back-tab');
                if(backTab == 1) {
                    clsQuestionnaireSection.removeClass('current');
                    $('#questionnaire_1').addClass('current');
                    $('.question-item').removeClass('display');
                    $('.question-item[data-question="3"]').addClass('display');
                    $('.question-item[data-question="5"]').addClass('display');
                    $('.question-item input[type="radio"]').prop('checked', false);
                    var questionStep = questionnaireStart.find('.question-step');
                    $(questionStep).removeClass('is-highlighted')
                    $('.question-step[data-step="1"]').addClass('is-highlighted')
                    $('#question-result').html('')
                } else if(backTab == 2) {
                       clsQuestionnaireSection.removeClass('current');
                       $('#questionnaire_2').addClass('current');
                       var backQuestionPage = $(this).data('back-question-page');
                       if(backQuestionPage == 1) {
                           $('.questionnaire-children').removeClass('showing')
                           $('#questionnaire_21').addClass('showing');
                           $('#question-result').html('')
                           $('.question-item[data-question="4"] input[type="radio"]').prop('checked', false);
                       }
                } else {
                    if(hasResultAtStep != 0) {
                        if(hasResultAtStep == 2) {
                            clsQuestionnaireSection.removeClass('current');
                            $('#questionnaire_2').addClass('current');
                            var questionStep = questionnaireStart.find('.question-step');
                            $(questionStep).removeClass('is-highlighted')
                            $('.question-step[data-step=' + hasResultAtStep + ']').addClass('is-highlighted')
                        }
                    } else {
                        if(backTab == 3) {
                            clsQuestionnaireSection.removeClass('current');
                            $('#questionnaire_3').addClass('current');
                        }
                        if(backTab == 4) {
                            clsQuestionnaireSection.removeClass('current');
                            $('#questionnaire_4').addClass('current');
                        }
                        var backQuestionPage = $(this).data('back-question-page');
                        if(backQuestionPage == 1) {
                            $('.questionnaire-children').removeClass('showing')
                            $('#questionnaire_21').addClass('showing');
                        }
                    }
                }
			});
			// Function to check if all radios in a group are selected
            function validateGroupSelection(group) {
                return $(group).find('.symptom-row').length === $(group).find('.symptom-row input:checked').length;
            }
            function validateSymptomForm() {
                let allGroupsValid = true;

                $('.symptom-group').each(function() {
                    if (!validateGroupSelection(this)) {
                        allGroupsValid = false;
                        return false; // Exit the loop early
                    }
                });

                if (allGroupsValid) {
                    $('#submitButton').removeClass('btn-hide');
                } else {
                    $('#submitButton').addClass('btn-hide');
                }
            }

			function checkSymptomGroup(group) {
				var selected = false;
				// Iterate over all radio buttons in the specified group
				$(group).find('input[type="radio"]').each(function() {
					if($(this).is(':checked') && ($(this).val() === 'Quite a bit' || $(this).val() === 'Extremely')) {
						selected = true;
						return false; // Exit the loop once a match is found
					}
				});
				// Do something if a match is found
				if(selected) {
					var groupName = $(group).data('group');
					var groupOutput = $(group).data('output');
					$('.symptoms-output').show();
					$('#' + groupName).val(groupOutput);
					//console.log(groupName + ': Quite a bit or Extremely is selected');
					// You can perform any action here
				} else {
					var groupName = $(group).data('group');
					$('#' + groupName).val('');
					//console.log(groupName + ': Neither Quite a bit nor Extremely is selected');
				}
			}
			// Check all groups on page load or when a radio button is clicked
			function checkAllGroups() {
				$('.symptom-group').each(function() {
					checkSymptomGroup(this);
				});
			}
			// Call the function on radio button change
			$('.symptom-group input[type="radio"]').on('change', function() {
				checkAllGroups();
			})
// 			$('.symptom-group .symptom-radio').on('change', function() {
//                 validateSymptomForm();
//             })

			//validateSymptomForm();
			checkAllGroups();

			function validatePersonalHistory() {
                let allAnswered = true;
                // Loop through each question-item and check if at least one input is checked
                $('.section-four .question-item').each(function() {
                    let questionAnswered = $(this).find('input[type="checkbox"]:checked').length > 0 ||
                                           $(this).find('input[type="radio"]:checked').length > 0;
                    if (!questionAnswered) {
                        allAnswered = false;
                        return false; // Exit loop early if a question is not answered
                    }
                });

                // Enable or disable the Continue button based on validation
                $('.questionnaire-next').prop('disabled', !allAnswered);
            }

            validatePersonalHistory();
            $('input[type="checkbox"], input[type="radio"]').on('change', function() {
                validatePersonalHistory();
            });

			$('[data-toggle="tooltip"]').tooltip()



		});
	});
	</script>
</body>
