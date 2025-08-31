`docker-compose.yml`
```
version: '3.8'

services:
  webserver:
    image: php:7.4-apache
    container_name: php_apache_container
    ports:
      - "8080:80"
    volumes:
      - ./src:/var/www/html/
```
place all php content to /src folder
