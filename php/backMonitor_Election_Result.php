<?php
    include("db_conn.php");
    require 'backMonitor/fetch_date.php';
    require 'backMonitor/fetch_candidates.php';
    require 'backMonitor/position_vote_count.php';

    
    $candidates_all = array();

    $start_date = $row['start_date'];
    $end_date = $row['end_date'];

    $anon_name = "Candidate Name";
    $anon_party = "Party";
    $anon_photo = "../img/anon.png";

    foreach($candidates as $candidate){
        foreach($position_votes as $total_per_position){
            if($candidate['heirarchy_order']==$total_per_position['heirarchy_order']){
                $total_position_votes = $total_per_position['votes_per_position'];
                break;
            }
        }
        if(empty($candidate['middle_name'])){
            $candidate_name = $candidate['first_name'].' '.$candidate['last_name'];
        }else{
            $candidate_name = $candidate['first_name'].' '.$candidate['middle_name'][0].'. '.$candidate['last_name'];
        }
        if($total_position_votes != 0){
            $percentage = round(($candidate['total_votes'] /$total_position_votes) * 100);
        }else{
            $percentage = 0;
        }
        
        
        if($current_date_time > $end_date){
            if(empty($candidate['photo'])){
                $candidate_photo = $anon_photo;
            }else{
                $candidate_photo = $candidate['photo'];
            }
            $candidates_all[] = array(
                "position" => $candidate['position'],
                "name" => $candidate_name,
                "party_name" => $candidate['party_name'],
                "photo" => $candidate_photo,
                "total_votes" => $candidate['total_votes'],
                "total_position_votes" => $total_position_votes,
                "percentage" => $percentage,
                "start_date" => $start_date, 
                "end_date" => $end_date,
                "current_date" => $current_date_time
            );
        }else{
            $candidates_all[] = array(
                "position" => $candidate['position'],
                "name" => $anon_name,
                "party_name" => $anon_party,
                "photo" => $anon_photo,
                "total_votes" => $candidate['total_votes'],
                "total_position_votes" => $total_position_votes,
                "percentage" => $percentage,
                "start_date" => $start_date, 
                "end_date" => $end_date,
                "current_date" => $current_date_time
            );
        }
        
    }

    echo json_encode($candidates_all);
?>