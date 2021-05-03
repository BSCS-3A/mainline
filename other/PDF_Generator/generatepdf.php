<?php
require '../../php/db_conn.php';
// Remove this temp session
session_start();
$_SESSION['bumail'] = "dhanjaphetverastigue.ador@bicol-u.edu.ph";
$_SESSION['fname'] = "Maria";
$_SESSION['lname'] = "Hanway";
$_SESSION['student_id'] = 1;
$_SESSION['grade_level'] = 7;
$_SESSION['timestamp']=time();

// Include the main TCPDF library (search for installation path).
require_once('TCPDF-main/tcpdf.php');

class PDF extends TCPDF {
	public function Header(){
		if (count($this->pages) === 1){

			$imageFile= K_PATH_IMAGES.'Slide11.png';
			$this->Image($imageFile,20,8,20,'','png','','T',false,300,'',false,false,0,false,false,false);
			

			$imageFile= K_PATH_IMAGES.'Slide22.png';
			$this->Image($imageFile,41,8,20,'','png','','T',false,300,'',false,false,0,false,false,false);
			

			$imageFile= K_PATH_IMAGES.'Slide44.png';
			$this->Image($imageFile,63,8,20,'','png','','T',false,300,'',false,false,0,false,false,false);


			//Header text
			$this->SetFont('times','B',12);
			$this->Cell(100,3, 'COMMISSION ON ELECTION (COMELEC)',0,1,'R'); 
			$this->SetFont('times','',12);
			$this->SetTextColor(0,0,150);
			$this->Cell(174,3, 'BICOL UNIVERSITY INTEGRATED LABORATORY',0,1,'R'); 
			$this->Cell(175,3, 'SCHOOL (BUCEILS) HIGH SCHOOL DEPARTMENT',0,1,'R'); 
			$this->SetFont('times','I',12);
			$this->SetTextColor(0,0,0);
			$this->Cell(154,3,'Bicol University Main Campus, Legazpi City',0,1,'R');
	}

}

	public function Footer(){
			$this->SetY(-20); 	
			$this->Cell(190,5,'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(),0,false,'R',0,'',0, false,'T','M');	//page number		
	}
}


//---------------------Create new PDF document
$pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('VOTE RECEIPT'); 			
$pdf->setFooterFont(Array('times', '', '12'));
$pdf->SetMargins(21, 20, 25);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->setFontSubsetting(true);


// -------------------Add page
$pdf->AddPage();
$pdf->SetFont('times','',12);
ob_start();	
	
	//date generated
	date_default_timezone_set("Asia/Manila");
	$today=date("F j, Y");	
	$acadyear1 = date("Y");
	$acadyear2 = $acadyear1 + 1;


		$pdf->Ln(30); //font name size style
		$pdf->SetFont('times','B',13);
		$pdf->Multicell(178,2, 'OFFICIAL BALLOT RECEIPT',0,'C',0,1,'','',true); 
		$pdf->SetFont('times','',12);
		$pdf->Multicell(178,2, 'BICOL UNIVERSITY INTEGRATED LABORATORY SCHOOL (BUCEILS) SUPREME STUDENT GOVERNMENT (SSG) ELECTION FOR A.Y. '.$acadyear1.'-'.$acadyear2.'',0,'C',0,1,'','',true); 

		$pdf->Ln(5);
		$pdf->SetFont('times','',12);
		$pdf->Multicell(180,2, 'This document serves as your official receipt for the election. Thank you for voting!',0,'C',0,1,'','',true); 

 


		$st_full = $_SESSION['fname'].' '.$_SESSION['lname'];
		$st_glevel = $_SESSION['grade_level'];

//first table

	$pdf->SetLeftMargin(16.5);	// adjust table
	$pdf->Ln(10); 
	$pdf->SetFillColor(224,235,255);
	$pdf->SetFont('times','',12);
	$pdf->Cell(180,10,'VOTER DETAILS',1,0,'C',0);
	// $pdf->Cell(60,10,'',1,0,'C',0);
	$pdf->Cell(90,10,'',0,0); //spacer
	$pdf->Cell(90,10,'',0,1); //spacer
	$pdf->Cell(90,10,'Name of Voter',1,0,'C');
	$pdf->Cell(90,10, $st_full, 1,0,'C',0);
	// $pdf->Cell(60,10,'',1,0,'C',0);
	$pdf->Cell(90,10,'',0,1); //spacer
	$pdf->Cell(90,10,'Grade Level',1,0,'C');
	$pdf->Cell(90,10, $st_glevel, 1,0,'C',0);
	// $pdf->Cell(60,10,'',1,0,'C',0);
	$pdf->Cell(90,10,'',0,1); //spacer
	$pdf->Cell(90,10,'Date Voted',1,0,'C');
	$pdf->Cell(90,10, $today, 1,0,'C',0);
	// $pdf->Cell(60,10,'',1,0,'C',0);
	$pdf->Cell(90,10,'',0,1); //spacer

//second table
	$pdf->Ln(10); 
	$pdf->SetFillColor(224,235,255);
	$pdf->SetFont('times','',12);
	$pdf->Cell(180,10,'SUMMARY OF YOUR VOTES',1,0,'C',0);
	$pdf->Cell(60,10,'',0,0); //spacer
	$pdf->Cell(60,10,'',0,1); //spacer
	$stud_id = $_SESSION['student_id'];
	$vote_que = $conn->query("SELECT * FROM (((vote INNER JOIN candidate ON vote.candidate_id = candidate.candidate_id)INNER JOIN student ON candidate.student_id = student.student_id) INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id) WHERE vote.student_id = $stud_id ORDER BY candidate_position.heirarchy_id");
	
	$receipt_list = array(array());
	mysqli_data_seek($vote_que, 0);
	$h_index = 0;
	$flag = 0;
	while($voted = $vote_que->fetch_assoc()){   // loop through all positions
		if($voted['status'] == "Invalid" || !($voted['status'] == "Abstain" || $voted['status'] == "Voted")){
			$flag = 1;
			break;
		}
		if(($voted["vote_allow"] == 0 && $_SESSION['grade_level'] == $voted["grade_level"]) || $voted["vote_allow"] == 1){
			if($voted['status'] == "Voted"){
				$receipt_list[$h_index][0] = $voted['heirarchy_id'];
				$receipt_list[$h_index][1] = $voted['fname'].' '.$voted['lname'];
				$receipt_list[$h_index][2] = $voted['party_name'];
				$h_index++;
			}
		}
	}
	
	
	$heir_id = 0;
	mysqli_data_seek($vote_que, 0);
	while($voted = $vote_que->fetch_assoc()){   // loop through all positions
		if(($voted["vote_allow"] == 0 && $_SESSION['grade_level'] == $voted["grade_level"]) || $voted["vote_allow"] == 1){
			if($heir_id != $voted["heirarchy_id"]){
				$pdf->Cell(60,10,$voted['position_name'],1,0,'C');
				$heir_id = $voted["heirarchy_id"];
				if($flag == 0){
					$candidate_name = "";
					foreach($receipt_list as $value){
						if($value[0] == $voted['heirarchy_id']){
							$candidate_name = $value[1];
							$party_name = $value[2];
							break;
						}
						else{
							$candidate_name = $voted['status'];
							$party_name = "N/A";
						}
					}
				}
				else{
					$candidate_name = "Invalid";
					$party_name = "N/A";
				}
				$pdf->Cell(60,10,$candidate_name,1,0,'C',0);
				$pdf->Cell(60,10,$party_name,1,0,'C',0);
				$pdf->Cell(60,10,'',0,1); //spacer
			}
		}
	}

	// while($voted = $vote_que->fetch_assoc()){
	// 	$candidate_name = $voted['fname'].' '.$voted['lname'];
	// } 
	
	// $pdf->Cell(60,10,'Vice President',1,0,'C');
	// $pdf->Cell(60,10,'',1,0,'C',0);
	// $pdf->Cell(60,10,'',1,0,'C',0);
	// $pdf->Cell(60,10,'',0,1); //spacer
	// $pdf->Cell(60,10,'Secretary',1,0,'C');
	// $pdf->Cell(60,10,'',1,0,'C',0);
	// $pdf->Cell(60,10,'',1,0,'C',0);
	// $pdf->Cell(60,10,'',0,1); //spacer
	// $pdf->Cell(60,10,'Treasurer',1,0,'C');
	// $pdf->Cell(60,10,'',1,0,'C',0);
	// $pdf->Cell(60,10,'',1,0,'C',0);
	// $pdf->Cell(60,10,'',0,1); //spacer
	// $pdf->Cell(60,10,'Auditor',1,0,'C');
	// $pdf->Cell(60,10,'',1,0,'C',0);
	// $pdf->Cell(60,10,'',1,0,'C',0);
	// $pdf->Cell(60,10,'',0,1); //spacer
	// $pdf->Cell(60,10,'Grade # Representative',1,0,'C');
	// $pdf->Cell(60,10,'',1,0,'C',0);
	// $pdf->Cell(60,10,'',1,0,'C',0);
	// $pdf->Cell(60,10,'',0,1); //spacer




		$pdf->Ln(10); 
		$pdf->SetFont('times','',13);
		$pdf->Multicell(180,2, 'The contents of this receipt contain confidential information for the 
			sole use of vote verification, please do not disclose.',0,'C',0,1,'','',true); 


// Close and output PDF document
$pdf->Output('Official Ballot Receipt.pdf', 'I');  
