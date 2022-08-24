<?php

namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use Illuminate\Http\Request;

class Mytransaction extends RowAction
{
    public $name = 'Transaction';

    public function href()
    {
       return "/admin/transaction-info/".$this->getkey();
    }
}