FROM alpine:3.7

RUN apk --update add \
        php7 \
        php7-ctype \
        php7-dom \
        php7-curl \
        php7-iconv \
        php7-json \
        php7-mbstring \
        php7-mcrypt \
        php7-openssl \
        php7-pdo \
        php7-pdo_mysql \
        php7-phar \
        php7-zip \
        php7-zlib \
        php7-xml \
        php7-xmlwriter \
        php7-tokenizer \
        bash \
        curl \
        make \
        rsync \
        mysql-client \
        git \
        nodejs \
        mc \
    && rm -rf /var/cache/apk/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN npm install -g bower grunt-cli && echo '{ "allow_root": true }' > /root/.bowerrc

CMD ["/bin/bash"]

WORKDIR /app

