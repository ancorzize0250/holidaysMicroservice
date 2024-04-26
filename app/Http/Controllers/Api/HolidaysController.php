<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\HolidaysRepository;
use App\DTO\HolidaysDTO;
use Illuminate\Http\Response;


class HolidaysController extends Controller
{
    private HolidaysRepository $holidaysRepository;

    public function __construct(HolidaysRepository $holidaysRepository)
    {
        $this->holidaysRepository = $holidaysRepository;
    }
    /**
     * funcion para obtener los días festivos
     * @author luis.cordoba
     * @return array
     */
    public function index(): array
    {
        try{

            $holidaysArray = $this->holidaysRepository->list();
            $response = [
                "message"=> "Se ha obtenido los festivos correctamente!",
                "data" => $holidaysArray
            ];
            return $response;

        }catch(\Exception $e){
            return response()->json("statusCode: ".Response::HTTP_INTERNAL_SERVER_ERROR,$e->getMessage());
        }

    }

    /**
     * función para obtener los días festivos de un país específico
     * @author luis.cordoba
     * @param  Request  $request
     * @return array
     */
    public function show(Request $request)
    {
        try{
            if ($request->isJson()) {

                $this->validate($request, [
                    'idcountry' => 'required'
                ]);
            }
            $idCountry = $request->input('idcountry');

            $holidays = $this->holidaysRepository->get($idCountry);
            $response = [
                "message"=> "Se ha generado correctamente!",
                "data" => $holidays
            ];
            return $response;
        }catch(\Exception $e){
            return array($e->getMessage()); 
        }
    }

    /**
     * Función para guardar los días festivos de un array
     * @author luis.cordoba
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {
        try{
            $holiday_array = $request->all();

            $holidayArray = array();
            foreach ($holiday_array as $holiday) {
                $holidayDTO = new HolidaysDTO();
                $holidayDTO->id =   $holiday['id'];       
                $holidayDTO->name = $holiday['name'];
                $holidayDTO->idcountry = $holiday['idcountry'];
                $holidayDTO->date = $holiday['date'];
                $holidayDTO->fixed = $holiday['fixed'];
                
                $holidayArray[] = $holidayDTO;
            }
            $attachments = $this->holidaysRepository->save($holidayArray);
            if(count($attachments)>0){
                $response = [
                    "message"=> "Se ha guardado correctamente!"
                ];
                return $response;        
            }else{
                return ["message" => "No se pudo registrar el festivo"];
            }

        }catch(\Exception $e){
            $message = $e->getMessage();
            if($e->getCode() == "23505"){
                return "ya existe registros guardados con el mismo id";
            }
            return $message;
        }  
    }

    /**
     * Función para actualizar la información de un día festivo
     * @author luis.cordoba
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function update(Request $request)
    {
        try{
            $holiday = $request->all();
            
            $holidayDTO = new HolidaysDTO();
            $holidayDTO->id = $holiday['id'];         
            $holidayDTO->name = $holiday['name'];
            $holidayDTO->idcountry = $holiday['idcountry'];
            $holidayDTO->date = $holiday['date'];
            $holidayDTO->fixed = $holiday['fixed'];
                
            $this->holidaysRepository->update($holidayDTO);

            $response = [
                "message"=> "Se ha actualizado correctamente!"
            ];
            return $response;        

        }catch(\Exception $e){
            $message = $e->getMessage();
            return $message;
        }  
    }

     /**
     * Función para eliminar un día festivo
     * @author luis.cordoba
     * @param  Request  $request
     * @return int
     */
    public function delete(Request $request)
    {
        try{
            if ($request->isJson()) {

                $this->validate($request, [
                    'id' => 'required'
                ]);
            }
            $id = $request->input('id');

            $holiday = $this->holidaysRepository->destroy($id);
            $response = [
                "message"=> "Se ha eliminado el festivos correctamente!",
                "data" => $holiday
            ];
            return $response;
        }catch(\Exception $e){
            return array($e->getMessage()); 
        }
    }
}
