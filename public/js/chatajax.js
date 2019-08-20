


// GET MESSAGE INPUT
let floatingChat = document.querySelector('.fc-floating-chat');
let chatInput = document.getElementById('chat_bubble_input');
let chatUser = sessionStorage.getItem('username');
let chatBubble = document.querySelector('.fc-chat-conv');

if(floatingChat) {
    //FLOATING CHAT TOGGLE
    let toggleHide = (el) => {
        el.classList.toggle('hide');
    }

    let fcToggle = document.querySelector('.floating-chat-toggle');
    let fcClose = document.querySelector('.fc-close');
    let toggleChat = () => {
        toggleHide(fcToggle);
        toggleHide(floatingChat)
    }
    fcToggle.addEventListener('click', () => {
        toggleChat();
        getChats();
    });
    fcClose.addEventListener('click', () => {
        toggleChat();
    })
}


if(chatInput) {
    chatInput.addEventListener('keypress', (e) => {
    
        if(e.which === 13) {
            let chatInputValue = chatInput.value;
            e.preventDefault();
            postChat(chatInputValue);
        }
       
    })
}


function clearInput() {
    chatInput.value = "";   
}

function createChatBubble(user, chat) {
    let chatDivOuter = document.createElement('DIV');
    let chatDiv = document.createElement('DIV');
    let chatParagraph = document.createElement('P');
    let chatBubbleStyle = chatUser === user ? "user-bubble" : "others-bubble";

    chatDivOuter.classList.add('fc-chat-bubble');
    chatDiv.classList.add('chat-bubble', chatBubbleStyle);
    chatDivOuter.appendChild(chatDiv);
    chatParagraph.innerHTML = `<span class='chat-bubble-username'>${user}: </span> ${chat}`;
    chatDiv.appendChild(chatParagraph);
    chatBubble.appendChild(chatDivOuter);
}

function getChats() {
    chatBubble.innerHTML = "";
    console.log(chatUser);
    axios.get('/chats')
        .then((chats) => {
            let chatsArray = chats.data;
            chatsArray.forEach((ch) => {
                createChatBubble(ch.user, ch.chat);
            })
        })
        .catch(err => console.log(err));  
}

function appendChat(body) {
    createChatBubble(chatUser, body);    
}

async function postChat(chatBody){
    try {
        let chat = await axios.post('/chats', {"chat":`${chatBody}`});
        appendChat(chatBody);
        clearInput();
    }
    catch(e) {
        console.log(e);
        
    }
}

function refreshChat() {
    if(!floatingChat.classList.contains('hide')){
         getChats();
    }
}


setInterval(function(){
    refreshChat();
}, 60000)


