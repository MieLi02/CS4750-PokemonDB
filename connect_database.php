<?php
// Remember to start the database server (or GCP SQL instance) before trying to connect to it
////////////////////////////////////////////
/** F22, PHP (on Google Standard App Engine) connect to MySQL instance (GCP) **/
// $username = 'root';                       // or your username
// $password = 'your-root-password';
// $host = 'instance-connection-name';       // e.g., 'cs4750:us-east4:db-demo';
// $dbname = 'your-database-name';           // e.g., 'guestbook';
// $dsn = "mysql:unix_socket=/cloudsql/instance-connection-name;dbname=your-database-name";
//       e.g., "mysql:unix_socket=/cloudsql/cs4750:us-east4:db-demo;dbname=guestbook";

// to get instance connection name, go to GCP SQL overview page
////////////////////////////////////////////

/** F22, PHP (on local XAMPP or CS server) connect to MySQL instance (GCP) **/
// $username = 'root';
// $password = 'your-root-password';
// $host = 'instance-connection-name';       // e.g., 'cs4750:us-east4:db-demo';
/** F22, PHP (on GCP, local XAMPP, or CS server) connect to MySQL (on CS server) **/
 $username = 'yl2nr';
 $password = '010717';
 $host = 'mysql01.cs.virginia.edu';
 $dbname = 'yl2nr_d';
 $dsn = "mysql:host=$host;dbname=$dbname";

/** connect to the database **/
try
{
//  $db = new PDO("mysql:host=$hostname;dbname=db-demo", $username, $password);
   $db = new PDO($dsn, $username, $password);

   // dispaly a message to let us know that we are connected to the database
   //echo "<p>You are connected to the database</p>";
}
catch (PDOException $e)     // handle a PDO exception (errors thrown by the PDO library)
{
   // Call a method from any object, use the object's name followed by -> and then method's name
   // All exception objects provide a getMessage() method that returns the error message
   $error_message = $e->getMessage();
   echo "<p>An error occurred while connecting to the database: $error_message </p>";
}
catch (Exception $e)       // handle any type of exception
{
   $error_message = $e->getMessage();
   echo "<p>Error message: $error_message </p>";
}

?>
