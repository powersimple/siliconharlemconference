<h4 class="font-alt mb-0"><?=$title?></h4>
 <div class="panel-group" id="accordion">
<?php
    $sessions = getSessions($id);
  
    foreach ($sessions as $key => $value) {
        extract((array) $value);
        ?>

                
               
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title font-alt"><a data-toggle="collapse" data-parent="#accordion" href="#<?=$slug?>"><?=$title?></a><span class="session-time"><?=sessionTime(@$start,@$end)?></span></h4>
                    </div>
                    <div class="panel-collapse collapse" id="<?=$slug?>">
                      <div class="panel-body"><p><?=$content?></p>
                        <div class="speaker-listing">
                    <?php
                        foreach($speakers as $key=>$speaker_id){
                             displaySpeaker(getSpeaker($speaker_id)[0]);
                            
                        }
                    ?>  </div>
                      </div>
                    </div>
                  </div>
                 
                

        <?php
    }

?>
</div>
