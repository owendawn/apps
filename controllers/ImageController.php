<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/14
 * Time: 10:57
 */

namespace app\controllers;


use app\core\base\BaseController;
use app\core\util\ImgShotUtil;

class ImageController extends BaseController
{
    public $enableCsrfValidation = false;

    public function actionImagecrop()
    {
        return $this->render("imagecrop");
    }

    public function actionCropimage()
    {
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        $remarks = "";
        $targetpath = $_POST["targetpath"];
        $filename = $_POST["filename"];
        $temps = explode(".", $filename);
        $tempname = "temp-" . $temps[0] . "." . $extension;
        if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 40000) && in_array($extension, $allowedExts)) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                $response = '{"success":"false"}';
            } else {
                if (file_exists("../upload/" . $tempname)) {
                    $remarks = $remarks . "file already exists. override now .";
                }
                move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $tempname);
                $response = '{"success":"true","remarks":"' . $remarks . '","tempname":"' . $tempname . '"}';
            }
        } else {
            $response = '{"success":"false"}';
        }
        echo $response;
    }

    public function actionCrop(){
        $x1 = $_POST["x1"];
        $x2 = $_POST["x2"];
        $y1 = $_POST["y1"];
        $y2 = $_POST["y2"];
        $temppath = $_POST["temppath"];
        $tempname = $_POST["tempname"];
        $displaywidth = $_POST["displaywidth"];

        $obj = new ImgShotUtil();
        $obj->initialize("../upload/","../web/img/", $tempname, $x1, $y1, $x2, $y2, $displaywidth);
        $tojpg = true;
        $index = $obj->generate_shot($tojpg);
        echo '{"success":"' . ($index != false ? "true" : "false") . '"}';
    }
}