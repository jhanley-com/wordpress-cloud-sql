/*
 * Modify and integrate into WordPress wp-config.php
*/

define('MYSQL_USE_CLIENT_CERTS', TRUE);
define('MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL | MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
define('MYSQL_CLIENT_KEY',  '/config/client-key.pem');
define('MYSQL_CLIENT_CERT', '/config/client-cert.pem');
define('MYSQL_SERVER_CA',   '/config/server-ca.pem');
