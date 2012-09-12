<?php
error_reporting (E_ALL);
require 'Console/Table.php';
require("../includes/constants.php");

if (auth()) {
function mysql_db_dump (&$connection, $database) {
    mysql_select_db ($database, $connection);
    
    $tabres = mysql_query ("SHOW TABLES FROM $database", $connection) or die (mysql_error());
    
    while ($tabrow = mysql_fetch_array ($tabres, MYSQL_NUM)) {
        $table =& $tabrow[0];
        
        $consoleTable = new Console_Table();

        $res = mysql_query ("SHOW COLUMNS FROM $table", $connection) or die (mysql_error());
        $headers = array();
        while ($row = mysql_fetch_array ($res, MYSQL_NUM)) {
            $headers[] = $row[0];
        }
        
        $consoleTable->setHeaders ($headers);
        
        $res = mysql_query ("SELECT * from $table", $connection) or die (mysql_error());
        $data = array();                
        while ($row = mysql_fetch_array ($res, MYSQL_ASSOC)) {
            $data[] = $row;
        }
        
        $consoleTable->addData ($data);
        
        print "Table $table\n";
        print $consoleTable->getTable();
        print "\n\n";
    }
}

// Sample driver
print "<pre>";
$conn = mysql_connect ("localhost", "gocfs", "gocfs");
mysql_db_dump ($conn, "gocfs");
print "</pre>";

} else {
	echo "you must be logged into view the database dump";
}
?>
