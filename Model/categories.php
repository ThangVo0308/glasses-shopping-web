<?php
class Categories {
    private $id, $name;

    public function __construct($id = null, $name = null) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function __toString() {
        return "Category ID: {$this->getId()}\n" .
               "Name: {$this->getName()}\n";
    }
}
?>
