<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\dto\HolidaysDTO;

class HolidayTest extends TestCase
{
    private int $id = 123536;
    private string $name = "dia de la madre";
    private int $idcountry = 85;
    private string $date = '21/07/2023';
    private bool $fixed = true; 

    /**
     * Guarda un día festivo
     * @author Luis Cordoba
     * @since 21-07-2023
     * @return void
     */
    public function test_created_holiday(): void
    {
        $data = [
            "id"=> $this->id,
            "name"=> $this->name,
            "idcountry"=> $this->idcountry,
            "date"=> $this->date,
            "fixed"=> $this->fixed
        ];

        $data = array($data);

        $this->post('/api/save', $data)
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Se ha guardado correctamente!'
        ]);
    }

    /**
     * Actualiza un día festivo
     * @author Luis Cordoba
     * @since 21-07-2023
     * @return void
     */
    public function test_update_holiday(): void
    {
        $data = [
            "id"=> $this->id,
            "name"=> "dia especial de las madre4",
            "idcountry"=> $this->idcountry,
            "date"=> $this->date,
            "fixed"=> $this->fixed
        ];

        $this->putJson('/api/update', $data)
        ->assertStatus(200)
        ->assertJson([
                'message' => 'Se ha actualizado correctamente!',
        ]);
    }

    /**
     * Permite obtener un día festivo
     * @author Luis Cordoba
     * @since 21-07-2023
     * @return void
     */
    public function test_show_holiday(): void
    {
        $data = [
            "idcountry"=> $this->idcountry
        ];

        $this->post('/api/search', $data)
            ->assertJson([
                'message' => 'Se ha generado correctamente!',
            ]);
    }

     /**
     * Permite obtener todos los días festivos
     * @author Luis Cordoba
     * @since 21-07-2023
     * @return void
     */
    public function test_index_holiday(): void
    {
        $this->getJson('/api/list')
            ->assertJson([
                'message' => 'Se ha obtenido los festivos correctamente!',
        ]);
    }

    /**
     * Permite eliminar un día festivos
     * @author Luis Cordoba
     * @since 21-07-2023
     * @return void
     */
    public function test_destroy_holiday(): void
    {
        $data = [
            "id"=> $this->id
        ];
        $this->deleteJson('/api/destroy', $data)
            ->assertJson([
                'message' => 'Se ha eliminado el festivos correctamente!',
        ]);
    }
}


?>