FROM alpine:3.7

MAINTAINER Vincent Composieux <vincent.composieux@gmail.com>

RUN apk add --update nginx
RUN rm -rf /var/cache/apk/* && rm -rf /tmp/*

ADD nginx.conf /etc/nginx/
ADD site.conf /etc/nginx/sites-enabled/medical.conf

RUN echo "upstream php-upstream { server fpm:9001; }" > /etc/nginx/conf.d/upstream.conf

RUN adduser -D -g '' -G www-data www-data

CMD ["nginx"]

EXPOSE 8081 8082 8083
