<?php

ob_start();

require_once("core/init.php");
$router = registry::register("router");
dispatcher::dispatch($router);

ob_end_flush();