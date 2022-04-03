# SecretNotes

## How to deploy?

Создаём VDS-виртуалку в [NetAngels](https://panel.netangels.ru) (хостинг взят для примера)

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


