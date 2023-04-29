# Secretic

Secretic is a secure and user-friendly pastebin application that prioritizes privacy and simplicity. 

The goal of this repository is to showcase good [Laravel](https://laravel.com) development practices with a simple application.


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


## How to run Secretic locally?

I believe you already have Docker installed. If not, just do it on [Mac](https://docs.docker.com/desktop/install/mac-install/), [Windows](https://docs.docker.com/desktop/install/windows-install/) or [Linux](https://docs.docker.com/desktop/install/linux-install/).


Build the `app` image with the following command:

```shell
docker compose build --no-cache
```

>This command might take a few minutes to complete.

When the build is finished, you can run the environment in background mode with:

```shell
docker compose up -d
```

We’ll now run `composer install` to install the application dependencies:

```shell
docker compose exec app composer install
```

Copy the environment settings:

```shell
docker compose exec app cp .env.local .env
```

Migrate DB & seed fake data with the `artisan` Laravel command-line tool:

```shell
docker compose exec app ./artisan migrate:fresh --seed
```

And open http://127.0.0.1:8000 in your favorite browser. Happy using Secretic! 

To run `bash` just tupe:

```shell
docker compose exec -it app bash
```


## Can I trust a instance of Secretic not hosted by me?

No. Anyone could modify the functionality of Secretic to expose your secret key to the server. We recommend using a instance you host or trust.


## License

This is open-sourced software licensed under the [MIT License](https://github.com/gomzyakov/php-code-style/blob/main/LICENSE).


[![GitHub release](https://img.shields.io/github/release/gomzyakov/secretic.svg)](https://github.com/gomzyakov/secretic/releases/latest)
[![license](https://img.shields.io/badge/License-MIT-green.svg)](https://github.com/gomzyakov/secretic/blob/development/LICENSE)
[![codecov](https://codecov.io/gh/gomzyakov/secretic/branch/main/graph/badge.svg?token=4CYTVMVUYV)](https://codecov.io/gh/gomzyakov/secretic)
