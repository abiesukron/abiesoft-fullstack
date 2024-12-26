<?php 

namespace Abiesoft\Resources\Package;

use Abiesoft\Resources\Utilities\Config;
use OpenAI;
use Parsedown;

class Ai {

    public static function chat($text) {
        $apiKey = Config::env('OPENAI_KEY');
        $client = OpenAI::client($apiKey);

        $result = $client->chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'user', 'content' => $text],
            ],
        ]);

        $teks = $result->choices[0]->message->content;
        $parsedown = new Parsedown;
        $html = $parsedown->text($teks);
        
        echo $html;
    }

}