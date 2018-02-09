<?php

include("mpdf.php");
 
$mpdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0); 
 
$mpdf->SetDisplayMode('fullpage');
 
$mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
 
//$mpdf->WriteHTML(file_get_contents('invoice.html'));

echo $css = "<style type='text/css'>
tr.outer
{	
	border:1px solid rgb(0,128,0);	
	margin: 50px;
}
tr.outer > td {
    border: 1px solid rgb(0,128,0);
    box-sizing: border-box;
    height: 190px;
    padding: 10px;
    width: 180px;
}
table.outer_table {
    border-spacing: 30px;
    margin: 0 auto;
}
th {
    text-align: left;
}
.outer table td {
    font-size: 12px;
    line-height: 23px;
    padding: 5px 0;
    vertical-align: top;
}
</style>";

$inline_style = "border:1px solid rgb(0,128,0);
    box-sizing: border-box;
    height: 170px;
    padding: 10px;
    width: 180px;";
//$inline_style = "";
$html_body = '<div class="container">
<div>
<table class="outer_table">';
	for ($i=0; $i < 25 ; $i++) { 
		$html_body.= '<tr class="outer">
    	<td style="'.$inline_style.'">
		  	<table>
				  <tr class="name">
				    	<th colspan="1">Rohit Thadani</th>
				  </tr>
				  <tr class="address">				
				    	<td class="value">237, Jawaharmarg, Rajmohalla, Indore, 452002, Madhya Pradesh</td>
				  </tr>
				  <tr class="phone">				    	
				    	<td class="value">(542)6547821235</td>
				  </tr>
		  	</table>
		</td>
	</tr>';
	}
	
$html_body.='</table>
</div>	
</div>';

$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html_body);
         
//$mpdf->Output();
$mpdf->Output('filename.pdf','D');


?>