
export default class ChatBoard {
    constructor(main_html_parent) {
        // HTML elements 
        this.conversation_board = main_html_parent.querySelector("#chat-board");
        this.barra_buscar_contacto = main_html_parent.querySelector("#buscar_contacto");
        this.chat_form = main_html_parent.querySelector("#chat-form");
        this.mensaje_input = this.chat_form['mensaje-input'];
        this.chat_user_list_container = document.getElementById("chatUser-list-container");


        // Variables
        this.current_user;
        this.target_user;
        this.chat_user_list;
        this.active_conversation;

        // Obtaining and defining data
        this.defineCurrentUser();
        this.defineChatUserList();
        let self = this;
        this.chat_form.addEventListener("submit", function (event) {this.processMessageSending(event);}.bind(self));
    }

    defineCurrentUser() {
        let self = this;
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                let response_obj = JSON.parse(this.responseText);
                self.current_user = new ChatUser(response_obj.current_user_id, response_obj.nombre, response_obj.estado, response_obj.imagen);
            }
        }

        xhttp.open("GET", window.location.origin + "/intranet.innomedic.pe/" + "chat/chat/getCurrentUser", false);
        xhttp.send();
    }

    defineChatUserList() {
        let self=this;
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
    
            if (this.readyState == 4 && this.status == 200) {
                console.log("success");
                let list = JSON.parse(this.responseText);
                self.chat_user_list = list.map(function(item) {
                    return new ChatUser(item.Id, item.nombre, item.connect, item.imagen_perfil);
                });
            }
        }

        xhttp.open("GET", window.location.origin + "/intranet.innomedic.pe/" + "chat/chat/getChatUserList", false);
        xhttp.send();
    }

    renderEverything() {
        let self = this;
        this.chat_user_list.forEach(function(one_chat_user) {
            one_chat_user.renderOn(self.chat_user_list_container);
            one_chat_user.htmlElement.addEventListener("click", () => self.setTargetUser(one_chat_user));
        });
    }

    setTargetUser(targeted_user) {
        this.target_user = targeted_user

        this.resetConversatinBoard();

        this.barra_buscar_contacto.focus();
        this.target_user.htmlElement.focus();
    }

    resetConversatinBoard() {
        let self = this;
        this.conversation_board.innerHTML="";

        this.active_conversation = this.current_user.getConversationWith(self.target_user);
        console.log(this.active_conversation);

        this.renderActiveConversation();
    }

    processMessageSending(event) {
        event.preventDefault();

        this.current_user.sendMessageTo(this.target_user, this.mensaje_input.value);

        this.resetConversatinBoard();        
    }

    renderActiveConversation() {
        let self = this; 
        this.conversation_board.innerHTML = "";
        this.active_conversation.forEach(function(item) {
            
            const li_conversation_item = document.createElement("li");
            
            if (item.from_user == self.current_user.userId) {

                li_conversation_item.classList.add("reverse");
               
                li_conversation_item.innerHTML = `
                <div class="chat-content">
                    <h5>` + self.current_user.userName + `</h5>
                    <div class="box bg-light-info">` + item.message + `</div>
                    <div class="chat-time">` + item.time_send + `</div>
                </div>
                <div class="chat-img"><img src="` + self.current_user.profile_photo + `" alt="user" /></div>
                `;

            } else {          

                li_conversation_item.innerHTML = `
                <div class="chat-img"><img src="` + self.target_user.profile_photo + `" alt="user" /></div>
                <div class="chat-content">
                    <h5>` + self.target_user.userName + `</h5>
                    <div class="box bg-light-info">` + item.message + `</div>
                    <div class="chat-time">` + item.time_send + `</div>
                </div>
                `;
            }

            self.conversation_board.appendChild(li_conversation_item);
            li_conversation_item.scrollIntoView();
            
        });
    }


}

