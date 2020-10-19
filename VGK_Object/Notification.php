<?php

    class Notification
    {

        private $notification_number;
        private $notification_user;
        private $notification_date;
        private $notification_message;
        private $notification_read;
        private $notification_read_date;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($number, $user, $date, $message, $read)
        {
            $this->notification_number=$number;
            $this->notification_user=$user;
            $this->notification_date=$date;
            $this->notification_message=$message;
            $this->notification_read=$read;
        }

        public function setForInsertNotification($user, $message)
        {
            $this->notification_user=$user;
            $this->notification_message=$message;
        }

        //Getter Setter
        //Notification_number
        public function setNotification_number($number)
        {
            $this->notification_number=$number;
        }

        public function getNotification_number()
        {
            return $this->notification_number;
        }

        //Notification_user
        public function setNotification_user($user)
        {
            $this->notification_user=$user;
        }

        public function getNotification_user()
        {
            return $this->notification_user;
        }

        //Notification_date
        public function setNotification_date($date)
        {
            $this->notification_date=$date;
        }

        public function getNotification_date()
        {
            return $this->notification_date;
        }

        //Notification_message
        public function setNotification_message($message)
        {
            $this->notification_message=$message;
        }

        public function getNotification_message()
        {
            return $this->notification_message;
        }

        //Notification_read
        public function setNotification_read($read)
        {
            $this->notification_read=$read;
        }

        public function getNotification_read()
        {
            return $this->notification_read;
        }

        //Notification_read_date
        public function setNotification_read_date($read_date)
        {
            $this->notification_read_date=$read_date;
        }

        public function getNotification_read_date()
        {
            return $this->notification_read_date;
        }

        //Database methods
        //Load
        //Load 1
        public function loadNotification($base)
        {

        }
        
        //Set message for the different type of notifications
        //Follow: a notification is sent to the followed user
        public function setMessageFollow($follower_id)
        {
            $this->notification_message='<a href="Profile.php?user_id='.$follower_id.'" class="notif_link">'.$follower_id.'</a> vous suit.';
        }
        
        //Friend request: a notification is sent to the target
        public function setMessageFriend_Request($sender_id)
        {
            $this->notification_message='<a href="Profile.php?user_id='.$sender_id.'" class="notif_link">'.$sender_id.'</a> vous demande en ami.';
        }
        
        //Friendship: a notification is sent to both friends
        public function setMessageFriendship($friend_id)
        {
            $this->notification_message='Vous êtes désormais ami avec <a href="Profile.php?user_id='.$friend_id.'" class="notif_link">'.$friend_id.'</a>.';
        }
        
        //Duel
        public function setMessageDuelInvite($originator_id, $game_name)
        {
            $this->notification_message='<a href="Profile.php?user_id='.$originator_id.'" class="notif_link">'.$originator_id.'</a> vous provoque en duel sur ';
            $this->notification_message.='<a href="Game_Profile.php?game_name='.urlencode($game_name).'" class="notif_link">'.$game_name.'</a>';
        }
        
        //Session_joiner
        public function setMessageSession_joiner($joiner_id, $session)
        {
            $this->notification_message='<a href="Profile.php?user_id='.$joiner_id.'" class="notif_link">'.$joiner_id.'</a> a rejoint votre session: ';
            $this->notification_message.='<a href="Session_Detail.php?session_number='.$session->getSession_number().'" class="notif_link">'.addslashes($session->getSession_title()).'</a>';
        }
        
        //Session_invitation
        public function setMessageSession_invitation($host_id, $session)
        {
            $this->notification_message='<a href="Profile.php?user_id='.$host_id.'" class="notif_link">'.$host_id.'</a> vous invite à rejoindre sa session: ';
            $this->notification_message.='<a href="Session_Detail.php?session_number='.$session->getSession_number().'" class="notif_link">'.addslashes($session->getSession_title()).'</a>';
        }
        
        //Challenge_taker
        public function setMessageChallenge_taker($taker_id, $challenge)
        {
            $this->notification_message='<a href="Profile.php?user_id='.$taker_id.'" class="notif_link">'.$taker_id.'</a> a tenté votre défi: ';
            $this->notification_message.='<a href="Challenge_Detail.php?challenge_number='.$challenge->getChallenge_number().'" class="notif_link">'.addslashes($challenge->getChallenge_title()).'</a>';
        }
        
        //Challenge_taker update take up by the taker
        public function setMessageChallenge_taker_update($taker_id, $challenge)
        {
            $this->notification_message='<a href="Profile.php?user_id='.$taker_id.'" class="notif_link">'.$taker_id.'</a> a mis à jour sa tentative du défi: ';
            $this->notification_message.='<a href="Challenge_Detail.php?challenge_number='.$challenge->getChallenge_number().'" class="notif_link">'.addslashes($challenge->getChallenge_title()).'</a>';
        }
        
        //Challenge_taker update take up => verified
        public function setMessageChallenge_taker_verified($originator_id, $challenge)
        {
            $this->notification_message='<a href="Profile.php?user_id='.$originator_id.'" class="notif_link">'.$originator_id.'</a> a validé votre tentative du défi: ';
            $this->notification_message.='<a href="Challenge_Detail.php?challenge_number='.$challenge->getChallenge_number().'" class="notif_link">'.addslashes($challenge->getChallenge_title()).'</a>';
        }
        
        //Challenge_taker update take up => verified
        public function setMessageChallenge_winner($challenge)
        {
            $this->notification_message='Vous avez gané le défi: ';
            $this->notification_message.='<a href="Challenge_Detail.php?challenge_number='.$challenge->getChallenge_number().'" class="notif_link">'.addslashes($challenge->getChallenge_title()).'</a>';
        }
        
        //Challenge_invitation
        public function setMessageChallenge_invitation($originator_id, $challenge)
        {
            $this->notification_message='<a href="Profile.php?user_id='.$originator_id.'" class="notif_link">'.$originator_id.'</a> vous invite à tenter son défi: ';
            $this->notification_message.='<a href="Challenge_Detail.php?challenge_number='.$challenge->getChallenge_number().'" class="notif_link">'.addslashes($challenge->getChallenge_title()).'</a>';
        }
        
        //Duel start
        public function setMessageDuel_Start($target_id, $duel)
        {
            $this->notification_message='<a href="Profile.php?user_id='.$target_id.'" class="notif_link">'.$target_id.'</a> a accepté votre duel: ';
            $this->notification_message.='<a href="Duel_Detail.php?duel_number='.$duel->getDuel_number().'" class="notif_link">'.addslashes($duel->getDuel_title()).'</a>';
        }
        
        //Duel result
        public function setMessageDuel_Result($originator_id, $duel)
        {
            $this->notification_message='<a href="Profile.php?user_id='.$originator_id.'" class="notif_link">'.$originator_id.'</a> a saisi les résultats du duel: ';
            $this->notification_message.='<a href="Duel_Detail.php?duel_number='.$duel->getDuel_number().'" class="notif_link">'.addslashes($duel->getDuel_title()).'</a>';
        }
        
        //Duel confirm
        public function setMessageDuel_Confirm($target_id, $duel)
        {
            $this->notification_message='<a href="Profile.php?user_id='.$target_id.'" class="notif_link">'.$target_id.'</a> a confirmé les résultats du duel: ';
            $this->notification_message.='<a href="Duel_Detail.php?duel_number='.$duel->getDuel_number().'" class="notif_link">'.addslashes($duel->getDuel_title()).'</a>';
        }
        
        //Duel confirm
        public function setMessageDuel_Deny($target_id, $title)
        {
            $this->notification_message='<a href="Profile.php?user_id='.$target_id.'" class="notif_link">'.$target_id.'</a> a refusé le duel: ';
            $this->notification_message.=addslashes($title).'.';
        }
        
        //Insert
        public function insert($base)
        {
            $query="insert into notification (`notification_user_number`, `notification_date`, `notification_message`, notification_read) ";
            $query.="values ('".$this->notification_user->getUser_number()."', NOW(),'".$this->notification_message."', 0)";
            $ok=$base->query($query);
            return $ok;
        }
        
        //Update
        //set read to 1 when the notification is read
        public function updateRead($base)
        {
            $query="update notification set notification_read=1";
            $query.=" where notification_number=".$this->notification_number;
            $ok=$base->query($query);
            return $ok;
        }
        //Delete
        public function delete($base)
        {
            $query="delete from notification where notification_number=".$this->notification_number;
            $ok=$base->query($query);
            return $ok;
        }
    }
?>