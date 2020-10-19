<?php

    class Session_invitation
    {

        private $invitation_session;
        private $invitation_user;
        private $invitation_date;
        private $invitation_message;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($session, $user, $date, $message)
        {
            $this->invitation_session=$session;
            $this->invitation_user=$user;
            $this->invitation_date=$date;
            $this->invitation_message=$message;
        }
        
        public function setForInsertSessionInvitation($session, $user, $message)
        {
            $this->invitation_session=$session;
            $this->invitation_user=$user;
            $this->invitation_message=$message;
        }
        
        //Getter Setter
        //Invitation_session
        public function setInvitation_session($session)
        {
            $this->invitation_session=$session;
        }

        public function getInvitation_session()
        {
            return $this->invitation_session;
        }

        //Invitation_user
        public function setInvitation_user($user)
        {
            $this->invitation_user=$user;
        }

        public function getInvitation_user()
        {
            return $this->invitation_user;
        }

        //Invitation_date
        public function setInvitation_date($date)
        {
            $this->invitation_date=$date;
        }

        public function getInvitation_date()
        {
            return $this->invitation_date;
        }

        //Invitation_message
        public function setInvitation_message($message)
        {
            $this->invitation_message=$message;
        }

        public function getInvitation_message()
        {
            return $this->invitation_message;
        }


        //Database methods
        //Load
        //Load 1
        public function loadSessionInvitation($base)
        {
            $query="Select * from session_invitation where invitation_session_number=".$this->invitation_session->getSession_number()." AND invitation_user_number=".$this->invitation_user->getUser_number();
            $data=$base->fetch_all_array($query);
            $session_invitation_exist=false;
            if(!empty($data))
            {
                $session_invitation_exist=true;
                foreach($data as $row)
                {
                    $this->invitation_date=$row['invitation_date'];
                    $this->invitation_message=$row['invitation_message'];
                }
            }
            return($session_invitation_exist);
        }

        //Insert
        public function insert($base)
        {
            $query="INSERT INTO `session_invitation`(`invitation_session_number`, `invitation_user_number`, `invitation_date`, `invitation_message`) ";
            $query.="values ('".$this->invitation_session->getSession_number()."', '".$this->invitation_user->getUser_number()."', NOW(), '".$this->invitation_message."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from session_invitation where invitation_session_number=".$this->invitation_session->getSession_number()." and invitation_user_number=".$this->invitation_user->getUser_number();
            $ok=$base->query($query);
            return $ok;
        }
    }
?>