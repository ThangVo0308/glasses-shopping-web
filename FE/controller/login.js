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

let isSuccessSet = false;
let isSuccesSet1 = false;
registerBtn.addEventListener('click', () => {
    isSuccesSet1 = false;
    container.classList.add("active");
    if (!isSuccessSet) {
        setTimeout(() => {
            setSuccess(usernameLogin);
            setSuccess(passwordLogin);
            isSuccessSet = true;
        }, 200);
    }
});


loginBtn.addEventListener('click', () => {
    isSuccessSet = false;
    container.classList.remove("active");
    if (!isSuccesSet1) {
        setTimeout(() => {
            setSuccess(usernameSignUp);
            setSuccess(passwordSignUp);
            setSuccess(nameSignUp);
            setSuccess(emailSignUp);
            setSuccess(phoneSignUp);
            setSuccess(addressSignUp);
            isSuccesSet1 = true;
        }, 200);
    }
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

// container.addEventListener('submit', e => {
//     e.preventDefault();
    
//     validateInputLogin();
//     validateInputSignUp();
// })

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


const validateInputLogin = () => {
    const usernameLoginValue = usernameLogin.value.trim();
    const passwordLoginValue = passwordLogin.value.trim();
    
    if (usernameLoginValue === '') {
        setError(usernameLogin, 'Tên đăng nhập không được bỏ trống');
    } else {
        setSuccess(usernameLogin);
    }
    
    if (passwordLoginValue === '') {
        setError(passwordLogin, 'Mật khẩu không được bỏ trống');
    } else if (passwordLoginValue.length < 8) {
        setError(passwordLogin, 'Mật khẩu cần dài ít nhất 8 ký tự');
    } else {
        setSuccess(passwordLogin);
    }

};

const validateInputSignUp = () =>{
    const usernameSignUpValue = usernameSignUp.value.trim();
    const passwordSignUpValue = passwordSignUp.value.trim();
    const nameValue = nameSignUp.value.trim();
    const emailValue = emailSignUp.value.trim();
    const phoneValue = phoneSignUp.value.trim();
    const addressValue = addressSignUp.value.trim();
    if(usernameSignUpValue === ''){
        setError(usernameSignUp,'Tên đăng nhập không được bỏ trống');
    }else{
        setSuccess(usernameSignUp);
    }
    
    if (passwordSignUpValue === '') {
        setError(passwordSignUp, 'Mật khẩu không được bỏ trống');
    } else if (passwordSignUpValue.length < 8) {
        setError(passwordSignUp, 'Mật khẩu cần dài ít nhất 8 ký tự');
    } else {
        setSuccess(passwordSignUp);
    }
    
    if (nameValue === '') {
        setError(nameSignUp, 'Tên không được bỏ trống');
    } else {
        setSuccess(nameSignUp);
    }
    
    if (emailValue === '') {
        setError(emailSignUp, 'Email không được bỏ trống');
    } else if (!isValidEmail(emailValue)) {
        setError(emailSignUp, 'Địa chỉ email phải hợp lệ');
    }
     else {
        setSuccess(emailSignUp);
    }
    
    if (phoneValue === '') {
        setError(phoneSignUp, 'Số điện thoại không được bỏ trống');
    } else {
        setSuccess(phoneSignUp);
    }
    
    if(addressValue === ''){
        setError(addressSignUp,'Địa chỉ không được bỏ trống');
    }else {
        setSuccess(addressSignUp)
    }
    
}

