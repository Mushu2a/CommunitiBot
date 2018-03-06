<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation as BotManConversation;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Incoming\Answer;

class ButtonConversation extends BotManConversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $question = Question::create('Que préférez-vous chez communiti ?')
			->addButtons([
				Button::create('Son design')->value('design'),
				Button::create('Son tchat')->value('tchat'),
				Button::create('Son entourage')->value('entourage'),
			]);

		$this->ask($question, function (Answer $answer) {
			if ($answer->isInteractiveMessageReply()) {
				$this->say('Vous-avez séléctionné: '.$answer->getText());
				if ($answer->getText() == "design" || $answer->getText() == "tchat") {
					$this->say('Merci beaucoup, et tant mieux ci c\'est plaisant');
				} else {
					$this->askMore();
				}
			} else {
				$this->repeat();
			}
		});
	}
	
	protected function askMore()
    {
		$this->say('Merci beaucoup, et tant mieux ci c\'est plaisant');
        $this->ask('What is your age?', function ($answer) {
        	$this->age = $answer->getText();
        	$this->say('Nice to meet you, '.$this->name);
        	$this->say('Your age is: '.$this->age);
        });
    }
}
