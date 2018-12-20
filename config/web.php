<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$db2 = require __DIR__ . '/db2.php';

$config = [
    'id' => 'basic',
    'name'=>'SME Summit Backend Management',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
			'layout' => 'left-menu',
        ]
    ],
	'as access' => [
		'class' => 'mdm\admin\components\AccessControl',
		'allowActions' => [
			'site/*',
			//'some-controller/some-action',
            /**
             * silakn hpus jika tidak diperlukan
             */
            'gii/*',
            'admin/*',
            'participant/*',
            'sponsor/*',
            'speaker/*',
            'coacher/*',
            'volunteer/*',
            /********************* */
			// 'some-controller/some-action',
			// The actions listed here will be allowed to everyone including guests.
			// So, 'admin/*' should not appear here in the production, of course.
			// But in the earlier stages of your development, you may probably want to
			// add a lot of actions here until you finally completed setting up rbac,
			// otherwise you may not even take a first step.
		]
	],
    'components' => [
		'authManager' => [
            'class' => 'yii\rbac\DbManager', 
        ],
		'i18n' => [
	        'translations' => [
				'yii2mod.user' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@yii2mod/user/messages',
                ],
	        ],
	    ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '4xcVIr8tVdK5guj0cZPJ1pB9Uxvc8AWY',
        ],
        'cache' => [
            'class' => 'yii\caching\DummyCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'db2' => $db2,
        'urlManager' => [
            'enablePrettyUrl' => true,
            //'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['localhost','127.0.0.1', '::1','139.255.24.178'],
    ];
}

return $config;
