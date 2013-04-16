$(document).ready(function() {


    $('#submitAnswer').click(function(checkAnswer) {
        console.log('knopje is ingedrukt')
        // get the value from the username field                              
        var answer = $('#answer').val();
        var message = "";
        console.log(answer);
        
        // display message if answer is left empty
        if( !answer ) {
            message = 'laat je antwoord niet leeg';
            $('#answerComment').html(message);
        }

        // display message if answer is non numeric
        else if ( !$.isNumeric(answer)){
            message = 'Je moet wel cijfers invoeren, en niet iets anders ';
            $('#answerComment').html(message);
        }

        // If everthing seems fine for input validation, then execute the ajax request
        else{
            console.log('ajax wordt kampioen');
            // Ajax request sent to the CodeIgniter controller "ajax" method "username_taken"
            // post the username field's value
            $.post('/index.php/ajax/evaluateAnswer',
                { 'answer':answer },

                // when the Web server responds to the request
                function(result){
                    
                    var evaluate = JSON.parse(result);
                    console.log(evaluate);
                    // if the result is TRUE write a message to the page
                    if (evaluate.correctAnswer == 'TRUE') {
                        console.log('ajax wordt kampioen heel en deze som is waar');
                        console.log(evaluate.equation);
                        $('#sumText').html(evaluate.equation);
                        message = 'Goedzo je antwoord was helemaal in orde';
                        $('#answerComment').html(message);
                        }
                    else if (evaluate.correctAnswer == 'FALSE') {
                        message = 'Dit is helaas niet het goede antwoord';
                        $('#answerComment').html(message);
                        }
                    else{ 
                        message = 'Oeps er ging iets fout, ga naar de meester of juf =)'
                        $('#answerComment').html(message)
                    }
                }

            );
        }
    });
});  


/*
       
        the data we are going to send*//*
        var postData = {
        'answer':$('#answer').val(),
        'equation':$('#equation').val()
        };
              
        $.ajax({
            url: "/index.php/ajax/checkAnswer",
            type: 'POST',
            data: postData,
            success: 
            
          
            function(checkAnswerReturn){
                $('#answerComment').html(checkAnswerReturn)
            }
                    
        });
        console.log('oepsiedoepsie')
        


});
*/ 
