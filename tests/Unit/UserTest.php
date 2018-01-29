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
        $this->assertFalse($this->user->isValidado());
    }

    /** @test
    * This test should check if: um usuario pendente pode ser validado
    */
    public function um_usuario_pendente_pode_ser_validado(){
        $this->user->validar();
        $this->assertTrue($this->user->isValidado());
    }

    /** @test
    * This test should check if: um usuario validado pode ser invalidado
    */
    public function um_usuario_validado_pode_ser_invalidado(){
        $this->user->validar();
        $this->user->invalidar();
        $this->assertFalse($this->user->isValidado());
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
}
