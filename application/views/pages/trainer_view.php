

<div class="container">
    <div class="row">
        <div class="span12">
            <h1 class="appTitle" >Trainer </h1>
        </div>
    </div>
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span12 ">
                    <h1 class="sumSection">

                    <?php 
                    foreach ($numbers as $number)
                    {
                        echo $number .' ';
                        //echo $operators[$i] .' ';
                    }
                    ?>
                    <span><input type="tel" id="answer"></span></h1>  
                    <input type="hidden" id="equation" value="<?php echo $equation ?>">

                </div>
            </div>
            <div class="row">
                <div class="span12 ">
                    <h1 id="answerComment">
                    <?php $answerComment = " "?>
                    <?php echo htmlspecialchars($answerComment);  ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="btn btn-large" id="submitAnswer">boe</div>
</div> <!-- /container -->
