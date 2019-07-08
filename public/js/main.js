document.addEventListener('DOMContentLoaded', () => {
    let menuButton = document.querySelector('.menu-button');
    let menuFullScreen = document.querySelector('.menu-fscreen');
    let menuFullScreenWrap = document.querySelector('.menu-fscreen-wrap');
    let menuClose = document.querySelector('.menu-close');
    let menuBars = [].slice.call(document.getElementsByClassName('menu-bar'));
    let menuListItem = [].slice.call(document.getElementsByClassName('menu-list-item'));

    //EVENT LISTENERS
    menuButton.addEventListener('click', () => {
        
        menuFullScreen.style.display = "block";
        setTimeout(() => {
            menuClose.style.display = "block";
        }, 1000)

    })
     menuClose.addEventListener('click', () => {
        menuFullScreen.style.display = "none";
    })
    menuListItem.forEach((item) => {
        item.addEventListener('mouseenter', () => {
            item.classList.add('bg-invert');
        })
        item.addEventListener('mouseleave', () => {
            item.classList.remove('bg-invert');
        })
    })

    //CHANGE IFRAME WIDTH
    let iFrames = [].slice.call(document.getElementsByTagName('iframe'));
    let mediumFrame = [].slice.call(document.getElementsByClassName('video-container-md'));
    let largeFrame = [].slice.call(document.getElementsByClassName('video-container-lg'));

    largeFrame.forEach((frame) => {
        frame.children[0].style.width = "100%";
        frame.children[0].style.height = "100%";
    })
    mediumFrame.forEach((frame) => {
        frame.children[0].style.width = "100%";
        frame.children[0].style.height = "auto";
    })
    
})