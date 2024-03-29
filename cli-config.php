<?php

require 'vendor/autoload.php';

$isDevMode = true;
$config = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);

// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$conn = array(
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
);

// obtaining the entity manager
$entityManager = Doctrine\ORM\EntityManager::create($conn, $config);
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
