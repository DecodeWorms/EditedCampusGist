<?php
namespace academic;

class Tertiary{
    public $firstName;
    public $class;
    public $address;
    public $gender;
    public $email;
    protected $password;
    public $department;

    public function __construct($aFirstName,$aClass,$anAddress,$agender,$anEmail,$aPassword,$aDepartment){
        $this->firstName = $aFirstName;
        $this->class = $aClass;
        $this->address = $anAddress;
        $this->gender = $agender;
        $this->email = $anEmail;
        $this->password = $aPassword;
        $this->department = $aDepartment;

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

    public function getEmail(){
        if($this->email != ""){
            return $this->email;
        }else{
            echo "Sorry!, the email is not defined";
        }
    }

    public function getPassword(){
        if($this->password != ""){
            return $this->password;
        }else{
            echo "Sorry!,the password is not defined";
        }
        
    }

    public function getDepartment(){
        if($this->department != ""){
            return $this->department;
        }else{
            echo "Sorry!,the department is not defined";
        }
    }
}
?>