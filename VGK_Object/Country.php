<?php

    class Country
    {

        private $country_id;
        private $country_alpha3;
        private $country_name_en;
        private $country_name_fr;
        private $country_flag_url;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($id, $alpha3, $name_en, $name_fr, $flag_url)
        {
            $this->country_id=$id;
            $this->country_alpha3=$alpha3;
            $this->country_name_en=$name_en;
            $this->country_name_fr=$name_fr;
            $this->country_flag_url=$flag_url;

        }

        //Getter Setter
        //Country_id
        public function setCountry_id($id)
        {
            $this->country_id=$id;
        }

        public function getCountry_id()
        {
            return $this->country_id;
        }

        //Country_alpha3
        public function setCountry_alpha3($alpha3)
        {
            $this->country_alpha3=$alpha3;
        }

        public function getCountry_alpha3()
        {
            return $this->country_alpha3;
        }

        //Country_name_en
        public function setCountry_name_en($name_en)
        {
            $this->country_name_en=$name_en;
        }

        public function getCountry_name_en()
        {
            return $this->country_name_en;
        }

        //Country_name_fr
        public function setCountry_name_fr($name_fr)
        {
            $this->country_name_fr=$name_fr;
        }

        public function getCountry_name_fr()
        {
            return $this->country_name_fr;
        }

        //Country_flag_url
        public function setCountry_flag_url($flag_url)
        {
            $this->country_flag_url=$flag_url;
        }

        public function getCountry_flag_url()
        {
            return $this->country_flag_url;
        }




        //Database methods
        //Load
        //Load 1
        public function loadCountry($base)
        {
            $query="Select * from country where country_id=".$this->country_id;
            $data=$base->fetch_all_array($query);
            $country_exist=false;
            if(!empty($data))
            {
                $country_exist=true;
                foreach($data as $row)
                {
                    $this->country_alpha3=$row['country_alpha3'];
                    $this->country_name_en=$row['country_name_en'];
                    $this->country_name_fr=$row['country_name_fr'];
                    $this->country_flag_url=$row['country_flag_url'];
                }
            }
            return($country_exist);
        }

        //Load list
        public static function loadAllCountries($base)
        {
            $query="Select * from country";
            $data=$base->fetch_all_array($query);
            $theCountries=array();
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $id=$row['country_id'];
                    $alpha3=$row['country_alpha3'];
                    $name_en=$row['country_name_en'];
                    $name_fr=$row['country_name_fr'];
                    $flag_url=$row['country_flag_url'];
                    $country=new Country();
                    $country->setAll($id, $alpha3, $name_en, $name_fr, $flag_url);
                    $theCountries[]=$country;
                }
            }
            return $theCountries;
        }

    }
?>