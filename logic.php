<?php 
$investment=$_POST['investment'];
$annualRate=$_POST['return_rate'];
$monthlyRate=$annualRate/12/100;
$years=$_POST['year'];
$months=$years*12;
$futureValue=0;
$futureValue=$investment*((pow(1+$monthlyRate,$months)-1)/$monthlyRate)*(1+$monthlyRate);
$investment_amonut=$investment*12*$years;
$est_rtn=$futureValue-$investment_amonut;
$data=array(
'invested_amount'=>$investment_amonut,
'est_return'=>$est_rtn,
'total_value'=>$futureValue
);
echo json_encode($data);
?>