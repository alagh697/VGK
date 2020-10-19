<?php

    class Challenge_taker
    {

        private $take_up_user;
        private $take_up_challenge;
        private $take_up_platform;
        private $take_up_date;
        private $take_up_achievement_date;
        private $take_up_proof_url;
        private $take_up_score;
        private $take_up_verified;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($user, $challenge, $platform, $date, $achievement_date, $proof_url, $score, $verified)
        {
            $this->take_up_user=$user;
            $this->take_up_challenge=$challenge;
            $this->take_up_platform=$platform;
            $this->take_up_date=$date;
            $this->take_up_achievement_date=$achievement_date;
            $this->take_up_proof_url=$proof_url;
            $this->take_up_score=$score;
            $this->take_up_verified=$verified;
        }
        
        public function setForInsertChallenge_taker($user, $challenge, $platform)
        {
            $this->take_up_user=$user;
            $this->take_up_challenge=$challenge;
            $this->take_up_platform=$platform;
        }

        //Getter Setter
        //Take_up_user
        public function setTake_up_user($user)
        {
            $this->take_up_user=$user;
        }

        public function getTake_up_user()
        {
            return $this->take_up_user;
        }

        //Take_up_challenge
        public function setTake_up_challenge($challenge)
        {
            $this->take_up_challenge=$challenge;
        }

        public function getTake_up_challenge()
        {
            return $this->take_up_challenge;
        }

        //Take_up_platform
        public function setTake_up_platform($platform)
        {
            $this->take_up_platform=$platform;
        }

        public function getTake_up_platform()
        {
            return $this->take_up_platform;
        }

        //Take_up_date
        public function setTake_up_date($date)
        {
            $this->take_up_date=$date;
        }

        public function getTake_up_date()
        {
            return $this->take_up_date;
        }

        //Take_up_achievement_date
        public function setTake_up_achievement_date($achievement_date)
        {
            $this->take_up_achievement_date=$achievement_date;
        }

        public function getTake_up_achievement_date()
        {
            return $this->take_up_achievement_date;
        }

        //Take_up_proof_url
        public function setTake_up_proof_url($proof_url)
        {
            $this->take_up_proof_url=$proof_url;
        }

        public function getTake_up_proof_url()
        {
            return $this->take_up_proof_url;
        }

        //Take_up_score
        public function setTake_up_score($score)
        {
            $this->take_up_score=$score;
        }

        public function getTake_up_score()
        {
            return $this->take_up_score;
        }

        //Take_up_verified
        public function setTake_up_verified($verified)
        {
            $this->take_up_verified=$verified;
        }

        public function getTake_up_verified()
        {
            return $this->take_up_verified;
        }


        //Database methods
        //Load
        //Load 1
        public function loadChallenge_taker($base)
        {
            $query="Select * from challenge_taker where take_up_challenge_number=".$this->take_up_challenge->getChallenge_number()." AND take_up_user_number=".$this->take_up_user->getUser_number();
            $data=$base->fetch_all_array($query);
            $challenge_taker_exist=false;
            if(!empty($data))
            {
                $challenge_taker_exist=true;
                foreach($data as $row)
                {
                    $platform_code=$row['take_up_platform_code'];
                    $platform=new Platform();
                    $platform->setPlatform_code($platform_code);
                    $platform->loadPlatform($base);
                    $this->take_up_platform=$platform;
                    $this->take_up_date=$row['take_up_date'];
                    $this->take_up_achievement_date=$row['take_up_achievement_date'];
                    $this->take_up_proof_url=$row['take_up_proof_url'];
                    $this->take_up_score=$row['take_up_score'];
                    $this->take_up_verified=$row['take_up_verified'];
                }
            }
            return($challenge_taker_exist);
        }
        

        //Load list
        public static function loadAllChallenge_takers($base)
        {

        }

        
        //Insert
        public function insert($base)
        {
            $query="insert into challenge_taker (`take_up_user_number`, `take_up_challenge_number`, `take_up_platform_code`, `take_up_date`) ";
            $query.="values ('".$this->take_up_user->getUser_number()."', '".$this->take_up_challenge->getChallenge_number()."', '".$this->take_up_platform->getPlatform_code()."', NOW())";
            $ok=$base->query($query);
            return $ok;
        }

        //Update
        public function updateTakerAchievement($base)
        {
            $query="update challenge_taker set  `take_up_achievement_date`=NOW(), `take_up_proof_url`='".$this->take_up_proof_url."', `take_up_score`='".$this->take_up_score."' ";
            $query.="where take_up_user_number=".$this->take_up_user->getUser_number()." and take_up_challenge_number=".$this->take_up_challenge->getChallenge_number();
            $ok=$base->query($query);
            return $ok;
        }
        
        public function updateTakerVerification($base)
        {
            $query="update challenge_taker set  `take_up_verified`=1 ";
            $query.="where take_up_user_number=".$this->take_up_user->getUser_number()." and take_up_challenge_number=".$this->take_up_challenge->getChallenge_number();
            $ok=$base->query($query);
            return $ok;
        }
        
        //Delete
        public function delete($base)
        {
            $query="delete from challenge_taker where take_up_user_number=".$this->take_up_user->getUser_number()." and take_up_challenge_number=".$this->take_up_challenge->getChallenge_number();
            $ok=$base->query($query);
            return $ok;
        }
    }
?>