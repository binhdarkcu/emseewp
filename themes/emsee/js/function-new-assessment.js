window.addEventListener("load", function(event) {
  jQuery(document).ready(function($) {
    var clsQuestionnaireSection = $('.questionnaire-section');
    var progressBar = $('#progressBar');
    var percentLabel = $('#percentLabel');
    var questionnaireStart = $('#questionnaire-start');
    var userAge = 0;

    var hasResultAtStep = 0;

    jQuery('[data-toggle="tooltip"]').tooltip();

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
      $('html, body').animate({
        scrollTop: $('#new-assessment-form').offset().top
      }, 300); // 1000 is the duration in milliseconds

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
      $(this).find('.form-check input[type="radio"]').change(function() {
        var currentQ = $(this).data('question');
        var answer = $(this).data('answer');
        if(currentQ == 9) {
          if(answer == 91) {
            $('#menopause-assessment-result-q9').val('menopause_assessment_output_10')
          } else {
            $('#menopause-assessment-result-q9').val('')
          }
        } else if(currentQ == 10) {
          if(answer == 101) {
            $('#menopause-assessment-result-q10').val('menopause_assessment_output_11')
          } else {
            $('#menopause-assessment-result-q10').val('')
          }
        }
      })
    })
    // handle back button
    // case back tab
    $('.questionnaire-actions .questionnaire-back').click(function(e) {
      e.preventDefault();
      var backTab = $(this).data('back-tab');
      var dataProgress = $(this).data('progress');
      if(backTab == 1) {
        clsQuestionnaireSection.removeClass('current');
        $('#questionnaire_1').addClass('current');
        $('#questionnaire_2 .question-item').removeClass('display');
        $('.question-item[data-question="3"]').addClass('display');
        $('.question-item[data-question="5"]').addClass('display');
        $('.question-item input[type="radio"]').prop('checked', false);
        var questionStep = questionnaireStart.find('.question-step');
        $(questionStep).removeClass('is-highlighted')
        $('.question-step[data-step="1"]').addClass('is-highlighted')
        $('#menopause-assessment-result').val('')
        $('.has-result-next-tab').addClass('btn-hide')
        progressBar.width(dataProgress + '%');
      } else if(backTab == 2) {
        clsQuestionnaireSection.removeClass('current');
        $('#questionnaire_2').addClass('current');
        var backQuestionPage = $(this).data('back-question-page');
        var questionStep = questionnaireStart.find('.question-step');
        $(questionStep).removeClass('is-highlighted')
        $('.question-step[data-step="2"]').addClass('is-highlighted')
        $('#physical-symptoms').val('');
        $('#moods-mental-health').val('');
        $('#cognition-sleep').val('');
        $('#genitourinary-sexual').val('');
        $('.section-three .col2 input[type="radio"]').prop('checked', true);
        progressBar.width(dataProgress + '%');
        if(backQuestionPage == 1) {
          $('.questionnaire-children').removeClass('showing')
          $('#questionnaire_21').addClass('showing');
          $('.question-item[data-question="4"] input[type="radio"]').prop('checked', false);
          $('.has-result-next-tab').addClass('btn-hide')
        }
      } else if(backTab == 3) {
        clsQuestionnaireSection.removeClass('current');
        $('#questionnaire_3').addClass('current');
        var backQuestionPage = $(this).data('back-question-page');
        var questionStep = questionnaireStart.find('.question-step');
        $(questionStep).removeClass('is-highlighted')
        $('.question-step[data-step="3"]').addClass('is-highlighted')
      } else if(backTab == 4) {
        clsQuestionnaireSection.removeClass('current');
        $('#questionnaire_4').addClass('current');
        var backQuestionPage = $(this).data('back-question-page');
        var questionStep = questionnaireStart.find('.question-step');
        $(questionStep).removeClass('is-highlighted')
        $('.question-step[data-step="4"]').addClass('is-highlighted')
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


  });
});
