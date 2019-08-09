


// GET MESSAGE INPUT
let chatInput = document.getElementById('chat_bubble_input');
chatInput.addEventListener('keypress', (e) => {
    
    if(e.which === 13) {
        let chatInputValue = chatInput.value;
        e.preventDefault();
        postChat(chatInputValue);
        //console.log('eererer');
        // getChats();
        
    }
   
})



function getChats() {
    // try {
    //     let chats = await axios.get('/chats')
    //     let chatsArray = chats.data;
    //     //console.log(chats);
    //     chatsArray.forEach((ch) => {
    //         console.log(ch);
    //     })
    // }
    // catch(e) {
    //     console.log(839273766558558858)
    //     console.log(e.response.errors);
    // }
    axios.get('/chats')
        .then((chats) => {
            let chatsArray = chats.data;
            //console.log(chats);
            chatsArray.forEach((ch) => {
                console.log(ch);
            })
        })
        .catch(err => console.log('839273766558558858'));
    
}

async function postChat(chatBody){
    try {
        let chat = await axios.post('/chats', {"chat":`${chatBody}`});
    }
    catch(e) {
        console.log(e.response.data.errors.chat[0]);
        
    }
    // axios.post('/chats', {"chat":`${chatBody}`})
    //     .then((chat) => {
    //         console.log(chat[0]);
    //     })
    //     .catch((e) => {
    //         console.log(e.response);
    //     })
}

