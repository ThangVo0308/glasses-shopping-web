function isMatch(input,regex) {
    var pattern = new RegExp(regex);
    var matches = pattern.test(input);
    return matches;
}

function isValidPassword(password) {
    const regex = "^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d).+$";
    return isMatch(password,regex);
}

function isValidPhoneNumber(number) {
    const regex = "(84|0[3|5|7|8|9])+([0-9]{8})";
    return isMatch(number,regex);
}

function isValidEmail(email) {
    const regex = "^[A-Za-z0-9+_.-]+@(.+)$";
    return isMatch(email,regex);
}

function isValidPrice(price) {
    const regex = "^[1-9]\\d*(\\.\\d+)?$";
    return regex.test(price) && parseDouble(price) > 0;
}

function isValidAddress(address) {
    const regex = "^[a-zA-Z0-9., \\-\\/]+$";
    return isMatch(address,regex);
}

function isValidQuantity(quantity) {
    const regex = "^(0|[1-9]\\d*)$";
    return !empty(quantity) && isMatch(quantity,regex);
}

function isValidUsername(username) {
    const regex = "^(?=.*[a-zA-Z])(?=.*\\d)[a-zA-Z\\d]+$";
    return isMatch(username,regex);
}

function isValidName(name) {
    const regex = "^[A-Z][a-zA-Z0-9 ]*$";
    return isMatch(name,regex);
}