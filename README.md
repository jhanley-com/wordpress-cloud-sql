# wordpress-cloud-sql
WordPress changes to support Google Cloud SQL SSL

Copy db.php to the WordPress directory wp-content. This file extends the WordPress class $wpdb and adds support for Google Cloud SQL SSL client and server certificates.

New code that implements Cloud SQL client and server certificate setup:
<pre>
if ( MYSQL_USE_CLIENT_CERTS ) {
	$this->dbh->ssl_set(MYSQL_CLIENT_KEY, MYSQL_CLIENT_CERT, MYSQL_SERVER_CA, NULL, NULL);
}
</pre>

Add the contents of config.php to the WordPress file wp-config.php. Modify for your Google Cloud SQL configuration. Replace the three client and server certificate files with your locations.

<pre>
define('MYSQL_USE_CLIENT_CERTS', TRUE);
define('MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL | MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
define('MYSQL_CLIENT_KEY',  '/config/client-key.pem');
define('MYSQL_CLIENT_CERT', '/config/client-cert.pem');
define('MYSQL_SERVER_CA',   '/config/server-ca.pem');
</pre>

## FAQ
Q) Does this modify my WordPress installation?

No. The only WordPress file that is affected (not changed) is wp-db.php. The code in db.php extends the class $wpdb in wp-db.php.

Q) Will normal WordPress updates continue to work?

Yes. My code does not change the WordPress core files. However, my code does extend the class $wpdb. In the future, WordPress might make a significant change that would require changes to my code.

Q) Should I use the Cloud SQL Proxy instead of changing WordPress?

If you are using Google Cloud SQL - Yes, you should use the proxy. If you are not using Cloud SQL - You cannot use the proxy. My goal is to add SSL support to WordPress. This provides more options and better security.

Link to my article on Cloud SQL Proxy:

https://www.jhanley.com/google-cloud-sql-proxy-installing-as-a-service-on-gce/

Q) Where do I get the client and server SSL certificates?

This document shows how to setup SSL and download the required certificate files:

https://cloud.google.com/sql/docs/mysql/configure-ssl-instance 

Using the Cloud SDK CLI:

https://cloud.google.com/sdk/gcloud/reference/sql/ssl/client-certs/

