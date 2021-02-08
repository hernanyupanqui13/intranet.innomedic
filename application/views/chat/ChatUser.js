
export default class ChatUser {
    
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

    sendMessageTo(anotherUser, mensaje) {
        let self= this;
        $.ajax({
            type: "POST",
            async:false,
            url: window.location.origin + "/intranet.innomedic.pe/" + "Chat/Chat/sendMessage/",
            data: {"mensaje": mensaje, "from_user": self.userId, "to_user": anotherUser.userId},  
    
            success: function() {                
                chat_form.reset();
            }
        });
    }

    renderOn(parentHtmlElement) {
        const container = document.createElement("li");    
        
        let class_of_state = "";
        if(this.user_state == "Online") {
            class_of_state = "text-success";
        } else {
            class_of_state = "text-danger";
        }

        // Creating the html content
        container.innerHTML = `
            <a href="javascript:void(0)"><img src="` + this.profile_photo +`" alt="user-img" class="img-circle"><span>` + this.userName + `<small class="${class_of_state}">` + this.user_state +`</small></span></a>
        `;

        this.htmlElement = container.querySelector("a");
        parentHtmlElement.appendChild(container);
    }

    getConversationWith(anotherUser) {
        let self = this;
        let response;

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                response = JSON.parse(this.responseText);
            }
        };
        xhttp.open("POST", window.location.origin + "/intranet.innomedic.pe/" + "Chat/Chat/getConversationWith", false);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(`current_user=${self.userId}&target_user=${anotherUser.userId}`);
        
        return response;
    }    
}