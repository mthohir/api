<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;

class CrudController extends Controller
{
    public function create()
	{
	   return view('user.create');
	}

	public function store(Request $request)
    {
        $crud = new Crud();
        $data = $this->validate($request, [
            'description'=>'required',
            'title'=> 'required'
        ]);
       
        $this->saveCrud($data);
        return redirect('/home')->with('success', 'New crud has been created! Wait sometime to get resolved');
    }

    

	public function index()
    {
        $crud = Crud::where('user_id', auth()->user()->id)->get();
        
        return view('index',compact('crud'));
    }

	   public function edit($id)
    {
        $crud = Crud::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();

        return view('user.edit', compact('crud', 'id'));
    }


    public function update(Request $request, $id)
    {
        $crud = new Crud();
        $data = $this->validate($request, [
            'description'=>'required',
            'title'=> 'required'
        ]);
        $data['id'] = $id;
        $crud->updateCrud($data);

        return redirect('/home')->with('success', 'New crud has been updated!!');
    }

    public function updateCrud($data)
	{
	        $crud = $this->find($data['id']);
	        $crud->user_id = auth()->user()->id;
	        $crud->title = $data['title'];
	        $crud->description = $data['description'];
	        $crud->save();
	        return 1;
	}

	public function destroy($id)
    {
        $crud = Crud::find($id);
        $crud->delete();

        return redirect('/home')->with('success', 'Crud has been deleted!!');
    }

}
