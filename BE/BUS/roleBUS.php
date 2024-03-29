<?php
    // require("..\BE\DAL\roleDAL.php");
    require_once (__DIR__ . '/../DAL/roleDAL.php');
    class roleBUS {
        private $roleList = array();

        private static $instance;

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function __construct() {
            $this->roleList = array_merge($this->roleList, roleDAL::getInstance()->getAllRole());
        }
        
        public function getAllrole() {
            return $this->roleList;
        }

        public function refreshData() {
            $this->roleList = array_merge($this->roleList, roleDAL::getInstance()->getAllRole());
        }

        public function getRoleById($id) {
            foreach ($this->roleList as $role) {
                if ($role['id'] == $id) {
                    return $role;
                }
            } 
            return null;
        }
        

        public function getMax() {
            $max = 0;
            foreach ($this->roleList as $role) {
                $max++;
            }
        
            return $max + 1;
        } 

        public function addRole(roles $role) {
            if(empty($role->getName() || $role->getName() == null) 
            ){
                throw new InvalidArgumentException('Invalid information, check your input again!!');          
            }

            $newrole = roleDAL::getInstance()->addRole($role);

            if($newrole) {
                $this->roleList[] = $role;
                return true;
            }
            return false;
        }

        public function updateRole(roles $role) {
            $result = roleDAL::getInstance()->updateRole($role);
            if($result) {
                $index = array_search($role,$this->roleList,true);
                if($index !== false) {
                    $this->roleList[$index] = $role;
                    return $index;
                }
            }
            return -1;
        }

        public function deleteRole($id) {
            $role = $this->getroleById($id);

            $check = roleDAL::getInstance()->deleteRole($role['id']);

            if($check) {
                $roleId = $role['id'];
                unset($this->roleList[$roleId]);
            }else {
                throw new InvalidArgumentException('Invalid role');
            }
            return $check;
        }

        public function filter(roles $role,$value,$columns) {
            foreach($columns as $column) {
                switch(strtolower($column)) {
                    case 'id':
                        if(intval($value) === $role->getID()) {
                            return true;
                        }
                        break;
                    case 'name':
                        if (stripos($role->getName(), $value) !== false) {
                            return true;
                        }
                        break;
                    default: 
                    if($this->checkAllColumns($role,$value)) {
                        return true;
                    }
                    break;
                }
            }
            return false;
        }

        public function checkAllColumns(roles $role,$value) {
            return (
                $role->getId() === intval($value) ||
                stripos($role->getName(), $value) !== false // $ strtolower($role->getname)
            );
        }

        public function searchRole($value,$column) {
            $results = array();
            $columnString = implode(",", $column);

            $listrole = roleDAL::getInstance()->searchRole($value,$columnString);
            foreach($listrole as $role) {
                if($this->filter($role,$value,$column)) {
                    $results[] = $role;
                }
            }
            if(count($results) <= 0) {
                throw new InvalidArgumentException('No role found!!');
            }
            return $results;
        }

    }
?>
