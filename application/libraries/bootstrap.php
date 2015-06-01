<?php
/**
 * Created by PhpStorm.
 * User: Uriel
 * Date: 22/02/2015
 * Time: 22:43
 */

use Doctrine\Common\Cache;

// Replace it with your environment
$applicationMode = 'development';

$isDevMode = FALSE;
$paths = array(APPPATH . '/models');
$cacheImpl = $applicationMode == 'development' ? new Doctrine\Common\Cache\ArrayCache : new Doctrine\Common\Cache\ApcCache;

// Configuration
$config = Setup::createConfiguration($isDevMode);
$driver = new AnnotationDriver(new AnnotationReader(), $paths);

// Registering noop annotation autoloader - allow all annotations by default
AnnotationRegistry::registerLoader('class_exists');
$config->setMetadataDriverImpl($driver);
$config->setMetadataCacheImpl($cacheImpl);
$config->setQueryCacheImpl($cacheImpl);

$conn = array(
    'host' => $db['default']['hostname'],
    'driver' => 'pdo_' . $db['default']['dbdriver'],
    'user' => $db['default']['username'],
    'password' => $db['default']['password'],
    'dbname' => $db['default']['database'],
    'port' => $db['default']['port'],
    'charset' => $db['default']['char_set'],
);

$entityManager = EntityManager::create($conn, $config);