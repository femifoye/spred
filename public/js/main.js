document.addEventListener('DOMContentLoaded', () => {
    let menuButton = document.querySelector('.menu-button');
    let menuFullScreen = document.querySelector('.menu-fscreen');
    let menuFullScreenWrap = document.querySelector('.menu-fscreen-wrap');
    let menuClose = document.querySelector('.menu-close');
    let menuBars = [].slice.call(document.getElementsByClassName('menu-bar'));
    menuButton.addEventListener('click', () => {
        
        menuFullScreen.style.display = "block";
        setTimeout(() => {
            menuClose.style.display = "block";
        }, 1000)

    })
     menuClose.addEventListener('click', () => {
        menuFullScreen.style.display = "none";
    })
})