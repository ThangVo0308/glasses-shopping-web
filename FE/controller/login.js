const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');
const form = document.getElementById('form');

const usernameLogin = document.getElementById('username');
const passwordLogin = document.getElementById('password');
const usernameSignUp= document.getElementById('usernameSignUp');
const passwordSignUp = document.getElementById('passwordSignUp');
const nameSignUp = document.getElementById('name');
const emailSignUp = document.getElementById('email');
const phoneSignUp = document.getElementById('phone');
const addressSignUp = document.getElementById('address');

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

container.addEventListener('submit', e => {
    e.preventDefault();
    
    validateInput();
})

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');
    
    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
};

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');
    
    errorDisplay.innerText='';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    return re.test(String(email).toLowerCase());
}


const validateInput = () => {
    const usernameLoginValue = usernameLogin.value.trim();
    const passwordLoginValue = passwordLogin.value.trim();
    const usernameSignUpValue = usernameSignUp.value.trim();
    const passwordSignUpValue = passwordSignUp.value.trim();
    const nameValue = nameSignUp.value.trim();
    const emailValue = emailSignUp.value.trim();
    const phoneValue = phoneSignUp.value.trim();
    const addressValue = addressSignUp.value.trim();
    
    if (usernameLoginValue === '') {
        setError(usernameLogin, 'Username is required');
    } else {
        setSuccess(usernameLogin);
    }
    
    if (passwordLoginValue === '') {
        setError(passwordLogin, 'Password is required');
    } else if (passwordLoginValue.length < 8) {
        setError(passwordLogin, 'Password must be at least 8 characters');
    } else {
        setSuccess(passwordLogin);
    }

    if(usernameSignUpValue === ''){
        setError(usernameSignUp,'Username is required');
    }else{
        setSuccess(usernameSignUp);
    }

    if (passwordSignUpValue === '') {
        setError(passwordSignUp, 'Password is required');
    } else if (passwordSignUpValue.length < 8) {
        setError(passwordSignUp, 'Password must be at least 8 characters');
    } else {
        setSuccess(passwordSignUp);
    }
    
    if (nameValue === '') {
        setError(nameSignUp, 'Name is required');
    } else {
        setSuccess(nameSignUp);
    }

    if (emailValue === '') {
        setError(emailSignUp, 'Email is required');
    } else if (!isValidEmail(emailValue)) {
        setError(emailSignUp, 'Provide a valid email address');
    }
     else {
        setSuccess(emailSignUp);
    }

    if (phoneValue === '') {
        setError(phoneSignUp, 'Phone is required');
    } else {
        setSuccess(phoneSignUp);
    }

    if(addressValue === ''){
        setError(addressSignUp,'Address is required');
    }else {
        setSuccess(addressSignUp)
    }
};

