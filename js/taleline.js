$(document).ready(function(){
    $(".profile").click(function(){
        var name = prompt("Who are you?");
        if(name === joeun)
        {
            alert("Hello master! What do you want?");
        }    
        else
        {
            alert("Sorry, you are not my master");
        }
    });
});

