<?php
namespace academic;

class Basic{
    public $firstName;
    public $class;
    public $address;
    public $gender;

    public function __construct($aFirstName,$aClass,$anAddress,$agender){
        $this->firstName = $aFirstName;
        $this->class = $aClass;
        $this->address = $anAddress;
        $this->gender = $agender;

    }

    public function getFirstName(){
        if($this->firstName != ""){
            return $this->firstName;
        }
        else{
            echo "Sorry!,First Name is not defined";
        }
    }

    public function getClass(){
        if($this->class != ""){
            return $this->class;
        }else{
            echo "Sorry!,the class is not defined";
        }
    }

    public function getAddress(){
        if($this->address != ""){
            return $this->address;
        }
        else{
            echo "Sorry!,the address is not defined";
        }
    }

    public function getGender(){
        if($this->gender != ""){
            return $this->gender;
        }else{
            echo "Sorry!,the gender is not defined";
        }
    }
}
?>