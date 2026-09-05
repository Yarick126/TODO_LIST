<?php 

class AssetsManager {
    public static $jsSrc = [];
    public static $styleSrc = [];

    public static function addScripts($src){
        self::$jsSrc[] = $src;
    }

    public static function renderScripts(){
        foreach(self::$jsSrc as $src){
            echo "<script src=\"$src\"> </script>";
        }
    }

    public static function addStyles($src){
        self::$styleSrc[] = $src;
    }

    public static function renderStyle(){
        foreach(self::$jsSrc as $src){
            echo "<link rel=\"stylesheet\" href=\"$src\">";
        }
    }
}