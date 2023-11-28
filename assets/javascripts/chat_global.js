const list_chat_container = document.querySelector(".list-chat-container");
let timeout;

function reset_render_chat() {
    while(list_chat_container.firstChild) {
        list_chat_container.removeChild(list_chat_container.firstChild);
    }
}

function add_render_chat(username, isi_chat) {
    /**
     * HTML Format For Chat
     * <div class="chat">
     *   <h1 class="chat-username">Fern Aerell</h1>
     *   <p class="isi-chat">Halo</p>
     * </div>
     */
    const chatElement = document.createElement('div');
    chatElement.className = 'chat';

    const usernameElement = document.createElement('h1');
    usernameElement.className = 'chat-username';
    usernameElement.textContent = username;

    const messageElement = document.createElement('p');
    messageElement.className = 'isi-chat';
    messageElement.textContent = isi_chat;

    chatElement.appendChild(usernameElement);
    chatElement.appendChild(messageElement);

    list_chat_container.appendChild(chatElement);
}

function update() {
    if(timeout != null) clearTimeout(timeout);

    reset_render_chat();

    let chat_list = [];

    axios.get('/get_chat_global_api.php')
    .then((response) => {
        chat_list = response.data;
    })
    .catch(function (error) {
        console.log(error);
    })
    .finally(() => {
        for(i = 0; i < chat_list.length; i++) {
            add_render_chat(chat_list[i]["username"], chat_list[i]["isi_chat"]);
        }
    });

    timeout = setTimeout(update, 5000);
}

update();