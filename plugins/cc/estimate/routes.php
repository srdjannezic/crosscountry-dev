<?php 
header("Access-Control-Allow-Origin: *");      


use Cc\Estimate\Components\EstimateCmp;
use Illuminate\Http\Request;

Route::get('/api/rooms',function(){
	$pathToFile = 'https://dev.ultimatemoving.us/api/v1/rooms';
	
	$response = callAPI('GET',$pathToFile, false);

	return $response;
});//->middleware('auth');

Route::get('/api/inventory',function(){
	$pathToFile = 'https://dev.ultimatemoving.us/api/v1/inventory';
	
	$response = callAPI('GET',$pathToFile, false);

	return $response;
});

Route::get('/api/move-sizes',function(){
	//$pathToFile = 'https://dev.ultimatemoving.us/api/v1/move-sizes';
	
	//$response = callAPI('GET',$pathToFile, false);
   $response = '[{"id":1,"name":"Studio","created_at":"2018-12-24 07:51:38","updated_at":"2018-12-24 07:51:38","move_type":[1,2,3,4]},{"id":2,"name":"1 bedroom","created_at":"2018-12-24 07:51:38","updated_at":"2018-12-24 07:51:38","move_type":[1,2,3,4]},{"id":3,"name":"2 bedrooms","created_at":"2018-12-24 07:51:38","updated_at":"2018-12-24 07:51:38","move_type":[1,2,3,4]},{"id":4,"name":"3 bedrooms","created_at":"2018-12-24 07:51:38","updated_at":"2018-12-24 07:51:38","move_type":[1,2,3,4]}]';
	return $response;
});

Route::get('/api/states',function(){
	$pathToFile = 'https://dev.ultimatemoving.us/api/v1/states';
	
	$response = callAPI('GET',$pathToFile, false);

	return $response;
});

Route::get('/api/cars',function(){
   $pathToFile = '';
   
   $response = EstimateCmp::getCars();

   return $response;
});

Route::post('/api/post',function(Request $request){
   $pathToFile = 'https://dev.ultimatemoving.us/api/v1/web/leads';
   //var_dump($request);
   $send = $request->all();
   //$send['data']['move_date'] = date('Y-m-d');
   // $send['data']['delivery_zip'] = '10000';
   // $send['data']['pickup_zip'] = '11000';
   // $send['data']['phone'] = '3203200320';
   
   $data = json_encode($send['data']);
   //var_dump($data);
   $response = callAPI('POST',$pathToFile, $data);

   return $response;
});

function callAPI($method, $url, $data){
   $curl = curl_init();

   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }

   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Authorization: eCLk7RvaJfYSnQaneUoH',
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}
?>