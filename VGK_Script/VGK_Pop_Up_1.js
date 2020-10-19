$(document).ready(function() {

//show pop up form
//Connexion
$("#clickLogin").click(function() {
$("#logindiv").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//Register
$("#clickRegister").click(function() {
$("#registerdiv").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});


//pop up overlay
$('#overlay_login').click(function() {
	 
    $('#login').trigger("reset"); /*reset login form before closing the pop up*/
    $('#logindiv').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });
$('#overlay_register').click(function() {
	
    $('#register').trigger("reset");
    $('#registerdiv').css("display", "none");
    
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });	
	
	
//reset form
$('#reset_login').click(function() {
	
    $('#logindiv').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
	
$('#reset_register').click(function() {
	
    $('#registerdiv').css("display", "none");
    
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });		
    
//submit form
$('#submit_login').click(function() {
	
    $('#logindiv').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
	
$('#submit_register').click(function() {
	
    $('#registerdiv').css("display", "none");
    
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });		
    
//Friend request form
//Show
$("#clickSendFriendRequest").click(function() {
$("#friend_request_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_friend_request').click(function() {
	 
    $('#friend_request_form').trigger("reset"); /*reset friend_request form before closing the pop up*/
    $('#friend_request_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_friend_request').click(function() {
	
    $('#friend_request_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_friend_request').click(function() {
	
    $('#friend_request_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
	
//Add game version to library form
//Show
$("#clickAddGameLibrary").click(function() {
$("#add_library_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_add_library').click(function() {
	 
    $('#add_library_form').trigger("reset"); /*reset add_library form before closing the pop up*/
    $('#add_library_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_add_library').click(function() {
	
    $('#add_library_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_add_library').click(function() {
	
    $('#add_library_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
	
//Add game version to wishlist form
//Show
$("#clickAddGameWishlist").click(function() {
$("#add_wishlist_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_add_wishlist').click(function() {
	 
    $('#add_wishlist_form').trigger("reset"); /*reset add_library form before closing the pop up*/
    $('#add_wishlist_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_add_wishlist').click(function() {
	
    $('#add_wishlist_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_add_wishlist').click(function() {
	
    $('#add_wishlist_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//Update main game version form
//Show
$("#clickUpdateMainGame").click(function() {
$("#update_main_game_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_update_main_game').click(function() {
	 
    $('#update_main_game_form').trigger("reset"); /*reset update_main_game form before closing the pop up*/
    $('#update_main_game_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_update_main_game').click(function() {
	
    $('#update_main_game_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_update_main_game').click(function() {
	
    $('#update_main_game_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//Add Goal form
//Show
$("#clickAddGoal").click(function() {
$("#add_goal_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_add_goal').click(function() {
	 
    $('#add_goal_form').trigger("reset"); /*reset update_main_game form before closing the pop up*/
    $('#add_goal_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_add_goal').click(function() {
	
    $('#add_goal_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_add_goal').click(function() {
	
    $('#add_goal_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//Add Availability form
//Show
$("#clickAddAvailability").click(function() {
$("#add_availability_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_add_availability').click(function() {
	 
    $('#add_availability_form').trigger("reset"); 
    $('#add_availability_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_add_availability').click(function() {
	
    $('#add_availability_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_add_availability').click(function() {
	
    $('#add_availability_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//Add session form
//Show
$("#clickAddSession").click(function() {
$("#add_session_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_add_session').click(function() {
	 
    $('#add_session_form').trigger("reset"); 
    $('#add_session_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_add_session').click(function() {
	
    $('#add_session_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_add_session').click(function() {
	
    $('#add_session_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//Add challenge form
//Show
$("#clickAddChallenge").click(function() {
$("#add_challenge_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_add_challenge').click(function() {
	 
    $('#add_challenge_form').trigger("reset"); 
    $('#add_challenge_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_add_challenge').click(function() {
	
    $('#add_challenge_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_add_challenge').click(function() {
	
    $('#add_challenge_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//Add duel form
//Show
$("#clickAddDuel").click(function() {
$("#add_duel_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_add_duel').click(function() {
	 
    $('#add_duel_form').trigger("reset"); 
    $('#add_duel_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_add_duel').click(function() {
	
    $('#add_duel_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_add_duel').click(function() {
	
    $('#add_duel_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
	
//Add challenge taker form
//Show
$("#clickAddChallengeTaker").click(function() {
$("#add_challenge_taker_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_add_challenge_taker').click(function() {
	 
    $('#add_challenge_taker_form').trigger("reset"); 
    $('#add_challenge_taker_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_add_challenge_taker').click(function() {
	
    $('#add_challenge_taker_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_add_challenge_taker').click(function() {
	
    $('#add_challenge_taker_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//Update challenge taker form
//Show
$("#clickUpdateChallengeTaker").click(function() {
$("#update_challenge_taker_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_update_challenge_taker').click(function() {
	 
    $('#update_challenge_taker_form').trigger("reset"); 
    $('#update_challenge_taker_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_update_challenge_taker').click(function() {
	
    $('#update_challenge_taker_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_update_challenge_taker').click(function() {
	
    $('#update_challenge_taker_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//Add Session invite form
//Show
$("#clickAddSessionInvite").click(function() {
$("#add_session_invite_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_add_session_invite').click(function() {
	 
    $('#add_session_invite_form').trigger("reset"); 
    $('#add_session_invite_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_add_session_invite').click(function() {
	
    $('#add_session_invite_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_add_session_invite').click(function() {
	
    $('#add_session_invite_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//Add Challenge invite form
//Show
$("#clickAddChallengeInvite").click(function() {
$("#add_challenge_invite_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_add_challenge_invite').click(function() {
	 
    $('#add_challenge_invite_form').trigger("reset"); 
    $('#add_challenge_invite_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_add_challenge_invite').click(function() {
	
    $('#add_challenge_invite_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_add_challenge_invite').click(function() {
	
    $('#add_challenge_invite_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
    
//Update challenge winner form
//Show
$("#clickUpdateChallengeWinner").click(function() {
$("#update_challenge_winner_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_update_challenge_winner').click(function() {
	 
    $('#update_challenge_winner_form').trigger("reset"); 
    $('#update_challenge_winner_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_update_challenge_winner').click(function() {
	
    $('#update_challenge_winner_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_update_challenge_winner').click(function() {
	
    $('#update_challenge_winner_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//Update Duel Result form
//Show
$("#clickUpdateDuelResult").click(function() {
$("#update_duel_result_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_update_duel_result').click(function() {
	 
    $('#update_duel_result_form').trigger("reset"); 
    $('#update_duel_result_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_update_duel_result').click(function() {
	
    $('#update_duel_result_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_update_duel_result').click(function() {
	
    $('#update_duel_result_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//Update Goal Achievement form
//Show
$("#clickUpdateGoalAchievement").click(function() {
$("#update_goal_achievement_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_update_goal_achievement').click(function() {
	 
    $('#update_goal_achievement_form').trigger("reset"); 
    $('#update_goal_achievement_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_update_goal_achievement').click(function() {
	
    $('#update_goal_achievement_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_update_goal_achievement').click(function() {
	
    $('#update_goal_achievement_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//Add Post form
//Show
$("#clickAddPost").click(function() {
$("#add_post_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_add_post').click(function() {
	 
    $('#add_post_form').trigger("reset"); 
    $('#add_post_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_add_post').click(function() {
	
    $('#add_post_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_add_post').click(function() {
	
    $('#add_post_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//Add Post form from sidebar button
//Show
$("#clickAddPostSidebar").click(function() {
$("#add_post_form_div").css("display", "block");
//Lock scroll when pop up 
$('body').css('overflow', 'hidden');
});

//pop up overlay
$('#overlay_add_post').click(function() {
	 
    $('#add_post_form').trigger("reset"); 
    $('#add_post_form_div').css("display", "none");
	 
    //Unlock scroll
    $('body').css('overflow', 'visible');
	 
    });

//reset form
$('#reset_add_post').click(function() {
	
    $('#add_post_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
    
//submit form
$('#submit_add_post').click(function() {
	
    $('#add_post_form_div').css("display", "none");

    //Unlock scroll
    $('body').css('overflow', 'visible');
    
    });
        
});



