<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
'language' => 'id',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'eSAKIP :: Pemerintah Daerah Provinsi Jawa Barat',

	// path aliases
	'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../extensions/yiistrap'), // change this if necessary
    ),

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'bootstrap.helpers.*',
		'bootstrap.behaviors.*',
        'bootstrap.components.*',
        'bootstrap.form.*',
        'bootstrap.widgets.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'giip4swd',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array('bootstrap.gii'),

		),

	),

	// application components
	'components'=>array(

        'request' => array(
            'csrfCookie'=>array(
				'httpOnly'=>true,
				'baseUrl' => '',
            ),
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>false,
            'loginUrl'=>array('login'),
            'class'=>'WebUser',
            'autoRenewCookie' => true,
            'authTimeout' => 86400, //kills session after 24 hours just in case above fails or if a user clicks remember me it will only last for this duration.
		),
        'format'=>array(
            'class'=>'application.components.Formatter',
        ),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false,
			'baseUrl' => '',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

        /*'behaviors' => array(
            'onBeginRequest' => array(
                'class' => 'application.components.RequireLogin'
            )
        ),*/
		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages

				array(
					'class'=>'CWebLogRoute',
				),
			),
		),

        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
            'bootstrapPath' => __DIR__ . '/../../static/bootstrap-3.3.5-dist'
        ),
	'ePdf' => array(
            'class'         => 'ext.yii-pdf.EYiiPdf',
            'params'        => array(
                'mpdf'     => array(
                    'librarySourcePath' => 'application.extensions.mpdf6.*',
                    'constants'         => array(
                        '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                    )
                ),
                'HTML2PDF' => array(
                        'librarySourcePath' => 'application.extensions.html2pdf.*',
                        'classFile'         => 'html2pdf.php', // For adding to
                ),
            )
        ),
	),

    /*'session'=>array(
        'cookieParams' => array(
            'httponly'=>true,
            'secure' => true,
        ),
    ),*/

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'adminEmail'=>'abdiiwan1841@gmail.com',
        'kopikanan'=>'@2016 Diskominfo Pemerintah Daerah Provinsi Jawa Barat',
        'namepanjang'=>'eSakip::Aplikasi Akuntabilitas Kinerja Instansi Pemerintah',
        'namependek'=>'eSakip',
        'nameepemakai'=>'Pemerintah Daerah Provinsi Jawa Barat',
        'dbhost' =>'localhost',
        'dbuser' =>'root',
        'dbpwd' =>'',
	),

);
