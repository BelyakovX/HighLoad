<?php
return [
  'rootDir' => $_SERVER['DOCUMENT_ROOT'] . "/../",
  'templatesDir' => $_SERVER['DOCUMENT_ROOT'] . "/../view/",
  'defaultController' => 'product',
  'controllerNamespace' => "app\\controllers\\",
  'components' => [
//    'db' => [
//      'class' => \app\services\Db::class,
//      'driver' => 'mysql',
//      'host' => 'localhost',
//      'login' => 'ci38580_alex',
//      'password' => 'KJ%\(E<d:?',
//      'database' => 'ci38580_alex',
//      'charset' => 'utf8',
//    ],
    'request' => [
      'class' => \app\services\Request::class
    ],
    'renderer' => [
      'class' => \app\services\renderers\TemplateRenderer::class
    ]
  ]
];