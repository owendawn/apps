<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/14
 * Time: 13:48
 */
namespace app\core\util;

use yii\db\mssql\PDO;

class MysqlUtils
{
    private static $config = null;

    private static function initDbConfig()
    {
        $cfg = require(dirname(dirname(__DIR__)) . "/config/web.php");
        self::$config = $cfg["params"]["db"];
    }

    public static function testConnection()
    {
        self::initDbConfig();
        try {
            new \yii\db\mssql\PDO('mysql:host=' . self::$config["host"], self::$config["user"], self::$config["pwd"]);
            return true;
        } catch (\PDOException $e) {
//            var_dump($e);
            return $e;
        }
    }

    public static function testDatabaseConnect()
    {
        self::initDbConfig();
        try {
            new \yii\db\mssql\PDO('mysql:dbname=' . self::$config["dbname"] . ';host=' . self::$config["host"], self::$config["user"], self::$config["pwd"]);
            return true;
        } catch (\PDOException $e) {
            // var_dump($e);
            return $e;
        }
    }

    public static function getPDOConnection()
    {
        self::initDbConfig();
        $conn = new \yii\db\mssql\PDO('mysql:dbname=' . self::$config["dbname"] . ';host=' . self::$config["host"], self::$config["user"], self::$config["pwd"], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES'utf8';"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        return $conn;
    }

    public static function closePDOConnection($conn)
    {
        $conn = null;
    }

    public static function excuteSqlAndReturnTrueOrExceptionArray($sql)
    {
        $conn = MysqlUtils::getPDOConnection();
        try {
            if ($conn->exec($sql) === false) {
                MysqlUtils::closePDOConnection($conn);
                return ["success" => false, "message" => $conn->errorInfo()];
            } else {
               MysqlUtils::closePDOConnection($conn);
                return true;
            }
        } catch (PDOException $e) {
            return ["sucess" => false, "message" => $e];
        }
    }
}