
let popup = document.getElementById("popup");
let visitUrl;
let id;

function openPopup(url){
    // popup.classList.add("open_popup");
    console.log("a");
    popup.style.visibility = "visible";
    visitUrl = url;
    
}

// i edited some parts
function closePopup(){
    // popup.classList.remove("open_popup");
    popup.style.visibility = "hidden";
    window.location.href = visitUrl;
}

function openDeletePopup(val){
    // popup.classList.add("open_popup");
    popup.style.visibility = "visible";
    id = val; 
}

function openDelete2Popup(){
    // popup.classList.add("open_popup");
    popup.style.visibility = "visible";
    console.log("a");
}

function directPreviewPage(){
    // popup.classList.remove("open_popup");
    popup.style.visibility = "hidden";
    window.location.href = "http://localhost/Pothpiyasa/public/books/deletePreview/"+id;
}



