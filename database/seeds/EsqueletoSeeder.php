<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

use Illuminate\Database\Seeder;

/**
 * Class EsqueletoSeeder.
 */
class EsqueletoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            // Criando usuário para aluno, escola e admin
            $userAluno = factory(App\Models\User::class)->create([
                'name' => 'Evandro Carreira',
                'email' => 'evandro.carreira@gmail.com',
                'password' => bcrypt(env('ADMIN_PWD', '123321')),
            ]);

            $userEscola = factory(App\Models\User::class)->create([
                'name' => 'Escola Teste',
                'email' => 'toledo@ite.edu.br',
                'password' => bcrypt(env('ADMIN_PWD', '123321')),
            ]);

            $userAdmin = factory(App\Models\User::class)->create([
                'name' => 'Edilson Alexandre',
                'email' => 'edilson.bauru@gmail.com',
                'password' => bcrypt(env('ADMIN_PWD', '123321')),
            ]);

            // Criando entidades de aluno e escola e associando o user
            $Cliente = new App\Models\Cliente();
            $Cliente->nome = 'Evandro Barbosa Carreira';
            $Cliente->ra = '46.755.061-2';
            $Cliente->user()->associate($userAluno);
            $Cliente->save();

            $Empresa = new App\Models\Empresa();
            $Empresa->nome = 'EscolaTeste';
            $Empresa->cidade = 'Bauru';
            $Empresa->estado = 'SP';
            $Empresa->save();
            $Empresa->usuarios()->attach($userEscola);

            // Cria permissões de usuários
            $usuarioIncluir = new App\Models\Permission();
            $usuarioIncluir->name = 'usuarios-incluir';
            $usuarioIncluir->display_name = 'Incluir Usuários';
            $usuarioIncluir->description = 'Usuários'; // Usando como grupo de permissões
            $usuarioIncluir->save();

            $usuarioEditar = new App\Models\Permission();
            $usuarioEditar->name = 'usuarios-editar';
            $usuarioEditar->display_name = 'Editar Usuários';
            $usuarioEditar->description = 'Usuários'; // Usando como grupo de permissões
            $usuarioEditar->save();

            $usuarioVisualizar = new App\Models\Permission();
            $usuarioVisualizar->name = 'usuarios-visualizar';
            $usuarioVisualizar->display_name = 'Visualizar Usuários';
            $usuarioVisualizar->description = 'Usuários'; // Usando como grupo de permissões
            $usuarioVisualizar->save();

            $usuarioRemover = new App\Models\Permission();
            $usuarioRemover->name = 'usuarios-remover';
            $usuarioRemover->display_name = 'Remover Usuários';
            $usuarioRemover->description = 'Usuários'; // Usando como grupo de permissões
            $usuarioRemover->save();

            $usuarioPermissoes = new App\Models\Permission();
            $usuarioPermissoes->name = 'usuarios-permissoes';
            $usuarioPermissoes->display_name = 'Definir Permissões dos usuários';
            $usuarioPermissoes->description = 'Usuários'; // Usando como grupo de permissões
            $usuarioPermissoes->save();
        } catch (\Illuminate\Database\QueryException $exception) {
            dd($exception->getMessage());
            echo 'erro';
        }
    }

    private function seedUsers()
    {
    }
}
