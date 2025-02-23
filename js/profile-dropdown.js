 let profiledropdown = document.querySelector('.profile');
 let action = document.querySelector('.action');
if (!action) {
    console.error("Элемент с классом .action не найден!");
}
 if (profiledropdown) {
   profiledropdown.addEventListener('click', () => {
    action.classList.toggle('active');
   });
 }