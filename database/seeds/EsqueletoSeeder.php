<?php

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

            // Criando funções dentro do sistema
            $Escola = new App\Models\Role();
            $Escola->name = 'escola';
            $Escola->display_name = 'Instituição de ensino';
            $Escola->description = 'Usuário autorizado a visualizar os dados referentes à sua escola';
            $Escola->save();

            $Admin = new App\Models\Role();
            $Admin->name = 'admin';
            $Admin->display_name = 'Admin do sistema';
            $Admin->description = 'Usuário autorizado a excluir, editar e incluir alunos, escolas e novos usuários';
            $Admin->save();

            $Aluno = new App\Models\Role();
            $Aluno->name = 'aluno';
            $Aluno->display_name = 'Usuário Aluno';
            $Aluno->description = 'Usuário autorizado a visualizar somente seus títulos e infos pessoais';
            $Aluno->save();

            // associando as funções aos usuários
            $userAluno->attachRole($Aluno);
            $userEscola->attachRole($Escola);
            $userAdmin->attachRole($Admin);
        } catch (\Illuminate\Database\QueryException $exception) {
            dd($exception->getMessage());
            echo 'erro';
        }
    }

    private function seedUsers()
    {
    }
}
