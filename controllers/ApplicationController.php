<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/14
 * Time: 11:13
 */

namespace app\controllers;


use app\core\base\BaseController;
use app\core\util\MysqlUtils;
use yii\db\mssql\PDO;

class ApplicationController extends BaseController
{
    public  $useDefaultBg=false;
    public function actionIndex()
    {
        $this->useDefaultBg=true;
        return $this->render("index");
    }

    public function actionListedit()
    {
        return $this->render("listedit");
    }

    public function  actionGetfavorlist()
    {
        $id = $_POST ["id"];
        $imgpath="../web/img/";
        $imgurlpath="/apps/web/img/";
        echo "{\"success\":true,\"data\":" . json_encode(self::loadUrl2($imgpath,$imgurlpath,self::getUrlinfo($id))) . ",\"logs\":" . (json_encode($this->logs)==""?"[]": json_encode($this->logs)) . "}";
    }


    public $logs = array();

    private function remoteFileExist($url)
    {
        $ch = curl_init();
        $timeout = 10;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        $contents = curl_exec($ch);

        if (preg_match("/200/", $contents)) {
            return true;
        } else {
            return false;
        }
    }

    private function getUrlinfo($id)
    {
        try {
            $conn = MysqlUtils::getPDOConnection ();
            $conn->beginTransaction ();
            $ps = $conn->prepare ( "select a.id,link,linktitle,imglink from favorlist a inner join user b on a.userid=b.id where status=1 and userid=? order by a.week asc" );
            $ps->execute ( array (
                intval ( $id )
            ) );
            $ps->setFetchMode ( PDO::FETCH_ASSOC );
            $conn->commit ();
            $result = $ps->fetchAll ();
            return $result;
        } catch ( \PDOException $e ) {
            print_r ( $e );
            return null;
        }
    }

    private function updateImglinkById($imglink,$id){
        try {
            $conn = MysqlUtils::getPDOConnection ();
            $conn->beginTransaction ();
            $ps = $conn->prepare ( "update favorlist set imglink=? where id=? " );
            $ps->execute ( array (
                $imglink,
                intval ( $id )
            ) );
            $ps->setFetchMode ( PDO::FETCH_ASSOC );
            $conn->commit ();
            return true;
        } catch ( \PDOException $e ) {
            print_r ( $e );
            return false;
        }
    }


    //爬取图片不下载
    private function loadUrl2($imgpath,$imgurlpath,$infs)
    {
        ini_set('max_execution_time', '60');
        for ($i = 0; $i < count($infs); $i += 1) {
            if ($infs [$i] ["imglink"]!=null) {
                $infs [$i] ["linknew"] = $infs [$i] ["imglink"];
                if($imgurlpath . urlencode(urlencode($infs [$i] ["link"])) . ".hot.jpg"==$infs [$i] ["imglink"]){
                    $infs [$i] ["style"] = "left: 50%;margin-left: -518px;height: 228px;clip: rect(0px 603px 300px 433px);position:absolute;";
                }
            } else {
                $head = @get_headers($infs [$i] ["link"]);
                if (strpos($head [0], "200 OK") !== false) {
                    $file = fopen($infs [$i] ["link"], "r") or exit ("Unable to open file!");
                } else {
                    array_push($this->logs, $infs [$i] ["linktitle"] . "[" . $infs [$i] ["link"] . "]:该地址不可用！");
                    array_splice($infs, $i, 1);
                    $i--;
                    continue;
                }
                $append = false;
                $ishot = false;
                $contexts = "";
                while (!feof($file)) {
                    $line = fgets($file);
                    if (strstr($line, 'id="posterContainer"', false) != "") {
                        $append = true;
                    }
                    if (strstr($line, 'id="showtv-intro"', false) != "") {
                        $append = true;
                        $ishot = true;
                    }
                    if ($append) {
                        if ($ishot) {
                            $contexts .= $line;
                            if (strstr($line, '<div class="container">', false) != "") {
                                $regexp = '/(?:.*id="showtv-intro" style="background-image:url\()?(http:\/\/[^\(\)]+)+(?:\);.*">.*)+/';
                                preg_match($regexp, str_replace(array(
                                    "\r\n",
                                    "\r",
                                    "\n"
                                ), "", $contexts), $back);
                                $urlold = $back [1];
                                $pathnew = $imgpath . urlencode($infs [$i] ["link"]) . ".hot.jpg";
                                $urlnew = $imgurlpath . urlencode(urlencode($infs [$i] ["link"])) . ".hot.jpg";
                                if (self::remoteFileExist($urlold)) {
                                    ob_start();
                                    readfile($urlold);
                                    $img = ob_get_contents();
                                    ob_end_clean();
                                    $fp2 = fopen($pathnew, "w");
                                    fwrite($fp2, $img);
                                    fclose($fp2);
                                }
                                $this->updateImglinkById($urlnew,$infs [$i] ["id"]);
                                $infs [$i] ["linknew"] = $urlnew;
                                $infs [$i] ["imglink"] = $urlnew;
                                $infs [$i] ["style"] = "left: 50%;margin-left: -518px;height: 228px;clip: rect(0px 603px 300px 433px);position:absolute;";
                                $append = false;
                                break;
                            }
                        } else {
                            $contexts .= $line;
                            if (strstr($line, '/>', false) != "") {
                                $regexp = '/(?:.+id="posterContainer"\>\<img .* src=")([^\"]+)(?:" .* \/\>.*)/';
                                preg_match($regexp, str_replace(array(
                                    "\r\n",
                                    "\r",
                                    "\n"
                                ), "", $contexts), $back);
                                $urlold = $back [1];
                                $this->updateImglinkById($urlold,$infs [$i] ["id"]);
                                $infs [$i] ["linknew"] = $urlold;
                                $infs [$i] ["imglink"] = $urlold;
                                $infs [$i] ["style"] = "height: 228px;";
                                $contexts = "";
                                $append = false;
                                break;
                            }
                        }
                    }
                }
                fclose($file);
            }
        }
        return $infs;
    }

    //爬取图片并下载
    private function loadUrl($imgpath,$imgurlpath,$infs)
    {
        ini_set('max_execution_time', '60');
        for ($i = 0; $i < count($infs); $i += 1) {
            if (file_exists($imgpath. urlencode($infs [$i] ["link"]) . ".hot.jpg")) {
                $infs [$i] ["linknew"] = $imgurlpath . urlencode(urlencode($infs [$i] ["link"])) . ".hot.jpg";
                $infs [$i] ["style"] = "left: -433px;height: 228px;clip: rect(0px 603px 300px 433px);position:absolute;";
            } else if (file_exists($imgpath . urlencode($infs [$i] ["link"]) . ".jpg")) {
                $infs [$i] ["linknew"] = $imgurlpath . urlencode(urlencode($infs [$i] ["link"])) . ".jpg";
                $infs [$i] ["style"] = "height: 228px;";
            } else {
                $head = @get_headers($infs [$i] ["link"]);
                if (strpos($head [0], "200 OK") !== false) {
                    $file = fopen($infs [$i] ["link"], "r") or exit ("Unable to open file!");
                } else {
                    array_push($this->logs, $infs [$i] ["linktitle"] . "[" . $infs [$i] ["link"] . "]:该地址不可用！");
                    array_splice($infs, $i, 1);
                    $i--;
                    continue;
                }
                $append = false;
                $ishot = false;
                $contexts = "";
                while (!feof($file)) {
                    $line = fgets($file);
                    if (strstr($line, 'id="posterContainer"', false) != "") {
                        $append = true;
                    }
                    if (strstr($line, 'id="movie-intro"', false) != "") {
                        $append = true;
                        $ishot = true;
                    }
                    if ($append) {
                        if ($ishot) {
                            $contexts .= $line;
                            if (strstr($line, '<div class="container">', false) != "") {
                                $regexp = '/(?:.*id="movie-intro" style="background-image:url\()?(http:\/\/[^\(\)]+)+(?:\);.*">.*)+/';
                                preg_match($regexp, str_replace(array(
                                    "\r\n",
                                    "\r",
                                    "\n"
                                ), "", $contexts), $back);
                                $urlold = $back [1];
                                $pathnew = $imgpath . urlencode($infs [$i] ["link"]) . ".hot.jpg";
                                $urlnew = $imgurlpath . urlencode(urlencode($infs [$i] ["link"])) . ".hot.jpg";
                                if (self::remoteFileExist($urlold)) {
                                    ob_start();
                                    readfile($urlold);
                                    $img = ob_get_contents();
                                    ob_end_clean();
                                    $fp2 = fopen($pathnew, "w");
                                    fwrite($fp2, $img);
                                    fclose($fp2);
                                }

                                $infs [$i] ["linknew"] = $urlnew;
                                $infs [$i] ["style"] = "left: -433px;height: 228px;clip: rect(0px 603px 300px 433px);position:absolute;";
                                $append = false;
                                break;
                            }
                        } else {
                            $contexts .= $line;
                            if (strstr($line, '/>', false) != "") {
                                $regexp = '/(?:.+id="posterContainer"\>\<img .* src=")([^\"]+)(?:" .* \/\>.*)/';
                                preg_match($regexp, str_replace(array(
                                    "\r\n",
                                    "\r",
                                    "\n"
                                ), "", $contexts), $back);
                                $urlold = $back [1];
                                $pathnew = $imgpath . urlencode($infs [$i] ["link"]) . ".jpg";
                                $urlnew = $imgurlpath . urlencode(urlencode($infs [$i] ["link"])) . ".jpg";
                                if (self::remoteFileExist($urlold)) {
                                    ob_start();
                                    readfile($urlold);
                                    $img = ob_get_contents();
                                    ob_end_clean();
                                    $fp2 = fopen($pathnew, "w");
                                    fwrite($fp2, $img);
                                    fclose($fp2);
                                }
                                $infs [$i] ["linknew"] = $urlnew;
                                $infs [$i] ["style"] = "height: 228px;";
                                $contexts = "";
                                $append = false;
                                break;
                            }
                        }
                    }
                }
                fclose($file);
            }
        }
        return $infs;
    }

    public  function actionGetfavortables() {
        $start = $_POST ["iDisplayStart"];
        $length = $_POST ["iDisplayLength"];
        $echo = $_POST ["sEcho"];
        $sorttype = $_POST ["sSortDir_0"];
        $col = $_POST ["mDataProp_" . $_POST ["iSortCol_0"]];
        $hasnew = $_POST ["hasnew"];
        $userid = $_POST ["userid"];
        try {
            $conn = MysqlUtils::getPDOConnection ();
            $conn->beginTransaction ();
            $ps = $conn->prepare ( "select * from favorlist where status=1 and userid=? order by " . $col . " " . $sorttype . " limit " . $start . "," . $length . "" );
            $ps->execute ( array (
                $userid
            ) );
            $conn->commit ();
            $ps->setFetchMode ( PDO::FETCH_ASSOC );
            $result = $ps->fetchAll ();
            $query = $conn->query ( "select count(*) as counts from favorlist where status=1 and userid=" . $userid );
            $query->setFetchMode ( PDO::FETCH_ASSOC );
            $result2 = $query->fetchAll ();
            $counts = $result2 [0] ["counts"];
            if ($hasnew == "true") {
                if (count ( $result ) == $length) {
                    array_pop ( $result );
                    array_unshift ( $result, array (
                        "id" => "new",
                        "userid" => null,
                        "link" => "",
                        "linktitle" => "",
                        "week" => "0",
                        "status" => "1"
                    ) );
                } else {
                    array_unshift ( $result, array (
                        "id" => "new",
                        "userid" => null,
                        "link" => "",
                        "linktitle" => "",
                        "week" => "0",
                        "status" => "1"
                    ) );
                }
            }
            echo "{\"aaData\":" . json_encode ( $result ) . ",\"iTotalDisplayRecords\":" . $counts . ",\"iTotalRecords\":" . count ( $result ) . ",\"sEcho\":" . $echo . "}";
        } catch ( \PDOException $e ) {
            print_r ( $e );
            echo "{\"success\":false,\"add\":false,\"update\":false}";
        }
        MysqlUtils::closePDOConnection ( $conn );
    }

    public function actionGettrashfavorlist() {
        $start = $_POST ["iDisplayStart"];
        $length = $_POST ["iDisplayLength"];
        $echo = $_POST ["sEcho"];
        $sorttype = $_POST ["sSortDir_0"];
        $col = $_POST ["mDataProp_" . $_POST ["iSortCol_0"]];
        $userid = $_POST ["userid"];
        try {
            $conn = MysqlUtils::getPDOConnection ();
            $conn->beginTransaction ();
            $ps = $conn->prepare ( "select * from favorlist where status=0 and userid=? order by " . $col . " " . $sorttype . " limit " . $start . "," . $length . "" );
            $ps->execute ( array (
                $userid
            ) );
            $conn->commit ();
            $ps->setFetchMode ( PDO::FETCH_ASSOC );
            $result = $ps->fetchAll ();
            $query = $conn->query ( "select count(*) as counts from favorlist where status=0 and userid=" . $userid );
            $query->setFetchMode ( PDO::FETCH_ASSOC );
            $result2 = $query->fetchAll ();
            $counts = $result2 [0] ["counts"];
            echo "{\"aaData\":" . json_encode ( $result ) . ",\"iTotalDisplayRecords\":" . $counts . ",\"iTotalRecords\":" . count ( $result ) . ",\"sEcho\":" . $echo . "}";
        } catch ( \PDOException $e ) {
            print_r ( $e );
            echo "{\"success\":false,\"add\":false,\"update\":false}";
        }
        MysqlUtils::closePDOConnection ( $conn );
    }

    public function actionAddorupdatefavorlist() {
        $resource = $_POST ["resource"];
        $userid = $_POST ["userid"];
        try {
            $conn = MysqlUtils::getPDOConnection ();
            $conn->beginTransaction ();
            if (trim ( $resource [3] ) == "new") {
                $ps = $conn->prepare ( "insert into favorlist (week,link,linktitle,status,userid) values(?,?,?,?,?)" );
                array_pop ( $resource );
                array_push ( $resource, 1, $userid );
                $ps->execute ( $resource );
                $conn->commit ();
                echo "{\"success\":true,\"add\":true,\"update\":false}";
            } else {
                $ps = $conn->prepare ( "update favorlist set week=?, link=?,linktitle=? where id=? " );
                $ps->execute ( $resource );
                $conn->commit ();
                echo "{\"success\":true,\"add\":false,\"update\":true}";
            }
        } catch ( \PDOException $e ) {
            print_r ( $e );
            echo "{\"success\":false,\"add\":false,\"update\":false}";
        }
        MysqlUtils::closePDOConnection ( $conn );
    }

    private function getFavorById($id){
        try {
            $conn = MysqlUtils::getPDOConnection ();
            $conn->beginTransaction ();

            $ps = $conn->prepare ( "select * from favorlist where id=? " );
            $ps->execute ( array (
                $id
            ) );
            $conn->commit ();
            $ps->setFetchMode ( PDO::FETCH_ASSOC );
            $result = $ps->fetchAll ();
            return $result;
        } catch (\ PDOException $e ) {
            print_r ( $e );
            return null;
        }
    }
    public function actionDeletefavorlist() {
        $imgpath="../web/img/";
        $imgurlpath="/apps/web/img/";
        $id = $_POST ["id"];
        $f=$this->getFavorById($id);
        if (file_exists ( $imgpath . urlencode ( $f[0]["link"] ) . ".hot.jpg" )) {
            unlink($imgpath . urlencode ( $f[0]["link"] ) . ".hot.jpg");
        }
//        if (file_exists ( $imgpath . urlencode ( $f[0]["link"] ) . ".jpg" )) {
//            unlink($imgpath . urlencode ( $f[0]["link"] ) . ".jpg");
//        }

        try {
            $conn = MysqlUtils::getPDOConnection ();
            $conn->beginTransaction ();

            $ps = $conn->prepare ( "delete from  favorlist where id=? " );
            $ps->execute ( array (
                $id
            ) );
            $conn->commit ();
            echo "{\"success\":true,\"add\":false,\"update\":true}";
        } catch ( \PDOException $e ) {
            print_r ( $e );
            echo "{\"success\":false,\"add\":false,\"update\":false}";
        }
        MysqlUtils::closePDOConnection ( $conn );
    }

    public function actionDeletefakefavorlist() {
        $id = $_POST ["id"];
        try {
            $conn = MysqlUtils::getPDOConnection ();
            $conn->beginTransaction ();

            $ps = $conn->prepare ( "update favorlist set status=? where id=? " );
            $ps->execute ( array (
                0,
                $id
            ) );
            $conn->commit ();
            echo "{\"success\":true,\"add\":false,\"update\":true}";
        } catch ( \PDOException $e ) {
            print_r ( $e );
            echo "{\"success\":false,\"add\":false,\"update\":false}";
        }
        MysqlUtils::closePDOConnection ( $conn );
    }
    public static function actionUpdatefavorlistofreducte() {
        $id = $_POST ["id"];
        try {
            $conn = MysqlUtils::getPDOConnection ();
            $conn->beginTransaction ();

            $ps = $conn->prepare ( "update favorlist set status=? where id=? " );
            $ps->execute ( array (
                1,
                $id
            ) );
            $conn->commit ();
            echo "{\"success\":true,\"add\":false,\"update\":true}";
        } catch ( \PDOException $e ) {
            print_r ( $e );
            echo "{\"success\":false,\"add\":false,\"update\":false}";
        }
        MysqlUtils::closePDOConnection ( $conn );
    }
//    private function parseUrl($infs)
//    {
//        ini_set('max_execution_time', '60');
//        for ($i = 0; $i < count($infs); $i += 1) {
//            $head = @get_headers($infs [$i] ["link"]);
//            if (strpos($head [0], "200 OK") !== false) {
//                $file = fopen($infs [$i] ["link"], "r") or exit ("Unable to open file!");
//            } else {
//                array_push($this->logs, $infs [$i] ["linktitle"] . "[" . $infs [$i] ["link"] . "]:该地址不可用！");
//                array_splice($infs, $i, 1);
//                $i--;
//                continue;
//            }
//            $append = false;
//            $ishot = false;
//            $contexts = "";
//            while (!feof($file)) {
//                $line = fgets($file);
//                if (strstr($line, 'id="posterContainer"', false) != "") {
//                    $append = true;
//                }
//                if (strstr($line, 'id="movie-intro"', false) != "") {
//                    $append = true;
//                    $ishot = true;
//                }
//                if ($append) {
//                    if ($ishot) {
//                        $contexts .= $line;
//                        if (strstr($line, '<div class="container">', false) != "") {
//                            $regexp = '/(?:.*id="movie-intro" style="background-image:url\()?(http:\/\/[^\(\)]+)+(?:\);.*">.*)+/';
//                            preg_match($regexp, str_replace(array(
//                                "\r\n",
//                                "\r",
//                                "\n"
//                            ), "", $contexts), $back);
//                            $urlold = $back [1];
//                            // $arr = getimagesize($urlnew);
//                            // $mime=$arr['mime'];
//                            $mime = image_type_to_mime_type(exif_imagetype($urlold));
//                            // $mime=mime_content_type($urlnew);//跨域报错
//
//                            $content = file_get_contents($urlold);
//
//                            // $ch = curl_init();
//                            // curl_setopt($ch, CURLOPT_URL, $urlold);
//                            // // 返回结果
//                            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//                            // curl_setopt($ch, CURLOPT_HEADER, 0);
//                            // curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//以数据流的方式返回数据,当为false是直接显示出来
//                            // // 结果
//                            // $content = curl_exec($ch);
//                            // curl_close($ch);
//
//                            $urlnew = "data:{" . $mime . "};base64," . base64_encode($content);
//                            $infs [$i] ["linknew"] = $urlnew;
//                            $infs [$i] ["style"] = "left: -433px;height: 228px;clip: rect(0px 603px 300px 433px);position:absolute;";
//                            $append = false;
//                            break;
//                        }
//                    } else {
//                        $contexts .= $line;
//                        if (strstr($line, '/>', false) != "") {
//                            $regexp = '/(?:.+id="posterContainer"\>\<img .* src=")([^\"]+)(?:" .* \/\>.*)/';
//                            preg_match($regexp, str_replace(array(
//                                "\r\n",
//                                "\r",
//                                "\n"
//                            ), "", $contexts), $back);
//                            $urlnew = $back [1];
//                            $infs [$i] ["linknew"] = $urlnew;
//                            $infs [$i] ["style"] = "height: 228px;";
//                            $contexts = "";
//                            $append = false;
//                            break;
//                        }
//                    }
//                }
//            }
//            fclose($file);
//        }
//
//        return $infs;
//    }


}