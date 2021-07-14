<?php
if(isset($_POST['submit1'])):
$invesmet=$_POST['invesmet'];
$annualRate=$_POST['return_rate'];
$monthlyRate=$annualRate/12/100;
$years=$_POST['year'];
$months=$years*12;
$futureValue=0;
$futureValue=$invesmet*((pow(1+$monthlyRate,$months)-1)/$monthlyRate)*(1+$monthlyRate);
$invesmet_amonut=$invesmet*12*$years;
$est_rtn=$futureValue-$invesmet_amonut;

endif;
?>
