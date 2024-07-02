https://chatgpt.com/share/c8458893-feaf-44eb-abb9-89a52a164241
*****************************************************************

Paso 1: Preparativos iniciales

sudo apt update && sudo apt upgrade -y

Paso 2: Instalar Apache, PHP y MySQL

sudo apt install apache2 -y
sudo systemctl status apache2
sudo apt install php libapache2-mod-php php-mysql -y
php -v

sudo apt update
sudo apt install mysql-server -y
sudo systemctl status mysql
sudo mysql_secure_installation

Paso 3: Configurar MySQL
sudo mysql -u root -p
   CREATE DATABASE crud2024;
   CREATE USER 'root1'@'localhost' IDENTIFIED BY '123456';
   GRANT ALL PRIVILEGES ON crud2024.* TO 'root1'@'localhost';
   FLUSH PRIVILEGES;
   EXIT;

sudo mysql -u root1 -p crud2024

  CREATE TABLE `tbl_empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `cedula` varchar(20) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

Paso 4: Clonar el proyecto desde GitHub
sudo apt install git -y
cd /var/www/html
sudo git clone https://github.com/userForDaniel/TodoSeaXAprobar.git
sudo chown -R www-data:www-data /var/www/html/TodoSeaXAprobar
sudo chmod -R 755 /var/www/html/TodoSeaXAprobar

Paso 5: Configurar Apache
sudo nano /etc/apache2/sites-available/todoseaxaprobar.conf
<VirtualHost *:9090>
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/html/TodoSeaXAprobar

    <Directory /var/www/html/TodoSeaXAprobar>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>

sudo nano /etc/apache2/ports.conf
  Listen 8080

sudo a2ensite todoseaxaprobar.conf
sudo a2dissite 000-default.conf
sudo systemctl reload apache2
nano /var/www/html/TodoSeaXAprobar/config.php
// Ejemplo de config.php
$db_host = 'localhost';
$db_name = 'empleados_db';
$db_user = 'empleados_user';
$db_pass = 'empleados_password';

http://localhost:8080

