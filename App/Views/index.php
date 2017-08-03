<?php

require '../Classes/Autoloader.php';
require '../Models/DatabasePDO.php';

$db = new DatabasePDO;
$db->getDbh();

