Steps to setup project:
1.Clone your project
2.Go to the folder application using cd command on your cmd or terminal
3.Run composer install on your cmd or terminal
4.Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu
=>configure .env mail settings with 

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME={YOUR_EMAIL}
MAIL_PASSWORD={YOUR_PASSWORD}
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS={FROM_MAIL}
MAIL_FROM_NAME="${APP_NAME}"

5.Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
6.Run php artisan key:generate
7.Run php artisan migrate
8.Run php artisan serve
9.Go to http://localhost:8000/

=>Add Records
=>Running The Scheduler: * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
=>Running The Scheduler Locally: php artisan schedule:work
