<?php

require_once 'controllers/ClientsController.php';

$action = !empty($_GET['action']) ? $_GET['action'] : 'getAll';

$controller = new ClientsController();
$controller->{$action}();