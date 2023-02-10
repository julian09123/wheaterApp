<?php 
namespace App\Controllers;

      session_start();
      $_SESSION["cityID"]="3435910";

class Home extends BaseController
{

    public function index()
    {
        
  
        
        $cityID = $_SESSION["cityID"];
        $key = "cec56a9038aca721cb6c3db2046cc19f";
        $apiURL = "https://api.openweathermap.org/data/2.5/weather?id=". $cityID."&appid=".$key."&units=metric";
        $client = \Config\Services::curlrequest();
        $requestGET = $client->request('GET',"https://api.openweathermap.org/data/2.5/weather?id=". $cityID."&appid=".$key."&units=metric");
        
        $data = json_decode($requestGET->getBody(),true);

        $datos = [

            "city" => $data["name"],
            "temp" => $data["main"]["temp"],
            "country" => $data["sys"]["country"],
            "temp_max" => $data["main"]["temp_max"],
            "temp_min" => $data["main"]["temp_min"],
            "humidity" => $data["main"]["humidity"],
            "description" => $data["weather"],
            "wind_di" => $data["wind"]["speed"],
            "wind_spe" => $data["wind"]["deg"]


        ];
        


        
        return view('home',$datos);

    }


    public function weather(){
        
        

       
        

        $data = file_get_contents("public/argentina.json");
        $cc = json_decode($data, true);


        $city = strtolower($_POST['scity']);
        $id="0000";

        foreach ($cc as $country) {
            if(strtolower($city) == strtolower($country['name'])){
                $id = $country['id'];
            }
        }

        if($id != "0000"){
                $cityID = $id;
                $key = "cec56a9038aca721cb6c3db2046cc19f";
                $apiURL = "https://api.openweathermap.org/data/2.5/weather?id=". $cityID."&appid=".$key."&units=metric";
                $client = \Config\Services::curlrequest();
                $requestGET = $client->request('GET',"https://api.openweathermap.org/data/2.5/weather?id=". $cityID."&appid=".$key."&units=metric");
                
                $data = json_decode($requestGET->getBody(),true);

                 $datos = [

                "city" => $data["name"],
                "temp" => $data["main"]["temp"],
                "country" => $data["sys"]["country"],
                "temp_max" => $data["main"]["temp_max"],
                "temp_min" => $data["main"]["temp_min"],
                "humidity" => $data["main"]["humidity"],
                "description" => $data["weather"],
                "wind_spe" => $data["wind"]["speed"],
                "wind_di" => $data["wind"]["deg"]


                ];
          
            
                return view('home',$datos);
        }

            

        



    }
   
  
}
