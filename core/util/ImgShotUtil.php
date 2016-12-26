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
     * ��ʼ����ͼ����
     * @param filename Դ�ļ�·��ȫ��
     * @param width  ��ͼ�Ŀ�
     * @param height  ��ͼ�ĸ�
     * @param x  ������1
     * @param y  ������1
     * @param x1  ������1
     * @param y1  ������2
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
     * ���ɽ�ͼ
     * ����ͼƬ�ĸ�ʽ�����ɲ�ͬ�Ľ�ͼ
     */
    public function generate_shot($tojpg)
    {

        // ���ɸ��ָ�ʽ��ͼƬ
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
     * �õ�����jpeg��ʽͼƬ
     *
     */
    private function generate_jpeg($tojpg)
    {
        $shot_name = $this->get_shot_name($tojpg);
        $img_r = imagecreatefromjpeg($this->path . $this->filename);
        $dst_r = ImageCreateTrueColor($this->width, $this->height);

        //��ȡԭʼͼpƬ��Դ�������$dst_r��
        imagecopyresampled($dst_r, $img_r, 0, 0, $this->x, $this->y, $this->width, $this->height, $this->x1, $this->y1);
        imagejpeg($dst_r, $shot_name, $this->jpeg_quality);
        imagedestroy($dst_r);
        unlink($this->path . $this->filename);
        return $shot_name;
    }

    /**
     * �õ�����png��ʽͼƬ
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
            //���ϲ���ɫ��ֱ����͸��ɫ���
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
     * �õ�����gif��ʽͼƬ
     *
     */
    private function generate_gif($tojpg)
    {
        $shot_name = $this->get_shot_name($tojpg);
        $img_r = imagecreatefromgif($this->path . $this->filename);
        $dst_r = ImageCreateTrueColor($this->width, $this->height);

        //��ȡԭʼͼpƬ��Դ�������$dst_r��
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
     * �õ����ɵĽ�ͼ���ļ���
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