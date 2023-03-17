# Secretic

Secretic is a secure and user-friendly pastebin application that prioritizes privacy and simplicity. On [secretic.app](https://secretic.app) you can create secret notes that will self-destruct after being read. 


## Features

- :fire:Burn after reading (the note is destroyed after the first reading)
- :lock: Password protection
- :clipboard: Copy note to clipboard in a click
- :stopwatch: Expiration times, including a "forever" and "burn after reading" option
- :hatched_chick: Admin panel built on [Filament](https://filamentphp.com)


## Roadmap

The following features will be implemented soon:

- Delete after view or X amount of time
- End-to-end encryption https://github.com/gomzyakov/secretic/issues/572
- File upload support (image, media and PDF preview)
- Language selection https://github.com/gomzyakov/secretic/issues/432
- QR code for paste URLs, to easily transfer them over to mobile devices https://github.com/gomzyakov/secretic/issues/489
- API for integration with third parties https://github.com/gomzyakov/secretic/issues/405

## Requesting features

Open a [new issue](https://github.com/gomzyakov/secretic/issues/new) to request a feature (or if you find a bug).


## Run the app with Docker

Убедитесь, что установлен докер и докер-композ (ссылки)

docker compose build --no-cache
docker compose up -d


docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app ./artisan migrate:fresh --seed

use http://localhost:8000 to access the application from your browser.



make up

Before running the Secretic locally:

- Instead of repeatedly typing `vendor/bin/sail` to execute Sail commands, you may wish to configure a Bash alias ```alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'```
- Copy the environment settings ```cp .env.local .env```

After that just run the command:

- ```sail up -d``` to run the Secretic ([What if I don't have PHP and Composer on my computer?](https://github.com/gomzyakov/secretic/issues/570))
- ```sail artisan migrate:fresh --seed``` to migrate DB & seed fake data

And open http://127.0.0.1 in your favorite browser. Happy using Secretic! 


## Can I trust a instance of Secretic not hosted by me?

No. Anyone could modify the functionality of Secretic to expose your secret key to the server. We recommend using a instance you host or trust.


## License

This is open-sourced software licensed under the [MIT License](https://github.com/gomzyakov/php-code-style/blob/main/LICENSE).


[![GitHub release](https://img.shields.io/github/release/gomzyakov/secretic.svg)](https://github.com/gomzyakov/secretic/releases/latest)
[![license](https://img.shields.io/badge/License-MIT-green.svg)](https://github.com/gomzyakov/secretic/blob/development/LICENSE)
[![codecov](https://codecov.io/gh/gomzyakov/secretic/branch/main/graph/badge.svg?token=4CYTVMVUYV)](https://codecov.io/gh/gomzyakov/secretic)
