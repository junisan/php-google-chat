FROM php:7.4-cli-alpine
# Install dependencies
RUN apk --no-cache --update add \
    libxml2-dev \
    curl-dev && \
    rm -rf /tmp/* && \
    rm -rf /var/cache/apk/*

# Configure PHP extensions
RUN docker-php-ext-configure simplexml && \
    docker-php-ext-configure dom

# Build and install PHP extensions
RUN docker-php-ext-install dom

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
