<?php

    class Follow
    {

        private $follow_following;
        private $follow_followed;
        private $follow_date;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($following, $followed, $date)
        {
            $this->follow_following=$following;
            $this->follow_followed=$followed;
            $this->follow_date=$date;
        }
        
        public function setForInsertFollow($following, $followed)
        {
            $this->follow_following=$following;
            $this->follow_followed=$followed;
        }

        //Getter Setter
        //Follow_following
        public function setFollow_following($following)
        {
            $this->follow_following=$following;
        }

        public function getFollow_following()
        {
            return $this->follow_following;
        }

        //Follow_followed
        public function setFollow_followed($followed)
        {
            $this->follow_followed=$followed;
        }

        public function getFollow_followed()
        {
            return $this->follow_followed;
        }

        //Follow_date
        public function setFollow_date($date)
        {
            $this->follow_date=$date;
        }

        public function getFollow_date()
        {
            return $this->follow_date;
        }

        //Database methods
        //Load
        //Load 1
        public function loadFollow($base)
        {
            $query="Select * from follow where follow_followed_number=".$this->follow_followed->getUser_number()." AND follow_following_number=".$this->follow_following->getUser_number();
            $data=$base->fetch_all_array($query);
            $follow_exist=false;
            if(!empty($data))
            {
                $follow_exist=true;
                foreach($data as $row)
                {
                    $this->follow_date=$row['follow_date'];
                }
            }
            return($follow_exist);
        }

        //Insert
        public function insert($base)
        {
            $query="insert into follow (`follow_following_number`, `follow_followed_number`, follow_date) ";
            $query.="values ('".$this->follow_following->getUser_number()."', '".$this->follow_followed->getUser_number()."', NOW())";
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from follow where follow_following_number=".$this->follow_following->getUser_number()." and follow_followed_number=".$this->follow_followed->getUser_number();
            $ok=$base->query($query);
            return $ok;
        }
    }
?>