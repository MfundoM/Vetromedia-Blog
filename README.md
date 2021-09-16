Vetromedia Blog

Setting up on local machine:
1. Clone the project
2. cd project-name
3. cp .env.example .env
4. composer install
5. php artisan key:generate
6. php artisan cache:clear && php artisan config:clear
7. Edit database credentials on .env
8. php artisan migrate --seed
9. php artisan storage:link

This project took me 4hours from start to finish.

Deploying to LEMP or LAMP

1. Login via SSH (ssh root@10.100.162.1):
Here root is the super user name of server and 10.100.162.1 is the public IP address of server.
2. Update package installer for Ubuntu (sudo apt-get update).
3. Install Nginx (sudo apt-get install nginx).
4. Install MySQL (sudo apt-get install mysql-server).
5. Install PHP (sudo apt install php8.0-cli):
Install php-fpm for fast CGI process management, php-mysql to talk with mysql and php-mbstring which require for laravel.
sudo apt-get install php-fpm php-mysql php-mbstring.
6. Configure PHP (sudo nano /etc/php/7.0/fpm/php.ini):
After restart php-fpm (sudo systemctl restart php7.0-fpm).
7. Configure Nginx (sudo nano /etc/nginx/sites-available/default):
Save the changes check if syntax is okay (sudo nginx -t) and restart Nginx (sudo systemctl reload nginx).
8. Push Laravel Project on Server:
Push the project to the Github repo. Then connect again to the server and clone the github project to your targeted folder. Normally the folder would be /var/www/html/.
Change Nginx configuration to point to the index.php file in the project folder (sudo nano /etc/nginx/sites-available/default), then restart Nginx (sudo service nginx restart).
9. Permit your project:
First change ownership of the laravel directory to our web group (sudo chown -R :www-data /var/www/project-folder-name).
Next give the web group write privileges over our storage directory so it can write to this folder. This is where you store log files, cache, and even file uploads
(sudo chmod -R 775 /var/www/laravel/storage) (sudo chmod -R 775 /var/www/laravel/bootstrap/cache).
10. CD to your project directory and run all the neccessary commands needed for your application to run.
