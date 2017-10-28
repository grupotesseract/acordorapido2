<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\DataTables\UserDataTable;
use App\DataTables\PermUserEmpresaDataTable;
use App\DataTables\EmpresaCrudUsersDataTable;
use App\Repositories\UserRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends AppBaseController
{
    /** @var UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('users.index');
    }

    /**
     * Serve a view do Crud de usuarios com a Datatable embutida.
     *
     * @param UserDataTable $userDataTable
     */
    public function create(EmpresaCrudUsersDataTable $empresaDataTable)
    {
        return $empresaDataTable->render('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $password = bcrypt( $input['password'] );
        $input['password'] = $password;

        $user = $this->userRepository->create($input);

        if ( !$user ) {
            Flash::error('Ocorreu um erro a criacao do usuário, tente novamente');
            return redirect()->back();
        }

        //Se o user tiver sido criado com sucesso e existirem empresas a para serem associadas
        if ( $user && $request->id_empresas ) {
            $user->empresas()->sync( array_values($request->id_empresas) );
            return redirect("/users/".$user->id."/permissoes");
        }

    }


    /**
     * Rota para servir a view com o segundo passo da criacao de novos usuarios
     *
     * Se encontrar o user, serve a DataTable de PermUserEmpresa, 
     * aplicando a scope para filtrar apenas empresas que o usuário de $id tem acesso
     *
     * @param PermUserEmpresaDataTable $permUserDataTable
     * @param mixed $id - ID do User
     */
    public function getPermissoesUsuario(PermUserEmpresaDataTable $permUserDataTable, $id) 
    {

        $user = $this->userRepository->findWithoutFail($id);
        
        if (empty($user)) {
            Flash::error('Usuário não encontrado!');
            return redirect(route('users.index'));
        }

        return $permUserDataTable
            ->addScope(new \App\DataTables\Scopes\EmpresasPorUsuario($id))
            ->render('users.permissoes_escolas', compact('user'));
    }


    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Usuário não encontrado!');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param EmpresaCrudUsersDataTable $empresaDataTable
     * @param $id - ID do User
     *
     * @return Response
     */
    public function edit(EmpresaCrudUsersDataTable $empresaDataTable, $id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Usuário não encontrado!');

            return redirect(route('users.index'));
        }

        $perms = \App\Models\Permission::all();
        $gruposPermissoes = [];
        foreach ($perms as $perm) {
            $gruposPermissoes[$perm->description][] = $perm;
        }

        return $empresaDataTable
            ->render('users.edit', compact('user', 'gruposPermissoes'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Usuário não encontrado!');
            return redirect(route('users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);
        $user->syncPermissions($request->permissoes);

        //Atualizando empresas que tem acesso
        $empresas = $request->id_empresas ? array_values($request->id_empresas) : [];
        $user->empresas()->sync($empresas);
        $user->permissoesPorAno()->whereNotIn('empresa_id', $empresas)->delete();
            

        return redirect("/users/$id/permissoes");
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Usuário não encontrado!');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
}
