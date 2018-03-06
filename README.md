<p align="center"><img height="188" width="198" src="https://botman.io/img/botman.png"></p>
<h1 align="center">BotMan Studio</h1>

## About BotMan Studio

While BotMan itself is framework agnostic, BotMan is also available as a bundle with the great [Laravel](https://laravel.com) PHP framework. This bundled version is called BotMan Studio and makes your chatbot development experience even better. By providing testing tools, an out of the box web driver implementation and additional tools like an enhanced CLI with driver installation, class generation and configuration support, it speeds up the development significantly.

## Documentation

You can find the BotMan and BotMan Studio documentation at [http://botman.io](http://botman.io).

## License

BotMan is free software distributed under the terms of the MIT license.

## Why ?

[https://www.universita.corsica/fr/hack4corsica-1er-hackathon-de-luniversite-de-corse](Hackaton_2018), first for university of Corsica, first for me too.

Project:
[https://www.communiti.corsica](Communiti) want on a chatbot use with there API and basics question.

Why Botman ?
    Because was really cool, and practice to use.

Now let's get started !

## Configuration

1) Install dependencies with `composer`

```bash
# Root directory
composer install
```

2) Run

```bash
php artisan serve
```

3) a

All working code and bot logic can be found here :
    ``/app/Http/Controllers/BotManController.php``

4) More powerfull

Response use DialogFlow, change this line on /vendor/botman/botman/src/Middleware/ApiAi.php line 113
Or override dialogflow middleware received

```php
# And add this
$messages = isset($response->result->fulfillment->messages) ? (array) $response->result->fulfillment->messages : [];
```

## Database

Can be use with
```bash
php artisan migrate --seed
```

## Dialogflow

[https://dialogflow.com/](DialogFlow), you have to create on account and configure all (intent, entities, training, etc...)
You can find my work on it here, folder `/public/bot`

### Task

- [x] Web integration
- [x] Messenger integration
- [x] Use communiti API
- [x] Dialogflow
- [x] Image
- [x] Video
- [x] Button
- [x] Conversation (skip, stop)
- [x] Get url link
- [x] Reply with attachments
- [x] Received attachments (bug)
- [ ] Ovverride middleware
- [ ] Middleware system
- [ ] Other integration (slack, telegram, nexmo)
- [ ] Store user information
- [ ] More dialogflow training
- [ ] Optimisation