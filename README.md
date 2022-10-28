# Secretic

[![codecov](https://codecov.io/gh/gomzyakov/secretic/branch/main/graph/badge.svg?token=4CYTVMVUYV)](https://codecov.io/gh/gomzyakov/secretic)

Create secret notes that will self-destruct after being read. 

- Project demo is on [secretic.app](https://secretic.app). 
- [Secretic](https://secretic.app) is an open source alternative to [privnote.com](https://privnote.com)

Laravel Sail -- да, не отпимально

Создаём Docker виртуалку
Заходим по SSH как root

Генерируем ключ cd ~/.ssh && ssh-keygen (с дефолтными настройками)

```bash
$ cd ~/.ssh && ssh-keygen

Generating public/private rsa key pair.
Enter file in which to save the key (/root/.ssh/id_rsa): 
Enter passphrase (empty for no passphrase): 
Enter same passphrase again: 
Your identification has been saved in /root/.ssh/id_rsa
Your public key has been saved in /root/.ssh/id_rsa.pub
The key fingerprint is:
SHA256:e+Wuo7OK0Vd+oJ3LM75ZAhJq9xZOSZ0schYgsmdFdSg root@vm-80ae16e5
The key's randomart image is:
+---[RSA 3072]----+
|  . ..+oo..      |
|   o oE .= .     |
|  . o o.= +      |
|   o . * o       |
|    o o S o .    |
|   . o = O =     |
|    . . B * +    |
|     o o.o+B     |
|    . ..o=B*.    |
+----[SHA256]-----+
```

Копируем ключ в буфер обмена cat ~/.ssh/id_rsa.pub

Добавляем ключ в настройки в [Deploy Keys](https://github.com/gomzyakov/secretic/settings/keys)

В папке, например, `usr`:

git clone git@github.com:gomzyakov/secretic.git && cd secretic



Пулим образа

```bash
docker run --rm \
-u "$(id -u):$(id -g)" \
-v $(pwd):/opt \
-w /opt \
laravelsail/php81-composer:latest \
composer install --ignore-platform-reqs
```

>Sail not production!

Поднимаем контейнера

sail up -d


Мы находимся из под root-пользователя, поэтому надо задать пермиссии __:

chmod -R 777 ./storage/logs
chmod -R 777 ./storage/framework

> TODO CHANGE 777 RULE!!!





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


shell script
make init

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

And open http://127.0.0.1 in your favorite browser. Happy using Secretic! 


## Remove project

To remove all images and volumes, just run:

```bash
sail down --rmi all -v
```

## Deployment to VDS

The deployment process is described in the file [DEPLOY.md](DEPLOY.md)

## Support

If you find any package errors, please, [make an issue](https://github.com/gomzyakov/php-code-style/issues) in current repository.

## License

This is open-sourced software licensed under the [MIT License](https://github.com/gomzyakov/php-code-style/blob/main/LICENSE).
