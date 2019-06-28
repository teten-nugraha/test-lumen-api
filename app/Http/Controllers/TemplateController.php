<?php

namespace App\Http\Controllers;

use App\Template;
use App\Http\Controllers\APIController;
use Illuminate\Http\Request;
use Validator;


class TemplateController extends APIController
{
    
    public function index() {
        $templates = Template::all();
        return $this->sendResponse($templates->toArray(), 'Templates Berhasil dikeluarkan');
    }

    public function store(Request $request) {

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $template = Template::create($input);
        return $this->sendResponse($template->toArray(), 'Product baru berhasil diinput.');

    }

    public function show($id, Request $request) {
        $template = Template::find($id);

        if (is_null($template)) {
            return $this->sendError('Template not found.');
        }
        return $this->sendResponse($template->toArray(), 'Template retrieved successfully.');
    }

    public function update(Request $request, $id) {
        $template = Template::find($id);

        if (is_null($template)) {
            return $this->sendError('Template not found.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $template->name = $request->input('name');
        $template->save();

        return $this->sendResponse($template->toArray(), 'Template berhasil diupdate');
    }

    public function destroy($id){
        $data = Template::where('id',$id)->first();
        if (is_null($data)) {
            return $this->sendError('Template not found.');
        }


        $data->delete();
    
        return $this->sendResponse(null,'Template berhasil dihapus');
    }

}
