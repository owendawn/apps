<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/14
 * Time: 14:07
 */

namespace app\controllers;


use app\core\base\BaseController;
use app\core\util\MysqlUtils;

class InitController extends BaseController
{
    function  __construct()
    {

    }

    public function actionInitconfigavailable()
    {
        $re = MysqlUtils::testDatabaseConnect();
        if ($re === true) {
            echo "{\"success\":true,\"inited\":true}";
        } else {
            return $this->render("//site/initconfig");
        }
    }

    public function actionInit()
    {
        $messages = [];
        $initsuccess = false;
        $testConnection = MysqlUtils::testConnection();
        if ($testConnection === true) {
            $testDatabaseConnect = MysqlUtils::testDatabaseConnect();
            if ($testDatabaseConnect === true) {
                $re = $this->initTablesOfMysql();
                $initsuccess = $re["success"];
                $messages = array_merge($messages, $re["message"]);
            } else {
                $this->tryCreateDatabaseIfNotExist();
                $testDatabaseConnect2 = MysqlUtils::testDatabaseConnect();
                if ($testDatabaseConnect2 === true) {
                    array_push($messages, json_decode("{\"message\":\"create new database of your databasename defined.\"}"));
                    $re = $this->initTablesOfMysql();
                    $initsuccess = $re["success"];
                    $messages = array_merge($messages, $re["message"]);
                } else {
                    array_push($messages, json_decode("{\"message\":\"can not create new database of your databasename defined. init database fail.\"}"));
                }
            }
        } else {
            array_push($messages, json_decode("{\"message\":\"" . $testConnection->getMessage() . "\"}"));
        }
        return [
            "initsuccess"=>($initsuccess == 1 ? true : false),
            "msg"=> json_encode($messages)
        ];
//        print("{\"success\":true,\"initsuccess.\":".($initsuccess==1?"true":"false").",\"msg\":".json_encode($messages)."}");
    }

    private function tryCreateDatabaseIfNotExist()
    {
        $cfg = require(dirname(__DIR__) . "/config/web.php");
        $config = $cfg["params"]["db"];
        $conn = new \yii\db\mssql\PDO('mysql:dbname=mysql;host=' . $config["host"], $config["user"], $config["pwd"]);
        return $conn->exec("create database if not exists `" . $config["dbname"] . "` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
    }

    private function testTableExist($table)
    {
        return MysqlUtils::excuteSqlAndReturnTrueOrExceptionArray("select count(*) from " . $table);
    }

    private function  initTablesOfMysql()
    {
        $cfg = require(dirname(__DIR__) . "/config/web.php");
        $config = $cfg["params"]["db"];
        $hadInit = true;
        $initsuccess = true;
        $message = [];
        if (!($this->testTableExist("user") === true)) {
            $hadInit = false;
            if (MysqlUtils::excuteSqlAndReturnTrueOrExceptionArray("create table if not exists " . $config["dbname"] . ".user(id int(20) auto_increment primary key,name varchar(20) unique,pwd varchar(50))") === true) {
                array_push($message, json_decode("{\"message\":\"table 'user' does not exist ,create new table 'user'.\"}"));
            } else {
                $initsuccess = false;
                array_push($message, json_decode("{\"message\":\"table 'user' does not exist ,create new table 'user'fail!\"}"));
            }
        }
        if (!($this->testTableExist("favorlist") === true)) {
            $hadInit = false;
            if (MysqlUtils::excuteSqlAndReturnTrueOrExceptionArray("create table if not exists " . $config["dbname"] . ".favorlist(id int(20) auto_increment primary key,userid int(20),link varchar(250),imglink varchar(250),linktitle varchar(50),week varchar(50),status int(10))") === true) {
                array_push($message, json_decode("{\"message\":\"table 'favorlist' does not exist ,create new table 'favorlist'.\"}"));
            } else {
                $initsuccess = false;
                array_push($message, json_decode("{\"message\":\"table 'favorlist' does not exist ,create new table 'favorlist' fail!\"}"));
            }
        }
        if (!($this->testTableExist("configure") === true)) {
            $hadInit = false;
            if (MysqlUtils::excuteSqlAndReturnTrueOrExceptionArray("create table if not exists " . $config["dbname"] . ".configure(id int(20) auto_increment primary key,keyname varchar(20),keyvalue varchar(50))") === true) {
                array_push($message, json_decode("{\"message\":\"table 'configure' does not exist ,create new table 'configurer'.\"}"));
            } else {
                $initsuccess = false;
                array_push($message, json_decode("{\"message\":\"table 'configure' does not exist ,create new table 'configurer' fail!\"}"));
            }
        }
        if ($hadInit) {
            array_push($message, json_decode("{\"message\":\"database has inited !\"}"));
        } else if ($hadInit === false && $initsuccess === false) {
            array_push($message, json_decode("{\"message\":\"database init fail!\"}"));
        } else {
            array_push($message, json_decode("{\"message\":\"database init success!\"}"));
        }
        return [
            "success" => $initsuccess,
            "message" => $message
        ];


    }
}

