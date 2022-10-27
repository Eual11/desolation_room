function recieve(form)
{
let recip = form; 
let request = new XMLHttpRequest;
request.open("POST","handler.php",true);
let data = new FormData;
data.append("user","Eual_Uchiha");
data.append("recip",form);
request.onreadystatechange =
    function ()
    {
        
        if(this.readyState == 4)
        {
            if (this.status == 200)
            {
                if(this.responseText!=null)
                {
                    let chat = document.getElementById("chat_beholder");
                    chat.innerHTML = this.responseText;
                }
            }
        }
    };
request.send(data);
}

function send()
{
    let message = document.getElementsByTagName("textarea");
    
    
    if(message)
    {
        let request = new XMLHttpRequest;
        request.open("POST","handler.php",true);
        let data = new FormData;
        data.append("message",message);
        request.onreadystatechange = function ()
        {
            if(this.readyState == 4)
            {
                window.location.replace("message.php");
            }
        }

    }

}
