# Deployment

For simplicity, we will deploy the project to VDS. The deployment process consists of several steps:

1. Create a VDS on your preferred hosting
2. Manually prepare VDS
3. Build frontend
4. Set secrets in the repository on GitHub 
5. Optional: Set up HTTPS

## 1. Create a VDS

We create a VDS virtual machine, for example, in [NetAngels](https://panel.netangels.ru).


Docker-дистрибутив

IMG



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







## 2. Prepare VDS

Login via SSH and check PHP version (`php -v). 

If necessary, [upgrade to PHP 8](https://php.watch/articles/php-8.0-installation-update-guide-debian-ubuntu):

```bash
sudo apt update
sudo apt install software-properties-common
sudo apt update
sudo add-apt-repository ppa:ondrej/php
sudo apt update
sudo apt install php8.0-common php8.0-cli php8.0-mysql php8.0-mbstring -y
```

If necessary, install PHP extensions on the virtual machine:

```bash
sudo apt install php8.0-xml
sudo apt install php8.0-curl
```

Manually [install](https://getcomposer.org/download/) Composer:

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
````

And make it available for calling through `composer`:

```bash
sudo mv composer.phar /usr/local/bin/composer
```

>Next, we do everything from the user `web`, not `root`!!!

Go to path `/var/www/web/sites` and clone current repository (or your own fork). For example, use `secretic.app` folder name:

```bash
git clone git@github.com:gomzyakov/secretic.git secretic.app
``````

Then go to path `/var/www/web/sites/secretic.app` and run some commands:

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
composer install
chmod -R 777 storage bootstrap/cache
php artisan key:generate
```

- Write the correct database requisites in the `.env` file
- `php artisan migrate:fresh --seed`



## 3. Build frontend

На виртуалке:

```
cd ~
curl -sL https://deb.nodesource.com/setup_16.x -o /tmp/nodesource_setup.sh
sudo bash /tmp/nodesource_setup.sh
sudo apt install nodejs
```

При вводе `node -v` видим:

```
v16.6.1
```

```bash
sudo apt install npm
```

После этого билдим непосредственно фронтовые зависимости:

```
npm install
npm run production
```



## 4. Set secrets in the repository on GitHub

First, generate SSH-keys with `ssh-keygen`.

After that, in the GitHub repository, in the `Settings > Secrets > Actions` section, set the values:

- `SSH_HOST`. This is the IP address of the server.
- `SSH_USERNAME`. This is the server username, in my case it’s root . If you don’t know your username you can use the
  whoami command on your server to check.
- `SSH_PASSWORD`

In the repository, in the `Deploy keys` section, set the value of the public key from the virtual machine (you can get
via `cat ~/.ssh/id_rsa.pub`). This will allow deployment via `git pull` from VDS.



## 5. Optional: Set up HTTPS

О подключении HTTPS подробнее написано в [HTTPS.md](HTTPS.md)
