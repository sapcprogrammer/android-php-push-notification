<?php 

	function send_notification ($tokens, $message)
	{
		$url = 'https://fcm.googleapis.com/fcm/send';
		$fcm_token = array();
		$fcm_token[] = 'cEDnHnzxUI4:APA91bF2MkmSWp0__DgczHClRprm7k_vPEY7nlQT2uV9gCv3T3Jtw1fx-whSIXoGZDlMkyqhlnjB3AWJU8R_0aERh1loPeLIeWVV4CQFM25gUhvUs_JgdQXted20ZjvhrQDkRkpKAKZjbdX1amFzE8ZKhXZRE81VwQ';
		
		$fields = array(
			 'registration_ids' => $fcm_token,
			 'data' => $message
			);

		$headers = array(
			'Authorization:key = AAAA5q96gbY:APA91bHwmrcyCa3-pxg3OLGwqnUAgq54Xmg3RtKUUPcnqyPIvZd4i2EmoZMmzor5Q1D2rrzqiC3pFnbiUvovQ19b-GBRi2oP1qngMKcDonBvIu85RgQ6B9M69s-B5XDt1VWRepHHyRzGgAznbH2emGUosFWZpZTMuQ',
			'Content-Type: application/json'
			);

	   $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_POST, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
       $result = curl_exec($ch);           
       if ($result === FALSE) {
           die('Curl failed: ' . curl_error($ch));
       }
       curl_close($ch);
       return $result;
	}
	

	/*$conn = mysqli_connect("localhost","root","","fcm");

	$sql = " Select Token From users";

	$result = mysqli_query($conn,$sql);
	$tokens = array();

	if(mysqli_num_rows($result) > 0 ){

		while ($row = mysqli_fetch_assoc($result)) {
			$tokens[] = $row["Token"];
		}
	}

	mysqli_close($conn);*/

	$message = array("message" => "FCM PUSH NOTIFICATION TEST MESSAGE");
	$message_status = send_notification("test", $message);
	echo $message_status;



 ?>
