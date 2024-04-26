<?php

namespace App\Repositories;

use App\Http\Controllers\Controller;
use App\DTO\HolidaysDTO;
use Illuminate\Support\Facades\DB;
/**
 * Manejo de los festivos
 *
 * @package App\Repositories
 * @author Luis Angel Cordoba <cordobaangel0250@gmail.com>
 * @version 1.0
 */
class HolidaysRepository extends Controller
{
     /**
     * Obtiene todos los festivos
     * @author luis.cordoba
     * @return array
     */
    public function list()
    {
        //Consulta
        $holidays = DB::table('holiday')
        ->select('id','idcountry','name','date','fixed')
        ->get();
        
        $holidaysArray = array();
        
        foreach ($holidays as $holiday) {
            $holidaysDTO = new HolidaysDTO();
            $holidaysDTO->id = $holiday->id;
            $holidaysDTO->idcountry = $holiday->idcountry;
            $holidaysDTO->name = $holiday->name;
            $holidaysDTO->date = $holiday->date;
            $holidaysDTO->fixed = $holiday->fixed;

            $holidaysArray[] = $holidaysDTO;
        }
        return $holidaysArray;
    }

     /**
     * Obtiene los festivos de acuerdo al id de un país
     * @author luis.cordoba
     * @return array
     */
    public function get(string $idCountry)
    {
        $holidays = DB::table('holiday')
        ->select('id','idcountry','name','date','fixed')
        ->where(['idcountry'=>$idCountry])
        ->orderBy('idcountry')
        ->get();

        $cantidad = count($holidays);
        if($cantidad == 0){
            return "No existen festivos registrados con el país número ".$idCountry;
        }
        $holidaysArray = array();
        foreach($holidays AS $holiday)
        {
            $holidaysDTO = new HolidaysDTO();
            $holidaysDTO->id = $holiday->id;
            $holidaysDTO->idcountry = $holiday->idcountry;
            $holidaysDTO->name = $holiday->name;
            $holidaysDTO->date = $holiday->date;
            $holidaysDTO->fixed = $holiday->fixed;

            $holidaysArray[] = $holidaysDTO;
        }        
        return $holidaysArray;
    }

    /**
     * Guarda los festivos contenidos en un array
     * @author luis.cordoba
     * @return array 
     */
    public function save(array $holidaysArray)
    {
        $holidayId = array();
        foreach ($holidaysArray as $holidayDTO) {
            $id = DB::table('holiday')->insertGetId([
                'id' => $holidayDTO->id,
                'name' => $holidayDTO->name,
                'idcountry' => $holidayDTO->idcountry,
                'date' =>  $holidayDTO->date,
                'fixed' =>  $holidayDTO->fixed
            ]);
            $holidayId[] = $id;
        }
        return $holidayId;
    }

     /**
     * Actualiza los festivos contenidos en un HolidaysDTO
     * @author luis.cordoba
     * @return HolidaysDTO
     */
    public function update(HolidaysDTO $holidayDTO)
    {     
        DB::table('holiday')
        ->where('id', $holidayDTO->id)
        ->update([
            'updated_at' => date("Y-m-d H:i:s"),
            'name' => $holidayDTO->name,
            'idcountry' => $holidayDTO->idcountry,
            'date' => $holidayDTO->date,
            'fixed' => $holidayDTO->fixed
            ]
        );
    }

    /**
     * Elmina un día festivo
     * @author luis.cordoba
     * @param  int  $id
     * @return int
     */
    public function destroy($id)
    {
        DB::table('holiday')
        ->where('id', $id)
        ->delete(
        );
    }

}