<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; 

use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.users.create',[

        ]);

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:30',
                'role' => 'required',
                'email' => 'required|email|max:50|unique:users,email',
                'password' => 'required|min:6|confirmed', 
            ],[]
        );


        if ($validator->fails()){
            $request['role'] = Role::select('id','name')->find($request->role);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)    
            ]);
            $user->assignRole($request->role);
            Alert::success('Tambah Role', 'Berhasil');
            return redirect()->route('roles.index');
        } catch (\throwable $th){
            DB::rollBack(); 
            Alert::error('Tambah Role', 'error'.$th->getMessage());
            $request['role'] = Role::select('id','name')->find($request->role);
            return redirect()->back()->withInput($request->all());

        } finally{
            DB::commit();
        }
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
    public function edit(user $user)
    {
        return view('admin.users.edit',[
            'user' => $user,
        ]);


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
         $validator = Validator::make(
            $request->all(),
            [
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
 
            ],[]
        );
        
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        if ($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        
        //dd($request->all());
        DB::beginTransaction();
        try {
            
             User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            Alert::success('Update Password', 'Berhasil');
           return back();
        } catch (\throwable $th){
            DB::rollBack(); 
            Alert::error('Update Password', 'error'.$th->getMessage());
            return redirect()->back()->withInput($request->all());
        } finally{
            DB::commit();
        }
      
    }
  
}
