<?php

$host = 'urna-anglo-mysql.mysql.database.azure.com';
$db = 'urna_anglo';
$user = 'mysqladmin';
$password = 'P2ssw0rd!@#$%';
$options = array(
    PDO::MYSQL_ATTR_SSL_CA     => 'DigiCertGlobalRootCA.crt.pem',
    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false
);
