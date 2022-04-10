<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Company;

class EmployeeController extends Controller
{
   public function index()
   {
	   	 $employee = Employe::paginate(3);
		 
		  $company = Company::get();
		  //dd($company);
		return view('employee')
        ->with(compact('employee'))->with(compact('company'));
	  
   }
   
   public function store(Request $request)
   {
	  $request->validate([
       'first_name' => 'required',           
       'last_name' => 'required',           
        ]);
	    $data = $request->all();
		//dd($data);
	  Employe::create($data);
	  return redirect()->route('employee')->with('message', 'Successfull!');	 
   }
   
   public function show()
   {
	   $employee = Employe::get();
	 
	  return view('employee')
        ->with(compact('employee'));
            
   }
   
     public function deleteEmploye(Request $request ,$id)
   {	   
		$id=$request->id;
		//dd($id);
        Employe::where('id',$id)->delete();
		 return redirect()->route('employee')->with('message', 'Successfull Delete!');       
   }
   public function editEmploye(Request $request ,$id)
   {
	    $company = Company::get();
	   $edit_data = Employe::find($id);
      
		 return view('employee_edit')
        ->with(compact('edit_data'))->with(compact('company'));
   }
   public function updateEmploye(Request $request)
   {
	    $id=$request->id;
		
		$data = $request->all('first_name','last_name','company','email','phone');
		
	  Employe::where('id' , $id)->update($data);
	   return redirect()->route('employee')->with('message', 'Successfull Update!'); 
   }
   
   
}
