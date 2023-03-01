<?php
namespace App\Repositories;

use Illuminate\Http\Request;

class ValidationRepository
{

    public function isValidFile(Request $request, $fileName = null)
    {
        if(!empty($fileName))  {
            return $request->validate([
                $fileName   => 'required|image|max:2048|mimes:jpg,jpeg,png,pdf,docx,doc,xlsx,xlx,pptx,ppt'
            ]);
        }
        return $request->validate([
            'file'      => 'required|image|max:2048|mimes:jpg,jpeg,png,pdf,docx,doc,xlsx,xlx,pptx,ppt'
        ]);
    }

    public function isValidProduct(Request $request, $id)
    {
        return $request->validate([
            'name'              => 'required|max:190',
            'price'            => 'nullable|max:190',
        ]);
    }

}