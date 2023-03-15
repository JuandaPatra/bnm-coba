<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Carbon;

use App\Exports\ContactExport;
use Alert;

class ContactController extends Controller
{
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
        return view('admin.contact.index');
    }
    
    

    public function export(Request $request) 
    {
        if(empty($request->from_date) && empty($request->to_date))
        {
            Alert::error('Error Download', 'Silahkan isi tanggal');
            return redirect()->route('contact.index');
        }
        elseif(empty($request->from_date) && !empty($request->to_date))
        {
            Alert::error('Error Download', 'Silahkan isi tanggal');
            return redirect()->route('contact.index');
        }
        elseif(!empty($request->from_date) && empty($request->to_date)){
            Alert::error('Error Download', 'Silahkan isi tanggal');
            return redirect()->route('contact.index');
        }
        else
        {
            $from_date=$request->from_date;
            $to_date = $request->to_date;
            
            // return $request->slug;
            $file_name = 'leads_'.date('Y_m_d_H_i_s').'.xlsx'; 
            return Excel::download(new ContactExport($from_date,$to_date), $file_name);
            
            // return Excel::download(new ContactExport($request->slug), 'leads.xlsx');
            //return Excel::download(new ContactExport($request->slug), $file_name);
        }
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
 
