<?php

    class Community_invitation
    {

        private $invitaion_community;
        private $invitaion_user;
        private $invitaion_date;
        private $invitaion_message;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($community, $user, $date, $message)
        {
            $this->invitaion_community=$community;
            $this->invitaion_user=$user;
            $this->invitaion_date=$date;
            $this->invitaion_message=$message;
        }
        
        public function setForInsertCommunityInvitation($community, $user, $message)
        {
            $this->invitaion_community=$community;
            $this->invitaion_user=$user;
            $this->invitaion_message=$message;
        }
        
        //Getter Setter
        //Invitaion_session
        public function setInvitaion_community($community)
        {
            $this->invitaion_community=$community;
        }

        public function getInvitaion_community()
        {
            return $this->invitaion_community;
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
        public function loadCommunity_invitation($base,$num)
        {

        }

        //Load list
        public static function loadAllCommunity_invitations($base)
        {

        }

        //Insert
        public function insert($base)
        {
            $query="insert into community_invitation (`invitation_community_number`, `invitation_user_number`, `invitation_date`, `invitation_message`) ";
            $query.="values ('".$this->invitaion_community->getCommunity_number()."', '".$this->invitaion_user->getUser_number()."', NOW(), '".$this->invitaion_message."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from community_invitation where invitation_community_number=".$this->invitaion_community->getCommunity_number()." and invitation_user_number=".$this->invitaion_user->getUser_number();
            $ok=$base->query($query);
            return $ok;
        }
    }
?>