<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/15
 * Time: 20:27
 */

namespace app\controllers;


use app\core\base\BaseController;
use app\core\util\MysqlUtils;
use yii\db\mssql\PDO;

class UserController extends  BaseController
{
    public function actionTestusernameexist(){
        $username = $_POST ["username"];
        try {
            $conn = MysqlUtils ::getPDOConnection ();
            $conn->beginTransaction ();
            $ps = $conn->prepare ( "select * from user where name=?" );
            $ps->execute ( array (
                $username
            ) );
            $conn->commit ();
            $result = $ps->setFetchMode ( PDO ::FETCH_ASSOC );
            $count = $ps->rowCount ();
            if ($count > 0) {
                echo "{\"success\":true,\"usable\":false,\"desc\":\"用户名已存在\"}";
            } else {
                echo "{\"success\":true,\"usable\":true,\"desc\":\"用户名可用\"}";
            }
        } catch ( \PDOException $e ) {

            // print_r($e);
            echo "{\"success\":false,\"usable\":false,\"desc\":\"未知错误，请重试\"}";
        }
        MysqlUtils::closePDOConnection($conn);

    }

    public function actionAdduser() {
        $username = $_POST ["username"];
        $pwd = $_POST ["pwd"];
        try {
            $conn = MysqlUtils::getPDOConnection ();
            $conn->beginTransaction ();
            $ps = $conn->prepare ( "insert into user (name,pwd)values(?,?)" );
            $ps->execute ( array (
                $username,
                md5 ( $pwd )
            ) );
            $conn->commit ();
            $count = $ps->rowCount ();
            if ($count > 0) {
                echo "{\"success\":true,\"desc\":\"用户创建成功\"}";
            } else {
                echo "{\"success\":true,\"desc\":\"用户创建失败，请重试\"}";
            }
        } catch ( \PDOException $e ) {
            // print_r($e);
            echo "{\"success\":false,\"desc\":\"未知错误，请重试\"}";
        }
        MysqlUtils::closePDOConnection($conn);

    }

    public function actionLogin() {
        $username = $_POST ["username"];
        $pwd = $_POST ["pwd"];
        try {
            $conn = MysqlUtils::getPDOConnection ();
            $conn->beginTransaction ();
            $ps = $conn->prepare ( "select id,pwd from user where name=?" );
            $ps->execute ( array (
                $username
            ) );
            $conn->commit ();
            $ps->setFetchMode ( PDO::FETCH_ASSOC );
            $result = $ps->fetchAll ();
            if (count ( $result ) > 0 && $result [0] ["pwd"] == md5 ( $pwd )) {
                echo "{\"success\":true,\"username\":\"" . $username . "\",\"userid\":\"" . $result [0] ["id"] . "\",\"desc\":\"用户登录成功，将自动跳转到主页\"}";
            } else {
                echo "{\"success\":false,\"desc\":\"用户名或密码错误，请重试\"}";
            }
        } catch ( \PDOException $e ) {
            // print_r($e);
            echo "{\"success\":false,\"desc\":\"未知错误，请重试\"}";
        }
        MysqlUtils::closePDOConnection ( $conn );
    }
}