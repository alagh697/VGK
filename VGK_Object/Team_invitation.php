<?php

    class Team_invitation
    {

        private $invitaion_team;
        private $invitaion_user;
        private $invitaion_date;
        private $invitaion_message;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($team, $user, $date, $message)
        {
            $this->invitaion_team=$team;
            $this->invitaion_user=$user;
            $this->invitaion_date=$date;
            $this->invitaion_message=$message;
        }
        
        public function setForInsertTeamInvitation($team, $user, $message)
        {
            $this->invitaion_team=$team;
            $this->invitaion_user=$user;
            $this->invitaion_message=$message;
        }

        //Getter Setter
        //Invitaion_team
        public function setInvitaion_team($team)
        {
            $this->invitaion_team=$team;
        }

        public function getInvitaion_team()
        {
            return $this->invitaion_team;
        }

        //Invitaion_user
        public function setInvitaion_user($user)
        {
            $this->invitaion_user=$user;
        }

        public function getInvitaion_user()
        {
            return $this->invitaion_user;
        }

        //Invitaion_date
        public function setInvitaion_date($date)
        {
            $this->invitaion_date=$date;
        }

        public function getInvitaion_date()
        {
            return $this->invitaion_date;
        }

        //Invitaion_message
        public function setInvitaion_message($message)
        {
            $this->invitaion_message=$message;
        }

        public function getInvitaion_message()
        {
            return $this->invitaion_message;
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
            $query="insert into team_invitation (`invitation_team_number`, `invitation_user_number`, `invitation_date`, `invitation_message`) ";
            $query.="values ('".$this->invitaion_team->getTeam_number()."', '".$this->invitaion_user->getUser_number()."', NOW(), '".$this->invitaion_message."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from team_invitation where invitation_team_number=".$this->invitaion_team->getTeam_number()." and invitation_user_number=".$this->invitaion_user->getUser_number();
            $ok=$base->query($query);
            return $ok;
        }
    }
?>