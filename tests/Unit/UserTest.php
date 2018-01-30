<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp()
    {
        parent::setUp();
        factory(User::class)->create();
        $this->user = User::first();
    }

    /** @test
    * This test should check if: um usuario pode ser criado
    */
    public function um_usuario_pode_ser_criado(){
        $user = factory(User::class)->create();
        $this->assertDatabaseHas('users', ['cpf' => $user->cpf]);
    }

    /** @test
    * This test should check if: um novo usuario esta com validacao pendente
    */
    public function um_novo_usuario_esta_com_validacao_pendente(){
        $this->assertFalse($this->user->isAprovado());
    }

    /** @test
    * This test should check if: um usuario pendente pode ser aprovado
    */
    public function um_usuario_pendente_pode_ser_aprovado(){
        $this->user->aprovar();
        $this->assertTrue($this->user->isAprovado());
    }

    /** @test
    * This test should check if: um usuario aprovado pode ser inaprovado
    */
    public function um_usuario_aprovado_pode_ser_inaprovado(){
        $this->user->aprovar();
        $this->user->desaprovar();
        $this->assertFalse($this->user->isAprovado());
    }

    /** @test
    * This test should check if: um usuario pode ser suspenso
    */
    public function um_usuario_pode_ser_suspenso(){
        $this->user->suspender();
        $this->assertTrue($this->user->isSuspenso());
    }

    /** @test
    * This test should check if: um usuario pode ser reativado
    */
    public function um_usuario_pode_ser_reativado(){
        $this->user->suspender();
        $this->user->reativar();
        $this->assertFalse($this->user->isSuspenso());
    }
    
    /** @test 
    * This test should check if: uma lista de usuarios nao mostra usuarios pendentes
    */
    public function uma_lista_de_usuarios_nao_mostra_usuarios_pendentes(){
        factory(User::class, 3)->create();
        $this->user->aprovar();
        self::assertEquals(1, User::aprovado()->count());
    }
    
    /** @test 
    * This test should check if: uma lista de usuarios nao mostra usuarios suspensos
    */
    public function uma_lista_de_usuarios_nao_mostra_usuarios_suspensos(){
        factory(User::class, 3)->create();
        User::first()->suspender();
        self::assertEquals(3, User::ativo()->count());
    }

    /** @test
    * This test should check if: uma lista de usuarios validos ignora pendentes e suspensos
    */
    public function uma_lista_de_usuarios_validos_ignora_pendentes_e_suspensos(){
        factory(User::class, 3)->create();
        factory(User::class)->create()->aprovar();
        User::first()->suspender();
        self::assertEquals(1, User::valido()->count());
    }
    
    
}
