import ChatUser from './ChatUser.js';

export default class ChatBoard {
    constructor(main_html_parent) {
        // HTML elements 
        this.conversation_board = main_html_parent.querySelector("#chat-board");
        this.barra_buscar_contacto = main_html_parent.querySelector("#buscar_contacto");
        this.chat_form = main_html_parent.querySelector("#chat-form");
        this.mensaje_input = main_html_parent.querySelector("#chat-form")['mensaje-input'];
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
                    return new ChatUser(item.Id, item.nombre, item.connect, item.imagen_perfil, item.unread_messages);
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

        this.resetConversationBoard();
        this.viewMessage(targeted_user);

        this.barra_buscar_contacto.focus();
        this.target_user.htmlElement.focus();

        let the_interval = setInterval(() => {
            this.checkIfNewMessage(targeted_user).then((data) => {
                console.log("async finish 2");
                console.log(data);
                if (data===true) {
                    clearInterval(the_interval);
                    this.setTargetUser(targeted_user);
                }
                
            });
    
        }, 2000);

        
    }

    async checkIfNewMessage(from_user) {

        let condition;

            
        let number_of_msg = [...document.querySelectorAll(".from_message")].length

        const my_ajax = await $.ajax({
            type: "POST",
            async:true,
            url: `${window.location.origin}/intranet.innomedic.pe/Chat/Chat/checkIfNewMessage/`,
            data: {"n_msg_client": number_of_msg, "from_user": from_user.userId}
        });

        if (my_ajax == "false") {
            condition = false;
        } else if (my_ajax == "true")
            condition = true;
            

        return condition;
    }

    viewMessage(targeted_user) {
        $.ajax({
            type: "POST",
            async:false,
            url: `${window.location.origin}/intranet.innomedic.pe/Chat/Chat/viewMessage/`,
            data: {"from_user": targeted_user.userId},  
    
            success: function() {                
                console.log("Success viewed");
            }
        });

        
        const unread_number_html = targeted_user.htmlElement.querySelector(".unred_mess");
        if(unread_number_html != undefined && unread_number_html!=null) {
            unread_number_html.innerHTML = "";
            unread_number_html.classList.remove("unred_mess");
        }
        
    
    }

    resetConversationBoard() {
        let self = this;
        this.conversation_board.innerHTML="";

        this.active_conversation = this.current_user.getConversationWith(self.target_user);

        this.renderActiveConversation();

        this.chat_form.reset();
    }

    processMessageSending(event) {
        event.preventDefault();

        this.current_user.sendMessageTo(this.target_user, this.mensaje_input.value);

        this.resetConversationBoard();   
        this.barra_buscar_contacto.focus();
        this.target_user.htmlElement.focus();
    }

    renderActiveConversation() {
        let self = this; 
        this.conversation_board.innerHTML = "";
        this.active_conversation.forEach(function(item) {
            
            const li_conversation_item = document.createElement("li");
            
            if (item.from_user == self.current_user.userId) {

                li_conversation_item.classList.add("reverse");
                li_conversation_item.classList.add("to_message");
               
                li_conversation_item.innerHTML = `
                <div class="chat-content">
                    <h5>` + self.current_user.userName + `</h5>
                    <div class="box bg-light-info">` + item.message + `</div>
                    <div class="chat-time">` + item.time_send + `</div>
                </div>
                <div class="chat-img"><img src="` + self.current_user.profile_photo + `" alt="user" /></div>
                `;

            } else {       
                
                li_conversation_item.classList.add("from_message");

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