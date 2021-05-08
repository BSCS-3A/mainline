<!--Election Results (Student)-->
<?php
    require './backMonitor/fetch_candidates.php';
?>

    <div class="Bcontainer_res scs-responsive">
      <div class="Bhoverme scs-responsive">
        <h1>
          ELECTION RESULTS
        </h1>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
        <i></i>
      </div>
    </div>
    
    <div class="Belec_container" id="candidate">  
        <?php
            foreach($candidates as $candidate){
                echo '<div class="Bpstn">';
                echo '<img src="'.$candidate['photo'].'"/>';
                echo '<p class="Bnum_votes">TOTAL VOTES: '.$candidate['total_votes'].'</p>';
                echo '<p class="Bname">'.$candidate['first_name'].' '.$candidate['middle_name'].' '.$candidate['last_name'].'</p>';
                echo '<p class="Bpstn">'.$candidate['position'].'</p>';
                echo '<p class="Bparty">'.$candidate['party_name'].'</p>';
                echo '</div>';
            }
        ?>
    </div>
