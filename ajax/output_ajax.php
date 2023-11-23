<?php 

$output = "";

	$from = $_POST['from'];
	$to = $_POST['to'];
	$amount = $_POST['amount'];

	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://v6.exchangerate-api.com/v6/1fcd41c88c8fb608a815a91b/latest/'.$from,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		));

		$response = curl_exec($curl);

		curl_close($curl);

		$decode = json_decode($response);

		$output = $amount." &nbsp;".$from." equal to &nbsp;".$amount*($decode->conversion_rates->$to)." &nbsp;".$to;

 ?>

 <span class="output_text"><?php echo $output; ?></span>