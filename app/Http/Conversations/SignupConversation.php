<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation as BotManConversation;

class SignupConversation extends BotManConversation
{
    protected $lastname;
    protected $firstname;

    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->ask('Quel est ton nom ?', function ($answer) {
        	$valueLastname = $answer->getText();
        	if (trim($valueLastname) === '') {
        		return $this->repeat('Cela ne ressemble pas à un vrai nom, s\'il vous plaît fournir votre nom.');
        	}
            $this->lastname = $valueLastname;

        	$this->askFirstname();
        });
    }

    protected function askFirstname()
    {
        $this->ask('Quel est ton prénom ?', function ($answer) {
        	$valueFisrtname = $answer->getText();
            if (trim($valueFisrtname) === '') {
        		return $this->repeat('Cela ne ressemble pas à un vrai prénom, s\'il vous plaît fournir votre nom.');
        	}
        	$this->firstname = $valueFisrtname;
            $this->say('Heureux de te voir parmis nous, '.$this->lastname.' '.$this->firstname);

        	$this->askImage();
        });
    }
    
    protected function askImage()
    {
        $this->askForImages('Maintenant, merci de choisir ton image de profil.', function ($images) {
            $this->say('Merci - j\'ai reçu '.count($images).' image.');
        }, function () {
            $this->repeat('Ummm cela ne me semble pas être une image valide.');
        });
    }
}
