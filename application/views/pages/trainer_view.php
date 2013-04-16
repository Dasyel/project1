<div class="container sums">
    <div class="row">
        <div class="span12">
            <h1 class="appTitle" >Trainer </h1>
        </div>
    </div>
    <div class="row">
        <div class="span12">
            <div id ="answerComment">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="span12">
            <form  class="form-horizontal" id="sumForm">
            <div class="control-group">
                <label class="control-label" >
                    <div class="sumSection">
                        <span id ="sumText" >
                        <?php echo $equation?>
                        </span>
                        <span>
                            =
                        </span> 
                    </div>
                </label>
                <div class="controls">
                    <input type="tel" id="answer" />
                </div>
            </div>
                           
        </div>
    </div>
    <div class="row">
        <div class="span12">
            <button class="btn btn-large btn-warning" id="submitAnswer" type="button">Kijk na!</button>
            </form><!-- end of sum form -->
            
        </div>
    </div>
</div> <!-- /container -->
