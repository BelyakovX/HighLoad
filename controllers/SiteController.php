<?php


namespace app\controllers;


use app\base\App;
use app\models\repositories\UserRepository;
use app\models\repositories\NoteRepository;
use app\models\User;
use app\models\Note;

class SiteController extends Controller
{
  public function actionIndex()
  {

      $images = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
    echo $this->render('index', ['images' => $images,'className'=>$this->getClassName()]);
  }

  public function actionNote()
  {

  }

  public function actionAdditional()
  {

  }

    public function getClassName() {
        return 'site';
    }
}