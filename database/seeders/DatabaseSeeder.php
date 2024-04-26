<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//use Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->countriesSeeders();
        $this->holidaySeeders();
    }

    private function countriesSeeders()
    {
        $countries = $this->countries();
        $countryFactory = \App\Models\Country::factory();

        foreach($countries as $country)
        {
            $countryFactory->create($country);
        }
    }

    private function holidaySeeders()
    {
        $holidays = $this->holidays();
        $holidaysFactory = \App\Models\Holiday::factory();

        foreach($holidays as $holiday)
        {
            $holidaysFactory->create($holiday);
        }
    }

    private function holidays()
    {
        $holiday = [
        ["id" => "1", "idcountry" => "82", "name" => "Año nuevo", "date" => "2023/1/1", "fixed" => "true"],
        ["id" => "2", "idcountry" => "82", "name" => "Día del Trabajo", "date" => "2023/5/1", "fixed" => "true"],
        ["id" => "3", "idcountry" => "82", "name" => "Grito de la Independencia", "date" => "2023/07/20", "fixed" => "true"],
        ["id" => "4", "idcountry" => "82", "name" => "Batalla de Boyacá", "date" => "2023/8/7", "fixed" => "true"],
        ["id" => "5", "idcountry" => "82", "name" => "Inmaculada Concepción", "date" => "2023/8/12", "fixed" => "true"],
        ["id" => "6", "idcountry" => "82", "name" => "Navidad", "date" => "2023/12/25", "fixed" => "true"],
        ["id" => "7", "idcountry" => "82", "name" => "Reyes Magos", "date" => "2023/01/9", "fixed" => "false"],
        ["id" => "8", "idcountry" => "82", "name" => "San José", "date" => "2023/3/19", "fixed" => "false"],
        ["id" => "9", "idcountry" => "82", "name" => "Domingo de ramos", "date" => "2023/04/1", "fixed" => "false"],
        ["id" => "10", "idcountry" => "82", "name" => "Jueves Santo", "date" => "2023/04/5", "fixed" => "false"],
        ["id" => "11", "idcountry" => "82", "name" => "Viernes Santo", "date" => "2023/04/6", "fixed" => "false"],
        ["id" => "12", "idcountry" => "82", "name" => "Domingo de Pascua", "date" => "2023/04/8", "fixed" => "false"],
        ["id" => "13", "idcountry" => "82", "name" => "Ascensión de Jesús", "date" => "2023/05/21", "fixed" => "false"],
        ["id" => "14", "idcountry" => "82", "name" => "Corpus Christi", "date" => "2023/06/11", "fixed" => "false"],
        ["id" => "15", "idcountry" => "82", "name" => "Sagrado Corazón", "date" => "2023/06/18", "fixed" => "false"],
        ["id" => "16", "idcountry" => "82", "name" => "San Pedro y San Pablo", "date" => "2023/07/2", "fixed" => "false"],
        ["id" => "17", "idcountry" => "82", "name" => "Asunción de la Virgen", "date" => "2023/08/20", "fixed" => "false"],
        ["id" => "18", "idcountry" => "82", "name" => "Día de la Raza", "date" => "2023/10/15", "fixed" => "false"],
        ["id" => "19", "idcountry" => "82", "name" => "Todos los Santos", "date" => "2023/11/5", "fixed" => "false"],
        ["id" => "20", "idcountry" => "82", "name" => "Independencia de Cartagena", "date" => "2023/11/12", "fixed" => "false"]
        ];


        return  $holiday;
    }

    private function countries()
    {
        $countries = [
            ["id"=>"36",  "name" => "Costa Rica"],
            ["id"=>"82",  "name" => "Colombia"],
            ["id"=>"103",  "name" => "Ecuador"],
            ["id"=>"209",  "name" => "Nicaragua"]
        ];            

        return  $countries;
    }
}
