<?php


namespace app\services\renderers;

// отчечает за отображение пхп шаблонов
use app\base\App;
use app\interfaces\IRenderer;

class TemplateRenderer implements IRenderer
{
  public function render($template, $params = [])
{  //начинаем буферизацию
ob_start();
  //загоняем в переменную путь к шаблону
  if ($template == 'main') {
$templatePath = App::call()->config['templatesDir'] . "layouts/$template" . ".php";
  //разворачиваем массив с параметрами и записываем их в переменные
  } else {
    $templatePath = App::call()->config['templatesDir'] . "{$params['className']}/$template" . ".php";
  }
extract($params);
include $templatePath;
  // заканчиваем буферизацию и возвращаем данные в виде строки - без этого у нас произойдёт моментальная отрисовка в
  // этом месте
return ob_get_clean();}
}