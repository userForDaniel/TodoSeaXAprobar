https://chatgpt.com/share/c8458893-feaf-44eb-abb9-89a52a164241
*****************************************************************

sudo apt update && sudo apt upgrade -y
sudo apt install apache2 -y
sudo systemctl status apache2
sudo apt install php libapache2-mod-php php-mysql -y
php -v
sudo apt install mysql-server -y
sudo systemctl status mysql
sudo mysql_secure_installation
sudo mysql -u root -p
CREATE DATABASE empleados_db;
CREATE USER 'empleados_user'@'localhost' IDENTIFIED BY 'empleados_password';
GRANT ALL PRIVILEGES ON empleados_db.* TO 'empleados_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
sudo mysql -u empleados_user -p empleados_db
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

sudo apt install git -y
cd /var/www/html
sudo git clone https://github.com/userForDaniel/TodoSeaXAprobar.git
sudo chown -R www-data:www-data /var/www/html/TodoSeaXAprobar
sudo chmod -R 755 /var/www/html/TodoSeaXAprobar
sudo nano /etc/apache2/sites-available/todoseaxaprobar.conf
<VirtualHost *:80>
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
sudo a2ensite todoseaxaprobar.conf
sudo a2dissite 000-default.conf
sudo systemctl reload apache2
// Ejemplo de config.php
$db_host = 'localhost';
$db_name = 'empleados_db';
$db_user = 'empleados_user';
$db_pass = 'empleados_password';
sudo tail -f /var/log/apache2/error.log
sudo tail -f /var/log/apache2/access.log
