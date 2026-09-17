// Установка темной темы
function setDarkMode() {
    const body = document.body;
    if(body.classList.contains('dark_mode')){
        return
    }
    body.classList.toggle('dark_mode');

    localStorage.setItem('mode','dark');
}
// Установка светлой темы
function setLightMode(){
    const body = document.body;
    body.classList.remove('dark_mode');
    
    localStorage.setItem('mode','light')
}