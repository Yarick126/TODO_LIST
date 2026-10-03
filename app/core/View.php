<?php 
class View {

    function generatePage(string $content, array $data = []):void{
        $styles = 'style/' . substr($content, 0, strpos($content, '_template.php')) . '_styles.css';
        AssetsManager::addStyles($styles); // добавление стилей в глобальную переменную
        include 'app/view/template.php';
    }
}