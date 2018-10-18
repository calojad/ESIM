<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\User;
use Flash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = null;
        $a = 'C';
        return view('users.create',compact('user','a'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
             'email' => 'required|string|email|max:255|unique:users',
             'username' => 'required|string|max:60|unique:users',
             'password' => 'required|string|min:6|confirmed',
        ]);
        $pass = bcrypt(Input::get('password'));
        $input = $request->all();
        $input['password'] = $pass;
        $user = User::create($input);
        Flash::success('Usuario saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (empty($user)) {
            Flash::error('Usuario not found');

            return redirect(route('users.index'));
        }
        $a = 'E';
        return view('users.edit',compact('user','a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Input::all();
        $user = User::find($id);
        request()->validate([
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'username' => 'required|string|max:60|unique:users,username,'.$id,
        ]);
        if(Input::get('password') != null){
            request()->validate([
                'email' => 'required|string|email|max:255|unique:users,email,'.$id,
                'username' => 'required|string|max:60|unique:users,username,'.$id,
                'password' => 'required|string|min:6|confirmed',
            ]);
            $data['password'] = bcrypt(Input::get('password'));
        }else{
            $data['password'] = $user->password;
        }
        if (empty($user)) {
            Flash::error('Usuario not found');
            return redirect(route('users.index'));
        }
        $user->update($data);
        Flash::success('Usuario updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            Flash::error('Usuario not found');

            return redirect(route('users.index'));
        }
        $user->delete();
        Flash::success('Usuario deleted successfully.');

        return redirect(route('users.index'));
    }
}