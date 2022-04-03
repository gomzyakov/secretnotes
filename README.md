# SecretNotes

## How to deploy?


### Prepare VDS

Создаём VDS-виртуалку, например в [NetAngels](https://panel.netangels.ru).

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

В репозитории на GitHub, в разделе `Settings > Secrets > Actions` задаём значения:

- `SSH_PRIVATE_KEY`. If you don’t have this you can run ssh-keygen in your server terminal to generate a new key, then run the command cat ~/.ssh/id_rsa.pub >> ~/.ssh/authorized_keys to allow connection to the private key.
- `SSH_HOST`. This is the IP address of the server.
- `SSH_USERNAME`. This is the server username, in my case it’s root . If you don’t know your username you can use the whoami command on your server to check.

В репозитории, в разделе `Deploy keys`, задаём значение публичного ключа с виртуальной машины (получить можно через `cat ~/.ssh/id_rsa.pub`). Это позволит деплоиться через `git pull` с VDS.


/var/www/web/sites

```bash
git clone git@github.com:gomzyakov/secretnotes.git secretnotes.ru
``````

/var/www/web/sites/secretnotes.ru


