<?php

    class Language
    {

        private $language_code;
        private $language_name_fr;
        private $language_name_en;
        private $language_name_ov;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($code, $name_fr, $name_en, $name_ov)
        {
            $this->language_code=$code;
            $this->language_name_fr=$name_fr;
            $this->language_name_en=$name_en;
            $this->language_name_ov=$name_ov;
        }

        //Getter Setter
        //Language_code
        public function setLanguage_code($code)
        {
            $this->language_code=$code;
        }

        public function getLanguage_code()
        {
            return $this->language_code;
        }

        //Language_name_fr
        public function setLanguage_name_fr($name_fr)
        {
            $this->language_name_fr=$name_fr;
        }

        public function getLanguage_name_fr()
        {
            return $this->language_name_fr;
        }

        //Language_name_en
        public function setLanguage_name_en($name_en)
        {
            $this->language_name_en=$name_en;
        }

        public function getLanguage_name_en()
        {
            return $this->language_name_en;
        }

        //Language_name_ov
        public function setLanguage_name_ov($name_ov)
        {
            $this->language_name_ov=$name_ov;
        }

        public function getLanguage_name_ov()
        {
            return $this->language_name_ov;
        }

        //Database methods
        //Load
        //Load 1
        public function loadLanguage($base)
        {
            $query="Select * from language where language_code='".$this->language_code."'";
            $data=$base->fetch_all_array($query);
            $language_exist=false;
            if(!empty($data))
            {
                $language_exist=true;
                foreach($data as $row)
                {
                    $this->language_name_fr=$row['language_name_fr'];
                    $this->language_name_en=$row['language_name_en'];
                    $this->language_name_ov=$row['language_name_ov'];   
                }
            }
            return($language_exist);
        }

        //Load list
        public static function loadAllLanguages($base)
        {
            $query="Select * from language";
            $data=$base->fetch_all_array($query);
            $theLanguages=array();
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $code=$row['language_code'];
                    $name_fr=$row['language_name_fr'];
                    $name_en=$row['language_name_en'];
                    $name_ov=$row['language_name_ov'];
                    $language=new Language();
                    $language->setAll($code, $name_fr, $name_en, $name_ov);
                    $theLanguages[]=$language;
                }
            }
            return $theLanguages;
        }

    }
?>