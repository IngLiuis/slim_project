FROM php:7.4-cli

RUN apt-get update && \
    apt-get install -y unzip && \
    curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

WORKDIR /app

COPY . /app

RUN if [ -f "composer.json" ]; then composer install; fi

EXPOSE 8080

CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
