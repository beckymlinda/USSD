<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use AfricasTalking\SDK\AfricasTalking;

class UssdCallController extends Controller
{
    public function handleUssd(Request $request)
    {
        $phoneNumber = $request->input('phoneNumber');
        $text = $request->input('text');

        if ($text == "1") {
            $this->makeCall($phoneNumber);
            return response("END Calling... Please wait.", 200)->header('Content-Type', 'text/plain');
        }

        return response("CON Welcome to USSD Service\n1. Make a Call\n2. Exit", 200)
            ->header('Content-Type', 'text/plain');
    }

    private function makeCall($to)
    {
        $username = env('AT_USERNAME');
        $apiKey = env('AT_API_KEY');

        $africastalking = new AfricasTalking($username, $apiKey);
        $voice = $africastalking->voice();

        $voice->call([
            "from" => "+Your_Africa’s_Talking_Number",
            "to" => $to
        ]);
    }
}
