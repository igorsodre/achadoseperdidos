<?php
use Doctrine\Common\ClassLoader,
    Doctrine\ORM\Configuration,
    Doctrine\ORM\EntityManager,
    Doctrine\ORM\Tools\Setup,
    Doctrine\Common\Cache\ArrayCache,
    Doctrine\DBAL\Logging\EchoSQLLogger;

class Doctrine {

    public $em = null;

    public function __construct()
    {
        // load database configuration from CodeIgniter
//        require_once APPPATH.'config/database.php';

        // Set up class loading. You could use different autoloaders, provided by your favorite framework,
        // if you want to.
        require_once APPPATH.'libraries/Doctrine/Common/ClassLoader.php';

        $doctrineClassLoader = new ClassLoader('Doctrine',  APPPATH.'libraries');
        $doctrineClassLoader->register();
        $entitiesClassLoader = new ClassLoader('models', rtrim(APPPATH, "/" ));
        $entitiesClassLoader->register();
        $proxiesClassLoader = new ClassLoader('Proxies', APPPATH.'models/proxies');
        $proxiesClassLoader->register();
        $proxiesClassLoader = new ClassLoader('Proxies', APPPATH.'models');
        $proxiesClassLoader->register();


        // Database connection information
        $connectionOptions = array(
            'driver' => 'pdo_mysql',
            'user' =>     'root',
            'password' => '',
            'host' =>     'localhost',
            'dbname' =>   'achadoseperdidos'
        );

        $models_namespace = 'Entity';
        $models_path = APPPATH . 'models';
        $proxies_dir = APPPATH . 'models/Proxies';
        $metadata_paths = array(APPPATH . 'models');
        // Set $dev_mode to TRUE to disable caching while you develop
        $dev_mode = false;
        // If you want to use a different metadata driver, change createAnnotationMetadataConfiguration
        // to createXMLMetadataConfiguration or createYAMLMetadataConfiguration.
        $config = Setup::createAnnotationMetadataConfiguration($metadata_paths, $dev_mode, $proxies_dir);
        $this->em = EntityManager::create($connectionOptions, $config);
        $loader = new ClassLoader($models_namespace, $models_path);
        $loader->register();


        // Proxy configuration
        $config->setProxyDir(APPPATH.'/models/proxies');
        $config->setProxyNamespace('Proxies');

        // Set up logger
        $logger = new EchoSQLLogger;

        // DESCOMENTAR ESSA LINHA CASO QUEIRA VER O SQL NA GERADO NA TELA
        //$config->setSQLLogger($logger);

        $config->setAutoGenerateProxyClasses( TRUE );



        // Create EntityManager
        $this->em = EntityManager::create($connectionOptions, $config);
    }
}