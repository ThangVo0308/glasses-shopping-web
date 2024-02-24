const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

const input = document.querySelector('.txtPasswordLogin');
const eyeOpen= document.querySelector('.eye-open');
const eyeClose = document.querySelector('.eye-close');

eyeOpen.addEventListener("click", function() {
    eyeOpen.classList.add("hide");
    eyeClose.classList.remove("hide");
    input.setAttribute("type","password");    
});
eyeClose.addEventListener("click", function() {
    eyeOpen.classList.remove("hide");
    eyeClose.classList.add("hide");
    input.setAttribute("type","text");    
});

function changeLogin() {
    var containerMove= document.querySelector(".container-move");
    container.classList.add("show-form")
    console.log(container.style);
    console.log('Login image clicked');

}