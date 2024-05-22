<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\RespondenModel;

class Responden extends BaseController
{
    function __construct()
    {
        $this->responden = new RespondenModel();
    }
    
    public function responden()
    {
        $data['responden'] = $this->responden->findAll();
        return view('responden', $data);
    }   
}
