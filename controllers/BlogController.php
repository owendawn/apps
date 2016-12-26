<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/14
 * Time: 10:11
 */

namespace app\controllers;


use app\core\base\BaseController;

class BlogController extends BaseController
{
    public function actionIndex()
    {
        return $this->render("index");
    }

    public function actionEdit(){
        return $this->render("edit");
    }

    public function actionManager(){
        return $this->render("manager");
    }
}