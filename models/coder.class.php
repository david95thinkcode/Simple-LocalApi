<?php 

class Coder {
    public $id;
    public $name;
    public $phone_number;
    public $country;
    public $sex;    

    public function __construct() {}

    public function Hydrate($id, $name, $phone, $sex, $country) {
        $this->id = $id;
        $this->name = $name;
        $this->phone_number = $phone;
        $this->country = $country;
        $this->sex = $sex;
    }

}