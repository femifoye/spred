document.addEventListener('DOMContentLoaded', () => {
    let menuButton = document.querySelector('.menu-button');
    let menuFullScreen = document.querySelector('.menu-fscreen');
    let menuFullScreenWrap = document.querySelector('.menu-fscreen-wrap');
    let menuClose = document.querySelector('.menu-close');
    let menuBars = [].slice.call(document.getElementsByClassName('menu-bar'));
    let menuListItem = [].slice.call(document.getElementsByClassName('menu-list-item'));

    let toggleHide = (el) => {
        el.classList.toggle('hide');
    }

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
    
    if(pollResultButton) {
        pollResultButton.addEventListener('click', (event) => {
            toggleResult();    
          });
    }
    if(pollCloseButton) {
        pollCloseButton.addEventListener('click', (event) => {
            toggleResult();    
        })
    }
    
    

    //FORUM PAGE BACKGROUND SECTION TILE
    let forumContent = [].slice.call(document.getElementsByClassName('forum-body_content'));
    console.log(forumContent);
    let count = 0;
    forumContent.forEach((content) => {
        let checkCount = count / 2;
        if(Number.isInteger(checkCount)){
            content.classList.add('forum_grey_bg');
        }
        count++
    })

    //FORUM PAGE CATEGORY WRAP TOGGLE
    let toggleCat = document.querySelector('.filter_category');
    let catWrapper = document.querySelector('.forum_categories_wrap');
    if(toggleCat) {
        toggleCat.addEventListener('click', () => {
            toggleHide(catWrapper);
        })
    }
    

    //FORUM PAGE MODAL TOGGLE
    let forumReplyBtn = document.querySelector('.forum-reply-button_btn');
    let forumCloseBtn = document.querySelector('.forum-reply-button-close');
    let forumReplyModal = document.querySelector('.forum-reply-modal-inner');
    let forumAddBtn = document.querySelector('.forum-add-button');
    let forumAddModal = document.querySelector('.forum-add-modal-inner');
    let forumAddCloseBtn = document.querySelector('.forum-add-button-close');
    let toggleReplyModal = () => {
        toggleHide(forumReplyModal)
    }
    let toggleAddModal = () => {
        toggleHide(forumAddModal);
    }
    if(forumReplyBtn) {
        forumReplyBtn.addEventListener('click', (e) => {
            e.preventDefault();
            toggleReplyModal();
        })
    }

    if(forumCloseBtn) {
        forumCloseBtn.addEventListener('click', () => {
            toggleReplyModal();
        })
    }

    if(forumAddBtn) {
        forumAddBtn.addEventListener('click', (e) => {
            e.preventDefault();
            toggleAddModal();
        })
    }

    if(forumAddCloseBtn) {
        forumAddCloseBtn.addEventListener('click', () => {
            toggleAddModal();
        })

    }

    //FLOATING CHAT TOGGLE
    let fcToggle = document.querySelector('.floating-chat-toggle');
    let floatingChat = document.querySelector('.fc-floating-chat');
    let fcClose = document.querySelector('.fc-close');
    let toggleChat = () => {
        toggleHide(fcToggle);
        toggleHide(floatingChat)
    }
     fcToggle.addEventListener('click', () => {
        toggleChat();
    });
    fcClose.addEventListener('click', () => {
        toggleChat();
    })
    
    
    
   
    
})
