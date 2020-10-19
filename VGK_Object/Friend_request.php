<?php

    class Friend_request
    {

        private $request_sender;
        private $request_target;
        private $request_date;
        private $request_message;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($sender, $target, $date, $message)
        {
            $this->request_sender=$sender;
            $this->request_target=$target;
            $this->request_date=$date;
            $this->request_message=$message;
        }
        
        public function setForInsertFriend_request($sender, $target, $message)
        {
            $this->request_sender=$sender;
            $this->request_target=$target;
            $this->request_message=$message;
        }
        
        //Getter Setter
        //Request_sender
        public function setRequest_sender($sender)
        {
            $this->request_sender=$sender;
        }

        public function getRequest_sender()
        {
            return $this->request_sender;
        }

        //Request_target
        public function setRequest_target($target)
        {
            $this->request_target=$target;
        }

        public function getRequest_target()
        {
            return $this->request_target;
        }

        //Request_date
        public function setRequest_date($date)
        {
            $this->request_date=$date;
        }

        public function getRequest_date()
        {
            return $this->request_date;
        }

        //Request_message
        public function setRequest_message($message)
        {
            $this->request_message=$message;
        }

        public function getRequest_message()
        {
            return $this->request_message;
        }

        //Database methods
        //Load
        //Load 1
        public function loadFriend_request($base)
        {
            $query="Select * from friend_request where request_sender_number=".$this->request_sender->getUser_number()." AND request_target_number=".$this->request_target->getUser_number();
            $data=$base->fetch_all_array($query);
            $request_exist=false;
            if(!empty($data))
            {
                $request_exist=true;
                foreach($data as $row)
                {
                    $this->request_date=$row['request_date'];
                    $this->request_message=$row['request_message'];
                }
            }
            return($request_exist);
        }


        //Insert
        public function insert($base)
        {
            $query="insert into friend_request (`request_sender_number`, `request_target_number`, `request_date`, `request_message`) ";
            $query.="values ('".$this->request_sender->getUser_number()."', '".$this->request_target->getUser_number()."', NOW(), '".$this->request_message."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from friend_request where request_sender_number=".$this->request_sender->getUser_number()." and request_target_number=".$this->request_target->getUser_number();
            $ok=$base->query($query);
            return $ok;
        }
    }
?>