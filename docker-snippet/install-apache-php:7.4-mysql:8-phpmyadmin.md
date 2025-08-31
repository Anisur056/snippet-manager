docker-compose.yml
```
version: '3.8'

services:
  web:
    image: php:7.4-apache
    container_name: web-server
    ports:
      - "80:80"
    volumes:
      - ./html:/var/www/html
    depends_on:
      - db
    
  db:
    image: mysql:8
    container_name: mysql-db
    environment:
      MYSQL_ROOT_PASSWORD: password
      MYSQL_DATABASE: my_database
    ports:
      - "3306:3306"
      
  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    container_name: phpmyadmin-container
    ports:
      - "8080:80"
    environment:
      PMA_HOST: db
      PMA_PORT: 3306
      MYSQL_ROOT_PASSWORD: password
    depends_on:
      - db
```

Create a Folder name `html`, Place all code here.
