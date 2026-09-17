// Открытие формы, если пользователь нажал "Найти"
if(location.href.substring(location.href.indexOf('on=')+3).includes('findFriend')){
    const modalWindow = document.getElementById('modal_form');
    modalWindow.showModal();
}

// Проверка темы
const mode = localStorage.getItem('mode');
if (mode === 'dark') {
  document.body.classList.add('dark_mode');
}

// Изменения размера сайдбара 
function wideSidebar(e){
    e.target.style.width = e.target.style.width == '300px'? '58px' : '300px';
}
