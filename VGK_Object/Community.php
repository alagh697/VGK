<?php

    class Community
    {

        private $community_number;
        private $community_name;
        private $community_description;
        private $community_creation_date;
        private $community_private;
        private $community_leader;
        private $community_logo_url;
        private $community_main_game;
        private $community_main_platform;
        
        private $theCommunityMembers=array();
        private $theCommunityInvitations=array();

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($number, $name, $description, $creation_date, $private, $leader, $logo_url, $main_game, $main_platform)
        {
            $this->community_number=$number;
            $this->community_name=$name;
            $this->community_description=$description;
            $this->community_creation_date=$creation_date;
            $this->community_private=$private;
            $this->community_leader=$leader;
            $this->community_logo_url=$logo_url;
            $this->community_main_game=$main_game;
            $this->community_main_platform=$main_platform;
        }

        public function setForInsertCommunity($name, $description, $private, $leader, $logo_url, $main_game, $main_platform)
        {
            $this->community_number=$number;
            $this->community_name=$name;
            $this->community_description=$description;
            $this->community_private=$private;
            $this->community_leader=$leader;
            $this->community_logo_url=$logo_url;
            $this->community_main_game=$main_game;
            $this->community_main_platform=$main_platform;
        }

        //Getter Setter
        //Community_number
        public function setCommunity_number($number)
        {
            $this->community_number=$number;
        }

        public function getCommunity_number()
        {
            return $this->community_number;
        }

        //Community_name
        public function setCommunity_name($name)
        {
            $this->community_name=$name;
        }

        public function getCommunity_name()
        {
            return $this->community_name;
        }

        //Community_description
        public function setCommunity_description($description)
        {
            $this->community_description=$description;
        }

        public function getCommunity_description()
        {
            return $this->community_description;
        }

        //Community_creation_date
        public function setCommunity_creation_date($creation_date)
        {
            $this->community_creation_date=$creation_date;
        }

        public function getCommunity_creation_date()
        {
            return $this->community_creation_date;
        }

        //Community_private
        public function setCommunity_private($private)
        {
            $this->community_private=$private;
        }

        public function getCommunity_private()
        {
            return $this->community_private;
        }

        //Community_leader
        public function setCommunity_leader($leader)
        {
            $this->community_leader=$leader;
        }

        public function getCommunity_leader()
        {
            return $this->community_leader;
        }

        //Community_logo_url
        public function setCommunity_logo_url($logo_url)
        {
            $this->community_logo_url=$logo_url;
        }

        public function getCommunity_logo_url()
        {
            return $this->community_logo_url;
        }

        //Community_main_game
        public function setCommunity_main_game($main_game)
        {
            $this->community_main_game=$main_game;
        }

        public function getCommunity_main_game()
        {
            return $this->community_main_game;
        }

        //Community_main_platform
        public function setCommunity_main_platform($main_platform)
        {
            $this->community_main_platform=$main_platform;
        }

        public function getCommunity_main_platform()
        {
            return $this->community_main_platform;
        }


        //Database methods
        //Load
        //Load 1
        public function loadCommunity($base)
        {

        }

        //Load list
        public static function loadAllCommunities($base)
        {

        }
        
        //Load the users who are members of the community
        public function loadAllCommunityMembers($base)
        {
            $query="Select * from membership where membership_community_number=".$this->community_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['membership_user_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $member=new Membership();
                    $member->setMembership_user($user);
                    $member->setMembership_community($this);
                    $member->loadMembership($base);
                    $this->theCommunityMembers[]=$member;
                }
            }
        }
        
        //Load the invitations sent for the community  
        public function loadAllCommunityInvitations($base)
        {
            $query="Select * from community_invitation where invitation_community_number=".$this->session_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['invitation_user_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $invitation=new Community_inviattion();
                    $invitation->setInvitation_user($user);
                    $invitation->setInvitation_community($this);
                    $invitation->loadCommunity_invitation($base);
                    $this->theCommunityInvitations[]=$invitation;
                }
            }
        }

        //Insert
        public function insert($base)
        {
            $query="insert into community (`community_name`, `community_description`, `community_creation_date`, `community_private`, `community_leader_number`, `community_logo_url`, `community_main_game_number`, `community_main_platform_code`) ";
            $query.="values ('".$this->community_name."', '".$this->community_description."', NOW(), '".$this->community_private."', '".$this->community_leader->getUser_number()."'";
            $query.=", '".$this->community_logo_url."', '".$this->community_main_game->getGame_number()."', '".$this->community_main_platform->getPlatform_code()."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Update
        public function updateCommunityInfo($base)
        {
            $query="update community set ";
            $query.="where =".$this->community_number;
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from community where =".$this->community_number;
            $ok=$base->query($query);
            return $ok;
        }
    }
?>