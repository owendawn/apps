<?php
namespace app\core\util;
class FileUtil
{
    public static function getFileContent($url) {
        $file = fopen($url, "r") or exit("Unable to open file!");
        $content = "";
        
        //Output a line of the file until the end is reached
        while (!feof($file)) {
            $content.= fgets($file);
        }
        return $content;
    }

}
?>