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
    //FOR VIDEO CONTAINER IN LANDING PAGE
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
    });

    //POLLS ROLLOVER EFFECT
    let pollVotesArray = [].slice.call(document.getElementsByClassName('poll'));
    
    pollVotesArray.forEach((poll) => {
        poll.addEventListener('mouseenter', () => {
            let hasClass = poll.children[0].children[1];
            hasClass.classList.remove('hide');
        });
        poll.addEventListener('mouseleave', () => {
            let hasClass = poll.children[0].children[1];
            hasClass.classList.add('hide');
        })
    })

    //TOGGLE POLL RESULT

    let pollResult = document.querySelector('.poll-result_single');
    let pollResultButton = document.querySelector('.poll-results');
    let pollCloseButton = document.querySelector('.poll-result-close')


    let toggleResult = () => {
        event.preventDefault();
        pollResultClassList= [].slice.call(pollResult.classList);
        classListArray = pollResultClassList.filter((cl) => {
            return cl === 'hide';
        })
        if (classListArray.length > 0){
            pollResult.classList.remove('hide');
            pollResult.classList.add('show');
        } else {
            pollResult.classList.add('hide');
            pollResult.classList.remove('show');
        }
    }
    
    pollResultButton.addEventListener('click', (event) => {
      toggleResult();    
    });
    pollCloseButton.addEventListener('click', (event) => {
        toggleResult();    
    })

})
