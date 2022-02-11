<?php

require_once "Routing.php";

$routing = new Routing();

$url = $_SERVER['REQUEST_URI'];

$routing->route($url);
