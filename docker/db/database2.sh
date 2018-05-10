#!/bin/bash

if [ "${MYSQL_DATABASE2}" ]; then
    echo "CREATE DATABASE IF NOT EXISTS"
    mysql -uroot -p${MYSQL_ROOT_PASSWORD} -e "create database ${MYSQL_DATABASE2}"
    mysql -uroot -p${MYSQL_ROOT_PASSWORD} -e "GRANT ALL ON \`${MYSQL_DATABASE2}\`.* TO '${MYSQL_USER}'@'%' "
fi
