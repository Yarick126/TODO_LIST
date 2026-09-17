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

function pressedLink(e){
    e.removeAttribute('href');
    e.style.pointerEvents = 'none';
    e.style.opacity = '0.6';
    
}