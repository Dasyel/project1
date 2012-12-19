$(document).ready(function() {

$("#submitAnswer").click(
    function() {
       
        /*the data we are going to send*/
        var postData = {
        'answer':$('#answer').val()
        };
              
        $.ajax({
            url: "/index.php/trainer/checkAnswer",
            type: 'POST',
            data: postData,
            success: 
            
            function(checkAnswerResult){
                $('#answerComment').html(checkAnswerResult)
            }
                    
        });
        console.log('oepsiedoepsie')
        
    }
);

});
