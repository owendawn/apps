<?php

namespace app\controllers;

use \app\core\base;

class DailytalkController extends base\BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
