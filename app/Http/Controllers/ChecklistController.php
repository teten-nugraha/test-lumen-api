<?php
namespace App\Http\Controllers;

use App\Checklist;
use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Validator;
use Auth;

class ChecklistController extends APIController
{
 
    public function store(Request $request) {

    //    $user = Auth::user();

       $data = $request->input('data')['attributes']['object_domain'];

       $checklist = new Checklist();
       $checklist->name = $data = $request->input('data')['attributes']['object_domain'];
       $checklist->urgency = $data = $request->input('data')['attributes']['urgency'];
       $checklist->description = $data = $request->input('data')['attributes']['description'];
       $checklist->due = $data = $request->input('data')['attributes']['due'];
       $checklist->template_id = $data = $request->input('data')['attributes']['task_id'];
       
       $checklist->save();

       return $this->sendResponse($checklist->toArray(), 'Checklist berhasil dsimpan');
    
    }
    
}
