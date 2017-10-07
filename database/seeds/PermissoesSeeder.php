<?php

use Illuminate\Database\Seeder;

class PermissoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

        $importarPlanilhas = new App\Models\Permission();
        $importarPlanilhas->name = 'importar-planilhas';
        $importarPlanilhas->display_name = 'Importar planilhas para criar novos títulos e avisos';
        $importarPlanilhas->description = 'Importações'; // Usando como grupo de permissões
        $importarPlanilhas->save();

        $enviarSMS = new App\Models\Permission();
        $enviarSMS->name = 'enviar-sms';
        $enviarSMS->display_name = 'Enviar SMSs para os clientes';
        $enviarSMS->description = 'SMS'; // Usando como grupo de permissões
        $enviarSMS->save();

        $fazerLigacao = new App\Models\Permission();
        $fazerLigacao->name = 'fazer-ligacao';
        $fazerLigacao->display_name = 'Gravar tempo realizado de ligações telefônicas';
        $fazerLigacao->description = 'Ligações'; // Usando como grupo de permissões
        $fazerLigacao->save();

        $criarAcordo = new App\Models\Permission();
        $criarAcordo->name = 'criar-acordo';
        $criarAcordo->display_name = 'Criar novo acordo para transformar títulos antigos em novos';
        $criarAcordo->description = 'Ligações'; // Usando como grupo de permissões
        $criarAcordo->save();

        $admin = new App\Models\Role();
        $admin->name = 'admin';
        $admin->display_name = 'Administrador geral';
        $admin->save();

        $userAdmin = App\Models\User::where('email', 'edilson.bauru@gmail.com')->first();
        $userAdmin->attachRole($admin);
        $userAdmin->attachPermission($usuarioPermissoes);
    }
}
