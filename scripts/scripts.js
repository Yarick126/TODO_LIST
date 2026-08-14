function validateForm(){
    const password = document.getElementsByName('password');
    const repeatPassword = document.getElementsByName('repeatPassword');
    if(password[0].value !== repeatPassword[0].value){
        document.getElementsByName('repeatPasswordError')[0].style.display = 'block';
        return false
    }
    
}

function wideSidebar(e){
    e.target.style.width = e.target.style.width == '300px'? '35px' : '300px';
}

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


function setDarkMode() {
    localStorage.setItem('mode','dark')
}

function setLightMode(){
    localStorage.setItem('mode','light')
}