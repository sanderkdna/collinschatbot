<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class WpController extends Controller
{
    
    public function InboundMessage(Request $request){


        if ($request->ticket_id !== "") {

            $currentticket_id = $request->ticket_id;

            $request->ticket_id = $request->ticket_id.date('Ymd');

            $ticket_exists = DB::table('tickets')->where('ticket', '=', $request->ticket_id)->get();

            //$output = $ticket_exists;
            if ($ticket_exists != "[]") {
                $estado_ticket = $ticket_exists[0]->estado;

                switch($estado_ticket){
                    case '1':
                        if ($request->message == "1") {
                            $estado = DB::table('estados')->where('id', '=', "2")->get();

                            DB::table('tickets_mensajes')->insert([
                                                 'ticket_id' => $request->ticket_id,
                                                 'mensaje' => $request->message,
                                                 'usuario' => $request->contact_name
                                             ]);
                
                            DB::table('tickets_mensajes')->insert([
                                                             'ticket_id' => $request->ticket_id,
                                                             'mensaje' => $estado[0]->mensaje,
                                                             'usuario' => "WEBBOT"
                                                         ]);

                            $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                            ->update(['estado' => $estado[0]->id ]);

                            $output = $estado[0]->mensaje;
                        }elseif($request->message == "2"){
                            $estado = DB::table('estados')->where('id', '=', "3")->get();
                            DB::table('tickets_mensajes')->insert([
                                                 'ticket_id' => $request->ticket_id,
                                                 'mensaje' => $request->message,
                                                 'usuario' => $request->contact_name
                                             ]);
                
                            DB::table('tickets_mensajes')->insert([
                                                             'ticket_id' => $request->ticket_id,
                                                             'mensaje' => $estado[0]->mensaje,
                                                             'usuario' => "WEBBOT"
                                                         ]);

                            $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                            ->update(['estado' => $estado[0]->id ]);

                            $output = $estado[0]->mensaje;
                        }else{
                            $estado = DB::table('estados')->where('id', '=', "14")->get();
                            DB::table('tickets_mensajes')->insert([
                                                             'ticket_id' => $request->ticket_id,
                                                             'mensaje' => $estado[0]->mensaje,
                                                             'usuario' => "WEBBOT"
                                                         ]);
                            $output[0] = $estado[0]->mensaje;

                            $estado = DB::table('estados')->where('id', '=', $estado_ticket)->get();
                            // $output[1] = $estado[0]->mensaje;
                        }
                    break;
                    case '2':

                        if($request->message != "9"){

                            if($request->message == "8"){

                                $estado = DB::table('estados')->where('id', '=', "1")->get();

                                DB::table('tickets_mensajes')->insert([
                                                                 'ticket_id' => $request->ticket_id,
                                                                 'mensaje' => $request->message,
                                                                 'usuario' => $request->contact_name
                                                             ]);
                                
                                DB::table('tickets_mensajes')->insert([
                                                                 'ticket_id' => $request->ticket_id,
                                                                 'mensaje' => $estado[0]->mensaje,
                                                                 'usuario' => "WEBBOT"
                                                             ]);

                                $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                                ->update(['estado' => $estado[0]->id ]);

                                $output = $estado[0]->mensaje;

                            }else{

                                $cod_aiata = DB::table('codigo__iatas')->where('codigo', '=', $request->message)->get();
                                DB::table('tickets_mensajes')->insert([
                                                         'ticket_id' => $request->ticket_id,
                                                         'mensaje' => $request->message,
                                                         'usuario' => $request->contact_name
                                                     ]);
                                if ($cod_aiata == "[]") {
                                    $estado = DB::table('estados')->where('id', '=', "11")->get();
                                    DB::table('tickets_mensajes')->insert([
                                                                     'ticket_id' => $request->ticket_id,
                                                                     'mensaje' => $estado[0]->mensaje,
                                                                     'usuario' => "WEBBOT"
                                                                 ]);
                                    $output[0] = $estado[0]->mensaje;


                                    $estado = DB::table('estados')->where('id', '=', $estado_ticket)->get();
                                    $output[1] = $estado[0]->mensaje;
                                    // code...
                                }else{
                                    $estado = DB::table('estados')->where('id', '=', "5")->get();

                                    DB::table('tickets_mensajes')->insert([
                                                         'ticket_id' => $request->ticket_id,
                                                         'mensaje' => $request->message,
                                                         'usuario' => $request->contact_name
                                                     ]);
                        
                                    DB::table('tickets_mensajes')->insert([
                                                                     'ticket_id' => $request->ticket_id,
                                                                     'mensaje' => $estado[0]->mensaje,
                                                                     'usuario' => "WEBBOT"
                                                                 ]);

                                    $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                                    ->update(['estado' => $estado[0]->id, 'iata' => $cod_aiata[0]->aerolinea ]);

                                    $output = $estado[0]->mensaje;
                                }
                            }

                        }else{

                            $estado = DB::table('estados')->where('id', '=', "1")->get();
                
                            DB::table('tickets_mensajes')->insert([
                                                             'ticket_id' => $request->ticket_id,
                                                             'mensaje' => $request->message,
                                                             'usuario' => $request->contact_name
                                                         ]);
                            
                            DB::table('tickets_mensajes')->insert([
                                                             'ticket_id' => $request->ticket_id,
                                                             'mensaje' => $estado[0]->mensaje,
                                                             'usuario' => "WEBBOT"
                                                         ]);
            
                            $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                            ->update(['estado' => $estado[0]->id ]);
            
                            $output = $estado[0]->mensaje;
                            
                        }
                    break;
                    case '5':

                        if($request->message != "9"){

                            if($request->message != "8"){

                                $cod_aiata = DB::table('equipos')->where('nombre_equipo', '=', $request->message)->get();
                                if ($cod_aiata == "[]") {
                                    $estado = DB::table('estados')->where('id', '=', "7")->get();

                                    DB::table('tickets_mensajes')->insert([
                                                             'ticket_id' => $request->ticket_id,
                                                             'mensaje' => $request->message,
                                                             'usuario' => $request->contact_name
                                                         ]);
                                    DB::table('tickets_mensajes')->insert([
                                                                     'ticket_id' => $request->ticket_id,
                                                                     'mensaje' => $estado[0]->mensaje,
                                                                     'usuario' => "WEBBOT"
                                                                 ]);
                                    $output[0] = $estado[0]->mensaje;


                                    $estado = DB::table('estados')->where('id', '=', $estado_ticket)->get();
                                    $output[1] = $estado[0]->mensaje;
                                    // code...
                                }else{
                                    $estado = DB::table('estados')->where('id', '=', "6")->get();

                                    $mensajesalida = str_replace('Check-In_NUMBER', $cod_aiata[0]->posicion, $estado[0]->mensaje);
                                    DB::table('tickets_mensajes')->insert([
                                                         'ticket_id' => $request->ticket_id,
                                                         'mensaje' => $request->message,
                                                         'usuario' => $request->contact_name
                                                     ]);
                        
                                    DB::table('tickets_mensajes')->insert([
                                                                     'ticket_id' => $request->ticket_id,
                                                                     'mensaje' => $mensajesalida,
                                                                     'usuario' => "WEBBOT"
                                                                 ]);

                                    $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                                    ->update(['estado' => $estado[0]->id, 'identificador' => strtoupper($request->message) , 'checkin' => $cod_aiata[0]->posicion ]);

                                    $output = $mensajesalida;
                                }
                                
                            }else{

                                $estado = DB::table('estados')->where('id', '=', "1")->get();
                    
                                DB::table('tickets_mensajes')->insert([
                                                                 'ticket_id' => $request->ticket_id,
                                                                 'mensaje' => $request->message,
                                                                 'usuario' => $request->contact_name
                                                             ]);
                                
                                DB::table('tickets_mensajes')->insert([
                                                                 'ticket_id' => $request->ticket_id,
                                                                 'mensaje' => $estado[0]->mensaje,
                                                                 'usuario' => "WEBBOT"
                                                             ]);
                
                                $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                                ->update(['estado' => $estado[0]->id ]);
                
                                $output = $estado[0]->mensaje;
                                
                            }
                        }else{

                            $estado = DB::table('estados')->where('id', '=', "2")->get();
                
                            DB::table('tickets_mensajes')->insert([
                                                             'ticket_id' => $request->ticket_id,
                                                             'mensaje' => $request->message,
                                                             'usuario' => $request->contact_name
                                                         ]);
                            
                            DB::table('tickets_mensajes')->insert([
                                                             'ticket_id' => $request->ticket_id,
                                                             'mensaje' => $estado[0]->mensaje,
                                                             'usuario' => "WEBBOT"
                                                         ]);
            
                            $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                            ->update(['estado' => $estado[0]->id ]);
            
                            $output = $estado[0]->mensaje;
                            
                        }
                    break;
                    case '6':

                        if($request->message != "9"){

                            if($request->message != "8"){


                                $token = DB::table('configurations')->where('id', '=', "1")->get();
                                
                                #$output[0] = 'recibo la solicitud en estado 8'.$request->message;

                                $ticket = DB::table('tickets')->where('ticket', '=', $request->ticket_id)->get();
                                
                                
                                $input_data['request']['description'] = $request->message;
                                
                                /*  CAMPOS NUEVOS   */                                
                                $input_data['request']['template']['name'] = 'SOLICITUD - '.$ticket[0]->identificador;
                                $input_data['request']['mode']['name'] = 'ChatBot';
                                $input_data['request']['level']['name'] = 'Soporte en sitio';
                                /*  FIN CAMPOS NUEVOS   */  
                                
                                
                                #$input_data['request']['site'] = $ticket[0]->checkin;
                                #$input_data['request']['group'] = 'SOPORTE EN SITIO BOGOTA';
                                #$input_data['request']['technician'] = '';
                                #$input_data['request']['asset']['name'] = $ticket[0]->identificador;
                                $input_data['request']['requester']['name'] = $ticket[0]->iata;
                                $input_data['request']['subject'] = $ticket[0]->identificador." - ".substr($request->message, 0, 30);
                                //$ticket[0]->contact_name;
                                $input = json_encode($input_data);
                                
                                $input = urlencode($input);
                                
                                $curl = curl_init();
                                
                                curl_setopt_array($curl, array(
                                    CURLOPT_URL => 'https://sdpondemand.manageengine.com/api/v3/requests/?input_data='.$input,
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => '',
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 0,
                                    CURLOPT_FOLLOWLOCATION => true,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => 'POST',
                                    CURLOPT_HTTPHEADER => array(
                                        'Authorization: Zoho-oauthtoken '.$token[0]->token,
                                        'Accept: application/v3+json',
                                        'Cookie: 6bc9ae5955=215b2f7d509f8d73056a23f7cae07bbf; _zcsr_tmp=35ff2946-c3a3-4c83-bb07-94bba65dea62; sdpcscook=35ff2946-c3a3-4c83-bb07-94bba65dea62'
                                    ),
                                ));
                                
                                $response = curl_exec($curl);
                                
                                #echo "-->".$response;
                                #echo "<--";
                                $json = json_decode($response);
                                curl_close($curl);
                                
                                $estado = DB::table('estados')->where('id', '=', "8")->get();
                                $mensajesalida = str_replace('TICKETNUMBER', $json->request->display_id, $estado[0]->mensaje);
                                
                                DB::table('tickets_mensajes')->insert([
                                    'ticket_id' => $request->ticket_id,
                                    'mensaje' => $request->message,
                                    'usuario' => $request->contact_name
                                ]);
                                
                                
                                
                                DB::table('tickets_mensajes')->insert([
                                    'ticket_id' => $request->ticket_id,
                                    'mensaje' => $mensajesalida,
                                    'usuario' => "WEBBOT"
                                ]);
                                
                                $output[0] = $mensajesalida; #."Su solicitud finalizó se inciará una nueva.";
                                
                                #$estado = DB::table('estados')->where('id', '=', '1')->get();
                                #$output[1] = $estado[0]->mensaje;
                                $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                ->update(['estado' => "1"]);


                            }else{
                                
                                $estado = DB::table('estados')->where('id', '=', "1")->get();
                    
                                DB::table('tickets_mensajes')->insert([
                                                                 'ticket_id' => $request->ticket_id,
                                                                 'mensaje' => $request->message,
                                                                 'usuario' => $request->contact_name
                                                             ]);
                                
                                DB::table('tickets_mensajes')->insert([
                                                                 'ticket_id' => $request->ticket_id,
                                                                 'mensaje' => $estado[0]->mensaje,
                                                                 'usuario' => "WEBBOT"
                                                             ]);
                
                                $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                                ->update(['estado' => $estado[0]->id ]);
                
                                $output = $estado[0]->mensaje;
                                
                            }
                        }else{

                            $estado = DB::table('estados')->where('id', '=', "5")->get();
                
                            DB::table('tickets_mensajes')->insert([
                                                             'ticket_id' => $request->ticket_id,
                                                             'mensaje' => $request->message,
                                                             'usuario' => $request->contact_name
                                                         ]);
                            
                            DB::table('tickets_mensajes')->insert([
                                                             'ticket_id' => $request->ticket_id,
                                                             'mensaje' => $estado[0]->mensaje,
                                                             'usuario' => "WEBBOT"
                                                         ]);
            
                            $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                            ->update(['estado' => $estado[0]->id ]);
            
                            $output = $estado[0]->mensaje;
                            
                        }
                       
                    break;
                    case '8':
                        $token = DB::table('configurations')->where('id', '=', "1")->get();
                        
                        #$output[0] = 'recibo la solicitud en estado 8'.$request->message;
                        
                        $input_data['request']['description'] = $request->message;
                        $input_data['request']['requester']['name'] = 'Solicitud Via BOT';
                        $input_data['request']['subject'] = 'Solicitud realizada vía web';
                        
                        $input = json_encode($input_data);
                        
                        $input = urlencode($input);
                        
                        
                        $curl = curl_init();
                        
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://sdpondemand.manageengine.com/api/v3/requests/?input_data='.$input,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_HTTPHEADER => array(
                                'Authorization: Zoho-oauthtoken '.$token[0]->token,
                                'Accept: application/v3+json',
                                'Cookie: 6bc9ae5955=215b2f7d509f8d73056a23f7cae07bbf; _zcsr_tmp=35ff2946-c3a3-4c83-bb07-94bba65dea62; sdpcscook=35ff2946-c3a3-4c83-bb07-94bba65dea62'
                            ),
                        ));
                        
                        $response = curl_exec($curl);
                        
                        $json = json_decode($response);
                        
                        curl_close($curl);
                        
                        $estado = DB::table('estados')->where('id', '=', "8")->get();
                        $mensajesalida = str_replace('TICKETNUMBER', $json->request->id, $estado[0]->mensaje);
                        
                        DB::table('tickets_mensajes')->insert([
                            'ticket_id' => $request->ticket_id,
                            'mensaje' => $request->message,
                            'usuario' => $request->contact_name
                        ]);
                        
                        
                        
                        DB::table('tickets_mensajes')->insert([
                            'ticket_id' => $request->ticket_id,
                            'mensaje' => $mensajesalida,
                            'usuario' => "WEBBOT"
                        ]);

                        $output[0] = $mensajesalida; #."Su solicitud finalizó se inciará una nueva.";
                        
                        #$estado = DB::table('estados')->where('id', '=', '1')->get();
                        #$output[1] = $estado[0]->mensaje;
                        $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                        ->update(['estado' => "1"]);
                    /*
                    
                    */
                            // code...
                    break;
                    // FUNCION QUE CONSULTA CON SERVICE DESK
                    case '3':

                        if($request->message != "9"){
                            if($request->message == "8"){

                                $estado = DB::table('estados')->where('id', '=', "1")->get();

                                DB::table('tickets_mensajes')->insert([
                                                                 'ticket_id' => $request->ticket_id,
                                                                 'mensaje' => $request->message,
                                                                 'usuario' => $request->contact_name
                                                             ]);
                                
                                DB::table('tickets_mensajes')->insert([
                                                                 'ticket_id' => $request->ticket_id,
                                                                 'mensaje' => $estado[0]->mensaje,
                                                                 'usuario' => "WEBBOT"
                                                             ]);

                                $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                                ->update(['estado' => $estado[0]->id ]);

                                $output = $estado[0]->mensaje;
                                
                            }else{
                                
                                
                                

                                $input_data['list_info']['search_fields']['display_id'] = $request->message;
                                
                                $input = json_encode($input_data);
                                $input = urlencode($input);
                                
                                $cod = $input;

                                $token = DB::table('configurations')->where('id', '=', "1")->get();
                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                CURLOPT_URL => 'https://sdpondemand.manageengine.com/api/v3/requests/?input_data='.$cod,
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => '',
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 0,
                                CURLOPT_FOLLOWLOCATION => true,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => 'GET',
                                CURLOPT_HTTPHEADER => array(
                                    'Authorization: Zoho-oauthtoken '.$token[0]->token,
                                    'Accept: application/v3+json'
                                ),
                                ));

                                $response = curl_exec($curl);

                                $json = json_decode($response);
                                
                                curl_close($curl);
                                #$output[0] = $json->request->requester->name;
                                #if(!isset($json->request->display_id)){
                                    #}
                                if (isset($json->response_status->status_code) && $json->response_status->status_code == '2000') {

                                    $estado = DB::table('estados')->where('id', '=', "10")->get();
                                    DB::table('tickets_mensajes')->insert([
                                        'ticket_id' => $request->ticket_id,
                                        'mensaje' => $request->message,
                                        'usuario' => $request->contact_name
                                    ]);
                                    DB::table('tickets_mensajes')->insert([
                                        'ticket_id' => $request->ticket_id,
                                        'mensaje' => $estado[0]->mensaje,
                                        'usuario' => "WEBBOT"
                                    ]);

                                    $mensajesalida = str_replace('#TICKETNUMBER#', $request->message, $estado[0]->mensaje);
                                    
                                    $output[0] = $mensajesalida;
                                    
                                    $estado = DB::table('estados')->where('id', '=', $estado_ticket)->get();
                                    $output[1] = $estado[0]->mensaje;
                                    // code...
                                }else{
                                    
                                    /*
                                    
    { "list_info" : {   "search_fields":{"display_id":"9734"}, 
                        "required_fields": { "resolution" } } }
                                    
                                    */
                                    #curl_close($curl);
                                    $estado = DB::table('estados')->where('id', '=', "9")->get();

                                    $string = json_encode($json->requests);
                                    #$json = json_decode($string);
                                    #echo $string;
                                    // echo $json['requester']['name'];
                                    $mensajesalida = $estado[0]->mensaje;
                                    $n = "";
                                     foreach ($json->requests as $rx) {
                                       # echo $rx->status->name;
                                         //     break;
                                          $n = $rx->display_id;
                                          $mensajesalida = str_replace('#TICKETNUMBER#', $rx->display_id, $mensajesalida);
                                          $mensajesalida = str_replace('#NOMBREUSUARIO#', $rx->requester->name, $mensajesalida);
                                          $mensajesalida = str_replace('#ASUNTO#', $rx->subject, $mensajesalida);
                                          #$estadoActual = $rx->status->name.'( '.$rx->resolution->content.' )';
                                          $estadoActual = $rx->status->name;
                                          $mensajesalida = str_replace('#ESTADO#', $estadoActual, $mensajesalida);
                                         break;
                                     }
                                    if($n == ""){
                                        $estado = DB::table('estados')->where('id', '=', "10")->get();
                                        DB::table('tickets_mensajes')->insert([
                                            'ticket_id' => $request->ticket_id,
                                            'mensaje' => $request->message,
                                            'usuario' => $request->contact_name
                                        ]);
                                        DB::table('tickets_mensajes')->insert([
                                            'ticket_id' => $request->ticket_id,
                                            'mensaje' => $estado[0]->mensaje,
                                            'usuario' => "WEBBOT"
                                        ]);
            
                                        $mensajesalida = str_replace('#TICKETNUMBER#', $request->message, $estado[0]->mensaje);
                                        
                                        $output[0] = $mensajesalida;
                                        
                                        $estado = DB::table('estados')->where('id', '=', $estado_ticket)->get();
                                        $output[1] = $estado[0]->mensaje;
                                        // code...
                                    }else{
                                        
                                        DB::table('tickets_mensajes')->insert([
                                            'ticket_id' => $request->ticket_id,
                                            'mensaje' => $request->message,
                                            'usuario' => $request->contact_name
                                        ]);
                                        
                                        DB::table('tickets_mensajes')->insert([
                                            'ticket_id' => $request->ticket_id,
                                            'mensaje' => $mensajesalida,
                                            'usuario' => "WEBBOT"
                                        ]);
                                        
                                        $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                                        ->update(['estado' => "0" ]);
                                        
                                        $output = $mensajesalida;
                                    }
                                }
                            }
                        }else{

                            $estado = DB::table('estados')->where('id', '=', "1")->get();
                
                            DB::table('tickets_mensajes')->insert([
                                                             'ticket_id' => $request->ticket_id,
                                                             'mensaje' => $request->message,
                                                             'usuario' => $request->contact_name
                                                         ]);
                            
                            DB::table('tickets_mensajes')->insert([
                                                             'ticket_id' => $request->ticket_id,
                                                             'mensaje' => $estado[0]->mensaje,
                                                             'usuario' => "WEBBOT"
                                                         ]);
            
                            $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                            ->update(['estado' => $estado[0]->id ]);
            
                            $output = $estado[0]->mensaje;
                            
                        }
                        break;
                    case '0':
                        $estado = DB::table('estados')->where('id', '=', "1")->get();
                
                        DB::table('tickets_mensajes')->insert([
                                                         'ticket_id' => $request->ticket_id,
                                                         'mensaje' => $request->message,
                                                         'usuario' => $request->contact_name
                                                     ]);
                        
                        DB::table('tickets_mensajes')->insert([
                                                         'ticket_id' => $request->ticket_id,
                                                         'mensaje' => $estado[0]->mensaje,
                                                         'usuario' => "WEBBOT"
                                                     ]);
        
                        $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                        ->update(['estado' => $estado[0]->id ]);
        
                        $output = $estado[0]->mensaje;
                        break;
                    default:
                        $output = 'Su solicitud finalizó. presione 0 para volver a empezar!';
                        $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                            ->update(['estado' => "0" ]);
                    break;
                }

            }else{

                $estado = DB::table('estados')->where('id', '=', "1")->get();
                
                DB::table('tickets')->insert([
                                                 'ticket' => $request->ticket_id,
                                                 'fecha_creacion' => date("Y-m-d H:i:s"),
                                                 'estado' => "0",
                                                 'contact_name' => $request->contact_name
                                             ]);


                DB::table('tickets_mensajes')->insert([
                                                 'ticket_id' => $request->ticket_id,
                                                 'mensaje' => $request->message,
                                                 'usuario' => $request->contact_name
                                             ]);
                
                DB::table('tickets_mensajes')->insert([
                                                 'ticket_id' => $request->ticket_id,
                                                 'mensaje' => $estado[0]->mensaje,
                                                 'usuario' => "WEBBOT"
                                             ]);

                $affected = DB::table('tickets')->where('ticket', $request->ticket_id)
                                                ->update(['estado' => $estado[0]->id ]);

                $output = $estado[0]->mensaje;
            }


            $json = response()->json([  'Contact' => $request->contact_name, 
                                         'message' => $request->message, 
                                         'Session' => $request->ticket_id, 
                                         'Output'  => $output]);

            if(is_array($output)){
                    for($i = 0; $i < count($output); $i++){
                        $client = new \GuzzleHttp\Client();
    
                        $response = $client->request('POST', 'https://app.trengo.com/api/v2/tickets/'.$currentticket_id.'/messages', [
                        'body' => '{"message":"'.$output[$i].'"}',
                        'headers' => [
                            'Accept' => 'application/json',
                            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZjQ2Zjg4OTc1M2JiYjY4MmU4ZTU3Y2Q0Yjk0OGRiYjc5YWZlYzU4ZmQ1YTYyN2UzZDA0MDFhOGRiZGIyMDEwYmFmZWI3NDgxMTYyZmQ3NWQiLCJpYXQiOjE2NDY2NzIwNzUuNjMyMDAyLCJuYmYiOjE2NDY2NzIwNzUuNjMyMDA1LCJleHAiOjQ3NzA4MDk2NzUuNjIxOTQ4LCJzdWIiOiIzOTM1MTkiLCJzY29wZXMiOltdfQ.fsKCythFUfhSX4aJ9W-huzmfJWQMrSku-RyINLc86v_pc0D4bL9PKTP86TrR4Pa8Y4QE60ehtDj-b74keGvtLA',
                            'Content-Type' => 'application/json',
                        ],
                        ]);
                                                 
                    }
            }else{

                $client = new \GuzzleHttp\Client();
    
                $response = $client->request('POST', 'https://app.trengo.com/api/v2/tickets/'.$currentticket_id.'/messages', [
                'body' => '{"message":"'.$output.'"}',
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZjQ2Zjg4OTc1M2JiYjY4MmU4ZTU3Y2Q0Yjk0OGRiYjc5YWZlYzU4ZmQ1YTYyN2UzZDA0MDFhOGRiZGIyMDEwYmFmZWI3NDgxMTYyZmQ3NWQiLCJpYXQiOjE2NDY2NzIwNzUuNjMyMDAyLCJuYmYiOjE2NDY2NzIwNzUuNjMyMDA1LCJleHAiOjQ3NzA4MDk2NzUuNjIxOTQ4LCJzdWIiOiIzOTM1MTkiLCJzY29wZXMiOltdfQ.fsKCythFUfhSX4aJ9W-huzmfJWQMrSku-RyINLc86v_pc0D4bL9PKTP86TrR4Pa8Y4QE60ehtDj-b74keGvtLA',
                    'Content-Type' => 'application/json',
                ],
                ]);
                                             
            }
/*
            */


        }else{
        
            $json = response()->json([  'error' => "No hay Sesión Activa" ]);
        
        }
        
        return $json;
    }

    public function refreshToken(){

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        // CURLOPT_URL => 'https://accounts.zoho.com/oauth/v2/token?refresh_token=1000.db0e1aed8339fb924e2bdb70de6bf72d.cbf6c203a587fa14b840afe0c3e5e96c&grant_type=refresh_token&client_id=1000.L1L2BWR572R8BFUIIRSSH76GQ24UZV&client_secret=b72f9b95a051c80e77867b649126cb24546622de62&redirect_uri=https://sdpondemand.manageengine.com&%20scope=SDPOnDemand.requests.ALL',
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_ENCODING => '',
        // CURLOPT_MAXREDIRS => 10,
        // CURLOPT_TIMEOUT => 0,
        // CURLOPT_FOLLOWLOCATION => true,
        // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        // CURLOPT_CUSTOMREQUEST => 'POST',
        // CURLOPT_HTTPHEADER => array(
        //     'Cookie: _zcsr_tmp=747294b1-89fb-44fe-b28f-d807f479ae8d; b266a5bf57=dcb92d0f99dd7421201f8dc746d54606; iamcsr=747294b1-89fb-44fe-b28f-d807f479ae8d'
        // ),
        // ));


        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://accounts.zoho.com/oauth/v2/token',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => 'refresh_token=1000.57afdaf01f77b5eb1925bc76761937a6.70be1d934683ad09029b024852da998e&grant_type=refresh_token&client_id=1000.L1L2BWR572R8BFUIIRSSH76GQ24UZV&client_secret=b72f9b95a051c80e77867b649126cb24546622de62&redirect_uri=https%3A%2F%2Fsdpondemand.manageengine.com&scope=SDPOnDemand.requests.ALL',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Cookie: _zcsr_tmp=64b29ab1-8371-41ab-a156-0f5bd4667f28; b266a5bf57=dcb92d0f99dd7421201f8dc746d54606; iamcsr=64b29ab1-8371-41ab-a156-0f5bd4667f28'
          ),
        ));

        $response = curl_exec($curl);
        $json = json_decode($response);

        #echo $json;

        $affected = DB::table('configurations')->where('id', '1')->update(['token' => $json->access_token, 'updated_at' => date('Y-m-d H:i:s') ]);
        curl_close($curl);
        echo $response;

    }
}
