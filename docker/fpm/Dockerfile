FROM alpine:3.7

RUN apk --update add \
        php7 \
        php7-ctype \
        php7-dom \
        php7-ctype \
        php7-curl \
        php7-fpm \
        php7-gd \
        php7-iconv \
        php7-intl \
        php7-json \
        php7-mbstring \
        php7-mcrypt \
        php7-openssl \
        php7-pdo \
        php7-pdo_mysql \
        php7-session \
        php7-soap \
        php7-xml \
        php7-zip \
        php7-apcu \
    && rm -rf /var/cache/apk/*

ADD pool.conf /etc/php7/php-fpm.d/med.pool.conf

EXPOSE 9000

CMD ["php-fpm7", "-F"]
