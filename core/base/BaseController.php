<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/12
 * Time: 9:38
 */

namespace app\core\base;


use yii\web\Controller;

class BaseController extends Controller
{
    public $enableCsrfValidation = false;
}