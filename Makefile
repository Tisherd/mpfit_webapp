# Variables
include .env

PHP_CONTAINER=${APP_NAME}_php

DOCKER_COMPOSE=docker compose -f docker/docker-compose.yml

COMPOSER=docker exec ${PHP_CONTAINER} composer

# Commands
.PHONY: docker-init-env docker-build docker-up docker-down docker-restart docker-rebuild \
    docker-clean docker-volume-prune \
    composer-install composer-optimize \
    php-shell \
    artisan-migrate-refresh

# Docker
# Copying the necessary environment variables to docker/.env
docker-init-env:
	bash ./docker/docker-init-environments.sh

docker-build: docker-init-env
	${DOCKER_COMPOSE} build

docker-up:
	${DOCKER_COMPOSE} up -d

docker-down:
	${DOCKER_COMPOSE} down

docker-clean:
	${DOCKER_COMPOSE} down --volumes --remove-orphans

docker-volume-prune:
	docker volume prune -f

docker-restart: docker-down docker-up

docker-rebuild: docker-down docker-build docker-up

# Composer
composer-install:
	${COMPOSER} install --no-scripts --no-progress --prefer-dist

composer-optimize:
	${COMPOSER} dump-autoload --optimize

# PHP container
php-shell:
	docker exec -it ${PHP_CONTAINER} bash

# Artisan
artisan-migrate-refresh:
	docker exec ${PHP_CONTAINER} php artisan migrate:refresh --seed

# Project
project-launch: docker-rebuild composer-install
