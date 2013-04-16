$(document).ready(function() {


    $('#submitAnswer').click(function(checkAnswer) {
        // get the value from the username field                              
        var answer = $('#answer').val();
        var message = "";
        console.log(answer);
        
        // display message if answer is left empty
        if( !answer ) {
            message = 'laat je antwoord niet leeg';
            $('#submitAnswer').after('<div id="bad_username" style="color:red;">' +
                    '<p>'+message+'</p></div>');
        }

        // display message if answer is non numeric
        else if ( !$.isNumeric(answer)){
            message = 'Je moet wel cijfers invoeren, en niet iets anders ';
            $('#submitAnswer').after('<div id="bad_username" style="color:red;">' +
                    '<p>'+message+'</p></div>');
        }

        // If everthing seems fine for input validation, then execute the ajax request
        else{
            // Ajax request sent to the CodeIgniter controller "ajax" method "username_taken"
            // post the username field's value
            $.post('/index.php/ajax/checkAnswer',
                { 'answer':answer },

                // when the Web server responds to the request
                function(result){
                alert(result);
                // if the result is TRUE write a message to the page
                if (result == 'TRUE') {
                    message = 'Goedzo je antwoor was helemaal in orde'
                    $('#submitAnswer').after('<div id="bad_username" style="color:red;">' +
                    '<p>'+message +'</p></div>');
                    }
                else if (result == 'FALSE') {
                    message = 'Dit is helaas niet het goede antwoord'
                    $('#submitAnswer').after('<div id="bad_username" style="color:red;">' +
                    '<p>'+message +'</p></div>');
                    }
                else 
                    message = 'Oeps er ging iets fout, ga naar de meester of juf =)'
                    $('#submitAnswer').after('<div id="bad_username" style="color:red;">' +
                    '<p>'+message +'</p></div>');
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
