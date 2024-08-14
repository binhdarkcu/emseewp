<?php /* Template Name: Health Assessment Quiz */?> <html>

<head>
	<title><?php wp_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="author" content="Result Driven SEO" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0"> <?php wp_head(); ?>
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/bootstrap.min.js" rel="stylesheet" />
	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/assessment.css" rel="stylesheet">
	<script defer="" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" id="jquery-js"></script>
</head>

<body <?php body_class(); ?>>
	<section>
		<article>
			<div class="container">
				<div class="content">
					<form action="" method="post">
						<div class="assessment-section">
							<h1 class="cnt-title cnt-title--blue align-center">Getting to know you</h1>
							<div class="questionnaire-progress is-step-1">
								<div class="questionnaire-progress__labels" id="questionnaire-start">
									<span data-step='1' class="questionnaire-progress__label question-step is-highlighted">Your details</span>
									<span data-step='2' class="questionnaire-progress__label question-step">Your Menstrual</span>
									<span data-step='3' class="questionnaire-progress__label question-step">Your symptoms</span>
									<span data-step='4' class="questionnaire-progress__label question-step">Personal History</span>
									<span data-step='5' class="questionnaire-progress__label question-step">Your Details</span>
								</div>
							</div>
							<h2 id="percentLabel" class="questionnaire-progress__title mb-sm"><span class="percent-label">0% complete</span></h2>
							<div class="questionnaire-progress__bar">
								<div id="progressBar" class="questionnaire-progress__bar__current percent-indicator"></div>
							</div>
							<div id="questionnaire_1" class="questionnaire-section section-one current">
								<div class="question-wrapper">
									<div class="form-row">
										<label>Q1. What is your name?</label>
										<input class="form-field-text" type="text" name="user_name" id="user_name" value="">
									</div>
									<div class="form-row">
										<label>Q2. How old are you?</label>
										<input class="form-field-text" type="number" name="user_age" id="user_age" value="">
									</div>
									<div class="questionnaire-actions">
										<div class="middle-actions">
											<button data-progress="4" data-next-tab="2" class="disable btn btn--lg btn--orange questionnaire-continue">Next</button>
										</div>
									</div>
								</div>
							</div> <?php
                           $results = get_field('results', 'option');
                           foreach( $results as $key=>$result ) {
                           $ind = $key+1;
                           ?> <input id="result<?=$ind?>" type="hidden" name="result" value="<?php echo $result['output']; ?>"> <?php
                           }
                           ?> <div id="questionnaire_2" class="questionnaire-section section-two">
								<div class="question-wrapper">
									<div id="questionnaire_21" class="questionnaire-children showing">
										<div class="std-content align-center">
											<h2>Your Menstrual History</h2>
											<p>The timing of your last period, <span class="fill-username" id="fillUserName"></span>, helps us to determine which stage of the menopausal transition you are in: premenopause, perimenopause or postmenopause.It's possible that more than one category might apply to your situation; simply choose the one that fits best.</p>
										</div>
										<hr /> <?php
                                    $question3 = get_field('question3', 'option');
                                    foreach( $question3 as $key=>$question ) {
                                    ?> <div data-question="3" class="question-item display">
											<div class="std-content">
												<h5><?=$question['question_title']?></h5>
												<i class="tooltip"><?php echo $question['tooltip'];?></i>
											</div> <?php
                                       $index = 1;
                                       $getAnswers = $question['answers'];
                                       foreach( $getAnswers as $key=>$field ) {?> <div class="form-row">
												<div class="form-check">
													<input data-question="3" data-answer="3<?=$index;?>" class="form-check-input" id="question3<?=$index;?>" type="radio" name="page2_question3">
													<label class="form-check-label" for="question3<?=$index;?>"> <?= $field['answer_option']; ?> </label>
												</div>
											</div> <?php $index++; } ?>
										</div> <?php
                                    }
                                    ?> <?php
                                    $question4 = get_field('question4', 'option');
                                    foreach( $question4 as $key=>$question ) {
                                    ?> <div data-question="4" class="question-item">
											<div class="std-content">
												<h5><?=$question['question_title']?></h5>
												<i class="tooltip"><?php echo $question['tooltip'];?></i>
											</div> <?php
                                       $index = 1;
                                       $getAnswers = $question['answers'];
                                       foreach( $getAnswers as $key=>$field ) {?> <div class="form-row">
												<div class="form-check">
													<input data-question="4" data-answer="4<?=$index;?>" class="form-check-input" id="question4<?=$index;?>" type="radio" name="page2_question4">
													<label class="form-check-label" for="question4<?=$index;?>"> <?= $field['answer_option']; ?> </label>
												</div>
											</div> <?php $index++; } ?>
										</div> <?php
                                    }
                                    ?> <div class="questionnaire-actions">
											<div class="middle-actions">
												<button data-back-tab="1" class="btn btn--lg btn--blue-light questionnaire-back">Back</button>
												<button data-progress="16" data-next-tab="3" class="btn-hide btn btn--lg btn--orange has-result-next-tab">Next</button>
											</div>
										</div>
									</div>
									<div id="questionnaire_22" class="questionnaire-children">
										<div class="std-content align-center">
											<h2>Your Menstrual History</h2>
											<p>Hormonal contraception can stop your periods thereby masking your true menopausal status, so it’s important we understand your current contraceptive medication so you can receive an accurate diagnosis. </p>
										</div> <?php
                                    $question5 = get_field('question5', 'option');
                                    foreach( $question5 as $key=>$question ) {
                                    ?> <div data-question="5" class="question-item display">
											<div class="std-content">
												<h5><?=$question['question_title']?></h5>
												<i class="tooltip"><?php echo $question['tooltip'];?></i>
											</div> <?php
                                       $index = 1;
                                       $getAnswers = $question['answers'];
                                       foreach( $getAnswers as $key=>$field ) {?> <div class="form-row">
												<div class="form-check">
													<input data-question="5" data-answer="5<?=$index;?>" class="form-check-input" id="question5<?=$index;?>" type="radio" name="page3_question5">
													<label class="form-check-label" for="question5<?=$index;?>"> <?= $field['answer_option']; ?> </label>
												</div>
											</div> <?php $index++; } ?>
										</div> <?php
                                    }
                                    ?> <?php
                                    $question6 = get_field('question6', 'option');
                                    foreach( $question6 as $key=>$question ) {
                                    ?> <div data-question="6" class="question-item">
											<div class="std-content">
												<h5><?=$question['question_title']?></h5>
												<i class="tooltip"><?php echo $question['tooltip'];?></i>
											</div> <?php
                                       $index = 1;
                                       $getAnswers = $question['answers'];
                                       foreach( $getAnswers as $key=>$field ) {?> <div class="form-row">
												<div class="form-check">
													<input data-question="6" data-answer="6<?=$index;?>" class="form-check-input" id="question6<?=$index;?>" type="radio" name="page3_question6">
													<label class="form-check-label" for="question6<?=$index;?>"> <?= $field['answer_option']; ?> </label>
												</div>
											</div> <?php $index++; } ?>
										</div> <?php
                                    }
                                    ?> <?php
                                    $question7 = get_field('question7', 'option');
                                    foreach( $question7 as $key=>$question ) {
                                    ?> <div data-question="7" class="question-item">
											<div class="std-content">
												<h5><?=$question['question_title']?></h5>
												<i class="tooltip"><?php echo $question['tooltip'];?></i>
											</div> <?php
                                       $index = 1;
                                       $getAnswers = $question['answers'];
                                       foreach( $getAnswers as $key=>$field ) {?> <div class="form-row">
												<div class="form-check">
													<input data-question="7" data-answer="7<?=$index;?>" class="form-check-input" id="question7<?=$index;?>" type="radio" name="page3_question7">
													<label class="form-check-label" for="question7<?=$index;?>"> <?= $field['answer_option']; ?> </label>
												</div>
											</div> <?php $index++; } ?>
										</div> <?php
                                    }
                                    ?> <?php
                                    $question8 = get_field('question8', 'option');
                                    foreach( $question8 as $key=>$question ) {
                                    ?> <div data-question="8" class="question-item">
											<div class="std-content">
												<h5><?=$question['question_title']?></h5>
												<i class="tooltip"><?php echo $question['tooltip'];?></i>
											</div> <?php
                                       $index = 1;
                                       $getAnswers = $question['answers'];
                                       foreach( $getAnswers as $key=>$field ) {?> <div class="form-row">
												<div class="form-check">
													<input data-question="8" data-answer="8<?=$index;?>" class="form-check-input" id="question8<?=$index;?>" type="radio" name="page3_question8">
													<label class="form-check-label" for="question8<?=$index;?>"> <?= $field['answer_option']; ?> </label>
												</div>
											</div> <?php $index++; } ?>
										</div> <?php
                                    }
                                    ?> <div class="questionnaire-actions">
											<div class="middle-actions">
												<button data-back-question-page="1" class="btn btn--lg btn--blue-light questionnaire-back">Back</button>
												<button data-progress="16" data-next-tab="3" class="btn-hide btn btn--lg btn--orange has-result-next-tab">Next</button>
											</div>
										</div>
									</div>
								</div>
								<div id="question-result"></div>
							</div>
							<div id="questionnaire_3" class="questionnaire-section section-three"> <?php
                              $your_symptoms = get_field('your_symptoms', 'option');
                              $symptoms_list= $your_symptoms[0]['symptoms_list'];
                              ?> <div class="question-wrapper">
									<div class="std-content align-center">
										<h2>Your Menstrual History</h2>
										<p><?php echo $your_symptoms[0]['symptons_description'];?></p>
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
                                    foreach($symptoms_list as $symptom) {
                                       $symptom_content = $symptom['symptom_content'];
                                       $symptom_questions += count($symptom_content);
                                    ?> <div class="symptom-item symptom-group" data-group="<?= sanitize_title($symptom['symptom_title']); ?>">
											<div class="symptom-title"> <?php echo $symptom['symptom_title'];?> </div> <?php
                                       foreach($symptom_content as $symptom_row) {
                                       ?> <div class="symptom-row">
												<div class="column col1"><?=$symptom_row['symptom_item']?></div>
												<div class="column col2">
													<div class="middle">
														<input class="answer-checkbox" value="Not at all" type="radio" name="<?php echo sanitize_title($symptom_row['symptom_item']);?>">
													</div>
												</div>
												<div class="column col3">
													<div class="middle">
														<input class="answer-checkbox" value="A little" type="radio" name="<?php echo sanitize_title($symptom_row['symptom_item']);?>">
													</div>
												</div>
												<div class="column col4">
													<div class="middle">
														<input class="answer-checkbox" value="Quite a bit" type="radio" name="<?php echo sanitize_title($symptom_row['symptom_item']);?>">
													</div>
												</div>
												<div class="column col5">
													<div class="middle">
														<input class="answer-checkbox" value="Extremely" type="radio" name="<?php echo sanitize_title($symptom_row['symptom_item']);?>">
													</div>
												</div>
											</div> <?php } ?>
										</div> <?php } ?> <input id="symptoms-questions" type="hidden" name="symptoms-questions" value="<?php echo $symptom_questions; ?>">
										<div class="symptoms-output">
											<div class="output-title">Symptom Output</div> <?php
                                       $index = 4;
                                       foreach($symptoms_list as $symptom) {
                                       $index++;
                                       ?> <div class="symptom-result-list" id="<?=sanitize_title($symptom['symptom_title']);?>"> <?php echo $symptom['symptom_title'];?>: <span><?=$results[$index]['output'];?></span>
											</div> <?php } ?>
										</div>
									</div>
									<div class="questionnaire-actions">
										<div class="middle-actions">
											<button data-back-tab="2" class="btn btn--lg btn--blue-light questionnaire-back">Back</button>
											<button data-progress="78" data-next-tab="4" class="btn-hide btn btn--lg btn--orange questionnaire4-next">Continue</button>
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
											<h5><?=$question['question_title']?></h5>
											<i class="tooltip"><?php echo $question['tooltip'];?></i>
										</div> <?php
                                    $index = 1;
                                    $getAnswers = $question['answers'];
                                    foreach( $getAnswers as $key=>$field ) {?> <div class="form-row">
											<div class="form-check">
												<input data-question="9" data-answer="9<?=$index;?>" class="form-check-input" id="question9<?=$index;?>" type="checkbox" name="page4_question9">
												<label class="form-check-label" for="question9<?=$index;?>"> <?= $field['answer_option']; ?> </label>
											</div>
										</div> <?php $index++; } ?>
									</div> <?php $index++; } ?> <div id="result-question9" class="mb-20"></div> <?php
                                 $question10 = get_field('question10', 'option');
                                 foreach( $question10 as $key=>$question ) {
                                 ?> <div data-question="10" class="question-item display">
										<div class="std-content">
											<h5><?=$question['question_title']?></h5>
											<i class="tooltip"><?php echo $question['tooltip'];?></i>
										</div> <?php
                                    $index = 1;
                                    $getAnswers = $question['answers'];
                                    foreach( $getAnswers as $key=>$field ) {?> <div class="form-row">
											<div class="form-check">
												<input data-question="10" data-answer="10<?=$index;?>" class="form-check-input" id="question10<?=$index;?>" type="checkbox" name="page4_question10">
												<label class="form-check-label" for="question10<?=$index;?>"> <?= $field['answer_option']; ?> </label>
											</div>
										</div> <?php $index++; } ?>
									</div> <?php $index++; } ?> <div id="result-question10"></div>
								</div>
								<div class="questionnaire-actions">
									<div class="middle-actions">
										<button data-back-tab="3" class="btn btn--lg btn--blue-light questionnaire-back">Back</button>
										<button data-progress="85" data-next-tab="5" class="btn-hide btn btn--lg btn--orange questionnaire-next has-result-next-tab">Continue</button>
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
										<input class="form-field-text" type="email" value="" name="user_email" />
									</div>
									<div class="form-row">
										<label>State: </label>
										<select class="form-field-text" id="stateDropdown" name="user_state">
											<option value="">Select a state</option>
										</select>
									</div>
									<div class="form-row">
										<label>Phone: </label>
										<input class="form-field-text" type="phone" value="" name="user_phone" />
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

			function checkUserAndAge() {
				if($('#user_name').val() != '' && $('#user_age').val() != '') {
					$('.questionnaire-continue').removeClass('disable')
				} else {
					$('.questionnaire-continue').addClass('disable')
				}
			}
			$('#user_name, #user_age').change(function() {
				checkUserAndAge();
			});
			// Handle next button
			$('.questionnaire-continue, .has-result-next-tab, .questionnaire4-next').on('click', function(e) {
				e.preventDefault();
				var dataNextQuestion = $(this).data('next-tab');
				var dataProgress = $(this).data('progress');
				clsQuestionnaireSection.removeClass('current');
				progressBar.width(dataProgress + '%');
				percentLabel.text(dataProgress + '% complete');
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
							31: result2,
							32: result3,
						}
						if(resultQ3[answer] != undefined) {
							$('#question-result').html('Output: ' + resultQ3[answer]);
							$('.question-item[data-question="4"]').removeClass('display')
							$('.has-result-next-tab').removeClass('btn-hide')
						}
						if(answer == 33) {
							$('#question-result').html('')
							$('.has-result-next-tab').addClass('btn-hide')
							$('.question-item[data-question="4"]').addClass('display')
						}
					}
					//handle question 4
					if(currentQuestion == 4) {
						//Case 1: Below 40
						if(userAge <= 40) {
							var resultQ4 = {
								41: result1,
								42: result1,
								43: result4
							}
							if(resultQ4[answer] != undefined) {
								$('#question-result').html('Output: ' + resultQ4[answer]);
								$('.has-result-next-tab').removeClass('btn-hide')
							}
						}
						//Case 1: Above 58
						if(userAge > 58 || answer == 43) {
							$('#questionnaire_22').removeClass('showing')
							$('#question-result').html('Output: ' + result4);
							$('.has-result-next-tab').removeClass('btn-hide')
						} else {
							$('.questionnaire-children').removeClass('showing')
							$('#questionnaire_22').addClass('showing');
							$('.has-result-next-tab').addClass('btn-hide')
							$('#question-result').html('')
						}
					}
					if(currentQuestion == 5) {
						$('.has-result-next-tab').addClass('btn-hide')
						$('#question-result').html('')
						if(answer == 51) {
							$('.question-item[data-question="6"]').addClass('display')
							$('.question-item[data-question="7"]').removeClass('display')
						} else if(answer == 52) {
							$('.question-item[data-question="6"]').removeClass('display')
							$('.question-item[data-question="7"]').addClass('display')
						}
					}
					if(currentQuestion == 6) {
						$('.has-result-next-tab').removeClass('btn-hide')
						if(answer == 61) {
							$('#question-result').html('Output: ' + result5);
						} else if(answer == 62) {
							$('#question-result').html('Output: ' + result2);
						}
					}
					if(currentQuestion == 7) {
						if(answer == 71) {
							$('#question-result').html('')
							$('.has-result-next-tab').addClass('btn-hide')
							$('.question-item[data-question="8"]').addClass('display')
						} else if(answer == 72) {
							$('.has-result-next-tab').removeClass('btn-hide')
							$('.question-item[data-question="8"]').removeClass('display')
							$('#question-result').html('Output: ' + result4);
						}
					}
					if(currentQuestion == 8) {
						$('.has-result-next-tab').removeClass('btn-hide')
						if(answer == 81) {
							$('#question-result').html('Output: ' + result2);
						} else if(answer == 82) {
							$('#question-result').html('Output: ' + result5);
						} else if(answer == 83) {
							if(userAge >= 52) {
								$('#question-result').html('Output: ' + result4);
							} else {
								$('#question-result').html('Output: ' + result5);
							}
						}
					}
				});
			});
			$('.question-item').each(function() {
				$(this).find('.form-check input[type="checkbox"]').change(function() {
					var currentQ = $(this).data('question');
					if(currentQ == 9) {
						$('#result-question9').html('Output: ' + result10);
					} else if(currentQ == 10) {
						$('#result-question10').html('Output: ' + result11);
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
					$('#question-result').html('')
				}
				if(backTab == 2) {
					clsQuestionnaireSection.removeClass('current');
					$('#questionnaire_2').addClass('current');
				}
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
			});
			// onchange in tab 3
			// tab 1: 16%
			// tab 2: 40%
			var currentProgress = 16;
			$('.symptom-item input[type="radio"]').change(function() {
				var percent_complete = 40 / $('#symptoms-questions').val();
				currentProgress += percent_complete;
				progressBar.width(currentProgress + '%');
				percentLabel.text(currentProgress + '% complete');
			});

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
					$('.symptoms-output').show();
					$('#' + groupName).show();
					$('.questionnaire4-next').removeClass('btn-hide');
					console.log(groupName + ': Quite a bit or Extremely is selected');
					// You can perform any action here
				} else {
					var groupName = $(group).data('group');
					$('#' + groupName).hide();
					console.log(groupName + ': Neither Quite a bit nor Extremely is selected');
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
			checkAllGroups();

			function populateState() {
				var rootFolder = '<?= get_template_directory_uri() ?>';
				var dropdown = $('#stateDropdown');
				$.getJSON(rootFolder + "/assets/js/state.json", function(data) {
					$.map(data, function(state, index) {
						dropdown.append($('<option>', {
							value: state['code'],
							text: state['name']
						}));
					});
				});
			}
			populateState();
		});
	});
	</script>
</body>