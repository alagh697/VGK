<?php

    class User_language
    {

        private $user;
        private $language;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($user, $language)
        {
            $this->user=$user;
            $this->language=$language;
        }

        //Getter Setter
        //User
        public function setUser($user)
        {
            $this->user=$user;
        }

        public function getUser()
        {
            return $this->user;
        }

        //Language
        public function setLanguage($language)
        {
            $this->language=$language;
        }

        public function getLanguage()
        {
            return $this->language;
        }


        //Database methods
        //Load
        //Load 1
        public function ChargerUnDefi($base,$num)
        {

        }

        //Load list
        public static function ChargerLesDefis($base)
        {

        }

        //Insert
        public function insert($base)
        {
            $query="insert into user_language (`user_number`, `language_code`) ";
            $query.="values ('".$this->user->getUser_number()."', '".$this->language->getLanguage_code()."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from user_language where user_number=".$this->user->getUser_number()." and language_code=".$this->language->getLanguage_code();
            $ok=$base->query($query);
            return $ok;
        }
    }
?>