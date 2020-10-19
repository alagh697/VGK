<?php

    class Challenge
    {

        private $challenge_number;
        private $challenge_originator;
        private $challenge_game;
        private $challenge_title;
        private $challenge_description;
        private $challenge_creation_date;
        private $challenge_end_date;
        private $challenge_winner;
        
        private $theChallengeTakers=array();
        private $theChallengeInvitations=array();
       

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($number, $originator, $game, $title, $description, $creation_date, $end_date, $winner)
        {
            $this->challenge_number=$number;
            $this->challenge_originator=$originator;
            $this->challenge_game=$game;
            $this->challenge_title=$title;
            $this->challenge_description=$description;
            $this->challenge_creation_date=$creation_date;
            $this->challenge_end_date=$end_date;
            $this->challenge_winner=$winner;
        }

        public function setForInsertChallenge($originator, $game, $title, $description, $end_date)
        {
            $this->challenge_originator=$originator;
            $this->challenge_game=$game;
            $this->challenge_title=$title;
            $this->challenge_description=$description;
            $this->challenge_end_date=$end_date;
        }

        //Getter Setter
        //Challenge_number
        public function setChallenge_number($number)
        {
            $this->challenge_number=$number;
        }

        public function getChallenge_number()
        {
            return $this->challenge_number;
        }

        //Challenge_originator
        public function setChallenge_originator($originator)
        {
            $this->challenge_originator=$originator;
        }

        public function getChallenge_originator()
        {
            return $this->challenge_originator;
        }

        //Challenge_game
        public function setChallenge_game($game)
        {
            $this->challenge_game=$game;
        }

        public function getChallenge_game()
        {
            return $this->challenge_game;
        }

        //Challenge_title
        public function setChallenge_title($title)
        {
            $this->challenge_title=$title;
        }

        public function getChallenge_title()
        {
            return $this->challenge_title;
        }

        //Challenge_description
        public function setChallenge_description($description)
        {
            $this->challenge_description=$description;
        }

        public function getChallenge_description()
        {
            return $this->challenge_description;
        }

        //Challenge_creation_date
        public function setChallenge_creation_date($creation_date)
        {
            $this->challenge_creation_date=$creation_date;
        }

        public function getChallenge_creation_date()
        {
            return $this->challenge_creation_date;
        }

        //Challenge_end_date
        public function setChallenge_end_date($end_date)
        {
            $this->challenge_end_date=$end_date;
        }

        public function getChallenge_end_date()
        {
            return $this->challenge_end_date;
        }

        //Challenge_winner
        public function setChallenge_winner($winner)
        {
            $this->challenge_winner=$winner;
        }

        public function getChallenge_winner()
        {
            return $this->challenge_winner;
        }

        //Database methods
        //Load
        //Load 1
        public function loadChallenge($base)
        {
            $query="Select * from challenge where challenge_number=".$this->challenge_number;
            $data=$base->fetch_all_array($query);
            $challenge_exist=false;
            if(!empty($data))
            {
                $challenge_exist=true;
                foreach($data as $row)
                {
                    $user_number=$row['challenge_originator_number'];
                    $game_number=$row['challenge_game_number'];
                    $user=new User();
                    $user->setUser_number($user_number);
                    $user->loadUser($base);
                    $game=new Game();
                    $game->setGame_number($game_number);
                    $game->loadGame($base);
                    $this->challenge_originator=$user;
                    $this->challenge_game=$game;
                    $this->challenge_title=$row['challenge_title'];
                    $this->challenge_description=$row['challenge_description'];
                    $this->challenge_creation_date=$row['challenge_creation_date'];
                    $this->challenge_end_date=$row['challenge_end_date'];
                    $this->challenge_winner=new User();
                    $this->challenge_winner->setUser_number($row['challenge_winner_number']);
                    $winner_exist=$this->challenge_winner->loadUser($base);
                    if(!($winner_exist))
                    {
                        $this->challenge_winner->setUser_id('');
                    }
                }
            }
            return($challenge_exist);
        }

        //Load list
        public static function loadAllChallenges($base)
        {

        }
        
        public function getChallengeTakers()
        {
            return $this->theChallengeTakers;
        }
        
        //Load the users who take up the challenge 
        public function loadChallengeTakers($base)
        {
            $query="Select * from challenge_taker where take_up_challenge_number=".$this->challenge_number;
            $data=$base->fetch_all_array($query);
            $challenge_takers_exist=false;
            if(!empty($data))
            {
                $challenge_takers_exist=true;
                foreach($data as $row)
                {
                    $number=$row['take_up_user_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $taker=new Challenge_taker();
                    $taker->setTake_up_user($user);
                    $taker->setTake_up_challenge($this);
                    $taker->loadChallenge_taker($base);
                    $this->theChallengeTakers[]=$taker;
                }
            }
            return($challenge_takers_exist);
        }
        
        public function getChallengeInvitations()
        {
            return $this->theChallengeInvitations;
        }
        
        //Load the invitations sent for the challenge 
        public function loadAllChallengeInvitations($base)
        {
            $query="Select * from challenge_invitation where invitation_challenge_number=".$this->challenge_number;
            $data=$base->fetch_all_array($query);
            $challenge_invitations_exist=false;
            if(!empty($data))
            {
                $challenge_invitations_exist=true;
                foreach($data as $row)
                {
                    $number=$row['invitation_user_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $invitation=new Challenge_inviattion();
                    $invitation->setInvitation_user($user);
                    $invitation->setInvitation_challenge($this);
                    $invitation->loadChallengeInvitation($base);
                    $this->theChallengeInvitations[]=$invitation;
                }
            }
            return($challenge_invitations_exist);
        }

        //Insert
        public function insert($base)
        {
            $query="insert into challenge (`challenge_originator_number`, `challenge_game_number`, `challenge_title`, `challenge_description`, `challenge_creation_date`, `challenge_end_date`) ";
            $query.="values ('".$this->challenge_originator->getUser_number()."', '".$this->challenge_game->getGame_number()."', ";
            $query.="'".$this->challenge_title."', '".$this->challenge_description."', NOW(), '".$this->challenge_end_date."')";
            $ok=$base->query($query);
            return $ok;
        }
      

        //Update
        /*public function updateChallengeInfo($base)
        {
            $query="update challenge set ";
            $query.="where challenge_=".$this->challenge_number;
            $ok=$base->query($query);
            return $ok;
        }*/
        
        public function updateChallengeWinner($base)
        {
            $query="update challenge set challenge_end_date=NOW(), challenge_winner_number=".$this->challenge_winner->getUser_number();
            $query.=" where challenge_number=".$this->challenge_number;
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from challenge where challenge_number=".$this->challenge_number;
            $ok=$base->query($query);
            return $ok;
        }
    }
?>