// ---------------- SCROLL ANIMATION ----------------

const observer = new IntersectionObserver(entries => {

entries.forEach(entry => {

if(entry.isIntersecting){
entry.target.classList.add("active");
}

});

},{threshold:0.15});

document.querySelectorAll(".reveal").forEach(el => observer.observe(el));


// ---------------- LOAD DATA FROM SQL ----------------

function loadSiteData(){

fetch("get_content.php")
.then(res => res.json())
.then(data => {

const s = data.settings;

// HERO
document.getElementById("hero-name").innerText = s.hero_name;
document.getElementById("hero-role").innerText = s.hero_role;
document.getElementById("hero-intro").innerText = s.hero_intro;

// ABOUT
document.getElementById("about-text").innerText = s.about_text;

if(document.getElementById("about-img")){
document.getElementById("about-img").src = s.about_image || "";
}

// CONTACT
document.getElementById("btn-hero-wa").href = s.whatsapp;
document.getElementById("btn-hero-tg").href = s.telegram;

document.getElementById("contact-wa").href = s.whatsapp;
document.getElementById("contact-tg").href = s.telegram;

document.getElementById("email-text").innerText = s.email;


// ACTION CARDS
const container = document.getElementById("actions-container");
container.innerHTML = "";

data.actions.forEach(a => {

container.innerHTML += `
<a href="${a.link}" target="_blank">
<div class="action-card">
<div class="action-icon">${a.icon}</div>
<h3>${a.title}</h3>
<p>${a.description}</p>
</div>
</a>
`;

});

});

}


// ---------------- INIT ----------------

document.addEventListener("DOMContentLoaded", function(){

loadSiteData();

document.getElementById("year").innerText = new Date().getFullYear();

});