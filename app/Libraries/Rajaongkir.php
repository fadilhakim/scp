<?php 

    namespace App\Libraries;

	class Rajaongkir{
        
        // devhouseid99
		private $api_key = "b0a6d28c0936c29d27e63a7c9039dcf9";
		
		static function general($url)
		{
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => $url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
				"key:".$this->api_key
			  ),
			));
			
			$response = curl_exec($curl);
			$err = curl_error($curl);
			
			curl_close($curl);
			
			if ($err) {
			  return "cURL Error #:" . $err;
			} else {
			  return $response;
			}	
			
		}
		
		static function detail_province($id)
		{
			return $this->general("http://api.rajaongkir.com/starter/province?id=$id");
		}
		
		static function show_province()
		{
			return $this->general("http://api.rajaongkir.com/starter/province");	
		}
		
		static function detail_city($id_city,$id_province)
		{
			return $this->general("http://api.rajaongkir.com/starter/city?id=$id_city&province=$id_province");	
		}
		
		static function dt_city($id_city)
		{
			return $this->general("http://api.rajaongkir.com/starter/city?id=$id_city");
		}
		
		static function city_province($id_province)
		{
			return $this->general("http://api.rajaongkir.com/starter/city?province=$id_province");	
			
		}
		
		static function cost($arr)
		{
			
			$origin 	 = $arr["origin"];
			$destination = $arr["destination"];
			$weight		 = $arr["weight"]; 
			$courier	 = $arr["courier"];
			
			$urlget  = "origin=$origin&";
			$urlget .= "destination=$destination&";
			$urlget .= "weight=$weight&";
			$urlget .= "courier=$courier";
			
			
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $urlget,
			  CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: ".$this->api_key
			  ),
			));
			
			$response = curl_exec($curl);
			$err = curl_error($curl);
			
			curl_close($curl);
			
			if ($err) {
			  return "cURL Error #:" . $err;
			} else {
			  return $response;
			}
		}
		
		
		
	}