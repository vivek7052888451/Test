<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\File;
class TaskController extends Controller
{
	public function home()
	{
		 $campanys = Company::paginate(3);
		return view('dashboard')
        ->with(compact('campanys'));
	}
    public function store(Request $request)
	{

     $request->validate([
            'name' => 'required|min:3|max:255',
            
        ]);
        $input = $request->all();
        if ($image = $request->file('logo')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['logo'] = "$postImage";
        }
		   Company::create($input);
        return redirect()->route('dashboard')->with('message', 'Successfull!');
		
     	  
	}
	
	  public function show()
   {
	   $campanys = Company::get();
	 
	  return view('dashboard')
        ->with(compact('campanys'));
            
   }
   public function delete(Request $request ,$id)
   {
	
        $news = Company::find($id);
        
      $location='uploads/'.$news->logo;
    
      if(File::exists($location))
      {
         // File::delete($location);
          unlink($location);
      }
        $news->delete();
        return redirect()->route('dashboard')->with('message', 'Successfull Delete!');
   }
     public function edit(Request $request ,$id)
   {
		$id=$request->id;
		$edit_data = Company::find($id);
      
		 return view('edit')
        ->with(compact('edit_data'));
		
       
   }
   public function update(Request $request,$id)
   {
    $data = Company::find($id);
    $data->name=$request->name;
    $data->email=$request->email;
     if($request->hasfile('logo'))
     {
         $des='uploads/'.$data->logo;
         if(File::exists($des))
         {
             File::delete($des);
         }
            $image = $request->file('logo');
               // $des='uploads/'.$news->logo;               
                 $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                 $image->move('uploads/', $postImage); 
                 $data->logo= $postImage;                
     }
     $data->save();
     return redirect()->route('dashboard')->with('message', 'Successfull Update!'); 
	 
   }
}
