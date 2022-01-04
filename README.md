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
