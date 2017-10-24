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
        $enviarSMS = new App\Models\Permission();
        $enviarSMS->name = 'enviar-sms';
        $enviarSMS->display_name = 'Enviar SMSs para os clientes';
        $enviarSMS->description = 'Operadores'; // Usando como grupo de permissões
        $enviarSMS->save();

        $fazerLigacao = new App\Models\Permission();
        $fazerLigacao->name = 'fazer-ligacao';
        $fazerLigacao->display_name = 'Gravar tempo realizado de ligações telefônicas';
        $fazerLigacao->description = 'Operadores'; // Usando como grupo de permissões
        $fazerLigacao->save();

        $criarAcordo = new App\Models\Permission();
        $criarAcordo->name = 'criar-acordo';
        $criarAcordo->display_name = 'Criar novo acordo';
        $criarAcordo->description = 'Operadores'; // Usando como grupo de permissões
        $criarAcordo->save();

        $visualizarContatos = new App\Models\Permission();
        $visualizarContatos->name = 'visualizar-contatos';
        $visualizarContatos->display_name = 'Visualizar os contatos feitos pelo formulário do site';
        $visualizarContatos->description = 'Outros'; // Usando como grupo de permissões
        $visualizarContatos->save();

        $visualizarModuloVerde = new App\Models\Permission();
        $visualizarModuloVerde->name = 'visualizar-modulo-verde';
        $visualizarModuloVerde->display_name = 'Visualizar títulos módulo verde';
        $visualizarModuloVerde->description = 'Outros'; // Usando como grupo de permissões
        $visualizarModuloVerde->save();

        $visualizarModuloAzul = new App\Models\Permission();
        $visualizarModuloAzul->name = 'visualizar-modulo-azul';
        $visualizarModuloAzul->display_name = 'Visualizar títulos módulo azul';
        $visualizarModuloAzul->description = 'Outros'; // Usando como grupo de permissões
        $visualizarModuloAzul->save();

        $visualizarModuloAmarelo = new App\Models\Permission();
        $visualizarModuloAmarelo->name = 'visualizar-modulo-amarelo';
        $visualizarModuloAmarelo->display_name = 'Visualizar títulos módulo amarelo';
        $visualizarModuloAmarelo->description = 'Outros'; // Usando como grupo de permissões
        $visualizarModuloAmarelo->save();

        $visualizarModuloVermelho = new App\Models\Permission();
        $visualizarModuloVermelho->name = 'visualizar-modulo-vermelho';
        $visualizarModuloVermelho->display_name = 'Visualizar títulos módulo vermelho';
        $visualizarModuloVermelho->description = 'Outros'; // Usando como grupo de permissões
        $visualizarModuloVermelho->save();

        $gerenciarEscolas = new App\Models\Permission();
        $gerenciarEscolas->name = 'gerenciar-escolas';
        $gerenciarEscolas->display_name = 'Gerenciar escolas';
        $gerenciarEscolas->description = 'Cadastros'; // Usando como grupo de permissões
        $gerenciarEscolas->save();

        $gerenciarAlunos = new App\Models\Permission();
        $gerenciarAlunos->name = 'gerenciar-alunos';
        $gerenciarAlunos->display_name = 'Gerenciar alunos';
        $gerenciarAlunos->description = 'Cadastros'; // Usando como grupo de permissões
        $gerenciarAlunos->save();

        $gerenciarUsuarios = new App\Models\Permission();
        $gerenciarUsuarios->name = 'gerenciar-usuarios';
        $gerenciarUsuarios->display_name = 'Gerenciar usuários';
        $gerenciarUsuarios->description = 'Cadastros'; // Usando como grupo de permissões
        $gerenciarUsuarios->save();

        $importarAzul = new App\Models\Permission();
        $importarAzul->name = 'importar-planilhas-azul';
        $importarAzul->display_name = 'Importar planilhas módulo azul';
        $importarAzul->description = 'Importação'; // Usando como grupo de permissões
        $importarAzul->save();

        $importarVerde = new App\Models\Permission();
        $importarVerde->name = 'importar-planilhas-verde';
        $importarVerde->display_name = 'Importar planilhas módulo verde';
        $importarVerde->description = 'Importação'; // Usando como grupo de permissões
        $importarVerde->save();

        $importarAmarelo = new App\Models\Permission();
        $importarAmarelo->name = 'importar-planilhas-amarelo';
        $importarAmarelo->display_name = 'Importar planilhas módulo amarelo';
        $importarAmarelo->description = 'Importação'; // Usando como grupo de permissões
        $importarAmarelo->save();

        $importarVermelho = new App\Models\Permission();
        $importarVermelho->name = 'importar-planilhas-vermelho';
        $importarVermelho->display_name = 'Importar planilhas módulo vermelho';
        $importarVermelho->description = 'Importação'; // Usando como grupo de permissões
        $importarVermelho->save();

        $admin = new App\Models\Role();
        $admin->name = 'admin';
        $admin->display_name = 'Administrador geral';
        $admin->save();

        $userAdmin = App\Models\User::where('email', 'edilson.bauru@gmail.com')->first();
        $userAdmin->attachRole($admin);
        $userAdmin->attachPermission($gerenciarUsuarios);
    }
}
