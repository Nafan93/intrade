apt git install
git clone git@github.com:Nafan93/intrade.git
cp .env.example .env
nano .env //edit .env file
docker-compose build
docker-compose up -d
cd ..
sudo chmod -R 775 intrade && sudo chown -R $USER:$USER intrade/
cd intrade/
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
