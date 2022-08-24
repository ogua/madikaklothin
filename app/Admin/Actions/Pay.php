<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use Illuminate\Http\Request;

class Pay extends RowAction
{
    public $name = 'Record Payment';

    public function href()
    {
       return "/admin/make-payment/".$this->getkey();
    }
}