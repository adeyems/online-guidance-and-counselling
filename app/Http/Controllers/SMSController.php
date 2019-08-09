<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SMSController extends Controller
{
    /**
     * @param string $mobileNo
     * @throws \Twilio\Exceptions\ConfigurationException
     * @throws \Twilio\Exceptions\TwilioException
     */
    public static function sendSMS(string $mobileNo)
    {
        // Your Account SID and Auth Token from twilio.com/console
        $sid    = env( 'TWILIO_SID' );
        $token  = env( 'TWILIO_TOKEN' );
        $client = new Client( $sid, $token );


        $client->messages->create(
           $mobileNo,
            [
                'from' => 'Queen Ede',
                'body' => "We received your Booking Request and Questionnaire Form. You will be informed shortly for further actions. Thank you.",
            ]
        );
    }
}
