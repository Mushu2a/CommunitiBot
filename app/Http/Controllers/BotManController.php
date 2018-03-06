<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Middleware\ApiAi;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Attachments\Image;

use BotMan\Drivers\Facebook\Extensions\GenericTemplate;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\ElementButton;
use BotMan\Drivers\Facebook\Extensions\Element;

use App\Http\Conversations\SignupConversation;
use App\Http\Conversations\JokeConversation;
use App\Http\Conversations\ButtonConversation;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use DB;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        // Create instance of dialogflow API
        $dialogflow = ApiAi::create('f7e378dfcefb4c85987f543bab2a5094')->listenForAction();
        $botman->middleware->received($dialogflow);

        $botman->hears('(.*)batman(.*)', function (BotMan $bot) {
            $bot->typesAndWaits(1);

            $bot->reply('Je suis "Batman" 🤖');
        });

        $botman->hears('video', function($bot) {
            $video = Video::url('http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4');
            $message = OutgoingMessage::create()->withAttachment($video);
            $bot->reply($message);
        });

        $botman->hears('image', function($bot) {
            $bot->ask('Quel genre d\'images ?', function($answer, $bot) {
                $text = $answer->getText();
                $image = Image::url('https://source.unsplash.com/featured/?'.$text.'/');

                $message = OutgoingMessage::create()->withAttachment($image);
                $bot->say($message);
            });
        });

        $botman->hears('survey', function ($bot) {
            $bot->ask('Écris quelque chose :', function ($answer, $conversation) {
                $value = $answer->getText();
                $conversation->say('Tu as dit : '.$value);
            });
        });

        /**
         * Dialogflow communiti default search
         */
        $botman->hears('communiti.default', function ($bot) {
            $bot->typesAndWaits(1);

            $extras = $bot->getMessage()->getExtras();
            $apiReply = $extras['apiReply'];
            if (!empty($extras['apiParameters']['born'])) {
                $bot->reply($this->getUrl($extras['apiMessages'][0]->speech));
            } else {
                $bot->reply($this->getUrl($extras['apiMessages'][1]->speech));
            }
        })->middleware($dialogflow);

        /**
         * Dialogflow communiti search evolution
         */
        $botman->hears('communiti.evolution', function ($bot) {
            $bot->typesAndWaits(1);

            $extras = $bot->getMessage()->getExtras();
            $apiReply = $extras['apiReply'];
            if (!empty($extras['apiParameters']['recent'])
                && !empty($extras['apiParameters']['evolution'])
                && !empty($extras['apiParameters']['communiti'])) {
                $bot->reply($this->getUrl($apiReply));
            } else {
                $bot->reply($this->getUrl($apiReply));
            }
        })->middleware($dialogflow);

        /**
         * Dialogflow communiti search evolution
         */
        $botman->hears('communiti.functionality', function ($bot) {
            $bot->typesAndWaits(1);

            $extras = $bot->getMessage()->getExtras();
            $apiReply = $extras['apiReply'];
            if (!empty($extras['apiParameters']['functionality'])) {
                $bot->reply($this->getUrl($extras['apiMessages'][1]->speech));
            } else {
                $bot->reply($this->getUrl($extras['apiMessages'][0]->speech));
            }
        })->middleware($dialogflow);

        /**
         * Dialogflow search about communiti network
         */
        $botman->hears('communiti.network', function ($bot) {
            $bot->typesAndWaits(1);

            $extras = $bot->getMessage()->getExtras();
            $apiReply = $extras['apiReply'];
            
            $bot->reply($this->getUrl($apiReply));
        })->middleware($dialogflow);

        /**
         * Dialogflow search about communiti network
         */
        $botman->hears('communiti.signup', function ($bot) {
            $bot->typesAndWaits(1);

            $extras = $bot->getMessage()->getExtras();
            $apiReply = $extras['apiReply'];
            if (!empty($extras['apiParameters']['join'])) {
                $bot->reply($this->getUrl($extras['apiMessages'][0]->speech));
            } else {
                $bot->reply($this->getUrl($extras['apiMessages'][1]->speech));
            }
        })->middleware($dialogflow);

        /**
         * Dialogflow communiti search member
         */
        $botman->hears('communiti.search.user', function ($bot) {
            $bot->typesAndWaits(1);

            $extras = $bot->getMessage()->getExtras();
            $user = $extras['apiParameters']['any'];

            $type = "membres";
            $params = "&recherche=".$user;
            $results = $this->getAPI($type, $params);

            if (count($results) <= 3) {
                foreach ($results as $value) {
                    $name = $value["nom_personne_physique"].' '.$value["prenom_personne_physique"];
                    $link = $this->getUrl('https://www.communiti.corsica/profil_membre.php?idProfil='.$value["idProfil"]);

                    $image = Image::url('https://www.communiti.corsica/avatars/'.$value["fichierAvatar"]);
                    $message = OutgoingMessage::create($name)->withAttachment($image);
                    $bot->reply($message);
                    $bot->reply('Son profil : '.$link);
                }
            } else {
                $bot->reply('Trop de personnes trouvées ! Voici les 5 premières personnes');

                $i = 1;
                foreach ($results as $value) {
                    $name = $value["nom_personne_physique"].' '.$value["prenom_personne_physique"];
                    $link = $this->getUrl('https://www.communiti.corsica/profil_membre.php?idProfil='.$value["idProfil"]);

                    $image = Image::url('https://www.communiti.corsica/avatars/'.$value["fichierAvatar"]);
                    $message = OutgoingMessage::create($name)->withAttachment($image);
                    $bot->reply($message);
                    $bot->reply('Son profil : '.$link);

                    if ($i++ == 5) break;
                }
            }
        })->middleware($dialogflow);

        /**
         * Dialogflow communiti search corsican member
         */
        $botman->hears('communiti.search.corsican', function ($bot) {
            $bot->typesAndWaits(1);

            $extras = $bot->getMessage()->getExtras();
            $membres = isset($extras['apiParameters']['membres']) ? $extras['apiParameters']['membres'] : '';
            $where = isset($extras['apiParameters']['where']) ? $extras['apiParameters']['where'] : '';
            $city = isset($extras['apiParameters']['geo-city']) ? $extras['apiParameters']['geo-city'] : '';
            $corsican = isset($extras['apiParameters']['corsican']) ? $extras['apiParameters']['corsican'] : '';
            $list = isset($extras['apiParameters']['list']) ? $extras['apiParameters']['list'] : '';
            $any = isset($extras['apiParameters']['any']) ? $extras['apiParameters']['any'] : '';

            $type = "membres";
            $params = "&localisation=corse";
            $results = $this->getAPI($type, $params);

            if (count($results) <= 3) {
                foreach ($results as $value) {
                    $name = $value["nom_personne_physique"].' '.$value["prenom_personne_physique"];
                    $link = $this->getUrl('https://www.communiti.corsica/profil_membre.php?idProfil='.$value["idProfil"]);

                    $image = Image::url('https://www.communiti.corsica/avatars/'.$value["fichierAvatar"]);
                    $message = OutgoingMessage::create($name)->withAttachment($image);
                    $bot->reply($message);
                    $bot->reply('Son profil : '.$link);
                }
            } else {
                $bot->reply('Trop de personnes trouvées ! Voici les 5 premières personnes');

                $i = 1;
                foreach ($results as $value) {
                    $name = $value["nom_personne_physique"].' '.$value["prenom_personne_physique"];
                    $link = $this->getUrl('https://www.communiti.corsica/profil_membre.php?idProfil='.$value["idProfil"]);

                    $image = Image::url('https://www.communiti.corsica/avatars/'.$value["fichierAvatar"]);
                    $message = OutgoingMessage::create($name)->withAttachment($image);
                    $bot->reply($message);
                    $bot->reply('Son profil : '.$link);

                    if ($i++ == 5) break;
                }
            }
        })->middleware($dialogflow);

        /**
         * Dialogflow communiti search project
         */
        $botman->hears('communiti.project', function ($bot) {
            $bot->typesAndWaits(1);

            $extras = $bot->getMessage()->getExtras();
            $apiReply = $extras['apiReply'];
            $projects = isset($extras['apiParameters']['projects']) ? $extras['apiParameters']['projects'] : '';
            $communiti = isset($extras['apiParameters']['communiti']) ? $extras['apiParameters']['communiti'] : '';
            $recent = isset($extras['apiParameters']['recent']) ? $extras['apiParameters']['recent'] : '';
            $location = isset($extras['apiParameters']['location']) ? $extras['apiParameters']['location'] : '';
            $finance = isset($extras['apiParameters']['finance']) ? $extras['apiParameters']['finance'] : '';
            $progression = isset($extras['apiParameters']['progression']) ? $extras['apiParameters']['progression'] : '';
            $create = isset($extras['apiParameters']['create']) ? $extras['apiParameters']['create'] : '';
            $where = isset($extras['apiParameters']['where']) ? $extras['apiParameters']['where'] : '';
            $add = isset($extras['apiParameters']['add']) ? $extras['apiParameters']['add'] : '';
            $last = isset($extras['apiParameters']['last']) ? $extras['apiParameters']['last'] : '';
            $first = isset($extras['apiParameters']['first']) ? $extras['apiParameters']['first'] : '';
            $finish = isset($extras['apiParameters']['finish']) ? $extras['apiParameters']['finish'] : '';
            $theme = isset($extras['apiParameters']['theme']) ? $extras['apiParameters']['theme'] : '';
            $date = isset($extras['apiParameters']['date']) ? $extras['apiParameters']['date'] : '';
            $any = isset($extras['apiParameters']['any']) ? $extras['apiParameters']['any'] : '';
            $city = isset($extras['apiParameters']['geo-city']) ? $extras['apiParameters']['geo-city'] : '';

            $type = "projets";
            if ($theme !== "") {
                $params = "&besoins=equipe&themes=".$theme."&lieux=".$city.",%20France";
            } else {
                $params = "&besoins=equipe&lieux=".$city.",%20France";
            }

            $results = $this->getAPI($type, $params);

            $bot->reply($this->getUrl($apiReply));

            if (count($results) <= 3) {
                foreach ($results as $value) {
                    $name = $value["nom"];
                    $link = $this->getUrl('https://www.communiti.corsica/profil_membre.php?idProfil='.$value["idProfilPorteur"]);

                    $image = Image::url('https://www.communiti.corsica/images/projets/'.$value["image"]);
                    $message = OutgoingMessage::create($name)->withAttachment($image);
                    $bot->reply($message);
                    $bot->reply('Le projet : '.$name.'<br>'.$link);
                }
            } else {
                $bot->reply('Trop de projets trouvées ! Voici les 5 premières projets');

                $i = 1;
                foreach ($results as $value) {
                    $name = $value["nom"];
                    $link = $this->getUrl('https://www.communiti.corsica/profil_membre.php?idProfil='.$value["idProfilPorteur"]);

                    $image = Image::url('https://www.communiti.corsica/images/projets/'.$value["image"]);
                    $message = OutgoingMessage::create($name)->withAttachment($image);
                    $bot->reply($message);
                    $bot->reply('Le projet : '.$name.'<br>'.$link);

                    if ($i++ == 5) break;
                }
            }
        })->middleware($dialogflow);

        /**
         * Dialogflow communiti user ask social network link
         */
        $botman->hears('communiti.membres', function ($bot) {
            $bot->typesAndWaits(1);

            $extras = $bot->getMessage()->getExtras();
            $membres = isset($extras['apiParameters']['membres']) ? $extras['apiParameters']['membres'] : '';
            $competent = isset($extras['apiParameters']['competent']) ? $extras['apiParameters']['competent'] : '';
            $city = isset($extras['apiParameters']['geo-city']) ? $extras['apiParameters']['geo-city'] : '';
            $any = isset($extras['apiParameters']['any']) ? $extras['apiParameters']['any'] : '';

            $type = "membres";
            $params = "&competence=".$any."&lieux=".$city;
            $results = $this->getAPI($type, $params);
            
            if (count($results) <= 3) {
                foreach ($results as $value) {
                    $name = $value["nom_personne_physique"].' '.$value["prenom_personne_physique"];
                    $link = $this->getUrl('https://www.communiti.corsica/profil_membre.php?idProfil='.$value["idProfil"]);

                    $image = Image::url('https://www.communiti.corsica/avatars/'.$value["fichierAvatar"]);
                    $message = OutgoingMessage::create($name)->withAttachment($image);
                    $bot->reply($message);
                    $bot->reply('Son profil : '.$link);
                }
            } else {
                $bot->reply('Trop de personnes trouvées ! Voici les 5 premières personnes');

                $i = 1;
                foreach ($results as $value) {
                    $name = $value["nom_personne_physique"].' '.$value["prenom_personne_physique"];
                    $link = $this->getUrl('https://www.communiti.corsica/profil_membre.php?idProfil='.$value["idProfil"]);

                    $image = Image::url('https://www.communiti.corsica/avatars/'.$value["fichierAvatar"]);
                    $message = OutgoingMessage::create($name)->withAttachment($image);
                    $bot->reply($message);
                    $bot->reply('Son profil : '.$link);

                    if ($i++ == 5) break;
                }
            }
        })->middleware($dialogflow);

        /**
         * Dialogflow communiti contact communiti
         */
        $botman->hears('communiti.contact', function ($bot) {
            $bot->typesAndWaits(1);

            $extras = $bot->getMessage()->getExtras();
            $apiReply = $extras['apiReply'];

            $bot->reply($this->getUrl($apiReply));
        })->middleware($dialogflow);

        /**
         * Dialogflow communiti user ask social network link
         */
        $botman->hears('communiti.contact.social', function ($bot) {
            $bot->typesAndWaits(1);

            $extras = $bot->getMessage()->getExtras();

            $apiReply = $extras['apiReply'];
            $media = $extras['apiParameters']['media'];

            // Originating Messages
            // $botman->say('Message', '1', FacebookDriver::class);

            $question = $this->getMedia($apiReply, $media);
            $bot->ask($question, function ($answer) {
                if ($answer->isInteractiveMessageReply()) {
                    $this->say($answer->getText());
                } else {
                    $this->repeat();
                }
            });
        })->middleware($dialogflow);

        /**
         * Dialogflow smmal talk
         * 
         * Default use botman
         */
        $botman->hears('smalltalk(.*)', function ($bot) {
            $bot->typesAndWaits(1);

            $extras = $bot->getMessage()->getExtras();

            $apiReply = $extras['apiReply'];
            $bot->reply($this->getUrl($apiReply));
        })->middleware($dialogflow);

        /**
         * Dialogflow support talk
         */
        $botman->hears('support(.*)', function ($bot) {
            $bot->typesAndWaits(1);

            $extras = $bot->getMessage()->getExtras();

            $apiReply = $extras['apiReply'];
            $bot->reply($this->getUrl($apiReply));
        })->middleware($dialogflow);


        // Show information about user, if existing
        $botman->hears('info', function ($bot) {
            $user = $bot->getUser();

            $bot->reply('ID: '. $user->getId());
            $bot->reply('Prénom: '. $user->getFirstName());
            $bot->reply('Nom: '. $user->getLastName());
        });

        // Used and can continue conversation after
        $botman->hears('help', function ($bot) {
            $bot->reply('Ceci est l\'information d\'aide.');
        })->skipsConversation();

        // Can stop a conversation
        $botman->hears('stop', function ($bot) {
            $bot->reply('Votre conversation a été arrêté !');
        })->stopsConversation();

        // If botman can't hears something
        $botman->fallback(function($bot) {
            $bot->reply('Désolé, nous n\'avons pas compris votre demande, merci d\'être plus clair...');
        });

        /**
         * Before use dialogflow
         * Get information from database
         * @return string best response
         * *//*
        $botman->hears('(.*)', function (BotMan $bot) {
            /*
            // Tableau de texte avec la séparation espace
            /*if (preg_match("[\s]", $text)) {
                $array = explode(" ", $text);
                $query = [];
                foreach ($array as $value) {
                    // Vérifie le texte par rapport à la base de donnée
                    $query[] = DB::table('questions')->select('id')->where('text', 'like', '%'.$value.'%')->first();
                }
                $text = "Les réponses";
                $bot->reply($text);
            } else {
                $IDQuestion = DB::table('questions')->select('id')->where('text', 'like', '%'.$text.'%')->first();
                $result = DB::table('answers')->select('text')->where('question_id', '=', $IDQuestion->id)->first();
                $bot->reply($result->text);
            }

            SELECT answers.text
            FROM answers
            JOIN questions ON questions.id = answers.question_id
            JOIN heHas ON heHas.question_id = questions.id
            JOIN tags ON tags.id = heHas.tags_id
            WHERE EXISTS (
                SELECT *
                FROM questions
                WHERE questions.text LIKE '%'.$text.'%'
            )
            $IDQuestion = DB::table('questions')->select('id')->where('text', 'like', '%'.$text.'%')->first();
            $result = DB::table('answers')->select('text')->where('question_id', '=', $IDQuestion->id)->first();
            $bot->reply($result->text);
        });
        */

        /*$botman->hears('Projets qui recrute sur {city}', function ($bot, $city) {
            $bot->typesAndWaits(1);
            $type = "projets";
            $params = "&besoins=equipe&lieux=".$city.",%20France";
            $results = $this->getAPI($type, $params);
            $text = "";
            $i = 1;
            foreach ($results as $value) {
                if ($i <= 3) {
                    $text .= "".$value["nom"]." -> \n\n https://www.communiti.corsica/page_projet.php?idProjet=".$value["id"]."| \n\n";
                }
            }
            
            $bot->reply($text);
        });*/

        /*
        $botman->hears('Membres compétents en {competence} à {city}', function ($bot, $competence, $city) {
            $bot->typesAndWaits(1);
            $type = "membres";
            $params = "&competence=".$competence."&lieux=".$city.",%20France";
            $results = $this->getAPI($type, $params);

            $bot->reply(count($results).' trouvés');

            if (count($results) > 5) {
                $bot->ask('Ah, j\'ai remarqué qu\'il y avait beacoup trop de monde à afficher ! Soyez plus précis !',
                function ($answer, $conversation) {
                    $firstname = $answer->getText();
                    $conversation->say('Je traite votre demande, pour : '.$firstname);
                });
            } else {
                foreach ($results as $value) {
                    $text .= "".$value["nom"]." | \n\n https://www.communiti.corsica/profil_membre.php?idProfil=".$value["id"];
                }
                
                $bot->reply($text);
            }
        });
        */

        $botman->listen();
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function signupConversation(BotMan $bot) {
        $bot->startConversation(new signupConversation);
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function jokeConversation(BotMan $bot) {
        $bot->startConversation(new jokeConversation);
    }

    /**
     * Loaded through routes/botman.php
     * @param BotMan $bot
     */
    public function buttonConversation(BotMan $bot) {
        $bot->startConversation(new buttonConversation);
    }

    /**
     * Call Communiti API
     * @param string $type
     * @param string $param
     * @return result json of API
     */
    public function getAPI($type, $params) {
        $client = new Client();
        $res = $client->post('https://dev.communiti.corsica/app/test.php', [
            'form_params' => [
                'action' => 'list.php',
                'email' => 'univ@corte.com',
                'pwd' => 'corte',
                'type' => $type,
                'parametres' => $params
            ]
        ]);
        if ($res->getStatusCode() == 200) {
            // $res->getHeader('content-type');
            $results = json_decode($res->getBody()->getContents(), true);
        } else {
            $results = null;
        }
        return $results;
    }

    /**
     * Change url to href link
     * @param string $text
     * @return text changed
     */
    public function getUrl($text) {
        $regexUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,}(\/\S*)?/";
        preg_match_all($regexUrl, $text, $matches);

        $usedPatterns = array();
        foreach ($matches[0] as $pattern) {
            if (!array_key_exists($pattern, $usedPatterns)) {
                $usedPatterns[$pattern] = true;
                $text = str_replace($pattern, "<a href='{$pattern}' rel='nofollow' target='_blank'>{$pattern}</a>", $text);   
            }
        }

        return $text;
    }

    /**
     * Select social network
     * @param string $text pass text to button question
     * @param string $media switch for select good title and link
     * @return normal button
     */
    public function getMedia($text, $media) {
        switch (strtolower($media)) {
            case 'twitter':
                $title = "Twitter";
                $link = "https://twitter.com/c0mmuniti";
                break;
            
            case 'linkedin':
                $title = "Linkedin";
                $link = "https://www.linkedin.com/company/27138014";
                break;
            
            case 'facebook':
                $title = "Facebook";
                $link = "https://www.facebook.com/corsicancommuniti";
                break;
            
            default:
                $title = "Communiti";
                $link = "https://www.communiti.corsica";
                break;
        }

        // Return facebook template button
        // return ButtonTemplate::create($text)->addButton(ElementButton::create($title)->url($link));

        // Return normal button
        return Question::create($text)->addButton(Button::create($title)->value($this->getUrl($link)));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker() {
        return view('tinker');
    }
}
