<?php

require __DIR__ . "/pdf/autoload.php";


use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

include("pdf_set.php");

$html ='
   <h1 style="text-align: center;">---- Invoice Sells ----</h1><br><br>
   <div class="header" dir="ltr">
      <p>
         <b>Sold ID :</b> '.$rows['id'].'<br>
         <b>Date :</b> '.date('d-m-Y', strtotime($rows['date'])).'<br>
         <b>Full name :</b>'.$rowg['name'].'
      </p>
      <br>
      <p style="float:right; margin-right: 50px;">
         <b>Informations :</b><br>
         <b>Email :</b> '.$rows['email'].'<br>
         <b>Company name :</b> '.$rows['companyname'].'
      </p>
   </div>';
$date = date('d-m-Y');
$html .= '
   <br><br><br><br><br><br><br>
   <div class="table">
      <table style="width:100%; border: 1px solid black; border-collapse: collapse;">
         <tr>
            <th style="width:35%; border: 1px solid black;">Reference</th>
            <th style="width:30%; border: 1px solid black;">Name</th>
            <th style="width:20%; border: 1px solid black;">Quantity</th>
            <th style="border: 1px solid black;">Price $</th>
         </tr>
         <tr>
            <td style="height:70px; vertical-align: text-top; padding-left: 5px;">'.$rows['reference'].'</td>
            <td style="height:70px; vertical-align: text-top; text-align: center;">'.$rows['name'].'</td>
            <td style="height:70px; vertical-align: text-top; text-align: center;">'.$rows['quantity'].'</td>
            <td style="height:70px; vertical-align: text-top; text-align: center;">'.$rows['price'].' $</td>
         </tr>
         <tr>
               <td></td>
               <td></td>
               <td style="border: 1px solid black; text-align: right;">Total: </td>
               <td style="border: 1px solid black; text-align: center;">'.$rows['quantity']*$rows['price'].' $</td>
         </tr>
      </table>
   </div> <br><br>
   <div style="float:right; margin-right: 100px;">
      <p>Signature : </p>
      <p>Date : '.$date.'</p>
   </div>';

$dompdf = new Dompdf($options);

$dompdf->setPaper("A4","landspace");

$dompdf->loadHtml($html);

$dompdf->render();

$dompdf->addInfo("Title","PDF Sells");

$a = $rows['id'];
$b = $rows['name'];

$dompdf->stream("$a-purchase-$b.pdf"); // ,["Attachment" => 0]