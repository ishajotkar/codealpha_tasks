function sendMessage() {
    let userText = document.getElementById("userInput").value;
    let chatBox = document.getElementById("chat-box");

    chatBox.innerHTML += "<p class='user'><b>You:</b> " + userText + "</p>";

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "chat.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        chatBox.innerHTML += "<p class='bot'><b>Bot:</b> " + this.responseText + "</p>";
        chatBox.scrollTop = chatBox.scrollHeight;
    };

    xhr.send("message=" + userText);
    document.getElementById("userInput").value = "";
}
