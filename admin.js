// ---------------- ADMIN LOGIN ----------------

function checkAdminHash(){

const loginModal = document.getElementById("login-modal");

if(loginModal){
loginModal.style.display = "flex";
}

}

function closeLogin(){
document.getElementById("login-modal").style.display = "none";
}

function attemptLogin(){

const u = document.getElementById("login-user").value;
const p = document.getElementById("login-pass").value;

if(u === "angkur" && p === "12022"){

closeLogin();
openAdminPanel();

}else{

alert("Invalid Credentials");

}

}


// ---------------- ADMIN PANEL ----------------

function openAdminPanel(){

const panel = document.getElementById("admin-panel");

if(panel){
panel.classList.add("open");
}

}

function logout(){
document.getElementById("admin-panel").classList.remove("open");
}


// ---------------- ROUTING ----------------

document.addEventListener("DOMContentLoaded", function(){

if(window.location.hash === "#admin"){
checkAdminHash();
}

});