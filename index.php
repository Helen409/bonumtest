<?php
$banks = array(
	array( //0
		"bank" => "one",
		"body_pay" => "0",
		"mounth_pay" => "50",
		"percent" => "0",
		"period" => "3",
		"period_prefix" => "=",
		"type" => "installment",	),
	array( //1
		"bank" => "one",
		"body_pay" => "0",
		"mounth_pay" => "100",
		"percent" => "0",
		"period" => "5",
		"period_prefix" => "-",
		"type" => "installment"
	),
	array( //2
		"bank" => "one",
		"body_pay" => "0",
		"mounth_pay" => "120",
		"percent" => "0",
		"period" => "8",
		"period_prefix" => "-",
		"type" => "installment"
	),
	array( //3
		"bank" => "two",
		"body_pay" => "0",
		"mounth_pay" => "50",
		"percent" => "0",
		"period" => "5",
		"period_prefix" => "-",
		"type" => "installment"

	),
	array( //4
		"bank" => "two",
		"body_pay" => "0",
		"mounth_pay" => "20",
		"percent" => "10",
		"period" => "6",
		"period_prefix" => "=",
		"type" => "installment"
	),
	array( //5 
		"bank" => "one",
		"body_pay" => "140",
		"mounth_pay" => "0",
		"percent" => "100",
		"period" => "4",
		"period_prefix" => "=",
		"type" => "credit"
	),
	array( //6
		"bank" => "one",
		"body_pay" => "150",
		"mounth_pay" => "0",
		"percent" => "15",
		"period" => "5",
		"period_prefix" => "-",
		"type" => "credit"

	),
);?>
<form action='index.php' method='POST'>
	<label>Конечный период для товара:&nbsp&nbsp </label>
	<input name='endperiod' type='text' value="" /><br />
	<input type='submit' value='Рассчитать' />
</form>

<?php
if (isset($_POST['endperiod'])){
	$endperiod = $_POST['endperiod'];
	echo 'Расчет для периода в '.$endperiod.' месяцев';echo '<br><br>';
	echo 'bank = one; ';	echo 'type = installment';	echo '<br>';
	Сountto($banks, 'one', 'installment', $endperiod);
	echo 'bank = one; ';	echo 'type = credit';	echo '<br>';
	Сountto($banks, 'one', 'credit', $endperiod);
	echo 'bank = two; ';	echo 'type = installment';	echo '<br>';
	Сountto($banks, 'two', 'installment', $endperiod);
	echo 'bank = two; ';	echo 'type = credit';	echo '<br>';
	Сountto($banks, 'two', 'credit', $endperiod);
	}	
	
	function Сountto($banks, $bank, $type, $endperiod){
		if ($bank == 'one') $start = 2;
		if ($bank == 'two') $start = 3;

		for ($m = $endperiod; $m >= $start; $m--){
			for ($i=0; $i<=6; $i++){
				if ($banks[$i]['period']<=$endperiod){
					if (($banks[$i]['bank']==$bank) and ($banks[$i]['type']==$type)) {
						if ($banks[$i]['period']>=$m) {
							if (
							(($banks[$i]['period_prefix']=="=") and ($banks[$i]['period']==$m)) OR 
							(($banks[$i]['period_prefix']=="-"))
							){
								echo 'm = '.$m.'    ';
								echo '  body pay = '.$banks[$i]['body_pay'];echo '   ';
								echo 'month pay = '.$banks[$i]['mounth_pay'];echo '   ';
								echo 'percent = '.$banks[$i]['percent'];echo '   ';
								echo '<br>';
								continue 2;
							}
						}
					}
				}
			}
		}
	}

?>
