let global                  = document.querySelector("#global");
let loading                 = document.querySelector("#loading");
let loading_error           = document.querySelector("#loading_error");

let BTNdeconnexion          = document.querySelector("#BTNdeconnexion");
let BTN_tag_admin_create    = document.querySelector("#BTN_tag_admin_create");
let BTN_tag_admin_delete    = document.querySelector("#BTN_tag_admin_delete");
let BTN_artist_admin_create = document.querySelector("#BTN_artist_admin_create");
let BTN_tag_admin_update    = document.querySelector("#BTN_tag_admin_update");
let BTN_reload              = document.querySelector("#BTN_reload");

let artist_name             = document.querySelector("#artist_name");
let track_name              = document.querySelector("#track_name");
let track_url               = document.querySelector("#track_url");
let tag_name                = document.querySelector("#tag_name");
let update_input            = document.querySelector("#update_input");

let tbody_artist            = document.querySelector("#tbody_artist");
let alert_aside             = document.querySelector("#alert_aside");
let alert                   = document.querySelector("#alert");

let delete_select           = document.querySelector("#delete_select");
let update_select           = document.querySelector("#update_select");
let create_select           = document.querySelector("#create_select");
let ALERT_tag_create_ok     = document.querySelector(".create_tag_fetch");

let loading_content         = [];
let id_artist;

window.onload = onload();

BTN_tag_admin_create.addEventListener("click", fetch_create_tag);
BTN_tag_admin_delete.addEventListener("click", fetch_delete_tag);
BTN_artist_admin_create.addEventListener("click", fetch_create_artist);
BTN_tag_admin_update.addEventListener("click", fetch_update_tag);
BTN_reload.addEventListener("click", () => { location.reload() })

BTNdeconnexion.addEventListener("click", deconnexion)

alert.innerHTML = "nothing yet";

async function fetch_create_artist(){

    const reponse = await fetch('../Controller/create_artist.php?artist_name=' + artist_name.value + '&track_name=' + track_name.value + '&url_ytb=' + track_url.value + '&tag_name=' + create_select.value, {
        method: "GET"
    });
    if(reponse.ok){

        answer = await reponse.text();
        alert.innerHTML = answer;
        let alert_type;
        
        if(answer === "Création effectuée avec succès") { 
            artist_name.value = "";
            track_name.value  = "";
            track_url.value   = "";
            
            alert_type = "success";
        } else {
            alert_type = "danger";
        }

        alert_aside.style.visibility = "visible";
        alert_aside.style.textAlign  = "center";
        alert.className = `alert alert-${alert_type}`;

        setTimeout(() => {
            alert_aside.style.visibility = "hidden";
        }, 15000);
        
        display_artist();
    }
}

async function fetch_update_tag(){

    const reponse = await fetch('../Controller/update_tag.php?tag_name=' + update_select.value + '&tag_update_name=' + update_input.value , {
        method: "GET"
    });

    if(reponse.ok){

        answer = await reponse.text();

        alert.innerHTML = answer;

        let alert_type;
        
        if(answer === "Étiquette mise à jour avec succès") { 

            update_input.value = "";
            
            alert_type = "success";

        } else {

            alert_type = "danger";

        }

        alert_aside.style.visibility = "visible";
        alert_aside.style.textAlign  = "center";

        alert.className = `alert alert-${alert_type}`;

        setTimeout(() => {

            alert_aside.style.visibility = "hidden";

        }, 15000);
        
        display_tag();

    }
}

async function fetch_create_tag(){

    const reponse = await fetch('../Controller/add_tag.php?tag_name=' + tag_name.value, {
        method: "GET"
    });

    if(reponse.ok){

        let answer = await reponse.text()

        create_select.innerHTML = answer;
        delete_select.innerHTML = answer;
        update_select.innerHTML = answer;

        alert.innerHTML = answer;

        let alert_type;

        if(answer === "Étiquette créée avec succès") { 

            tag_name.value = "";

            alert_type     = "success";

        } else {

            alert_type     = "danger";

        }

        display_tag();

        alert_aside.style.visibility = "visible";
        alert_aside.style.textAlign  = "center";

        alert.className = `alert alert-${alert_type}`;

        setTimeout(() => {

            alert_aside.style.visibility = "hidden";

        }, 15000);

    }

}

async function display_artist(){

    const reponse = await fetch('../Controller/display_artist.php', {
        method: "GET"
    });

    if(reponse.ok){

        loading_content.push(reponse.status)

        let answer = await reponse.text()

        tbody_artist.innerHTML = answer;

        let BTN_delete         = document.querySelectorAll(".btn_delete");

        [...BTN_delete].forEach(element => {

            element.addEventListener("click", () => {

                id_artist = element.value;
                delete_artist();

            })

        });

    } else {

        loading_content.push(reponse.status)

    }
}

async function delete_artist(){

    const reponse = await fetch('../Controller/delete.php?id=' + id_artist, {
        method: "GET"
    });

    if(reponse.ok){

        answer          = await reponse.text();

        alert.innerHTML = answer;

        let alert_type;
        
        if(answer === "Artiste supprimé avec succès") { 

            alert_type = "success";

        } else {

            alert_type = "danger";

        }

        alert_aside.style.visibility = "visible";
        alert_aside.style.textAlign  = "center";

        alert.className = `alert alert-${alert_type}`;

        setTimeout(() => {

            alert_aside.style.visibility = "hidden";

        }, 15000);
        
        display_artist();

    }

}

async function display_tag(){

    const reponse = await fetch('../Controller/display_tag.php', {
        method: "GET"
    });

    if(reponse.ok){

        loading_content.push(reponse.status)

        let answer = await reponse.text()

        create_select.innerHTML = answer;
        delete_select.innerHTML = answer;
        update_select.innerHTML = answer;

    } else {

        loading_content.push(reponse.status)

    }

}

async function fetch_delete_tag(){
    
    const reponse = await fetch('../Controller/delete_tag.php?tag_name=' + delete_select.value, {
        method: "GET"
    });

    if(reponse.ok){

        alert_aside.style.visibility = "visible";
        alert_aside.style.textAlign  = "center";

        let answer = await reponse.text()

        alert.innerHTML = answer;

        let alert_type;
        
        if(answer === "Étiquette supprimée avec succès") { 

            alert_type = "success";

        } else {

            alert_type = "danger";

        }

        alert_aside.style.visibility = "visible";
        alert_aside.style.textAlign  = "center";

        alert.className = `alert alert-${alert_type}`;

        setTimeout(() => {

            alert_aside.style.visibility = "hidden";

        }, 15000);

        display_tag();

    }
    
}


function onload() {

    global.style.visibility = "hidden";
    loading.style.display   = "flex";
    loading_error.innerHTML = "<br>Chargement de la page"

    display_tag()
    display_artist()

    setTimeout(() => {

        if((loading_content.indexOf(500) >= -1) || (loading_content.indexOf(404) === -1) || (loading_content.length >= 2)) {

            loading_error.style.display = "none";
            loading.style.display       = "none";
            global.style.visibility     = "visible";

        } else {

            display_tag()
            display_artist()

            loading_error.innerHTML = "Il semblerait qu'il y a un problème avec le chargement de la page, patientez un instant nous essayons de nouveau"

            setTimeout(() => {
                
                if ((loading_content.indexOf(404) >= 0) || (loading_content.indexOf(500) >= 0)) {
        
                    loading_error.innerHTML = "Le contenu de la page n'a pas réussi à s'afficher correctement<br><span id='reload'>Recharger la page</span><br><br>Si ce problème persiste, contactez votre développeur"
                    document.querySelector("#reload").addEventListener("click", () => {
                        location.reload();
                    });
                            
                } else {

                    loading.style.display   = "none";
                    global.style.visibility = "visible";

                }
        
            }, 10000);
        }
        
    }, 1000);

}

function deconnexion() {
    window.location.href = "../Controller/logout.php"
}


