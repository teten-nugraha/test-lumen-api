<?php
namespace App\Http\Controllers;

use App\Checklist;
use App\Item;
use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Validator;
use Auth;

class ChecklistController extends APIController
{
 
    public function store(Request $request) {

       $user = Auth::user();

       $data = $request->input('data');

       $checklist = new Checklist();
       $checklist->name         = $request->input('data')['attributes']['object_domain'];
       $checklist->created_by   =  $user->id;
       $checklist->urgency      = $request->input('data')['attributes']['urgency'];
       $checklist->description  = $data = $request->input('data')['attributes']['description'];
       $checklist->due          = $request->input('data')['attributes']['due'];
       $checklist->template_id  = $request->input('data')['attributes']['task_id'];
       
       $checklist->save();

       foreach($request->input('data')['attributes']['items'] as $val) {
        
        Item::create([
            'checklist_id' => $checklist->id,
            'name' => $val
        ]);

       }

        $books = Checklist::with('items')->where('id',8)->first();


        return $this->sendResponse($books, 'Checklist berhasil dsimpan');
    
    }
    
    public function show($id, Request $request) {
        $checklist = Checklist::find($id);

        if (is_null($checklist)) {
            return $this->sendError('checklist not found.');
        }
        return $this->sendResponse($checklist->toArray(), 'checklist retrieved successfully.');
    }

}
