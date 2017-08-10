#!/usr/bin/env bash

docker run \
    --name phprio-swagger \
    -p 7000:80 \
    -v $PWD:/var/www/html \
    -v $PWD/conf:/etc/nginx/conf.d \
    -e APPLICATION_ENV=dev \
    --rm -d byjg/php7-fpm-nginx:alpine
