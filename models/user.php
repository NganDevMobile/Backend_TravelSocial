<?php
    class User{
        private $id;
        private $email;
        private $hashPassword;
        private $fullname;
        private $phone;
        private $gender;
        private $avatar;

        // function __construct($id, $email, $hashPassword, $fullname, $phone, $gender, $avatar)
        // {
        //     $this->id = $id;
        //     $this->email = $email;
        //     $this->hashPassword = $hashPassword;
        //     $this->fullname = $fullname;
        //     $this->phone = $phone;
        //     $this->gender = $gender;
        //     $this->avatar = $avatar;
        // }
        function __construct($id, $email, $hashPassword)
        {
            $this->id = $id;
            $this->email = $email;
            $this->hashPassword = $hashPassword;
        }
        public function getId()
        {
            return $this->id;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function getHashPassword()
        {
            return $this->hashPassword;
        }
        public function getFullname()
        {
            return $this->fullname;
        }
        public function getPhone()
        {
            return $this->phone;
        }
        public function getGender()
        {
            return $this->gender;
        }
        public function getAvatar()
        {
            return $this->avatar;
        }

    }
?>