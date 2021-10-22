<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
  public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
        ValidacionesController::soloADMIN();

        $model = User::orderby('id','DESC')->get();
        return view('cms.user.index',array('model'=>$model));
    }

    
    public function create()
    {
        ValidacionesController::soloADMIN();

        $user = new User();
        return view('cms.user.create',array('user'=>$user));
    }

    
    public function store(Request $request)
    {
        ValidacionesController::soloADMIN();

        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'rol' => ['required'],
            'estado' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $model = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'rol' => $request->get('rol'),
            'estado' => $request->get('estado'),
        ]);
        return redirect()->route('user.index')->with('status','Nuevo USUARIO registrado exitosamente.');

    }

   

    
    public function edit($user)
    {
        ValidacionesController::soloADMIN();

        $user = User::findOrFail($user);

        return view('cms.user.edit',array('user'=>$user));
    }

    
    public function update(Request $request,User $user)
    {
        ValidacionesController::soloADMIN();

       $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'rol' => ['required'],
            'estado' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255',],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

       
        $user->update(
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'rol' => $request->get('rol'),
                'estado' => $request->get('estado'),

            )
        );

        return redirect()->route('user.index')->with('status','Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
