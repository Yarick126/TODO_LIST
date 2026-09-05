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

function closeAddFriendsForm(e){
    console.log(this);
    

    const modalWindow = document.getElementById('modal_form');
    modalWindow.close();
    
}

function openAddFriendsForm(){
    const modalWindow = document.getElementById('modal_form');
    modalWindow.showModal();
}


function setDarkMode() {
    const body = document.body;
    if(body.classList.contains('dark_mode')){
        return
    }
    body.classList.toggle('dark_mode');

    localStorage.setItem('mode','dark');
}

function setLightMode(){
    const body = document.body;
    body.classList.remove('dark_mode');
    
    localStorage.setItem('mode','light')
}
const mode = localStorage.getItem('mode');
if (mode === 'dark') {
  document.body.classList.add('dark_mode');
}

function findUser(){
    const container = document.querySelector('.friends_items_list');
    const field = document.querySelector('.searchFriendInput');
    console.log(field);
    
    for (let i = 0; i < container.children.length; i++) {
        if(container.children[i].text.includes(field.value)){
            console.log(container.children[i].text);
        }
    }
    
}