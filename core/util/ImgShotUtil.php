<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/15
 * Time: 15:24
 */

namespace app\core\util;


class ImgShotUtil
{
    private $filename;
    private $path;
    private $target;
    private $ext;
    private $x;
    private $y;
    private $x1;
    private $y1;
    private $width = 300;
    private $height = 300;
    private $jpeg_quality = 90;
    private $scale;

    public function __construct()
    {
    }

    /**
     * 初始化截图对象
     * @param filename 源文件路径全明
     * @param width  截图的宽
     * @param height  截图的高
     * @param x  横坐标1
     * @param y  纵坐标1
     * @param x1  横坐标1
     * @param y1  横坐标2
     *
     */
    public function initialize($path, $target, $filename, $x, $y, $x1, $y1, $displaywidth)
    {
        if (file_exists($path . $filename)) {
            $this->path = $path;
            $this->target = $target;
            $this->filename = $filename;
            $pathinfo = pathinfo($filename);
            $this->ext = $pathinfo['extension'];
            $sizeinfo = getimagesize($path . $filename);
            $this->scale = $sizeinfo[0] / $displaywidth;
        } else {
            $e = new Exception('the file is not exists!', 1050);
            throw $e;
        }
        $this->x = $x * $this->scale;
        $this->y = $y * $this->scale;
        $this->x1 = $x1 * $this->scale;
        $this->y1 = $y1 * $this->scale;
    }

    /**
     * 生成截图
     * 根据图片的格式，生成不同的截图
     */
    public function generate_shot($tojpg)
    {

        // 生成各种格式的图片
        switch ($this->ext) {
            case 'jpg':
                return $this->generate_jpeg($tojpg);
                break;

            case 'png':
                return $this->generate_png($tojpg);
                break;

            case 'gif':
                return $this->generate_gif($tojpg);
                break;

            default:
                return false;
        }
    }

    /**
     * 得到生成jpeg格式图片
     *
     */
    private function generate_jpeg($tojpg)
    {
        $shot_name = $this->get_shot_name($tojpg);
        $img_r = imagecreatefromjpeg($this->path . $this->filename);
        $dst_r = ImageCreateTrueColor($this->width, $this->height);

        //获取原始图p片资源，存放在$dst_r中
        imagecopyresampled($dst_r, $img_r, 0, 0, $this->x, $this->y, $this->width, $this->height, $this->x1, $this->y1);
        imagejpeg($dst_r, $shot_name, $this->jpeg_quality);
        imagedestroy($dst_r);
        unlink($this->path . $this->filename);
        return $shot_name;
    }

    /**
     * 得到生成png格式图片
     *
     */
    private function generate_png($tojpg)
    {
        $isWhiteBg = true;
        $shot_name = $this->get_shot_name($tojpg);
        $img = imagecreatefrompng($this->path . $this->filename);
        $imgnew=null;

        if ($isWhiteBg === true) {
            $imgnew= ImageCreateTrueColor($this->width, $this->height);
            $white = imagecolorallocate($imgnew, 255, 255, 255);
            imagefilledrectangle($imgnew, 0, 0, $this->width, $this->height, $white);
            imagecolortransparent($imgnew, $white);
        } else {
            imagesavealpha($img,true);
            //不合并颜色，直接用透明色替代
            $imgnew= ImageCreateTrueColor($this->width, $this->height);
            imagealphablending($imgnew, false);
            imagesavealpha($imgnew,true);
        }

        imagecopyresampled($imgnew, $img, 0, 0, $this->x, $this->y, $this->width, $this->height, $this->x1, $this->y1);
        if ($tojpg) {
            imagejpeg($imgnew, $shot_name, $this->jpeg_quality);
        } else {
            imagepng($imgnew, $shot_name);
        }
        imagedestroy($imgnew);
        unlink($this->path . $this->filename);
        return $shot_name;
    }

    /**
     * 得到生成gif格式图片
     *
     */
    private function generate_gif($tojpg)
    {
        $shot_name = $this->get_shot_name($tojpg);
        $img_r = imagecreatefromgif($this->path . $this->filename);
        $dst_r = ImageCreateTrueColor($this->width, $this->height);

        //获取原始图p片资源，存放在$dst_r中
        imagecopyresampled($dst_r, $img_r, 0, 0, $this->x, $this->y, $this->width, $this->height, $this->x1, $this->y1);
        if ($tojpg) {
            imagejpeg($dst_r, $shot_name, $this->jpeg_quality);
        } else {
            imagegif($dst_r, $shot_name);
        }
        imagedestroy($dst_r);
        unlink($this->path . $this->filename);
        return $shot_name;
    }

    /**
     * 得到生成的截图的文件名
     *
     */
    private function get_shot_name($tojpg)
    {
        $pathinfo = pathinfo($this->path . $this->filename);
        $fileinfo = explode('.', $pathinfo['basename']);
        $filename = substr($fileinfo[0], 5) . '.' . $this->ext;
        if ($tojpg) {
            $filename = substr($fileinfo[0], 5) . '.jpg';
        }
        return $this->target . $filename;
    }
}