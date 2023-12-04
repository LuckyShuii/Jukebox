let BTN_reload           = document.querySelector("#BTN_reload");
let BTN_add_tag          = document.querySelector("#BTN_add_tag");
let BTN_add_track        = document.querySelector("#BTN_add_track");
let btn_preview_collapse = document.querySelector(".btn_preview_collapse");

let tag_name_attribute   = document.querySelector("#tag_name_attribute");
let artist_id_attribute  = document.querySelector("#artist_id_attribute");

let body_tag             = document.querySelector("#body_tag");
let body_track           = document.querySelector("#body_track")

let add_track_name       = document.querySelector("#add_track_name");
let add_track_url        = document.querySelector("#add_track_url");

let preview_track        = document.querySelector(".preview_track")

let alert_aside          = document.querySelector("#alert_aside");
let alert                = document.querySelector("#alert");
let BTNdeconnexion       = document.querySelector("#BTNdeconnexion");

BTN_reload.addEventListener(    "click", () => { location.reload() })
BTN_add_tag.addEventListener(   "click", fetch_add_tag_artist);
BTNdeconnexion.addEventListener("click", deconnexion);
BTN_add_track.addEventListener( "click", add_track_artist);

window.onload = onload();

async function fetch_add_tag_artist(){
    
    const reponse = await fetch('../Controller/add_tag_artist.php?tag_name=' + tag_name_attribute.value + '&artist_id_for_tag=' + artist_id_attribute.value, {
        method: "GET"
    });

    if(reponse.ok){

        alert_aside.style.visibility = "visible";
        alert_aside.style.textAlign  = "center";

        let answer = await reponse.text()

        alert.innerHTML = answer;

        let alert_type;
        
        if(answer === "Étiquette attribuée avec succès") { 

            alert_type = "success";
            display_tag_artist()


        } else {

            alert_type = "danger";

        }

        alert_aside.style.visibility = "visible";
        alert_aside.style.textAlign  = "center";

        alert.className = `alert alert-${alert_type}`;

        setTimeout(() => {

            alert_aside.style.visibility = "hidden";

        }, 15000);

    }
    
}

function deconnexion() {
    window.location.href = "../Controller/logout.php"
}

async function display_tag(){

    const reponse = await fetch('../Controller/display_tag.php', {
        method: "GET"
    });

    if(reponse.ok){

        let answer = await reponse.text()

        tag_name_attribute.innerHTML = answer;

    }

}

async function display_tag_artist(){

    const reponse = await fetch('../Controller/display_tag_artist.php?id_artist=' + artist_id_attribute.value, {
        method: "GET"
    });

    if(reponse.ok){
        
        let answer = await reponse.text()

        body_tag.innerHTML = answer;

        let BTN_delete = document.querySelectorAll(".BTN_delete");

        [...BTN_delete].forEach(element => {

        element.addEventListener("click", () => {

            id_tag = element.value;
            delete_tag_artist();

        })})

    }

}

async function delete_tag_artist() {

    const reponse = await fetch('../Controller/delete_tag_artist.php?tag_id=' + id_tag + '&artist_id=' + artist_id_attribute.value, {
        method: "GET"
    });

    if(reponse.ok){

        answer          = await reponse.text();

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
        
        display_tag_artist();

    }

}

async function display_track_artist(){

    const reponse = await fetch('../Controller/display_track_artist.php?id_artist=' + artist_id_attribute.value, {
        method: "GET"
    });

    if(reponse.ok){
        
        let answer = await reponse.text()

        body_track.innerHTML = answer;

    }

    let BTN_delete_track = document.querySelectorAll(".BTN_delete_track");

    [...BTN_delete_track].forEach(element => {

    element.addEventListener("click", () => {

        id_track = element.value;
        delete_track_artist();

    })})

    let BTN_preview = document.querySelectorAll(".BTN_preview");

    [...BTN_preview].forEach(element => {

        element.addEventListener("click", () => {
    
            id_track = element.value;
            preview_track_artist();
    
        })})

}

async function preview_track_artist() {

    const reponse = await fetch('../Controller/preview_track.php?track_id=' + id_track, {
        method: "GET"
    });

    if(reponse.ok){

        answer          = await reponse.text();

        preview_track.innerHTML = answer;


        let btn_preview_collapse = document.querySelector(".btn_preview_collapse");

        if (btn_preview_collapse.className === "btn_preview_collapse btn btn-link btn-block text-left collapsed") {

            btn_preview_collapse.click();

        } else {

            btn_preview_collapse.click();

            setTimeout(() => {

                btn_preview_collapse.click();
                
            }, 550);

        }

    }

}

async function delete_track_artist() {

    const reponse = await fetch('../Controller/delete_track.php?track_id=' + id_track, {
        method: "GET"
    });

    if(reponse.ok){

        answer          = await reponse.text();

        alert.innerHTML = answer;

        let alert_type;
        
        if(answer === "Morceau supprimé avec succès") { 

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
        
        display_track_artist();

    }

}

async function add_track_artist() {

    const reponse = await fetch('../Controller/add_track_artist.php?track_name=' + add_track_name.value + '&track_url=' + add_track_url.value + '&artist_id=' + artist_id_attribute.value   , {
        method: "GET"
    });

    if(reponse.ok){

        answer          = await reponse.text();

        alert.innerHTML = answer;

        let alert_type; 
        
        if(answer === "Création effectuée avec succès") { 

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
        
        display_track_artist();

    }

}

function onload() {

    display_tag()
    display_track_artist()
    display_tag_artist()

}

function deconnexion() {
    window.location.href = "../Controller/logout.php"
}

