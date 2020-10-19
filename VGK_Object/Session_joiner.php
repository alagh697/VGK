<?php

    class Session_joiner
    {

        private $join_session;
        private $join_user;
        private $join_date;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($session, $user, $date)
        {
            $this->join_session=$session;
            $this->join_user=$user;
            $this->join_date=$date;
        }
        
        public function setForInsertSession_joiner($session, $user)
        {
            $this->join_session=$session;
            $this->join_user=$user;
        }

        //Getter Setter
        //Join_session
        public function setJoin_session($session)
        {
            $this->join_session=$session;
        }

        public function getJoin_session()
        {
            return $this->join_session;
        }

        //Join_user
        public function setJoin_user($user)
        {
            $this->join_user=$user;
        }

        public function getJoin_user()
        {
            return $this->join_user;
        }

        //Join_date
        public function setJoin_date($date)
        {
            $this->join_date=$date;
        }

        public function getJoin_date()
        {
            return $this->join_date;
        }


        //Database methods
        //Load
        //Load 1
        public function loadSession_joiner($base)
        {
            $query="Select * from session_joiner where join_session_number=".$this->join_session->getSession_number()." AND join_user_number=".$this->join_user->getUser_number();
            $data=$base->fetch_all_array($query);
            $session_joined_exist=false;
            if(!empty($data))
            {
                $session_joined_exist=true;
                foreach($data as $row)
                {
                    $this->join_date=$row['join_date'];
                }
            }
            return($session_joined_exist);
        }
        
        
        
        //Insert
        public function insert($base)
        {
            $query="insert into session_joiner (`join_session_number`, `join_user_number`, `join_date`) ";
            $query.="values ('".$this->join_session->getSession_number()."', '".$this->join_user->getUser_number()."', NOW())";
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from session_joiner where join_session_number=".$this->join_session->getSession_number()." and join_user_number=".$this->join_user->getUser_number();
            $ok=$base->query($query);
            return $ok;
        }
    }
?>