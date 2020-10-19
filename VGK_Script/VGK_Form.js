$(document).ready(function(){
    $('#end_date_check').click(function() {
      $('#end_date')[this.checked ? "show" : "hide"]();
    });
    
    
    //lock submit button after submiting the form
    $('#login_form').submit(function() {
        $('#submit_login').val('Connexion en cours'); 
        $('#submit_login').attr("disabled", true);
        });
        
    $('#register_form').submit(function() {
        $('#submit_register').val('Inscription en cours'); 
        $('#submit_register').attr("disabled", true);
        });
    
    $('#update_profil_info_form').submit(function() {
        $('#submit_update_profil_info').val('Envoi en cours'); 
        $('#submit_update_profil_info').attr("disabled", true);
        });
        
    $('#reset_password_form').submit(function() {
        $('#submit_reset_password').val('Envoi en cours'); 
        $('#submit_reset_password').attr("disabled", true);
        });
        
    $('#update_password_form').submit(function() {
        $('#submit_update_password').val('Envoi en cours'); 
        $('#submit_update_password').attr("disabled", true);
        });
   /* $('form').submit(function() {
        $(this).find("input[type='submit']").val('Envoi en cours');
        $(this).find("input[type='submit']").attr('disabled',true);
    });*/
});