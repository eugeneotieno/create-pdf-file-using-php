<?php
require_once('fpdf/fpdf.php');

$name = 'Otieno Eugene';
$number = '0722503098';
$event = 'Kenya Kite Festival';
$date = '12th, July, 2016';
$amount = 'Ksh. 200';
$type = 'Ordinary';
$serial = '208765340-001';

// Create your class instance
$fpdf = new FPDF();
// Set up the default page margins for your PDF
// The parameters are margin left, margin top, margin right (units used are mm)
$fpdf->SetMargins(0, 0, 0);
// SetAutoPageBreak function will create a new page if our content exceeds the page limit. 0 stands for margin from bottom of the page before breaking.
$fpdf->SetAutoPageBreak(true, 0);
// AliasNbPages is optional if you want the ability to display page numbers on your PDF pages.
$fpdf->AliasNbPages();

// We need to define the path to where our font files are located. To add additional fonts from the default ones supplied see http://www.fpdf.org/makefont/)
define('FPDF_FONTPATH', 'font/');
// Setting up our fonts and styles - The first parameter is the string you will use in your code to access this font, the second is the style of the font you are setting (B = bold, I = italic, BI = Bold & Italic) and finally is the php file containing your font.
$fpdf->AddFont('Verdana', '','verdana.php'); // Add standard Arial
$fpdf->AddFont('Verdana', 'B', 'verdanab.php'); // Add bolded version of Arial
$fpdf->AddFont('Verdana', 'I', 'verdanai.php'); // Add italicised version of Arial

$fpdf->AddPage();

// Set font size
$fpdf->SetFontSize(10);
// Select our font family
$fpdf->SetFont('Verdana', '');

/* Parameters are as follows:
30 - This is the width in mm that we set our Cell
6 - This is the height in mm
'Ticket' - Text to display inside the Cell
0 - This is for the border. 1 = border and 0 = no border.
0 - This is the position for our next Cell/MultiCell. 0 will fit the next cell in to the right of this one and 1 will fit the next cell underneath.
L - This is the alignment of our Cell. L = Left, R = Right and C = Centered.
FALSE - This is whether or not we want our Cell to have background fill colour.
*/
$fpdf->Image('fpdf/logo.jpg',10,18,30,0,'','http://www.fpdf.org');
// The above parameters are: The image file path, The X position, The Y position, width, height. Note that the X and Y position are for where the top left hand corner sits on the page.

$fpdf->SetXY(18,49);
// First we add our Cell function
$fpdf->Cell(30, 6, 'Ticket', 0,'C', FALSE);

$fpdf->SetXY(50,6);
// Next we add our data
$fpdf->MultiCell(45, 30, $name, 0, 'L');
$fpdf->SetXY(50,10);
$fpdf->MultiCell(45, 30, $number, 0, 'L');
$fpdf->SetXY(50,14);
$fpdf->MultiCell(45, 30, $event, 0, 'L');
$fpdf->SetXY(50,18);
$fpdf->MultiCell(45, 30, $date, 0, 'L');
$fpdf->SetXY(50,22);
$fpdf->MultiCell(45, 30, $amount, 0, 'L');
$fpdf->SetXY(50,26);
$fpdf->MultiCell(45, 30, $type, 0, 'L');
$fpdf->SetXY(50, 30);
$fpdf->MultiCell(45, 30, $serial, 0, 'L');
// These parameters are the same as the Cell function, however the value 6 is referring to the height for each line rather than in total and the 
//Parameter for where the next Cell is to be positioned is not in the MultiCell function - Cells will automatically appear below.

$fpdf->SetXY(140,290);
$fpdf->Cell(30, 4, 'Thank you! Page ' . $fpdf->PageNo(), 0, 1);

$fpdf->Output('ticket.pdf', 'I');
// The first parameter is what we are naming our file. The second parameter is the destination of your file.
// 'I' - This outputs the file to the browser - the file name is what it will default to if 'Save As' is selected. 'D' will force the file to be downloaded. 'F' will save the PDF file locally (To do this you need to include the file path in the file name field also).

?>