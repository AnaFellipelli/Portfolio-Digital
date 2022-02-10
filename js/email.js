function setEmail() {
    var recepientEmail = "anacristinafellipelli@gmail.com";
    var subject = document.getElementById("subject").value;
    var name = document.getElementById("email_name").value;
    var message = document.getElementById("message").value;
    message = message.replace(/\n/g, "%0D%0A");
    document.getElementById("contactForm").action = "mailto:" + recepientEmail + "?subject=" + subject + "&body=" + message + "%0D%0A%0D%0A" + name + "%0D%0A%0D%0A";
    return;
}