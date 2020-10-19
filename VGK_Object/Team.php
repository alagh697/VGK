<?php

    class Team
    {

        private $team_number;
        private $team_name;
        private $team_leader;
        private $team_logo_url;
        private $team_description;
        private $team_creation_date;
        private $team_min_age;
        private $team_max_age;
        private $team_main_game;
        private $team_main_platform;
        private $team_enrollment;
        
        private $theTeamMembers=array();
        private $theTeamApplications=array();
        private $theTeamInvitations=array();

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($number, $name, $leader, $logo_url, $description, $creation_date, $min_age, $max_age, $main_game, $main_platform, $enrollment)
        {
            $this->team_number=$number;
            $this->team_name=$name;
            $this->team_leader=$leader;
            $this->team_logo_url=$logo_url;
            $this->team_description=$description;
            $this->team_creation_date=$creation_date;
            $this->team_min_age=$min_age;
            $this->team_min_age=$max_age;
            $this->team_main_game=$main_game;
            $this->team_main_platform=$main_platform;
            $this->team_enrollment=$enrollment;
        }

        public function setForInsertTeam($name, $leader, $logo_url, $description, $min_age, $max_age, $main_game, $main_platform, $enrollment)
        {
            $this->team_name=$name;
            $this->team_leader=$leader;
            $this->team_logo_url=$logo_url;
            $this->team_description=$description;
            $this->team_min_age=$min_age;
            $this->team_min_age=$max_age;
            $this->team_main_game=$main_game;
            $this->team_main_platform=$main_platform;
            $this->team_enrollment=$enrollment;
        }

        //Getter Setter
        //Team_number
        public function setTeam_number($number)
        {
            $this->team_number=$number;
        }

        public function getTeam_number()
        {
            return $this->team_number;
        }

        //Team_name
        public function setTeam_name($name)
        {
            $this->team_name=$name;
        }

        public function getTeam_name()
        {
            return $this->team_name;
        }


        //Team_leader
        public function setTeam_leader($leader)
        {
            $this->team_leader=$leader;
        }

        public function getTeam_leader()
        {
            return $this->team_leader;
        }


        //Team_logo_url
        public function setTeam_logo_url($logo_url)
        {
            $this->team_logo_url=$logo_url;
        }

        public function getTeam_logo_url()
        {
            return $this->team_logo_url;
        }


        //Team_description
        public function setTeam_description($description)
        {
            $this->team_description=$description;
        }

        public function getTeam_description()
        {
            return $this->team_description;
        }

        //Team_creation_date
        public function setTeam_creation_date($creation_date)
        {
            $this->team_creation_date=$creation_date;
        }

        public function getTeam_creation_date()
        {
            return $this->team_creation_date;
        }

        //Team_min_age
        public function setTeam_min_age($min_age)
        {
            $this->team_min_age=$min_age;
        }

        public function getTeam_min_age()
        {
            return $this->team_min_age;
        }


        //Team_max_age
        public function setTeam_max_age($max_age)
        {
            $this->team_max_age=$max_age;
        }

        public function getTeam_max_age()
        {
            return $this->team_max_age;
        }


        //Team_main_game
        public function setTeam_main_game($main_game)
        {
            $this->team_main_game=$main_game;
        }

        public function getTeam_main_game()
        {
            return $this->team_main_game;
        }


        //Team_main_platform
        public function setTeam_main_platform($main_platform)
        {
            $this->team_main_platform=$main_platform;
        }

        public function getTeam_main_platform()
        {
            return $this->team_main_platform;
        }

        //Team_enrollment
        public function setTeam_enrollment($enrollment)
        {
            $this->team_enrollment=$enrollment;
        }

        public function getTeam_enrollment()
        {
            return $this->team_enrollment;
        }


        //Database methods
        //Load
        //Load 1
        public function loadTeam($base)
        {

        }

        //Load list
        public static function loadAllTeams($base)
        {

        }
        
        //Load the users who are members of the team
        public function loadAllTeamMembers($base)
        {
            $query="Select * from user where user_team_number=".$this->team_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['user_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $this->theTeamMembers[]=$member;
                }
            }
        }
        
        //Load the users who sent an application to join the team
        public function loadAllTeamApplications($base)
        {
            $query="Select * from team_application where application_team_number=".$this->team_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['application_applicant_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $application=new Team_application();
                    $application->setApplication_applicant($user);
                    $application->setApplication_team($this);
                    $application->loadTeam_application($base);
                    $this->theTeamApplications[]=$application;
                }
            }
        }
        
        //Load the invitations sent for the team  
        public function loadAllTeamInvitations($base)
        {
            $query="Select * from team_invitation where invitation_team_number=".$this->team_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['invitation_user_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $invitation=new Team_inviattion();
                    $invitation->setInvitation_user($user);
                    $invitation->setInvitation_team($this);
                    $invitation->loadTeam_invitation($base);
                    $this->theTeamInvitations[]=$invitation;
                }
            }
        }

        //Insert
        public function insert($base)
        {
            $query="insert into team (`team_name`, `team_leader_number`, `team_logo_url`, `team_description`, `team_creation_date`, `team_min_age`, `team_max_age`, `team_main_game_number`, `team_main_platform_code`, `team_enrollment`) ";
            $query.="values ('".$this->team_name."', '".$this->team_leader->getUser_number()."', '".$this->team_logo_url."', '".$this->team_description."', NOW(), '".$this->team_min_age."', '".$this->team_max_age."'";
            $query.=", '".$this->team_main_game->getGame_number()."', '".$this->team_main_platform->getPlatform_code()."', '".$this->team_enrollment."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Update
        public function updateTeamInfo($base)
        {
            $query="update team set ";
            $query.="where =".$this->team_number;
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from team where =".$this->team_number;
            $ok=$base->query($query);
            return $ok;
        }
    }
?>