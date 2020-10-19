$(document).ready(function(){
    $("#search_input").keyup(function(){
        var search=$(this).val();
        var data='keyword='+search;
        
        if(search.length>1)
        {
            $.ajax({
               type: "GET", 
               url:"search_autocomplete_result.php",
               data: data,
               success: function(server_response){
                   $("#autocomplete_result").html(server_response).show();
                
                }
            });
        }
        
    });
    
});