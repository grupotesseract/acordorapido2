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
            $c = new App\Models\Cliente();
            $c->nome = 'Evandro Barbosa Carreira';
            $c->ra = '46.755.061-2';
            $c->user_id = $userAluno->id;
            $c->save();

            $e = new App\Models\Empresa();
            $e->nome = 'EscolaTeste';
            $e->cidade = 'Bauru';
            $e->estado = 'SP';
            $userEscola->empresas()->save($e);
        } catch (\Illuminate\Database\QueryException $exception) {
            dd($exception->getMessage());
            echo 'erro';
        }
    }

    private function seedUsers()
    {
    }
}
