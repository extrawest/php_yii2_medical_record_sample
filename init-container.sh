#!/bin/bash

MYSQL_START_DELAY=10

docker-compose up -d
docker-compose exec cli composer install
cp .env.dist .env

echo "Waiting ${MYSQL_START_DELAY} seconds for mysql daemon starting..."
sleep ${MYSQL_START_DELAY}
docker-compose exec cli console/yii app/setup --interactive=0
