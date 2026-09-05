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


// Проверка формы
function validateForm(){
    const password = document.getElementsByName('password');
    const repeatPassword = document.getElementsByName('repeatPassword');
    if(password[0].value !== repeatPassword[0].value){
        document.getElementsByName('repeatPasswordError')[0].style.display = 'block';
        return false
    }
    
}
// Изменения размера сайдбара 
function wideSidebar(e){
    e.target.style.width = e.target.style.width == '300px'? '35px' : '300px';
}

// Переключение на ВХОД
function openLogin(e) {
    const login = document.querySelector('.login');
    const regForm = document.querySelector('.register');
    const activeButton = document.querySelector('button.active')
    activeButton.className = ''
    login.style.display = 'flex';
    regForm.style.display = 'none';
    if(!e.target.className.includes('active')){
        e.target.className += 'active';
    }
    
}
// Переключение на регистрацию
function openRegistration(e){
    const login = document.querySelector('.login');
    const regForm = document.querySelector('.register');
    const activeButton = document.querySelector('button.active')
    activeButton.className = ''
    login.style.display = 'none';
    regForm.style.display = 'flex';
    if(!e.target.className.includes('active')){
        e.target.className += 'active';
    }
}
// Закрытие формы поиска друзей
function closeAddFriendsForm(e){
    const modalWindow = document.getElementById('modal_form');
    modalWindow.close();
}
// Открытие формы поиска друзей
function openAddFriendsForm(){
    const modalWindow = document.getElementById('modal_form');
    modalWindow.showModal();
}

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

