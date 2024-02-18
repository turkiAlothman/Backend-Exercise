<?php
if(! file_exists("database/database.sqlite")){
$database = fopen("database/database.sqlite","w");
fclose($database);
}
