function recieve(form,user)
{
let recip = form; 
window.scrollTo(0,document.body.scrollHeight);
let request = new XMLHttpRequest;
request.open("POST","handler.php",true);
let data = new FormData;
data.append("user",user);
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
                    document.getElementById("chat").scrollTop =document.getElementById("chat").scrollHeight;
                }
            }
        }
    };
request.send(data);
}

function send(recip,user)
{
    let message = document.getElementsByTagName("textarea")[0].value;
   let main = document.getElementById("chat");
    
    if(message)
    {
        let request = new XMLHttpRequest;
        request.open("POST","handler.php",true);
        let data = new FormData;
        data.append("recip",recip);
        data.append("message",message);
        request.onreadystatechange = function ()
        {
            if(this.readyState == 4)
            {
                message.value ="";
                document.getElementsByTagName("textarea")[0].value="";
                recieve(recip,user);


            }
        }
        request.send(data);

    }

}

