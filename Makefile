# Variables
include .env

# Commands
.PHONY: docker-init-env

# Docker
# Copying the necessary environment variables to docker/.env
docker-init-env:
	bash ./docker/docker-init-environments.sh
