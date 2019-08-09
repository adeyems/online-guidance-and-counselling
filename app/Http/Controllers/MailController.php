<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mailgun\Mailgun;

class MailController extends Controller
{
    public static function send($to, $subject, $text, $html, $attachments = null)
    {
        $mgClient = new Mailgun(env('MAILGUN_API_KEY'));
        $domain = env('MAILGUN_DOMAIN');

        //$html = file_get_contents($html);

        $result = $mgClient->sendMessage(
            $domain,
            array(
                'from'    =>
                    'Queen Ede School <queenedeschool.com>',
                'to'      =>
                    $to,
                'subject' =>
                    $subject,
                'text'    =>
                    $text,
                'html'    => $html
            ),
            array(
                'attachment' =>
                    $attachments
            )
        );

    }
}
