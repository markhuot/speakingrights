<?php

namespace Craft;

class Slack_SignupController extends BaseController
{
    protected $allowAnonymous = true;

    public function actionIndex()
    {
        $email = @$_POST['emailAddress'];
        $first = @$_POST['firstName'];
        $last = @$_POST['lastName'];

        $slackInviteUrl='https://equitas-youth-jeunes.slack.com/api/users.admin.invite?t='.time();
	    $fields = array(
            'email' => urlencode($email),
            'first_name' => urlencode($first),
            'token' => 'xoxp-246279653974-246481724311-249160088578-0afcf8503ff7beee19e83df8ed938adc',
            'set_active' => urlencode('true'),
            '_attempts' => '1'
	    );

	    // url-ify the data for the POST
        $fields_string='';
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

	    // open connection
        $ch = curl_init();

	    // set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $slackInviteUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

        // exec
        $status = 0;
        $replyRaw = curl_exec($ch);
        $reply= json_decode($replyRaw, true);
        if($reply['ok'] === true) {
            $status = 1;
        }

	    // close connection
        curl_close($ch);

        return $this->redirect('slack?thanks&status='.$status);
    }
}