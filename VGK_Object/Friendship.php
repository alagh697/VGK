<?php

    class Friendship
    {

        private $friendship_friend1;
        private $friendship_friend2;
        private $friendship_start_date;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($friend1, $friend2, $start_date)
        {
            $this->friendship_friend1=$friend1;
            $this->friendship_friend2=$friend2;
            $this->friendship_start_date=$start_date;
        }
        
        public function setForInsertFriendship($friend1, $friend2)
        {
            $this->friendship_friend1=$friend1;
            $this->friendship_friend2=$friend2;
        }

        //Getter Setter
        //Friendship_friend1
        public function setFriendship_friend1($friend1)
        {
            $this->friendship_friend1=$friend1;
        }

        public function getFriendship_friend1()
        {
            return $this->friendship_friend1;
        }

        //Friendship_friend2
        public function setFriendship_friend2($friend2)
        {
            $this->friendship_friend2=$friend2;
        }

        public function getFriendship_friend2()
        {
            return $this->friendship_friend2;
        }

        //Friendship_start_date
        public function setFriendship_start_date($start_date)
        {
            $this->friendship_start_date=$start_date;
        }

        public function getFriendship_start_date()
        {
            return $this->friendship_start_date;
        }

        //Database methods
        //Load
        //Load 1
        public function loadFriendship($base)
        {
            $query="Select * from friendship where ( friendship_friend1_number=".$this->friendship_friend1->getUser_number()." AND friendship_friend2_number=".$this->friendship_friend2->getUser_number()." ) ";
            $query.="OR ( friendship_friend1_number=".$this->friendship_friend2->getUser_number()." AND friendship_friend2_number=".$this->friendship_friend1->getUser_number()." )";
            $data=$base->fetch_all_array($query);
            $friendship_exist=false;
            if(!empty($data))
            {
                $friendship_exist=true;
                foreach($data as $row)
                {
                    $this->friendship_start_date=$row['friendship_start_date'];
                }
            }
            return($friendship_exist);
        }

        //Insert
        public function insert($base)
        {
            $query="insert into friendship (`friendship_friend1_number`, `friendship_friend2_number`, friendship_start_date) ";
            $query.="values ('".$this->friendship_friend1->getUser_number()."', '".$this->friendship_friend2->getUser_number()."', NOW())";
            $ok=$base->query($query);
            return $ok;
        }

        //Update
        public function update($base)
        {
            $query="update friendship set ";
            $query.="where friendship_friend1_number=".$this->friendship_friend1->getUser_number()." and friendship_friend2_number=".$this->friendship_friend2->getUser_number();
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from friendship where ( friendship_friend1_number=".$this->friendship_friend1->getUser_number()." and friendship_friend2_number=".$this->friendship_friend2->getUser_number();
            $query.=" ) OR (friendship_friend1_number=".$this->friendship_friend2->getUser_number()." and friendship_friend2_number=".$this->friendship_friend1->getUser_number().")";
            $ok=$base->query($query);
            return $ok;
        }
    }
?>