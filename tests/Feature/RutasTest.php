<?php   
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RutasTest extends TestCase
{
//     use RefreshDatabase;

//     /** @test */
//     public function la_pagina_de_inicio_carga_correctamente()
//     {
//         $response = $this->get(route('home'));
//         $response->assertStatus(200);
//     }

//     /** @test */
//     public function un_usuario_autenticado_puede_acceder_a_inicio()
//     {
//         $user = User::factory()->create();
//         $response = $this->actingAs($user)->get('/inicio');

//         $response->assertStatus(200);
//     }

//     /** @test */
//     public function un_usuario_no_autenticado_no_puede_acceder_a_inicio()
//     {
//         $response = $this->get('/inicio');
//         $response->assertRedirect(route('login'));
//     }

//     /** @test */
//     public function un_usuario_autenticado_puede_completar_una_tarea()
//     {
//         $user = User::factory()->create();
//         $response = $this->actingAs($user)->put('/tarea/1/completar');

//         $response->assertStatus(302); // Redirección tras completar
//     }

//     /** @test */
//     public function un_usuario_autenticado_puede_ver_su_cuenta()
//     {
//         $user = User::factory()->create();
//         $response = $this->actingAs($user)->get("/empleado/{$user->id}/cuenta");

//         $response->assertStatus(200);
//     }

//     /** @test */
//     public function un_usuario_no_autenticado_no_puede_acceder_a_su_cuenta()
//     {
//         $response = $this->get('/empleado/1/cuenta');
//         $response->assertRedirect(route('login'));
//     }

//     /** @test */
//     public function un_admin_puede_acceder_a_las_rutas_de_cliente()
//     {
//         $admin = User::factory()->create(['role' => 'admin']);
//         $response = $this->actingAs($admin)->get(route('cliente.index'));

//         $response->assertStatus(200);
//     }

//     /** @test */
//     public function un_usuario_no_admin_no_puede_acceder_a_las_rutas_de_cliente()
//     {
//         $user = User::factory()->create(['role' => 'user']);
//         $response = $this->actingAs($user)->get(route('cliente.index'));

//         $response->assertStatus(403); // Forbidden
//     }

//     /** @test */
//     public function un_admin_puede_generar_facturas_de_cuotas()
//     {
//         $admin = User::factory()->create(['role' => 'admin']);
//         $response = $this->actingAs($admin)->get('/cuota/1/factura');

//         $response->assertStatus(200);
//     }
}
