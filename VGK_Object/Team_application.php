<?php

    class Team_application
    {

        private $application_team;
        private $application_applicant;
        private $application_message;
        private $application_date;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($team, $applicant, $message, $date)
        {
            $this->application_team=$team;
            $this->application_applicant=$applicant;
            $this->application_message=$message;
            $this->application_date=$date;
        }
        
        public function setForInsertTeam_application($team, $applicant, $message)
        {
            $this->application_team=$team;
            $this->application_applicant=$applicant;
            $this->application_message=$message;
        }

        //Getter Setter
        //Application_team
        public function setApplication_team($team)
        {
            $this->application_team=$team;
        }

        public function getApplication_team()
        {
            return $this->application_team;
        }

        //Application_applicant
        public function setApplication_applicant($applicant)
        {
            $this->application_applicant=$applicant;
        }

        public function getApplication_applicant()
        {
            return $this->application_applicant;
        }

        //Application_message
        public function setApplication_message($message)
        {
            $this->application_message=$message;
        }

        public function getApplication_message()
        {
            return $this->application_message;
        }

        //Application_date
        public function setApplication_date($date)
        {
            $this->application_date=$date;
        }

        public function getApplication_date()
        {
            return $this->application_date;
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
            $query="insert into team_application (`application_team_number`, `application_applicant_number`, `application_message`, `application_date`) ";
            $query.="values ('".$this->application_team->getTeam_number()."', '".$this->application_applicant->getUser_number()."', '".$this->application_message."', NOW())";
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from team_application where application_team_number_=".$this->application_team->getTeam_number()." and application_applicant_number=".$this->application_applicant->getUser_number();
            $ok=$base->query($query);
            return $ok;
        }
    }
?>