<?php

    class Challenge_invitation
    {

        private $invitation_challenge;
        private $invitation_user;
        private $invitation_date;
        private $invitation_message;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($challenge, $user, $date, $message)
        {
            $this->invitation_challenge=$challenge;
            $this->invitation_user=$user;
            $this->invitation_date=$date;
            $this->invitation_message=$message;
        }
        
        public function setForInsertChallengeInvitation($challenge, $user, $message)
        {
            $this->invitation_challenge=$challenge;
            $this->invitation_user=$user;
            $this->invitation_message=$message;
        }

        //Getter Setter
        //Invitation_challenge
        public function setInvitation_challenge($challenge)
        {
            $this->invitation_challenge=$challenge;
        }

        public function getInvitation_challenge()
        {
            return $this->invitation_challenge;
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
        public function loadChallengeInvitation($base)
        {
            $query="Select * from challenge_invitation where invitation_challenge_number=".$this->invitation_challenge->getChallenge_number()." AND invitation_user_number=".$this->invitation_user->getUser_number();
            $data=$base->fetch_all_array($query);
            $challenge_invitation_exist=false;
            if(!empty($data))
            {
                $challenge_invitation_exist=true;
                foreach($data as $row)
                {
                    $this->invitation_date=$row['invitation_date'];
                    $this->invitation_message=$row['invitation_message'];
                }
            }
            return($challenge_invitation_exist);
        }
        
        //Insert
        public function insert($base)
        {
            $query="insert into challenge_invitation (`invitation_challenge_number`, `invitation_user_number`, `invitation_date`, `invitation_message`) ";
            $query.="values ('".$this->invitation_challenge->getChallenge_number()."', '".$this->invitation_user->getUser_number()."', NOW(), '".$this->invitation_message."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from challenge_invitation where invitation_challenge_number=".$this->invitation_challenge->getChallenge_number()." and invitation_user_number=".$this->invitation_user->getUser_number();
            $ok=$base->query($query);
            return $ok;
        }
    }
?>