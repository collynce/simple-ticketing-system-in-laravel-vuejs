
RUN THE FOLLOWING COMMANDS:

run composer install

run npm install

change/update .env file with your database details

run php artisan key:generate

run php artisan migrate


HOMEPAGE/CLIENT = localhost/laticket/public 

ADMIN PAGE =localhost/laticket/public/admin/dashboard


ADMIN LOGIN:
	email = superuser@admin.com
	password = password

For emails, set up the mail smtp config details to yours in .env or config/app.php file

I have used mailtrap.io for emails
