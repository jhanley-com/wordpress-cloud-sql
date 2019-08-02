# wordpress-cloud-sql
WordPress changes to support Google Cloud SQL SSL

Copy db.php to the WordPress directory wp-content. This file extends the WordPress class $wpdb and adds support for Google Cloud SQL SSL client and server certificates.

Add the contents of config.php to the WordPress file wp-config.php. Modify for your Google Cloud SQL configuration. Replace the three client and server certificate files with your locations.

define('MYSQL_USE_CLIENT_CERTS', TRUE);
define('MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL | MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
define('MYSQL_CLIENT_KEY',  '/config/client-key.pem');
define('MYSQL_CLIENT_CERT', '/config/client-cert.pem');
define('MYSQL_SERVER_CA',   '/config/server-ca.pem');
