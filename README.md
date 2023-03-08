# Secretic

Create secret notes that will self-destruct after being read. Project demo is on [secretic.app](https://secretic.app). 

## Features

Password protection

Discussions, anonymous or with nicknames and IP based identicons or vizhashes

Expiration times, including a "forever" and "burn after reading" option

Markdown format support for HTML formatted pastes, including preview function

Syntax highlighting for source code using prettify.js, including 4 prettify themes

File upload support, image, media and PDF preview (disabled by default, size limit adjustable)

Templates: By default there are bootstrap CSS, darkstrap and "classic ZeroBin" to choose from and it is easy to adapt these to your own websites layout or create your own.

Translation system and automatic browser language detection (if enabled in browser)

Language selection (disabled by default, as it uses a session cookie)

QR code for paste URLs, to easily transfer them over to mobile devices


## Radmap

The following features will be implemented soon:

End-to-end encryption.


## Requesting features

Open a [new issue](https://github.com/secretica/secretic/issues/new) to request a feature (or if you find a bug).


## Running the project locally

Before running the project locally:

- Instead of repeatedly typing `vendor/bin/sail` to execute Sail commands, you may wish to configure a Bash alias ```alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'```
- Copy the environment settings ```cp .env.example .env```
- And replace `DB_HOST` to `mysql` in `.env` (for local development).

After that just run the command:

- ```sail up -d``` to run the Secretic ([What if I don't have 11 on my computer?](https://github.com/secretica/secretic/issues/570))
- ```sail artisan migrate:fresh --seed``` to migrate DB & seed fake data

And open http://127.0.0.1 in your favorite browser. Happy using Secretic! 

### Can I trust a instance of Secretic not hosted by me?

No. Anyone could modify the functionality of Secretic to expose your secret key to the server. We recommend using a instance you host or trust.

## License

This is open-sourced software licensed under the [MIT License](https://github.com/gomzyakov/php-code-style/blob/main/LICENSE).

[![GitHub release](https://img.shields.io/github/release/gomzyakov/secretic.svg)](https://github.com/gomzyakov/secretic/releases/latest)
[![license](https://img.shields.io/badge/License-MIT-green.svg)](https://github.com/gomzyakov/secretic/blob/development/LICENSE)
[![codecov](https://codecov.io/gh/secretica/secretic/branch/main/graph/badge.svg?token=4CYTVMVUYV)](https://codecov.io/gh/secretica/secretic)
