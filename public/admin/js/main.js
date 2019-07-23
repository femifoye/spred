document.addEventListener('DOMContentLoaded', (event) => {
    let adminMenuBtn = document.querySelector('.mobile-menu-button');
    let adminMenu = document.querySelector('.page-mobile-header-flex');
    let pageBody = document.getElementsByTagName('body');
    let optionAddCat = document.getElementById('category');
    if(optionAddCat) {
        let optionAddCatArr = [].slice.call(optionAddCat);
    }

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
    if(optionAddCat) {
        optionAddCat.addEventListener('change', () => {
            if(optionAddCat.value === 'null') {
                window.location = '/admin/categories/create';
            }
        })
    }
  
    //POLL ADD OPTION FEATURE
    let addOption = document.getElementById('btn-add-option');
    addOption.addEventListener('click', (event) => {
        event.preventDefault();
        let pollOptions = document.getElementById('poll-options');
        let pollOptionsLength = pollOptions.children.length;
        
        let lastChild = pollOptions.children[pollOptionsLength - 1];
        let lastDataValue = lastChild.children[0].dataset.option;
        let newDataValue = parseInt(lastDataValue) + 1;
        let controlForm = document.createElement('div');
        controlForm.classList.add('control-form');
        let formOption = document.createElement('input');
        formOption.setAttribute('type', 'text');
        formOption.setAttribute('name', `poll_option_title_${newDataValue}`);
        formOption.setAttribute('id', `poll_option_title_${newDataValue}`);
        formOption.setAttribute('placeholder', `Enter Option ${newDataValue}`);
        formOption.setAttribute('data-option', `${newDataValue}`);
        controlForm.appendChild(formOption)
        console.log(controlForm)
        pollOptions.appendChild(controlForm)
        //console.log(pollOptions.children[pollOptions.length - 1])

    })
})