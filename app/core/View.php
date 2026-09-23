<?php 
class View {

    function generatePage($content, $data = null){
        $styles = 'style/' . substr($content, 0, strpos($content, '_template.php')) . '_styles.css';
        AssetsManager::addStyles($styles); // добавление стилей в глобальную переменную
        include 'app/view/template.php';
    }
}