<?php
require '../config.local.php';

set_include_path(PATH_INCLUDE_PATH);

require 'Ilib/ClassLoader.php';
require 'k.php';

$application = new Root();

$application->registry->registerConstructor('user', create_function(
  '$className, $args, $registry',
  'return new Ilib_SimpleLogin_User($registry->SESSION);'
));

$application->dispatch();