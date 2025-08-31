# Install php:7.4, mysql:8, and phpMyAdmin using Docker Compose.

### **1. Create a `docker-compose.yml` file**

```yaml
version: '3.8'

services:
  web:
    image: php:7.4-apache
    container_name: web-server
    ports:
      - "8081:80"
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
      - "8082:80"
    environment:
      PMA_HOST: db
      PMA_PORT: 3306
      MYSQL_ROOT_PASSWORD: password
    depends_on:
      - db
```

  * **`version: '3.8'`**: Specifies the Docker Compose version, a modern choice with good features.
  * **`services`**: Defines the different services (containers) that make up your application.
      * **`web`**: This is your web server, using the official `php:7.4-apache` image.
          * `ports`: Maps port 80 on your local machine to port 80 inside the container, so you can access your web server at `http://localhost`.
          * `volumes`: Creates a link between your local `./html` folder and the container's `/var/www/html` directory. This means any changes you make to files in your local `html` folder will be reflected instantly inside the container.
          * `depends_on`: Ensures the `db` service is started before the `web` service.
      * **`db`**: This is your database server, using the `mysql:8` image.
          * `environment`: Sets environment variables for the MySQL container, including the **root password** (`MYSQL_ROOT_PASSWORD`) and a default database (`MYSQL_DATABASE`).
          * `ports`: Maps port 3306 from the container to your local machine, allowing external access if needed (though `phpmyadmin` will connect internally).
      * **`phpmyadmin`**: This service provides a web-based interface for managing your MySQL database.
          * `ports`: Maps port 8080 on your host to the container's port 80, so you can access phpMyAdmin at `http://localhost:8080`.
          * `environment`: These variables configure phpMyAdmin to connect to your MySQL container. `PMA_HOST` is set to `db`, which is the name of the MySQL service, so Docker Compose can resolve the connection.
          * `depends_on`: Ensures the `db` service is running before phpMyAdmin tries to connect to it.

-----

### **2. Create the HTML directory**

Create a folder named `html` in the same directory as your `docker-compose.yml` file. This folder will be where you place your PHP and HTML files.

```bash
mkdir html
```

You can add a simple `index.php` file inside this `html` folder to test the setup.

```php
<?php
phpinfo();
?>
```

-----

### **3. Run Docker Compose**

Open your terminal in the directory containing the `docker-compose.yml` file and run the following command:

```bash
docker compose up -d
```

  * `up`: Starts the containers defined in the `docker-compose.yml` file.
  * `-d`: Runs the containers in **detached mode**, meaning they run in the background.

This command will download the necessary images and start all three containers.

-----

### **4. Accessing the services**

  * **PHP Web Server**: Open your web browser and navigate to `http://localhost`. You should see the PHP info page.
  * **phpMyAdmin**: Navigate to `http://localhost:8080`. You can log in using the username `root` and the password `password` (as defined in your `docker-compose.yml` file). You should see the `my_database` listed on the left.
