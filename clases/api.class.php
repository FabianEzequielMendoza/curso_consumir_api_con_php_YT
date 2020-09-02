<?php 


class api{

    public $url = "http://solodata.es/";


    public function post($arrayDatos, $url){
        $json = json_encode($arrayDatos);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $json,
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if($error){
            return "Error # :" . $error;
        }else{
            return $response;
        }
    }



}



?>