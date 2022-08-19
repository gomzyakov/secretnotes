# SecretNotes

![version](https://img.shields.io/badge/release-v0.24.0-blue)
[![codecov](https://codecov.io/gh/gomzyakov/secretnotes/branch/main/graph/badge.svg?token=4CYTVMVUYV)](https://codecov.io/gh/gomzyakov/secretnotes)

[SecretNotes](https://secretnotes.ru) ia an open source alternative to [privnote.com](https://privnote.com)


## Running the project locally

When you pull this project to another computer that has no PHP or Composer installed, you cant run `sail` command
because there is no vendor folder.

Solution is https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects

```bash
docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/opt \
-w /opt \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
```
Instead of repeatedly typing `vendor/bin/sail` to execute Sail commands, you may wish to configure a Bash alias:

```bash
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

Copy the environment settings:

```bash
cp .env.example .env
```

And replace `DB_HOST` to `mysql` in `.env` (for local development).

After that just run the command:

```bash
sail up -d
sail artisan migrate:fresh --seed
```

And open http://127.0.0.1 in your favorite browser. Happy using SecretNotes! 


## Remove project

To remove all images and volumes, just run:

```bash
sail down --rmi all -v
```

## Deployment to VDS

The deployment process is described in the file [DEPLOY.md](DEPLOY.md)

