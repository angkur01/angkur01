"use strict";

/* ===============================
   GLOBAL DOM CACHE
================================ */

const DOM = {
heroName: document.getElementById("hero-name"),
heroRole: document.getElementById("hero-role"),
heroIntro: document.getElementById("hero-intro"),

aboutText: document.getElementById("about-text"),
aboutImg: document.getElementById("about-img"),

heroWA: document.getElementById("btn-hero-wa"),
heroTG: document.getElementById("btn-hero-tg"),

contactWA: document.getElementById("contact-wa"),
contactTG: document.getElementById("contact-tg"),
emailText: document.getElementById("email-text"),

actionsContainer: document.getElementById("actions-container"),

footerYear: document.getElementById("year"),

loginModal: document.getElementById("login-modal")
};



/* ===============================
   SCROLL REVEAL ANIMATION
================================ */

function initRevealAnimations() {

const revealElements = document.querySelectorAll(".reveal");

if (!("IntersectionObserver" in window)) {
revealElements.forEach(el => el.classList.add("active"));
return;
}

const observer = new IntersectionObserver(entries => {

entries.forEach(entry => {
if (entry.isIntersecting) {
entry.target.classList.add("active");
observer.unobserve(entry.target);
}
});

},{threshold:0.15});

revealElements.forEach(el => observer.observe(el));

}



/* ===============================
   ADMIN HASH LOGIN
================================ */

function checkAdminHash() {

if(!DOM.loginModal) return;

DOM.loginModal.style.display = "flex";

}

window.checkAdminHash = checkAdminHash;



/* ===============================
   RENDER ACTION BUTTONS
================================ */

function renderActions(actions){

if(!DOM.actionsContainer) return;

DOM.actionsContainer.innerHTML = "";

const fragment = document.createDocumentFragment();

actions.forEach(action => {

const link = document.createElement("a");
link.href = action.link;
link.target = "_blank";

const card = document.createElement("div");
card.className = "action-card";

card.innerHTML = `
<div class="action-icon">${action.icon || "⭐"}</div>
<h3>${action.title || ""}</h3>
<p>${action.description || ""}</p>
`;

link.appendChild(card);
fragment.appendChild(link);

});

DOM.actionsContainer.appendChild(fragment);

}



/* ===============================
   RENDER SETTINGS CONTENT
================================ */

function renderSettings(settings){

if(!settings) return;

/* HERO */

if(DOM.heroName) DOM.heroName.textContent = settings.hero_name || "";
if(DOM.heroRole) DOM.heroRole.textContent = settings.hero_role || "";
if(DOM.heroIntro) DOM.heroIntro.textContent = settings.hero_intro || "";


/* ABOUT */

if(DOM.aboutText) DOM.aboutText.textContent = settings.about_text || "";

if(DOM.aboutImg && settings.about_image){
DOM.aboutImg.src = settings.about_image;
}


/* CONTACT LINKS */

if(DOM.heroWA) DOM.heroWA.href = settings.whatsapp || "#";
if(DOM.heroTG) DOM.heroTG.href = settings.telegram || "#";

if(DOM.contactWA) DOM.contactWA.href = settings.whatsapp || "#";
if(DOM.contactTG) DOM.contactTG.href = settings.telegram || "#";

if(DOM.emailText) DOM.emailText.textContent = settings.email || "";

}



/* ===============================
   LOAD WEBSITE CONTENT
================================ */

async function loadWebsiteContent(){

try{

const response = await fetch("get_content.php",{
method:"GET",
headers:{ "Accept":"application/json" }
});

if(!response.ok){
throw new Error("Server response error");
}

const data = await response.json();

renderSettings(data.settings);
renderActions(data.actions);

}catch(error){

console.error("Content loading failed:", error);

showErrorMessage();

}

}



/* ===============================
   ERROR MESSAGE
================================ */

function showErrorMessage(){

if(!DOM.actionsContainer) return;

DOM.actionsContainer.innerHTML = `
<div style="padding:30px;text-align:center;color:#ff6b6b">
Failed to load content. Please refresh.
</div>
`;

}



/* ===============================
   FOOTER YEAR
================================ */

function updateFooterYear(){

if(DOM.footerYear){
DOM.footerYear.textContent = new Date().getFullYear();
}

}



/* ===============================
   INITIALIZE WEBSITE
================================ */

function initSite(){

initRevealAnimations();

updateFooterYear();

loadWebsiteContent();

if(window.location.hash === "#admin"){
checkAdminHash();
}

}



/* ===============================
   START APP
================================ */

document.addEventListener("DOMContentLoaded", initSite);