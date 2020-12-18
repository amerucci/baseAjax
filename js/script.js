let lastId = 0 // id du dernier message affiché
let newid = '' // id du dernier message affiché
let session = ""
getSession()

setInterval(autoGetList, 100)
//autoGetList();

document.getElementById("texte").addEventListener("keypress", function (event) {
    if(event.key == "Enter"){
        event.preventDefault();
        ajoutMessage();
     }
   
});



//on defini ce qui va se passer quand nous allons cliquer sur le bouton ayant l'id valid
document.getElementById("valid").addEventListener("click", function(){
    ajoutMessage();
})

//On crée la fonction ajourMessage
function ajoutMessage(){
   let message = document.getElementById("texte").value
   if(message != ""){
       let xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("texte").value = ""   
        }
       }
       xmlhttp.open("POST", "php/ajoutMessage.php?message="+message)
       xmlhttp.send();
       scrollDown();
   }
}

function autoGetList(){
    
    let xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            var messages = JSON.parse(this.response)
            //console.log(messages)
            let discussion = document.getElementById("discussion")
            let oneMessage = ""
            //console.log(oneMessage)

            
            for (let i = 0; i < messages.length; i++) {
                if(session !=messages[i].pseudo ){
                    discussion.innerHTML  += "<li class='float-left'><div class='pseudo'>"+messages[i].pseudo+"</div><div class='themessageshow'>"+messages[i].message+"</div></li>"
                }
                else{
                    discussion.innerHTML  += "<li class='float-right blue'>"+messages[i].message+"</li>"
                }
                
            
                //console.log(oneMessage)
                lastId = messages[i].id 
            
            }
        }

   
    }  
    //+lastId
    xmlhttp.open("GET", "php/list.php?lastId="+lastId)

    // On envoie
    xmlhttp.send()
    
}


function getSession(){
    
    let thesession = new XMLHttpRequest()
    thesession.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            session = JSON.parse(this.response)
            //console.log(session)
        }

  
    }  
    //+lastId
    thesession.open("GET", "php/getSession.php")

    // On envoie
    thesession.send()
}

function scrollDown(){
	
	var hauteurTotaleElem = document.getElementById('discussion').offsetHeight;
	//alert(hauteurTotaleElem);
	document.getElementById('discussion').scrollTo({
        top: 5000,
        left: 0
  
      });


}



