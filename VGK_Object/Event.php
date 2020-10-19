<?php

    class Event
    {

        private $event_number;
        private $event_user;
        private $event_game;
        private $event_platform;
        private $event_title;
        private $event_description;
        private $event_creation_date;
        private $event_date;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($number, $user, $game, $platform, $title, $description, $creation_date, $date)
        {
            $this->event_number=$number;
            $this->event_user=$user;
            $this->event_game=$game;
            $this->event_platform=$platform;
            $this->event_title=$title;
            $this->event_description=$description;
            $this->event_creation_date=$creation_date;
            $this->event_date=$date;
        }

        public function setForInsertEvent($user, $game, $platform, $title, $description, $date)
        {
            $this->event_user=$user;
            $this->event_game=$game;
            $this->event_platform=$platform;
            $this->event_title=$title;
            $this->event_description=$description;
            $this->event_date=$date;
        }

        //Getter Setter
        //Event_number
        public function setEvent_number($number)
        {
            $this->event_number=$number;
        }

        public function getEvent_number()
        {
            return $this->event_number;
        }

        //Event_user
        public function setEvent_user($user)
        {
            $this->event_user=$user;
        }

        public function getEvent_user()
        {
            return $this->event_user;
        }

        //Event_game
        public function setEvent_game($game)
        {
            $this->event_game=$game;
        }

        public function getEvent_game()
        {
            return $this->event_game;
        }

        //Event_platform
        public function setEvent_platform($platform)
        {
            $this->event_platform=$platform;
        }

        public function getEvent_platform()
        {
            return $this->event_platform;
        }

        //Event_title
        public function setEvent_title($title)
        {
            $this->event_title=$title;
        }

        public function getEvent_title()
        {
            return $this->event_title;
        }

        //Event_description
        public function setEvent_description($description)
        {
            $this->event_description=$description;
        }

        public function getEvent_description()
        {
            return $this->event_description;
        }

        //Event_creation_date
        public function setEvent_creation_date($creation_date)
        {
            $this->event_creation_date=$creation_date;
        }

        public function getEvent_creation_date()
        {
            return $this->event_creation_date;
        }

        //Event_date
        public function setEvent_date($date)
        {
            $this->event_date=$date;
        }

        public function getEvent_date()
        {
            return $this->event_date;
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
            $query="insert into event (`event_user_number`, `event_game_number`, `event_platform_code`, `event_title`, `event_description`, `event_creation_date`, `event_date`) ";
            $query.="values ('".$this->event_user->getUser_number()."', '".$this->event_game->getGame_number()."', '".$this->event_platform->getPlatform_code()."', '".$this->event_title."', '".$this->event_description."', NOW(), '".$this->event_date."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Update
        public function updateEventInfo($base)
        {
            $query="update event set ";
            $query.="where event_number=".$this->event_number;
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from event where event_number=".$this->event_number;
            $ok=$base->query($query);
            return $ok;
        }
    }
?>