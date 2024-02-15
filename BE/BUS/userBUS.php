<?php
    // require("..\BE\DAL\userDAL.php");
    require_once ("..\BE\DAL\userDAL.php");
    class userBUS {
        private $userList = array();

        private static $instance;

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            $this->userList = array_merge($this->userList, userDAL::getInstance()->getAllUser());
        }
        
        public function getAlluser() {
            return $this->userList;
        }

        public function refreshData() {
            $this->userList = array_merge($this->userList, userDAL::getInstance()->getAllUser());
        }

        public function getUserById($id) {
            foreach ($this->userList as $user) {
                if ($user['id'] == $id) {
                    return $user;
                }
            } 
            return null;
        }
        

        public function getMax() {
            $max = 0;
            foreach ($this->userList as $user) {
                $max++;
            }
        
            return $max + 1;
        }

        // not registered
        public function addUser(users $user) {
            if($user->getUsername() == null || empty($user->getUsername())
                || $user->getPassword() == null || empty($user->getPassword())
                || $user->getEmail() == null || empty($user->getEmail())
                || $user->getName() == null || empty($user->getName())
                || $user->getPhone() == null || empty($user->getPhone())
                || $user->getAddress() == null || empty($user->getAddress())
            ){
                throw new InvalidArgumentException('Invalid information, check your input again!!');          
            }

            foreach($this->userList as $curUser) {
                if(strcmp($curUser->getUsername(),$user->getUsername()) == 0) {
                    throw new InvalidArgumentException('Username existed');          
                }

                if(strcmp($curUser->getEmail(),$user->getEmail()) == 0) {
                    throw new InvalidArgumentException('Email existed');          
                }

                if(strcmp($curUser->getPhone(),$user->getPhone()) == 0) {
                    throw new InvalidArgumentException('Phone existed');          
                }
            }
            
            $validPhone = $user->getPhone() != null && !empty($user->getPhone());
            $validEmail = $user->getEmail() != null && !empty($user->getEmail());

            $validate = new Validate();

            if ($validPhone && !$validate->isValidPhoneNumber($user->getPhone())) {
                throw new InvalidArgumentException('Invalid phone number ');
            }

            
            if ($validEmail && !$validate->isValidEmail($user->getEmail())) {
                throw new InvalidArgumentException('Invalid email');
            }

            $newuser = userDAL::getInstance()->addUser($user);

            if($newuser) {
                $this->userList[] = $user;
                return true;
            }
            return false;
        }

        public function updateUser(users $user) {
            if($user->getUsername() == null || empty($user->getUsername())
                || $user->getPassword() == null || empty($user->getPassword())
                || $user->getEmail() == null || empty($user->getEmail())
                || $user->getName() == null || empty($user->getName())
                || $user->getPhone() == null || empty($user->getPhone())
                || $user->getAddress() == null || empty($user->getAddress())
            ){
                throw new InvalidArgumentException('Invalid information, check your input again!!');          
            }

            foreach($this->userList as $curUser) {
                if(strcmp($curUser->getUsername(),$user->getUsername()) == 0) {
                    throw new InvalidArgumentException('Username existed');          
                }

                if(strcmp($curUser->getEmail(),$user->getEmail()) == 0 ) {
                    throw new InvalidArgumentException('Email existed');          
                }

                if(strcmp($curUser->getPhone(),$user->getPhone()) == 0) {
                    throw new InvalidArgumentException('Phone existed');          
                }
            }
            
            $validPhone = $user->getPhone() != null && !empty($user->getPhone());
            $validEmail = $user->getEmail() != null && !empty($user->getEmail());

            $validate = new Validate();

            if ($validPhone && !$validate->isValidPhoneNumber($user->getPhone())) {
                throw new InvalidArgumentException('Invalid phone number ');
            }

            
            if ($validEmail && !$validate->isValidEmail($user->getEmail())) {
                throw new InvalidArgumentException('Invalid email');
            }

            $result = userDAL::getInstance()->updateUser($user);
            if($result) {
                $index = array_search($user,$this->userList,true);
                if($index !== false) {
                    $this->userList[$index] = $user;
                    return $index;
                }
            }
            return -1;
        }

        public function deleteUser($id) {
            $user = $this->getuserById($id);

            $check = userDAL::getInstance()->deleteUser($user['id']);

            if($check) {
                $userId = $user['id'];
                unset($this->userList[$userId]);
            }else {
                throw new InvalidArgumentException('Invalid user');
            }
            return $check;
        }

        public function filter(users $user,$value,$columns) {
            foreach($columns as $column) {
                switch(strtolower($column)) {
                    case 'id':
                        if(intval($value) === $user->getID()) {
                            return true;
                        }
                        break;
                    case 'username':
                        if (stripos(strtolower($user->getName()), $value) == 0) {
                            return true;
                        }
                        break;
                    case 'email':
                        if(stripos(strtolower($user->getEmail()), $value) == 0) {
                            return true;
                        }
                        break;
                    case 'name':
                        if(stripos(strtolower($user->getName()), $value) == 0) {
                            return true;
                        }
                        break;
                    case 'phone':
                        if(stripos($user->getPhone(), $value) == 0) {
                            return true;
                        }
                        break;
                    case 'address':
                        if(stripos(strtolower($user->getAddress()), $value) == 0) {
                            return true;
                        }
                        break;
                    case 'status':
                        if (strcasecmp($user->getStatus(), $value) === 0) {
                             return true;
                        }
                        break;
                    default: 
                    if($this->checkAllColumns($user,$value)) {
                        return true;
                    }
                    break;
                }
            }
            return false;
        }

        public function checkAllColumns(users $user,$value) {
            return (
                $user->getId() === intval($value) ||
                stripos($user->getUsername(), $value) !== false || 
                stripos($user->getPassword(), $value) !== false || 
                stripos($user->getEmail(), $value) !== false || 
                stripos($user->getName(), $value) !== false || 
                stripos($user->getPhone(), $value) !== false || 
                stripos($user->getAddress(), $value) !== false || 
                strcasecmp($user->getStatus(), $value)
            );
        }

        public function searchUser($value,$column) {
            $results = array();
            $columnString = implode(",", $column);

            $listuser = userDAL::getInstance()->searchUser($value,$columnString);
            foreach($listuser as $user) {
                if($this->filter($user,$value,$column)) {
                    $results[] = $user;
                }
            }
            if(count($results) <= 0) {
                throw new InvalidArgumentException('No user found!!');  
            }
            return $results;
        }

    }
?>

 