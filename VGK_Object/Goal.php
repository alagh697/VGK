<?php

    class Goal
    {

        private $goal_number;
        private $goal_user;
        private $goal_game;
        private $goal_platform;
        private $goal_title;
        private $goal_description;
        private $goal_need_help;
        private $goal_creation_date;
        private $goal_copy;
        private $goal_achieved;
        private $goal_achievement_date;
        private $goal_achievement_description;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($number, $user, $game, $platform, $title, $description, $need_help, $creation_date, $goal_copy, $achieved, $achievement_date, $achievement_description)
        {
            $this->goal_number=$number;
            $this->goal_user=$user;
            $this->goal_game=$game;
            $this->goal_platform=$platform;
            $this->goal_title=$title;
            $this->goal_description=$description;
            $this->goal_need_help=$need_help;
            $this->goal_creation_date=$creation_date;
            $this->goal_copy=$goal_copy;
            $this->goal_achieved=$achieved;
            $this->goal_achievement_date=$achievement_date;
            $this->goal_achievement_description=$achievement_description;
        }

        public function setForInsertGoal($user, $game, $platform, $title, $description, $need_help)
        {
            $this->goal_user=$user;
            $this->goal_game=$game;
            $this->goal_platform=$platform;
            $this->goal_title=$title;
            $this->goal_description=$description;
            $this->goal_need_help=$need_help;
        }
        
        public function setForInsertGoalCopy($game, $platform, $title, $description, $need_help)
        {
            $this->goal_game=$game;
            $this->goal_platform=$platform;
            $this->goal_title=$title;
            $this->goal_description=$description;
            $this->goal_need_help=$need_help;
        }

        //Getter Setter
        //Goal_number
        public function setGoal_number($number)
        {
            $this->goal_number=$number;
        }

        public function getGoal_number()
        {
            return $this->goal_number;
        }

        //Goal_user
        public function setGoal_user($user)
        {
            $this->goal_user=$user;
        }

        public function getGoal_user()
        {
            return $this->goal_user;
        }

        //Goal_game
        public function setGoal_game($game)
        {
            $this->goal_game=$game;
        }

        public function getGoal_game()
        {
            return $this->goal_game;
        }

        //Goal_platform
        public function setGoal_platform($platform)
        {
            $this->goal_platform=$platform;
        }

        public function getGoal_platform()
        {
            return $this->goal_platform;
        }

        //Goal_title
        public function setGoal_title($title)
        {
            $this->goal_title=$title;
        }

        public function getGoal_title()
        {
            return $this->goal_title;
        }

        //Goal_description
        public function setGoal_description($description)
        {
            $this->goal_description=$description;
        }

        public function getGoal_description()
        {
            return $this->goal_description;
        }
        
        //Goal_need_help
        public function setGoal_need_help($need_help)
        {
            $this->goal_need_help=$need_help;
        }

        public function getGoal_need_help()
        {
            return $this->goal_need_help;
        }

        //Goal_creation_date
        public function setGoal_creation_date($creation_date)
        {
            $this->goal_creation_date=$creation_date;
        }

        public function getGoal_creation_date()
        {
            return $this->goal_creation_date;
        }
        
        //Goal_copy
        public function setGoal_copy($goal)
        {
            $this->goal_copy=$goal;
        }

        public function getGoal_copy()
        {
            return $this->goal_copy;
        }

        //Goal_achieved
        public function setGoal_achieved($achieved)
        {
            $this->goal_achieved=$achieved;
        }

        public function getGoal_achieved()
        {
            return $this->goal_achieved;
        }

        //Goal_achievement_date
        public function setGoal_achievement_date($achievement_date)
        {
            $this->goal_achievement_date=$achievement_date;
        }

        public function getGoal_achievement_date()
        {
            return $this->goal_achievement_date;
        }

        //Goal_achievement_description
        public function setGoal_achievement_description($achievement_description)
        {
            $this->goal_achievement_description=$achievement_description;
        }

        public function getGoal_achievement_description()
        {
            return $this->goal_achievement_description;
        }


        //Database methods
        //Load
        //Load with number
        public function loadGoal($base)
        {
            $query="Select * from goal where goal_number=".$this->goal_number;
            $data=$base->fetch_all_array($query);
            $goal_exist=false;
            if(!empty($data))
            {
                $goal_exist=true;
                foreach($data as $row)
                {
                    $user_number=$row['goal_user_number'];
                    $game_number=$row['goal_game_number'];
                    $platform_code=$row['goal_platform_code'];
                    $user=new User();
                    $user->setUser_number($user_number);
                    $user->loadUser($base);
                    $game=new Game();
                    $game->setGame_number($game_number);
                    $game->loadGame($base);
                    $platform=new Platform();
                    $platform->setPlatform_code($platform_code);
                    $platform->loadPlatform($base);
                    $this->goal_user=$user;
                    $this->goal_game=$game;
                    $this->goal_platform=$platform;
                    $this->goal_title=$row['goal_title'];
                    $this->goal_description=$row['goal_description'];
                    $this->goal_need_help=$row['goal_need_help'];
                    $this->goal_creation_date=$row['goal_creation_date'];
                    $this->goal_copy=new Goal();
                    $this->goal_copy->goal_number=$row['goal_copy_number'];
                    if($this->goal_copy->goal_number!=0)
                    {
                        $this->goal_copy->loadGoal($base);
                    }
                    $this->goal_achieved=$row['goal_achieved'];
                    $this->goal_achievement_date=$row['goal_achievement_date'];
                    $this->goal_achievement_description=$row['goal_achievement_description'];
                    
                }
            }
            return($goal_exist);
        }
        
        //Load with user and copy
        public function loadGoalCopy($base)
        {
            $query="Select * from goal where goal_user_number=".$this->goal_user->getUser_number()." AND goal_copy_number=".$this->goal_copy->goal_number;
            $data=$base->fetch_all_array($query);
            $goal_copy_exist=false;
            if(!empty($data))
            {
                $goal_copy_exist=true;
                foreach($data as $row)
                {
                    $this->goal_number=$row['goal_number'];
                    $game_number=$row['goal_game_number'];
                    $platform_code=$row['goal_platform_code'];
                    $game=new Game();
                    $game->setGame_number($game_number);
                    $game->loadGame($base);
                    $platform=new Platform();
                    $platform->setPlatform_code($platform_code);
                    $platform->loadPlatform($base);
                    $this->goal_game=$game;
                    $this->goal_platform=$platform;
                    $this->goal_title=$row['goal_title'];
                    $this->goal_description=$row['goal_description'];
                    $this->goal_need_help=$row['goal_need_help'];
                    $this->goal_copy=new Goal();
                    $this->goal_copy->goal_number=$row['goal_copy_number'];
                    if($this->goal_copy->goal_number!=0)
                    {
                        $this->goal_copy->loadGoal($base);
                    }
                    $this->goal_achieved=$row['goal_achieved'];
                    $this->goal_achievement_date=$row['goal_achievement_date'];
                    $this->goal_achievement_description=$row['goal_achievement_description'];
                    
                }
            }
            return($goal_copy_exist);
        }
        
        
        //Load list
        public static function loadAllGoals($base)
        {

        }

        //Insert
        public function insert($base)
        {
            $query="insert into goal (`goal_user_number`, `goal_game_number`, `goal_platform_code`, `goal_title`, `goal_description`, goal_need_help, `goal_creation_date`) ";
            $query.="values ('".$this->goal_user->getUser_number()."', '".$this->goal_game->getGame_number()."', '".$this->goal_platform->getPlatform_code()."', '".$this->goal_title."', '".$this->goal_description."', '".$this->goal_need_help."', NOW())";
            $ok=$base->query($query);
            return $ok;
        }
        
        //Insert a copy
        public function insertGoalCopy($base)
        {
            $query="insert into goal (`goal_user_number`, `goal_game_number`, `goal_platform_code`, `goal_title`, `goal_description`, goal_need_help, `goal_creation_date`, `goal_copy_number`) ";
            $query.="values ('".$this->goal_user->getUser_number()."', '".$this->goal_game->getGame_number()."', '".$this->goal_platform->getPlatform_code()."', '".$this->goal_title."', '".$this->goal_description."', '".$this->goal_need_help."', NOW(), ".$this->goal_copy->getGoal_number().")";
            $ok=$base->query($query);
            return $ok;
        }

        //Update
        public function updateGoalAchievement($base)
        {
            $query="update goal set goal_achieved=1, goal_achievement_date=NOW(), goal_achievement_description='".$this->goal_achievement_description."' ";
            $query.="where goal_number=".$this->goal_number;
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from goal where goal_number=".$this->goal_number;
            $ok=$base->query($query);
            return $ok;
        }
    }
?>