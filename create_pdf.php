<?php

require __DIR__ . "/pdf/autoload.php";


use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

$html ='
   <h1 style="text-align: center;">---- '.$_POST['0'].' ----</h1>
   <div class="header" dir="ltr">
      <p>
         <b>'.$_POST['1'].'</b><br>
         <b>'.$_POST['2'].'</b><br>
         <b>'.$_POST['3'].'</b>
      </p>

      <p style="float:right; margin-right: 50px;">
         <b>'.$_POST['4'].'</b><br>
         <b>'.$_POST['5'].'</b><br>
         <b>'.$_POST['6'].'</b>
      </p>
   </div>';
$date = date('d-m-Y');
$html .= '
   <br><br><br> <br><br>
   <div class="table">
      <table style="width:100%; border: 1px solid black; border-collapse: collapse;">
         <tr>
            <th style="width:35%; border: 1px solid black;">Reference</th>
            <th style="width:30%; border: 1px solid black;">Name</th>
            <th style="width:20%; border: 1px solid black;">Quantity</th>
            <th style="border: 1px solid black;">Price $</th>
         </tr>
         <tr>
            <td style="height:70px; vertical-align: text-top; padding-left: 5px;">'.$_POST['7'].'</td>
            <td style="height:70px; vertical-align: text-top; text-align: center;">'.$_POST['8'].'</td>
            <td style="height:70px; vertical-align: text-top; text-align: center;">'.$_POST['9'].'</td>
            <td style="height:70px; vertical-align: text-top; text-align: center;">'.$_POST['10'].' $</td>
         </tr>
         <tr>
               <td></td>
               <td></td>
               <td style="border: 1px solid black; text-align: right;">Total: </td>
               <td style="border: 1px solid black; text-align: center;">'.$_POST['9']*$_POST['10'].' $</td>
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

$dompdf->addInfo("Title","PDF Buy/Purchase");
$a = $_POST['8'];

$dompdf->stream("$a.pdf"); // ,["Attachment" => 0]