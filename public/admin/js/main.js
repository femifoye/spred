document.addEventListener('DOMContentLoaded', (event) => {
    let adminMenuBtn = document.querySelector('.mobile-menu-button');
    let adminMenu = document.querySelector('.page-mobile-header-flex');
    let pageBody = document.getElementsByTagName('body');
    let optionAddCat = document.getElementById('category');
    let optionAddCatArr = [].slice.call(optionAddCat);

    adminMenuBtn.addEventListener('click', (e) => {
        let getClassList = [].slice.call(adminMenu.classList);
        let hasClass = getClassList.filter((cls) => {
            return cls === 'hide';
        })
        if(hasClass.length > 0){
            adminMenu.classList.remove('hide');
            pageBody[0].classList.add('body-fixed');
        } else {
            adminMenu.classList.add('hide');
            pageBody[0].classList.remove('body-fixed');
        }
    })

    optionAddCat.addEventListener('change', () => {
        if(optionAddCat.value === 'null') {
            window.location = '/admin/categories/create';
        }
    })
})