<?php
class Validate {
    public function isMatch($input, $regex) {
        $pattern = "/$regex/";
        $matches = preg_match($pattern, $input);
        return $matches;
    }

    public function isValidPassword($password) {
        $regex = "^(?=.*[A-Z])(?=.*[a-z])(?=.*\\d).+$";
        return $this->isMatch($password, $regex);
    }

    public function isValidPhoneNumber($number) {
        $regex = "(84|0[3|5|7|8|9])+([0-9]{8})";
        return $this->isMatch($number, $regex);
    }

    public function isValidEmail($email) {
        $regex = "^[A-Za-z0-9+_.-]+@(.+)$";
        return $this->isMatch($email, $regex);
    }

    public function isValidPrice($price) {
        $regex = "^[1-9]\d*(\.\d+)?$";
        return $this->isMatch($price, $regex) && doubleval($price) > 0;
    }

    public function isValidAddress($address) {
        $regex = "^[a-zA-Z0-9., \\-\\/]+$";
        return $this->isMatch($address, $regex);
    }

    public function isValidQuantity($quantity) {
        $regex = "^(0|[1-9]\d*)$";
        return !empty($quantity) && $this->isMatch($quantity, $regex);
    }

    public function isValidUsername($username) {
        $regex = "^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]+$";
        return $this->isMatch($username, $regex);
    }

    public function isValidName($name) {
        $regex = "^[A-Z][a-zA-Z0-9 ]*$";
        return $this->isMatch($name, $regex);
    }
}
?>
