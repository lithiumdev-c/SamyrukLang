 function applyTheme() {
  const isDarkMode = window.matchMedia("(prefers-color-scheme: dark)").matches;
 

 document.body.classList.toggle("dark", isDarkMode);
 document.body.classList.toggle("light", !isDarkMode);
 document.querySelector('#sidebar').classList.toggle("light", !isDarkMode);

}

applyTheme();

window.matchMedia("(prefers-color-scheme: dark)").addEventListener("change", applyTheme);

const btn = document.querySelector('.toggle-btn');
const sidebar = document.querySelector(".sidebar");


function toggleSidebar() {
  btn.classList.toggle('rotate');
  sidebar.classList.toggle('close')
  document.body.classList.toggle('close')

  closeAllSubMenus()
}

 function toggleSubMenu(button) {

  if(!button.nextElementSibling.classList.contains('show')){
    closeAllSubMenus()
  }

   button.nextElementSibling.classList.toggle("show");
   button.classList.toggle("rotate");

   if(sidebar.classList.contains('close')) {
      sidebar.classList.toggle('close')
      toggleButton.classList.toggle('rotate')
   }
 }

 function closeAllSubMenus(){
  Array.from(sidebar.getElementsByClassName('show')).forEach(ul => {
    ul.classList.remove('show')
    ul.previousElementSibling.classList.remove('rotate')
  })
 }

 const cookieBox = document.querySelector(".cookies"),
 buttons = document.querySelectorAll(".cookie-btn");


const executeCodes = () => {
  if (document.cookie.includes("SamyrukLang")) return;

 buttons.forEach((button) => {

  cookieBox.classList.add("show");

  button.addEventListener("click", () => {
    cookieBox.classList.remove("show");
    if(button.id == "acceptBtn") {
      document.cookie = "cookieBy= SamyrukLang; max-age=" + 60 * 60 * 24 * 30
    }   
  });
})};

 window.addEventListener("load", executeCodes);

 const noticebtn = document.querySelector('.block-text__button');

 window.addEventListener('load', () => {
  if (Notification.permission === "granted") {
    new Notification("Добро пожаловать на SamyrukLang!", {
      body: "Начните изучение прямо сейчас!",
      icon: "images/Learnlogo.png",
      tag: "SamyrukLang"
    });
  } else if (Notification.permission !== "denied") {
    Notification.requestPermission().then(permission => {
      if (permission === "granted") {
        new Notification("Добро пожаловать на SamyrukLang!", {
          body: "Начните изучение прямо сейчас!",
          icon: "images/Learnlogo.png",
          tag: "SamyrukLang"
        });
      }
    });
  }
});
