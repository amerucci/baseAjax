let lastId = 0 // id du dernier message affiché
let session = ""
const checkBox = document.getElementById("autoscroll");
document.getElementById("discussion").addEventListener("wheel", uncheck);
getSession()
getUserInfos()
setInterval(autoGetList, 100)
setInterval(listenInput, 100)
setInterval(isTyping, 50)

checkBox.addEventListener("click", function(){
      document.getElementById("autoscroll").checked == true;
      var hauteurTotaleElem = document.getElementById('list').offsetHeight;
      document.getElementById('discussion').scrollTo({
          top: hauteurTotaleElem,
          left: 0,
          behavior: 'smooth'
  
      });
})


function listenInput() {
    text = document.getElementById("texte").value
    if (text != "") {
        const bool = 1
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
            }
        }
        xmlhttp.open("POST", "php/typing.php?bool=" + bool)
        xmlhttp.send();
    } else {
        const bool = 0
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {}
        }
        xmlhttp.open("POST", "php/typing.php?bool=" + bool)
        xmlhttp.send();
    }
}


document.getElementById("texte").addEventListener("keypress", function (event) {
    if (event.key == "Enter") {
        event.preventDefault();
        document.getElementById("autoscroll").checked == true;
        ajoutMessage();

    }

});

document.getElementById("valid").addEventListener("click", function () {
    ajoutMessage();
})

function ajoutMessage() {
    let message = document.getElementById("texte").value
    if (message != "") {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("texte").value = ""
            }
        }
        xmlhttp.open("POST", "php/ajoutMessage.php?message=" + message)
        xmlhttp.send();
    }
    scrollDown()
  
}

function isTyping() {
    let xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var who = JSON.parse(this.response)
            console.log(who.length)
            let whoistyping = document.getElementById("istyping")
            whoistyping.innerHTML = ""
            for (let i = 0; i < who.length; i++) {
                if (who[i].pseudo != session) {
                    whoistyping.innerHTML = who[i].pseudo + " is typing"
                } else {
                    whoistyping.innerHTML = ""
                }

            }
        }
    }
    xmlhttp.open("GET", "php/isTyping.php")
    xmlhttp.send()
}

function autoGetList() {
    let xmlhttp = new XMLHttpRequest()
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var messages = JSON.parse(this.response)
            let discussion = document.getElementById("list")
            let oneMessage = ""
            for (let i = 0; i < messages.length; i++) {
                if (session != messages[i].pseudo) {
                    discussion.innerHTML += "<li class='float-left'><div class='pseudo'>" + messages[i].pseudo + " - " + messages[i].date + "</div><div class='themessageshow'>" + messages[i].message + "</div></li>"
                } else {
                    discussion.innerHTML += "<li class='float-right '><div class='pseudo'>" + messages[i].date + "</div><div class='themessageshowblue blue'>" + messages[i].message + "</div></li>"
                }
                lastId = messages[i].id
            }
        }
    }
    xmlhttp.open("GET", "php/list.php?lastId=" + lastId)
    xmlhttp.send()
}

function getSession() {
    let thesession = new XMLHttpRequest()
    thesession.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            session = JSON.parse(this.response)
        }
    }
    thesession.open("GET", "php/getSession.php")
    thesession.send()
}

function getUserInfos() {
    let userinfos = new XMLHttpRequest()
    userinfos.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            info = JSON.parse(this.response)
            if (info !== null) {
                console.log(info)
                document.getElementById("userName").innerHTML = info.prenom + " " + info.nom
                document.getElementById("userImg").innerHTML = "<img src='" + info.avatar + "' alt='" + info.prenom + " " + info.nom + "' style='width:100%'>"
                document.getElementById("userPseudo").innerHTML = "<i>@" + info.pseudo + "</i>"
            } else {
                alert("y'a rien")
            }

        }
    }
    userinfos.open("GET", "php/userinfos.php")
    userinfos.send()
}

function scrollDown() {
    document.getElementById("autoscroll").checked = true;
    var hauteurTotaleElem = document.getElementById('list').offsetHeight;
    document.getElementById('discussion').scrollTo({
        top: hauteurTotaleElem,
        left: 0,
        behavior: 'smooth'

    });
}

function uncheck() {
    document.getElementById("autoscroll").checked = false;
}