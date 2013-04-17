$(document).ready(function() {

    //on enter button press call the chechAnswer function
    $('#answer').keypress(function(e){
        if(e.which == 13){//Enter key pressed
            console.log('chilliedechil')
            //prevent the enter button to submit form, since we have ajax for that
            event.preventDefault();
            
            console.log('chilliedechilindezon');
            checkAnswer();
        }
    });

    //on button press call the chechAnswer function
    $('#submitAnswer').click(checkAnswer);

    function checkAnswer() {
        console.log('knopje is ingedrukt')
        // get the value from the username field                              
        var answer = $('#answer').val();
        var message = "";
        console.log(answer);
        
        // display message if answer is left empty
        if( !answer ) {
            message = 'laat je antwoord niet leeg';
            $('#answerComment').html(message);
            $('#answerComment').animate({ backgroundColor: "#ff9300" }, {duration: 0});
            $('#answerComment').animate({ backgroundColor: "transparent" }, {duration: 75});
        }

        // display message if answer is non numeric
        else if ( !$.isNumeric(answer)){
            message = 'Je moet wel cijfers invoeren, en niet iets anders ';
            $('#answerComment').html(message);
            $('#answerComment').animate({ backgroundColor: "#ff9300" }, {duration: 0});
            $('#answerComment').animate({ backgroundColor: "transparent" }, {duration: 75});
        }

        // If everthing seems fine for input validation, then execute the ajax request
        else{
            
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
                        $('#sumText').html(evaluate.equation);
                        message = evaluate.goodCount;
                        $('#answerComment').html(message);
                        $('#answerComment').animate({ backgroundColor: "#66cd00" }, {duration: 0});
                        $('#answerComment').animate({ backgroundColor: "transparent" }, {duration: 75});
                        $('#answer').val('');
                    }
                    else if (evaluate.correctAnswer == 'FALSE') {
                        message = 'Dit is helaas niet het goede antwoord';
                        $('#answerComment').html(message);
                        $('#answerComment').animate({ backgroundColor: "#ff2600" }, {duration: 0});
                        $('#answerComment').animate({ backgroundColor: "transparent" }, {duration: 74});
                        $('#answer').val('');
                    }
                    else{ 
                        message = 'Oeps er ging iets fout, ga naar de meester of juf =)';
                        $('#answerComment').html(message);
                        $('#answer').val('');
                        $('#answerComment').animate({ backgroundColor: "#000" }, {duration: 0});
                    }
                }

            );
        }
    };
});  
