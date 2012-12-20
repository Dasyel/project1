$(document).ready(function() {

$("#submitAnswer").click(
    function() {
       
        /*the data we are going to send*/
        var postData = {
        'answer':$('#answer').val(),
        'equation':$('#equation').val()
        };
              
        $.ajax({
            url: "/index.php/trainer/checkAnswer",
            type: 'POST',
            data: postData,
            success: 
            
          
            function(checkAnswerReturn){
                $('#answerComment').html(checkAnswerReturn)
            }
                    
        });
        console.log('oepsiedoepsie')
        
    }
);

});
