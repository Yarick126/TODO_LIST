<div class="settings_page">
    <?php AssetsManager::addScripts('http://localhost:8080/todo-list/scripts/settings_scripts.js')?>
    <h1>НАСТРОЙКИ</h1>
    <hr color="#0f0f83">
    <div class="mode">
        <span>ТЕМА</span>
        <button onclick="setLightMode()">СВЕТЛАЯ</button>
        <button onclick="setDarkMode()">ТЕМНАЯ</button>
    </div>
    <?php AssetsManager::renderScripts()?>
</div>