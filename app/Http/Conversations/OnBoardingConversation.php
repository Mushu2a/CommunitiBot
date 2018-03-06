<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;

class OnBoardingConversation extends Conversation
{
    public function askMorePeople() {
        $this->ask('Ah, j\'ai remarqué qu\'il y avait beaucoup trop de monde à afficher ! Soyez plus précis !', function ($answer) {
            $this->firstname = $answer->getText();
            $this->say('Je traite votre demande, pour : '.$this->firstname);
        });
    }

    public function run() {
        // This will be called immediately
        $this->askMorePeople();
    }
}
