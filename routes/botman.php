<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Inscription', BotManController::class.'@signupConversation');
$botman->hears('Joke', BotManController::class.'@jokeConversation');
$botman->hears('Button', BotManController::class.'@buttonConversation');
