<?php
 //Honeypot

if( filter_var( $_POST['user_email'], FILTER_VALIDATE_EMAIL ) === FALSE ) die('SpamBot');
    if($_POST['user_email'] && $_POST['user_name']) {

        $user_name = sanitize_text_field($_POST['user_name']);
        $user_email = sanitize_email($_POST['user_email']);
        $user_age = $_POST['user_age'];

        //question 3
        $question_3 = $_POST['page2_question3'];
        $question_4 = $_POST['page2_question4'];
        $question_5 = $_POST['page3_question5'];
        $question_6 = $_POST['page3_question6'];
        $question_7 = $_POST['page3_question7'];
        $question_8 = $_POST['page3_question8'];
        $question_9 = $_POST['page4_question9'];
        $question_10 = $_POST['page4_question10'];
        $question_11 = $_POST['page4_question11'];

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

        // output_report_1_5
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
        $result = curl_exec($ch);

        // print_r($result);die;
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }else{
            // print_r($result);
        }
        curl_close($ch);
    } else {
        echo "error";
    }

    $subject = 'Your Personalised Menopause Health Report';
    $receive = array('lthanhbinh@tma.com.vn');

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
                                <p style="font-family: Arial;font-size: 16px;font-style: normal;">
                                    Hi, <?php echo $user_name; ?>
                                </p>
                                <p style="margin: 0;font-size: 16px;font-family: Arial;">
                                    Thank you for completing AMC’s Menopause Health Assessment. <br/><br/>
                                </p>
                                <p style="margin: 0;font-size: 16px;font-family: Arial;">
                                    Your personalised health report provides an overview of where you are on your menopause journey based on the information you shared. This report is designed to offer you meaningful insights into your current health and to facilitate discussions with your GP about the best treatment options for you.
                                    <br/><br/>
                                </p>
                                <p style="margin: 0;font-size: 16px;font-family: Arial;">
                                    <b>Important:</b> Some outcomes may vary if you are currently using continuous hormonal contraceptives or other treatments. Additionally, please be aware that some responses may not be fully applicable to your specific circumstances, as the assessment is based on the limited and general information provided.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td height="10"></td>
                        </tr>
                        <tr>
                            <td>
                               <p style="padding: 0;margin: 0;font-size: 16px;font-family: Arial;">
                                   <?= $output_report_1_5;?> <br/>
                               </p>
                               <p style="padding: 0;margin: 0;font-size: 16px;font-family: Arial;">
                                  <?= $output_report_6;?>
                                  <?= $output_report_7;?>
                                  <?= $output_report_8;?>
                                  <?= $output_report_9;?>
                               </p>
                               <p style="padding: 0;margin: 0;font-size: 16px;font-family: Arial;">
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
                                <p style="margin: 0;font-size: 16px;font-family: Arial;">
                                    <b>Note:</b> Your healthcare provider can assist in designing a menopause management plan that not only alleviates your symptoms but also supports your long-term health and well-being, ensuring that you remain healthy throughout your menopause transition and beyond.
                                    As you review this report with your GP, we encourage you to take this opportunity to discuss your overall health and ensure your screening tests are current. This could also include assessments for cardiovascular health, bone density, and other conditions that may become more relevant during this stage of life.
                                    <br/><br/>
                                </p>
                                <p style="margin: 0;font-size: 16px;font-family: Arial;">
                                    We understand that navigating this phase of life can bring up many questions and concerns, and we're here to support you through the transition. If you're seeking expert guidance, you can book a consultation with one of our experienced Menopause Doctors at Australian Menopause Centre.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td height="10px"></td>
                        </tr>

                        <tr>
                            <td>
                                <p style="margin: 0;font-size: 16px;font-family: Arial;">
                                    If you have any questions before your consultation, please don't hesitate to reach out.<br/><br/>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p style="margin: 0;font-size: 16px;font-family: Arial;">
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
            $headers .='Reply-To: '. $_POST['email'] . "\r\n" ;
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

    header('Location: '. $thank_you_location);
    die();
?>
