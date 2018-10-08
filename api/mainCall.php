<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function callAPI($method, $url, $data){

   $curl = curl_init();

   switch ($method) {
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
      'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImFlOGJkMWVjMGU2ZjEzZDI5NDhlNmQ2YjQyZGQ0MDA5MGMwMjk0OWEyZTliYjM1YjUzNWZiMjUyYWZjY2JmZTAzNWZlOGRhZDQ0ODhiMWZmIn0.eyJhdWQiOiIyIiwianRpIjoiYWU4YmQxZWMwZTZmMTNkMjk0OGU2ZDZiNDJkZDQwMDkwYzAyOTQ5YTJlOWJiMzViNTM1ZmIyNTJhZmNjYmZlMDM1ZmU4ZGFkNDQ4OGIxZmYiLCJpYXQiOjE1Mzg2NDUyMzQsIm5iZiI6MTUzODY0NTIzNCwiZXhwIjoxNTcwMTgxMjM0LCJzdWIiOiIxIiwic2NvcGVzIjpbIioiXX0.TD6-FmgI_tX3S-UYWlS2Uz8uxCtgIqpCb2g-cX4RwggLbuFNz6nc-GZF80NO3VUkSVNXhf4QLF-whZvHwjfPuXxgLKr7Zk_tNZcFKb2uLsH08STim9GjiPXg5b9rHgk8rytP7n5tn8liYFDg2_8GrZIAHwG8Fhm9UwVsb4irUV0jEIBE3j61mOo_LTbWw-ut15hF6_zfsoYNCpR1nxItRjqo_AxjLk5e99hNCi0ox8B2zVTyLn8C2y0j5S3rAlAfI6kZ6h5LUof-y4BXhGCTr_1UZ6uokTPlBOnh1MY6AeBANWcy_RxkQb_jiqx-4I_HE__SB4hem5T0jC__yh5EXPGwmgFaz9o-DlISokcgwbCS_BJaDwkArz226cTUm6NmKVYclwCi9H9dspGJlhS9g2vRgMi80N2Jzntt0Q87EfsHkdG1OxTdYurE74sF_CM_u_QFTAdtoPxJCmEe0Arqdlv9jzsjUa85kLQrYp6qQq6cBnecQzsRbmEGiqkOEe3BwlvFFrY-gnd1oMvviXhvz5cqzEth_v6ODlDWEZvmvzYr3oSa1PCZe7Lm3h3tCLvhB9nCRG6hpwNAj1O4aYUOVxZXtrycsR2cusOIPhlxI77Md3h1JSOK5g5Y2reBHe5Ua3jjEWwdiBQ6qL79GaXyxyTcKw-XjhoxKGg-lm2_drw',
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

   // EXECUTE:
   $result = curl_exec($curl);

   if(!$result) {
      die("Connection Failure");
   }
   curl_close($curl);
   return $result;
}

// $data_array =  array(
//       "Code"      => '',
//       "Suchname"  => '',
//       "Titel"     => '',
//       "Vorname"   => '',
//       "Nachname"  => 'Mukesh',
//       "Geburtsdatum" => '',
//       "Sterbedatum" => '',
//       "Kommentar" => '',
//       "Sterbedatum" => '',
//       "ip_address" => '',
//    );
// $get_data = callAPI('POST', 'https://alegralabs.com/hemanta/symcom/api/public/v1/user/login', json_encode($data_array));
// var_dump($get_data);