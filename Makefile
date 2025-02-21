# Variables
include .env

PHP_CONTAINER=${APP_NAME}_php

DOCKER_COMPOSE=docker compose -f docker/docker-compose.yml

COMPOSER=docker exec ${PHP_CONTAINER} composer

# Commands
.PHONY: docker-init-env docker-build docker-up docker-down docker-restart docker-rebuild \
    composer-install

# Docker
# Copying the necessary environment variables to docker/.env
docker-init-env:
	bash ./docker/docker-init-environments.sh

docker-build:
	${DOCKER_COMPOSE} build

docker-up:
	${DOCKER_COMPOSE} up -d

docker-down:
	${DOCKER_COMPOSE} down

docker-restart: docker-down docker-up

docker-rebuild: docker-down docker-init-env docker-build docker-up composer-install

# Composer
composer-install:
	${COMPOSER} install --no-scripts --no-progress --prefer-dist
