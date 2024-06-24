<?php
namespace App\Validators;
use GuzzleHttp\Client;
class ReCaptcha
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        $result = [];

        $client = new Client;
        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'form_params' =>
                    [
                        'secret' => env('GOOGLE_CAPTCHA_SECRET_KEY'),
                        'response' => $value
                    ]
            ]
        );






        $body = json_decode((string)$response->getBody());
	 	if($body->success && $body->score >= 0.5){

			return true;

		}
		/* $fp = fopen($_SERVER['DOCUMENT_ROOT'].'/ReCaptcha.txt', 'a+');
		fwrite($fp,"response ReCaptcha".date("Y-m-d H:i:s"));
		fwrite($fp, json_encode($body));
		fwrite($fp, "\n\r");
		fclose($fp); */

        return false;
    }
}
