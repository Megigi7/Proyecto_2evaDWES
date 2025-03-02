<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Cliente;

class FormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_un_cliente()
    {
        $response = $this->post('/cliente', [
            'dni' => '12345678X',
            'nombre' => 'Juan Pérez',
            'correo' => 'juan@example.com',
            'telefono' => '123456789',
            'cuenta_corriente' => 'ES1234567890123456789012',
            'pais' => 'España',
            'moneda' => 'EUR',
            'importe' => '50.00',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('cliente', ['dni' => '12345678X']);
    }

    /** @test */
    public function puede_actualizar_un_cliente()
    {
        $cliente = new Cliente([
            'dni' => '87654321Y',
            'nombre' => 'María López',
            'correo' => 'maria@example.com',
            'telefono' => '987654321',
            'cuenta_corriente' => 'ES2109876543210987654321',
            'pais' => 'Argentina',
            'moneda' => 'ARS',
            'importe' => '75.00'
        ]);
        $cliente->save();

        $response = $this->put(route('cliente.update', $cliente->id), [
            'dni' => '87654321Y',
            'nombre' => 'María López',
            'correo' => 'maria@example.com',
            'telefono' => '987654321',
            'cuenta_corriente' => 'ES2109876543210987654321',
            'pais' => 'Argentina',
            'moneda' => 'ARS',
            'importe' => '75.00',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('cliente', ['dni' => '87654321Y']);
    }
}
