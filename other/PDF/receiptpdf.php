<?php
// require 'connect.php';
// Include the main TCPDF library (search for installation path).
require_once('TCPDF-main/tcpdf.php');

		date_default_timezone_set("Asia/Manila");
		$today=date("F j, Y");
		$acadyear=date("Y");

class PDF extends TCPDF {
	public function Header(){

		$imageFile= K_PATH_IMAGES.'Slide11.png';
		$this->Image($imageFile,15,8,20,'','png','','T',false,300,'L',false,false,0,false,false,false);

		$imageFile= K_PATH_IMAGES.'Slide33.png';
		$this->Image($imageFile,15,8,20,'','png','','T',false,300,'R',false,false,0,false,false,false);


		$this->Ln(5); 
		$this->SetFont('times','B',12);
		$this->Cell(182,3,'COMMISSION ON ELECTION (COMELEC)',0,1,'C'); 
		$this->SetFont('times','',12);
		$this->Cell(180,3, 'BICOL UNIVERSITY INTEGRATED LABORATORY',0,1,'C'); 
		$this->Cell(181,3, 'SCHOOL (BUCEILS) HIGH SCHOOL DEPARTMENT',0,1,'C'); 
		$this->SetFont('times','',12);
		$this->Cell(180,3,'Bicol University Main Campus, Legazpi City',0,1,'C');


}
	public function Footer(){
		$this->SetY(-20); //position at 15mm from bottom

//generation date
		//$this->SetFont('helvetica','I',8);
		//date_default_timezone_set("Asia/Manila");
		//$today=date("F j, Y/ g:i A", time());
		//$this->Cell(25,5,'Report Generated on: '.$today,0,0,'L');
		$this->Cell(190,5,'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(),0,false,'R',0,'',0, false,'T','M');


	}
}



// create new PDF document
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf = new PDF('p', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('BALLOT RECEIPT');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_FOOTER);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('times', 'B', 12, '', true);



// Add a page
$pdf->AddPage();
//$pdf->SetFont('helvetica','B',10);
	

// $query3=mysqli_query($conn, "SELECT position_name, position_id FROM candidate_position GROUP BY position_name ORDER BY position_id"); 
		
		$pdf->Ln(18); //font name size style
		$pdf->SetFont('times','',12);
		//date_default_timezone_set("Asia/Manila");
		//$today=date("F j, Y");
		$pdf->Cell(25,5,''.$today,0,0,'C');


		$pdf->Ln(15); //font name size style
		$pdf->SetFont('times','B',20);
		$pdf->Multicell(180,3,'OFFICIAL BALLOT RECEIPT',0,'C',0,1,'','',true); 
		$pdf->SetFont('times','',15);
			//$pdf->Cell(189,3,'ELECTION FOR A.Y. 2021 - 2022',0,1,'C');
		$pdf->Cell(180,2, 'ELECTION FOR A.Y. '.$acadyear.'-'.$acadyear,0,1,'C'); 



$pdf->SetFont('times', '', 12, '', true);
	//$query=mysqli_query($con, "select * from candidate_position");


$query=mysqli_query($conn, "SELECT candidate.student_id, candidate.position_id, candidate.total_votes, student.lname, student.fname, student.mname, candidate_position.position_name 
FROM candidate 
INNER JOIN student ON candidate.student_id = student.student_id 
INNER JOIN candidate_position ON candidate.position_id = candidate_position.position_id 
ORDER BY position_name"); 
 


 //$query2=mysqli_query($conn, "SELECT position_name, position_id FROM candidate_position GROUP BY position_name ORDER BY position_id"); 

	//while($data2=mysqli_fetch_array($query2)){  
		//$pdf->Cell(180,5, $data2['position_name'],1,1,'L',1);
		//$tempPos=$data2['position_name'];

		while($data=mysqli_fetch_array($query)){ 
		$tempPos=$data['position_name'];
		$pdf->Cell(180,5, $data['position_name'],1,1,'L',1);
		$data['fullname']=$data['lname'].", ".$data['fname'].", ".$data['mname'];
		$pdf->Cell(75,5, $data['fullname'],1,0,'L',0);
		//$pdf->Cell(75,5, $data['position_name'],1,0,'L',0);

//$pdf->Cell(75,5,'',0,0);
$pdf->Cell(14.7,5,$data['total_votes'],1,0,'C',0);     
$pdf->Cell(14.7,5,$data['total_votes'],1,0,'C',0);   
$pdf->Cell(14.7,5,$data['total_votes'],1,0,'C',0);   
$pdf->Cell(14.6,5,$data['total_votes'],1,0,'C',0);   
$pdf->Cell(14.6,5,$data['total_votes'],1,0,'C',0);   
$pdf->Cell(14.7,5,$data['total_votes'],1,0,'C',0);  
$pdf->Cell(17,5,$data['total_votes'],1,1,'C',0); 
	//} 	
		} 

$pdf->Ln(10); 
$pdf->SetFont('times','B',15);
		$pdf->Multicell(178,2, 'This receipt will only be valid for today.',0,'C',0,1,'','',true); 
$pdf->SetFont('times','I',15);
		$pdf->Multicell(178,2, ' THANK YOU FOR VOTING!',0,'C',0,1,'','',true); 


// Close and output PDF document
$pdf->Output('Official Ballot Receipt.pdf', 'I'); 