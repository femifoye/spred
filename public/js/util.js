document.addEventListener('DOMContentLoaded', function() {
    async function getUser() {
        try{
            let user = await axios.get('/user');
            let userName = user.data.name;
            sessionStorage.setItem('username', userName);
        }
        catch(e) {
            console.log(e)
        }
    }
    getUser();
    
})