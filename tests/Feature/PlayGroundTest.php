<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class PlayGroundTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_displays_new_category_on_home_page()
    {
        // Crear una categoría en la base de datos
        $category = Category::factory()->create([
            'name' => 'New Category',
            'slug' => 'new-category'
        ]);

        // Realizar una solicitud GET a la página de inicio
        $response = $this->get(route('home'));

        // Verificar que la nueva categoría esté en la respuesta
        $response->assertStatus(200);
        $response->assertSee('New Category');
    }

    #[Test]
    public function it_displays_products_in_category_page()
    {

        $faker = \Faker\Factory::create();


        // Crear una categoría
        $category = Category::factory()->create([
            'name' => 'Electronics',
            'slug' => 'electronics'
        ]);

        // Crear tres productos asociados a esta categoría en un bucle para asegurar la unicidad
        $products = [];
        for ($i = 0; $i < 3; $i++) {
            $products[] = Product::factory()->create([
                'category_id' => $category->id,
                'name' => $faker->unique()->word,
                'slug' => $faker->unique()->slug,
                'price' => 100,
            ]);
        }

        // Verificar que la categoría aparece en la página de inicio
        $this->get(route('home'))
            ->assertStatus(200)
            ->assertSee($category->name);

        // Hacer una solicitud GET a la ruta de la categoría
        $response = $this->get(route('categories', ['slug' => $category->slug]));

        // Verificar que estamos en la ruta correcta y que los tres productos están en la respuesta
        $response->assertStatus(200);

        foreach ($products as $product) {
            $response->assertSee($product->name);
        }
    }
}
