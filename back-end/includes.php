<?php

  header("Access-Control-Allow-Origin: *");
  header("content-type: Application/json");
  header("Access-Control-Allow-Methods: *");

  require_once 'interface/helpers.php';
  require_once 'libraries/controller.php';
  require_once 'libraries/database.php';
