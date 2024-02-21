const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});


document.addEventListener("DOMContentLoaded", function() {
    const imgUser = document.getElementById('login');
    const formContainer = document.getElementById('container');
    imgUser.addEventListener('click', function() {
        formContainer.classList.add(formContainer);
    });
});