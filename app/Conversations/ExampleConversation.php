<?php

namespace App\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class ExampleConversation extends Conversation
{
    public function run()
	{
        $question = Question::create("Huh - tu viens de me réveiller. De quoi as tu besoin ?")
            ->fallback('Impossible de poser une question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Raconte une blague')->value('blague'),
                Button::create('Donnez-moi une citation')->value('citation'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $this->say($answer->getValue());
                if ($answer->getValue() === 'blague') {
                    $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
                    $this->say($joke->value->joke);
                } else {
                    $this->say(Inspiring::quote().' joke');
                }
            }
        });
    }
}