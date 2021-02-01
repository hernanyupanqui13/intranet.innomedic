const chat_form = document.getElementById("chat-form");
let mensaje = chat_form['mensaje-input'];
let list_of_ChatUsers = [];
const chatUser_list_container = document.getElementById("chatUser-list-container");
let currentUser;
let target_user;
const board = document.getElementById("chat-board");



console.log("easy charegd");

chat_form.addEventListener("submit", sendMessage);


$.get( window.location.origin + "/intranet.innomedic.pe/" + "/chat/chat/getCurrentUser", function( data ) {
    console.log("previos in data");
    currentUser = JSON.parse(data);

    currentUser = new ChatUser(currentUser.current_user_id, currentUser.nombre, currentUser.estado, currentUser.imagen);
    console.log(currentUser);

});



// Obteniendo los datos usuarios con los que se chateo
$.ajax({
    type: "POST",
    async:true,
    url: window.location.origin + "/intranet.innomedic.pe/" + "Chat/Chat/getChatUsers/",

    success: function(response) {
     
        let list_of_users = JSON.parse(response);
        console.log(list_of_users);

        list_of_users.forEach(function (item) {

            console.log(item);

            user_chat = new ChatUser(item.from_user, item.nombre, item.connect, item.imagen_perfil);
            list_of_ChatUsers.push(user_chat);
            user_chat.renderOn(chatUser_list_container);
        });

        let final_item = document.createElement("li");
        final_item.classList.add("p-20");
        chatUser_list_container.appendChild(final_item);

        list_of_ChatUsers.forEach((item) => item.htmlElement.addEventListener("click", () => setTargetUser(item)));

    }
}); 

function setTargetUser(item) {
    // To implement
    console.log(item);
    target_user = item;
    currentUser.getConversationWith(target_user);
    currentUser.showHistoryMessagesOn(board);
}


function sendMessage(event) {    
    event.preventDefault();
    
    currentUser.sendMessageTo(target_user);
    board.innerHTML="";
    currentUser.getConversationWith(target_user);
    currentUser.showHistoryMessagesOn(board);
    
}

function obtainMessageOf(id) {
    $.ajax({
        type: "POST",
        async:true,
        url: window.location.origin + "/intranet.innomedic.pe/" + "Chat/Chat/sendMessage/",
        data: {"message":mensaje.value, "from_user": this.userId, "to_user": anotherUser.userId},  

        success: function(response) {
            console.log("sucess");
            console.log(response);
        }
    }); 
}


class ChatUser {
    
    constructor(the_userId, the_userName, the_user_state, the_profile_photo) {
        this.userId = the_userId;

        if(the_user_state === "1") {
            this.user_state = "Online";
        } else {
            this.user_state = "Offline";
        }

        this.profile_photo = window.location.origin + "/intranet.innomedic.pe/" + "upload/images/" + the_profile_photo;   
        this.userName = the_userName;
        this.htmlElement;
        this.current_conversation;
    }

    sendMessageTo(anotherUser) {
        $.ajax({
            type: "POST",
            async:false,
            url: window.location.origin + "/intranet.innomedic.pe/" + "Chat/Chat/sendMessage/",
            data: {"mensaje": mensaje.value, "from_user": currentUser.userId, "to_user": anotherUser.userId},  
    
            success: function(response) {
                console.log("sucess");
                chat_form.reset();
            }
        });
    }

    renderOn(parentHtmlElement) {
        const container = document.createElement("li");
        

        
        // Crearing the html content
        container.innerHTML = `
            <a href="javascript:void(0)"><img src="` + this.profile_photo +`" alt="user-img" class="img-circle"><span>` + this.userName + `<small class="text-success">` + this.user_state +`</small></span></a>
        `;

        this.htmlElement = container.querySelector("a");
        parentHtmlElement.appendChild(container);
        console.log(this.htmlElement);    
    }

    /*
    Esta funcion muestra los menajes entre el current user y el target user 
    Los renderuza en una pizarra HTML
    */
    showHistoryMessagesOn(htmlBoard) {
        htmlBoard.innerHTML = "";
        this.current_conversation.forEach(function(item) {
            
            const li_conversation_item = document.createElement("li");
            
            if (item.from_user == currentUser.userId) {

                li_conversation_item.classList.add("reverse");
               
                li_conversation_item.innerHTML = `
                <div class="chat-content">
                    <h5>` + currentUser.userName + `</h5>
                    <div class="box bg-light-info">` + item.message + `</div>
                    <div class="chat-time">` + item.time_send + `</div>
                </div>
                <div class="chat-img"><img src="` + currentUser.profile_photo + `" alt="user" /></div>
                `;

            } else {            

                li_conversation_item.innerHTML = `
                <div class="chat-img"><img src="` + target_user.profile_photo + `" alt="user" /></div>
                <div class="chat-content">
                    <h5>` + target_user.userName + `</h5>
                    <div class="box bg-light-info">` + item.message + `</div>
                    <div class="chat-time">` + item.time_send + `</div>
                </div>
                `;
            }

            htmlBoard.appendChild(li_conversation_item);
            
        });
    }

    getConversationWith(anotherUser) {
        self = this;    // To reference the object
        $.ajax({
            type: "POST",
            async:false,
            url: window.location.origin + "/intranet.innomedic.pe/" + "Chat/Chat/getConversationWith/",
            data: {"current_user":this.userId, "target_user": anotherUser.userId},  
    
            success: function(response) {
                console.log("sucess");
                self.current_conversation=JSON.parse(response);  
            }
        });
    }
    
}