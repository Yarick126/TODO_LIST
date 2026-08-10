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