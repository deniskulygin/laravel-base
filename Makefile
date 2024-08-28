.PHONY: build up install down restart migrate bash run-worker logs run-php-unit phpcs phpcbf

SERVICE_NAME=app

build:
	docker-compose build

up:
	docker-compose up -d

install: up
	docker-compose exec $(SERVICE_NAME) composer install

migrate:
	docker-compose exec $(SERVICE_NAME) php artisan migrate

down:
	docker-compose down

bash:
	docker-compose exec -ti $(SERVICE_NAME) bash

run-worker:
	docker-compose exec $(SERVICE_NAME) php artisan queue:work

logs:
	docker-compose exec $(SERVICE_NAME) tail -n 10 ./storage/logs/laravel.log

restart: down up

run-php-unit:
	docker-compose exec $(SERVICE_NAME) vendor/bin/phpunit

phpcs:
	docker-compose exec $(SERVICE_NAME) vendor/bin/phpcs --standard=phpcs.xml.dist

phpcbf:
	docker-compose exec $(SERVICE_NAME) vendor/bin/phpcbf --standard=phpcs.xml.dist
