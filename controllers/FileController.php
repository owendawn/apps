<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/15
 * Time: 13:58
 */

namespace app\controllers;


use app\core\base\BaseController;
use app\core\util\FileUtil;
use app\core\util\MysqlUtils;

class FileController extends  BaseController
{
    public $enableCsrfValidation = false;
    public function actionUpdatedbconfig(){
        $host = $_POST["host"];
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];
        $dbname = $_POST["dbname"];
        $target = FileUtil::getFileContent ( dirname ( __DIR__ ) . "/core/config/dbConfig.php" );
        $target=preg_replace('/"host"\s*=>\s*"[^"]*"/', '"host" => "'.$host.'"', $target);
        $target=preg_replace('/"user"\s*=>\s*"[^"]*"/', '"user" => "'.$username.'"', $target);
        $target=preg_replace('/"pwd"\s*=>\s*"[^"]*"/', '"pwd" => "'.$pwd.'"', $target);
        $target=preg_replace('/"dbname"\s*=>\s*"[^"]*"/', '"dbname" => "'.$dbname.'"', $target);
        file_put_contents( dirname ( __DIR__ ) . "/core/config/dbConfig.php" , $target);
        if (! MysqlUtils::testDatabaseConnect()) {
            echo "{\"success\":false,\"desc\":\"输入配置信息不可用，请输入正确配置！\"}";
        } else {
            echo "{\"success\":true,\"desc\":\"输入配置信息可用，点击后进入主页！\"}";
        }
    }
}