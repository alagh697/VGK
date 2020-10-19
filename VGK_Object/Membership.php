<?php

    class Membership
    {

        private $membership_community;
        private $membership_user;
        private $membership_date;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($community, $user, $date)
        {
            $this->membership_community=$community;
            $this->membership_user=$user;
            $this->membership_date=$date;
        }
        
        public function setForInsertMembership($community, $user)
        {
            $this->membership_community=$community;
            $this->membership_user=$user;
        }

        //Getter Setter
        //Membership_community
        public function setMembership_community($community)
        {
            $this->membership_community=$community;
        }

        public function getMembership_community()
        {
            return $this->membership_community;
        }

        //Membership_user
        public function setMembership_user($user)
        {
            $this->membership_user=$user;
        }

        public function getMembership_user()
        {
            return $this->membership_user;
        }

        //Membership_date
        public function setMembership_date($date)
        {
            $this->membership_date=$date;
        }

        public function getMembership_date()
        {
            return $this->membership_date;
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
            $query="insert into membership (`membership_community_number`, `membership_user_number`, 'membership_date') ";
            $query.="values ('".$this->membership_community->getCommunity_number()."', '".$this->membership_user->getUser_number()."', NOW())";
            $ok=$base->query($query);
            return $ok;
        }

        //Update
        public function update($base)
        {
            $query="update membership set ";
            $query.="where membership_community_number=".$this->membership_community->getCommunity_number()." and membership_user_number=".$this->membership_user->getUser_number();
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from membership where membership_community_number=".$this->membership_community->getCommunity_number()." and membership_user_number=".$this->membership_user->getUser_number();
            $ok=$base->query($query);
            return $ok;
        }
    }
?>