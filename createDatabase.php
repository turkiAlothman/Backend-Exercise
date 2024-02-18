<?php
if(! file_exists("database/database.sqlite")){
$database = fopen("database/database.sqlite","w");
fclose($database);
}
if(! file_exists("database/databaseTest.sqlite")){
    $database = fopen("database/databaseTest.sqlite","w");
    fclose($database);
}
