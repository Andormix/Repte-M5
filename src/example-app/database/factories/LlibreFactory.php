<?php

namespace Database\Factories;

use App\Models\Llibre;
use Illuminate\Database\Eloquent\Factories\Factory;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class LlibreFactory extends Factory
{

    protected $model = Llibre::class;

    public function definition(): array
    {
        
        $imagenId = $this->faker->numberBetween(1, 2000);

        $client = new Client();

        try 
        {
            // Intentem fer un get
            $response = $client->get("https://picsum.photos/id/{$imagenId}/300/400");
        
            // Si la resposta té un códi de estat 200, la imatge existeix
            if ($response->getStatusCode() == 200) 
            {
                $imagenUrl = "https://picsum.photos/id/{$imagenId}/300/400";
            } 
            else 
            {
                
                $imagenUrl = 'img/llibre0.png';
            }
        } 
        catch (RequestException $e) {
            // Al cas d'error utilitza una URL predeterminada
            $imagenUrl = 'img/llibre0.png';
        }
       
        return [
            
            'titol' => $this->faker->text(15),
            'descripcio'=> $this->faker->paragraph(), 
            'categoria'=> $this->faker->randomElement(['Juvenil','Còmics i manga','Infantil', 'Novel·la', 'Poesia', 'Teatre', 'Ciència-ficció', 'Història', 'Formació','Idiomes','Art', 'Biografia', 'Ciències','Cuina', 'Viatges']),
            'subcategoria'=> $this->faker->randomElement(['Novetats', 'Ofertes', 'Best Sellers']),
            'autor' => $this->faker->name,
            'preu' => $this->faker->randomFloat(2, 5, 30), 
            'isbn' => $this->faker->isbn13(), 
            'imatge' => $imagenUrl, 
            'stock' => $this->faker->numberBetween(1, 100),
            'tapa' => $this->faker->randomElement(['dura', 'blanda']),
            
            //'imatge' => 'https://picsum.photos/300/400?random=' . $this->faker->unique()->numberBetween(1, 1000),
        ];
    }
}
