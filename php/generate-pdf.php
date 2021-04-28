<?php
// require 'php/db_connection.php';				// Link to database
require 'db_conn.php';
require_once('../other/TCPDF-main/tcpdf.php'); 				// Include the main TCPDF library

//---------------------Create header and footer
class PDF extends TCPDF { 
	public function Header(){
		if (count($this->pages) === 1){ //displays header on first page only    
			
			//BU Seal
			$imageFile= K_PATH_IMAGES.'bu-seal.png';
			$this->Image($imageFile,20,8,20,'','png','','T',false,300,'',false,false,0,false,false,false);
			
			//BUCEILS Seal
			$imageFile= K_PATH_IMAGES.'buceils-seal.png';
			$this->Image($imageFile,41,8,20,'','png','','T',false,300,'',false,false,0,false,false,false);
			
			//SSG Seal
			$imageFile= K_PATH_IMAGES.'ssg-seal.png';
			$this->Image($imageFile,63,8,20,'','png','','T',false,300,'',false,false,0,false,false,false);

			//Header text
			$this->SetFont('times','B',12);
			$this->Cell(96.5,3, 'COMMISSION ON ELECTION (COMELEC)',0,1,'R'); 
			$this->SetFont('times','',12);
			$this->Cell(170,3, 'BICOL UNIVERSITY INTEGRATED LABORATORY',0,1,'R'); 
			$this->Cell(171,3, 'SCHOOL (BUCEILS) HIGH SCHOOL DEPARTMENT',0,1,'R'); 
			$this->SetFont('times','I',12);
			$this->Cell(149.5,3,'Bicol University Main Campus, Legazpi City',0,1,'R'); 
	}//end if
}//end header


	public function Footer(){
			$this->SetY(-20); 	
			$this->Cell(190,5,'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(),0,false,'R',0,'',0, false,'T','M');	//page number		
	}//end footer
}//end class


//---------------------Create new PDF document
$pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('BUCEILS SSG ELECTION REPORT'); 			
$pdf->setFooterFont(Array('times', '', '12'));
$pdf->SetMargins(21.20, 20, 25);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


// -------------------Add page
$pdf->AddPage();
$pdf->SetFont('times','',12);
ob_start();	
	
	//date generated
	date_default_timezone_set("Asia/Manila");
	$today=date("F j, Y");	
	$acadyear=date("Y");	

	$pdf->Ln(23); 
	$pdf->Cell(40,5,''.$today,0,0,'L');

	$queryVoteEvent=mysqli_query($conn, "SELECT * FROM vote_event"); 
		while($dataRead=mysqli_fetch_array($queryVoteEvent)){ 
			$pdf->Ln(15);
			$pdf->SetFont('times','B',12);
			$pdf->Multicell(170,2, 'DECLARATION OF RESULTS FOR BICOL UNIVERSITY INTEGRATED LABORATORY SCHOOL (BUCEILS) SUPREME STUDENT GOVERNMENT (SSG) ELECTION FOR A.Y. '.$acadyear.'-'.($acadyear+1),0,'C',0,1,'','',true); 

			$pdf->Ln(10); 
			$pdf->SetFont('times','',12);
			$pdf->Multicell(170,2, 'We, the Commission on Election (COMELEC), hereby announce the results of the Student Council Election for the Academic Year '.$acadyear.'-'.($acadyear+1) .' held between '.date('F j, Y', strtotime($dataRead['start_date'])).' ('.date('g:i A', strtotime($dataRead['start_date'])). ') to '.date('F j, Y', strtotime($dataRead['end_date'])).' ('.date('g:i A', strtotime($dataRead['end_date'])) .') using the BUCEILS Online Voting System. Below is a table of the summary of results:																																																																																																																																																',0,'J',0,1,'','',true); //empty space is for justify 
		}//end while 


// -------------------Display table 
	$pdf->Ln(5); 
	$pdf->SetFillColor(224,235,255);
	$pdf->SetFont('times','B',12);
	
		//column titles
		$pdf->Cell(65,10.8,'CANDIDATES',1,0,'C',1);
		$pdf->Cell(88,5,'YEAR LEVEL VOTES',1,0,'C',1);
		$pdf->Cell(17,10.8,'TOTAL',1,0,'C',1);
		$pdf->Cell(0,5,'',0,1);  //spacer
		$pdf->Cell(65,5,'',0,0); //spacer
		$pdf->Cell(14.7,5,'7',1,0,'C',1);     
		$pdf->Cell(14.7,5,'8',1,0,'C',1);   
		$pdf->Cell(14.7,5,'9',1,0,'C',1);   
		$pdf->Cell(14.6,5,'10',1,0,'C',1);   
		$pdf->Cell(14.6,5,'11',1,0,'C',1);   
		$pdf->Cell(14.7,5,'12',1,1,'C',1);

		//----------GETS THE WINNER PER POSITION
			//Count number of candidate_position
				$result = mysqli_query($conn,"SELECT * FROM candidate");
				$i = mysqli_num_rows($result);
			//Get highest vote per candidate_position
				
			//Store id of candidate with highest vote

		//----------CHECKS FOR TIE
			//If there is more than 1 highest vote per candidate_position
			//Prompt to pick
			//Store id of candidate votes given a +1
			//Update stored id of winning candidate

		//----------CHECKS IF WINNER MET MINIMUM VOTE QUOTA
			//At least 50% of all votes for non-representative positions
				//If not, update stored id to zero or null
			//At least 50% of year-level votes for representative positions
				//If not, update stored id to zero or null

//QUERY TO GET THE LAST CANDIDATE PER POSITION
//$queryGroup=mysqli_query($conn, "SELECT max(student_id) as last FROM candidate group by position_id");
//$lastCandidate= mysqli_fetch_array($queryGroup);
//-------------
 
$query=mysqli_query($conn, "SELECT candidate.candidate_id, candidate.student_id, candidate.position_id, candidate.total_votes, student.lname, student.fname, student.mname, candidate_position.heirarchy_id, candidate_position.position_name FROM candidate INNER JOIN student ON candidate.student_id = student.student_id INNER JOIN candidate_position ON candidate.position_id = candidate_position.heirarchy_id ORDER BY heirarchy_id"); 

		$flag = 0;
		$temp = 0;
		while($data=mysqli_fetch_array($query))
		{ 	
			if($temp==0 || $temp!=$data['heirarchy_id']){
				$flag = 0;
			}
			if($flag==0){
				$pdf->SetFont('','B',12);
				$pdf->Cell(170,5, strtoupper($data['position_name']),1,1,'L',1);	//print position name once
				$flag = 1;
			}
			//end if

				//concat last name, first name, middle name
				if(empty($data['mname']))
					$data['fullname']=$data['lname'].", ".$data['fname'];
				else 														//gets first letter middle initial 
					$data['fullname']=$data['lname'].", ".$data['fname']." ".mb_substr($data['mname'],0,1).".";

					//display full name w/ resize condition
					if(strlen($data['fullname'])<40){
						$pdf->SetFont('','',12); 
						$pdf->Cell(65,5,$data['fullname'],1,0,'L',0);			
					}else{ 
						$pdf->SetFont('','',10); 
						$pdf->Cell(65,5,$data['fullname'],1,0,'L',0);			
					}

//----------NUMBER OF VOTES RECEIVED PER CANDIDATE PER GRADE LEVEL
			$id = $data['candidate_id'];
			for($i = 7,$j=0; $i <=12;$i++, $j++)
			{
				$result = mysqli_query($conn,"SELECT * FROM vote INNER JOIN student ON vote.student_id = student.student_id where candidate_id = '$id' and grade_level = '$i' and status='Voted' ");
				$votesReceived[$j] = mysqli_num_rows($result);
			}

				$votesReceivedTotal= $votesReceived[0]+$votesReceived[1]+$votesReceived[2]+$votesReceived[3]+$votesReceived[4]+$votesReceived[5];

				$pdf->Cell(14.7,5,$votesReceived[0],1,0,'C',0);  		//column total grade 7 vote
				$pdf->Cell(14.7,5,$votesReceived[1],1,0,'C',0);   		//column total grade 8 vote
				$pdf->Cell(14.7,5,$votesReceived[2],1,0,'C',0);  		//column total grade 9 vote
				$pdf->Cell(14.6,5,$votesReceived[3],1,0,'C',0);			//column total grade 10 vote
				$pdf->Cell(14.6,5,$votesReceived[4],1,0,'C',0);   		//column total grade 11 vote
				$pdf->Cell(14.7,5,$votesReceived[5],1,0,'C',0);  		//column total grade 12 vote
				$pdf->Cell(17,5,$votesReceivedTotal,1,1,'C',0); 		//ADDS EVERY COLUMN
				
				$temp = $data['heirarchy_id'];

//----------DISPLAYS ABSTAIN
//STATUS: CORRECT NA PRINTING, CALCULATIONS NALANG

$queryGroup=mysqli_query($conn, "SELECT max(student_id) as last FROM candidate group by position_id");
while($lastCandidate = mysqli_fetch_array($queryGroup)){
				
		if($data['student_id']==$lastCandidate['last']){ //should loop :<
			$pdf->SetFont('','',12);
			$pdf->Cell(65,5, 'ABSTAIN',1,0,'L',0);					

				//temporary place holders
				$pdf->Cell(14.7,5,'',1,0,'C',0);  					//column total grade 7 vote
				$pdf->Cell(14.7,5,'' ,1,0,'C',0);   				//column total grade 8 vote
				$pdf->Cell(14.7,5,'',1,0,'C',0);  					//column total grade 9 vote
				$pdf->Cell(14.6,5,'',1,0,'C',0);					//column total grade 10 vote
				$pdf->Cell(14.6,5,'',1,0,'C',0);   					//column total grade 11 vote
				$pdf->Cell(14.7,5,'',1,0,'C',0);  					//column total grade 12 vote
				$pdf->Cell(17,5,'',1,1,'C',0); 						//column total vote
		}//end if
	}//end while	
}//end while

//----------HIGHLIGHTS THE ROW OF WINNER PER POSITION
			//if it is the stored id per position, highlight

//----------DISPLAYS NUMBER OF ENROLLED STUDENTS 
	$queryEnrolled=mysqli_query($conn, "SELECT sum(case when grade_level = '7' then 1 else 0 end) AS g7,
    			    sum(case when grade_level = '8' then 1 else 0 end) AS g8,
    			    sum(case when grade_level = '9' then 1 else 0 end) AS g9,
    				sum(case when grade_level = '10' then 1 else 0 end) AS g10,
    				sum(case when grade_level = '11' then 1 else 0 end) AS g11,
    				sum(case when grade_level = '12' then 1 else 0 end) AS g12,
   					count(student_id) AS totalEnrolled FROM student");
	$res = mysqli_fetch_array($queryEnrolled);

				$pdf->SetFont('','B',12);
				$pdf->Cell(170,5,'' ,1,1,'C',0); 			//empty row spacer	
				$pdf->Cell(65,5,'Number of Enrolled Students:',1,0,'L',0);		
		
				$pdf->Cell(14.7,5,$res[0],1,0,'C',0);     	//enrolled grade 7
				$pdf->Cell(14.7,5,$res[1],1,0,'C',0);   	//enrolled grade 8
				$pdf->Cell(14.7,5,$res[2],1,0,'C',0);   	//enrolled grade 9
				$pdf->Cell(14.6,5,$res[3],1,0,'C',0);   	//enrolled grade 10
				$pdf->Cell(14.6,5,$res[4],1,0,'C',0);   	//enrolled grade 11
				$pdf->Cell(14.7,5,$res[5],1,0,'C',0);  		//enrolled grade 12
				$pdf->Cell(17,5,$res[6],1,1,'C',0); 		//total enrolled	

//----------DISPLAYS NUMBER OF VOTES RECEIVED 
	$queryVoted=mysqli_query($conn, "SELECT sum(case when grade_level = '7' then voting_status end) AS g7Voted,
    			    sum(case when grade_level = '8' then voting_status end) AS g8Voted,
    			    sum(case when grade_level = '9' then voting_status end) AS g9Voted,
    				sum(case when grade_level = '10' then voting_status end) AS g10Voted,
    				sum(case when grade_level = '11' then voting_status end) AS g11Voted,
    				sum(case when grade_level = '12' then voting_status end) AS g12Voted,
   					count(student_id) AS totalVoted FROM student");
	$studVoted = mysqli_fetch_array($queryVoted);
	$sumNumberOfVotes=$studVoted[0]+$studVoted[1]+$studVoted[2]+$studVoted[3]+$studVoted[4]+$studVoted[5];

				$pdf->Cell(65,5,'Number of Votes Received:',1,0,'L',0);	
				$pdf->Cell(14.7,5,$studVoted[0],1,0,'C',0);     		//received grade 7
				$pdf->Cell(14.7,5,$studVoted[1],1,0,'C',0);   			//received grade 8
				$pdf->Cell(14.7,5,$studVoted[2],1,0,'C',0);   			//received grade 9
				$pdf->Cell(14.6,5,$studVoted[3],1,0,'C',0);   			//received grade 10
				$pdf->Cell(14.6,5,$studVoted[4],1,0,'C',0);   			//received grade 11
				$pdf->Cell(14.7,5,$studVoted[5],1,0,'C',0);  			//received grade 12
				$pdf->Cell(17,5,($sumNumberOfVotes),1,1,'C',0); 				//total received	

// -------------------Display Text
	$pdf->Ln(10); 
	$pdf->SetFont('','',12);
	$pdf->Multicell(170,2, 'In the event of a tie between candidates vying for the same position, an additional point, indicated by the plus one (+1) symbol beside the original vote count, was given to the candidate who won the toss coin. Leading candidate/s who failed to meet the minimum number of votes required to meet the electoral quota shall not be elected to the position he/she/they are running for. The newly elected candidates’ names are highlighted in the table.                                                             ',0,'J',0,1,'','',true); 
// -------------------Display Signatory
	$pdf->Ln(20); 
	$pdf->SetFont('','B',12);
	$pdf->Cell(20,1,'Certified true and correct by:',0,0);
	
// !!! WAITING FOR SIGNATORY DETAILS
	
	//COMELEC Secretary
	$pdf->Ln(30); 
	$pdf->SetFont('','',12);
	$pdf->Cell(20,5,'SURNAME, FIRST NAME M.',0,1);
	$pdf->SetFont('','BI',12);
	$pdf->Cell(20,1,'COMELEC Secretary',0,0);
	
	//COMELEC Chairman
	$pdf->Ln(30); 
	$pdf->SetFont('','',12);
	$pdf->Cell(20,5,'SURNAME, FIRST NAME M.',0,1);
	$pdf->SetFont('','BI',12);
	$pdf->Cell(20,1,'COMELEC Chairman',0,0);
	
	//COMELEC Adviser
	$pdf->Ln(30); 
	$pdf->SetFont('','',12);
	$pdf->Cell(20,5,'SURNAME, FIRST NAME M.',0,1);
	$pdf->SetFont('','BI',12);
	$pdf->Cell(20,1,'COMELEC Adviser',0,0);

// -------------------Output PDF
ob_end_clean();
$pdf->Output('Official Election Result.pdf', 'I'); 
