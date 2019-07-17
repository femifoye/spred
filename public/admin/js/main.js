document.addEventListener('DOMContentLoaded', (event) => {
    let adminMenuBtn = document.querySelector('.mobile-menu-button');
    let adminMenu = document.querySelector('.page-mobile-header-flex')
    adminMenuBtn.addEventListener('click', (e) => {
        let getClassList = [].slice.call(adminMenu.classList);
        let hasClass = getClassList.filter((cls) => {
            return cls === 'hide';
        })
        if(hasClass.length > 0){
            adminMenu.classList.remove('hide');
        } else {
            adminMenu.classList.add('hide');
        }
    })
})