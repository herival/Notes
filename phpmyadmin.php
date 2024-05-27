<?php 
# Secure phpmyadmin
sudo nano /opt/lampp/phpmyadmin/config.inc.php
# phpmyadmin/config.inc.php

/********************
 * 
$cfg['blowfish_secret'] = 'ATUSYEPMLCNAQSURHTFGYVBXDSKJRTPO'; /* YOU SHOULD CHANGE THIS FOR A MORE SECURE COOKIE AUTH! 

$cfg['Servers'][$i]['auth_type'] = 'config';
$cfg['Servers'][$i]['user'] = 'root';
$cfg['Servers'][$i]['password'] = '';
$cfg['Servers'][$i]['auth_type'] = 'cookie';
$cfg['Servers'][$i]['AllowRoot'] = FALSE;
// Server parameters
//$cfg['Servers'][$i]['host'] = 'localhost';
$cfg['Servers'][$i]['compress'] = false;
$cfg['Servers'][$i]['AllowNoPassword'] = false;
*********************/

#add password root user
sudo /opt/lampp/bin/mysql -u root
use mysql; 

update user set password=PASSWORD('mot_de_passe') where user='root';
FLUSH PRIVILEGES;

CREATE USER 'user_admin'@'localhost' IDENTIFIED BY 'Solutions@30';
GRANT ALL PRIVILEGES ON * . * TO 'user_admin'@'localhost';
FLUSH PRIVILEGES;

sudo /opt/lampp/lampp restart


access phpmyadmin

sudo nano /opt/lampp/apache2/conf/httpd.conf 

#Ajouter la ligne
<Directory "opt/lampp/phpmyadmin">
    AllowOverride All
    Order allow,deny
    Allow from all
</Directory>

#dans httpd-xampp.conf
sudo nano /opt/lampp/etc/extra/httpd-xampp.conf 

<Directory "opt/lampp/phpmyadmin">
    AllowOverride All
    Order allow,deny
    Allow from all
</Directory>

#redemarrer lampp
sudo /opt/lampp/lampp restart