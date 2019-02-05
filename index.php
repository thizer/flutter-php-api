<?php
session_start();

// Set your timezone
// date_default_timezone_set('America/Sao_Paulo');

// Defined constants to determine test environment or production
define('DEVELOPMENT', (bool) getenv("DEVELOPMENT"));
define('SHOW_ERRORS', (bool) getenv("SHOW_ERRORS"));
if (SHOW_ERRORS) {
  error_reporting(E_ALL);
  ini_set('display_errors', true);
}

// Root path
// Now everything is related to this folder
chdir(__DIR__);

// Simple functions you should implement
// include_once './functions.php';

// Setup autoloading composer
if (file_exists('vendor/autoload.php')) {
  $loader = include 'vendor/autoload.php';

  // You may want to implement your own libraries
  // $loader->add('System', 'library/.');
} else {
  exit("Project dependencies not found, run 'php composer.phar install'");
}

// Let's start SuitUp Framework
$mvc = new SuitUpStart('modules/');

// Sql monitoring
$mvc->setSqlMonitor(DEVELOPMENT);

$mvc->run();

