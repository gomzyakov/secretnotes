# SecretNotes

![version](https://img.shields.io/badge/release-v0.14.1-blue)
[![codecov](https://codecov.io/gh/gomzyakov/secretnotes/branch/main/graph/badge.svg?token=4CYTVMVUYV)](https://codecov.io/gh/gomzyakov/secretnotes)

## Deployment

Несколько шагов:

- Заводим VDS
- Вручную готовим VDS
- Задаем секретки в репозитории на GitHub

### Local development

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

sail artisan migrate:fresh --seed

>If needed, change DB_HOST to `mysql` (for local development)

Чтобы собрать фронт (CSS, JS):
sail npm run dev

npm run watch

Чтобы удалить всё ранее установленное:
sail down --rmi all -v

### Prepare VDS

Создаём VDS-виртуалку, например в [NetAngels](https://panel.netangels.ru).

Заходим по SSH и проверяем версию PHP (`php -v). Если
необходимо, [обновляемся до PHP 8](https://php.watch/articles/php-8.0-installation-update-guide-debian-ubuntu):

```bash
sudo apt update
sudo apt install software-properties-common
sudo apt update
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install php8.0-common php8.0-cli php8.0-mysql php8.0-mbstring -y
```

Если необходимо, доустанавливаем PHP-расширения на виртуалке:

```bash
sudo apt install php8.0-xml
sudo apt install php8.0-curl
```

Вручную [устанавливаем](https://getcomposer.org/download/) Composer:

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
````

И делаем его доступным для вызова через `composer`:

```bash
sudo mv composer.phar /usr/local/bin/composer
```

> Далее делаем всё от пользователя `web`, не `root`!!!



ssh-keygen

В репозитории на GitHub, в разделе `Settings > Secrets > Actions` задаём значения:

- `SSH_PRIVATE_KEY`. If you don’t have this you can run ssh-keygen in your server terminal to generate a new key, then
  run the command cat ~/.ssh/id_rsa.pub >> ~/.ssh/authorized_keys to allow connection to the private key.
- `SSH_HOST`. This is the IP address of the server.
- `SSH_USERNAME`. This is the server username, in my case it’s root . If you don’t know your username you can use the
  whoami command on your server to check.

В репозитории, в разделе `Deploy keys`, задаём значение публичного ключа с виртуальной машины (получить можно
через `cat ~/.ssh/id_rsa.pub`). Это позволит деплоиться через `git pull` с VDS.

/var/www/web/sites

```bash
git clone git@github.com:gomzyakov/secretnotes.git secretnotes.ru
``````

/var/www/web/sites/secretnotes.ru

php -r "file_exists('.env') || copy('.env.example', '.env');"

composer install

chmod -R 777 storage bootstrap/cache

php artisan key:generate

Вносим корректные реквизиты в `.env` файл:

Создаём БД `secretnotes` через phpMyAdmin

php artisan migrate:fresh --seed

## Front

На виртуалке:

cd ~
curl -sL https://deb.nodesource.com/setup_16.x -o /tmp/nodesource_setup.sh
sudo bash /tmp/nodesource_setup.sh
sudo apt install nodejs

При вводе `node -v` видим:
v16.6.1

sudo apt install npm

После этого билдим непосредственно фронтовые зависимости:

npm install
npm run production

### HTTPS

По подключении HTTPS подробнее написано в [HTTPS.md](HTTPS.md)
