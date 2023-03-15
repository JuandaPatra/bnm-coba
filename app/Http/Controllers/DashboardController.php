<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Contact;
use Illuminate\Http\Request;
use Alert;

class DashboardController extends Controller
{
    //
    public function index(Request $request)
        {
            if ($request->ajax()) 
            {
            $data = Contact::select('*');
            return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('checkbox','<input type="checkbox" name="users_checkbox[]" class="users_checkbox" value="{{$id}}"/>')
                        ->rawColumns(['checkbox', 'action'])
                        ->make(true);
            }
            // return $data;
            return view('admin.dashboard.index');
        }
        
    public function removeAll(Request $request)
    {
        // return $request;
        $contact_id_array = $request->input('id');
        $contact = Contact::whereIn('id', $contact_id_array);
        if($contact->delete())
        {
            // Alert::success('Delete Messages', 'Berhasil');
            Alert::success('Tambah Kategori', 'Berhasil');
        }
    }
}
