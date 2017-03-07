<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hashids;

class ProgramBudaya extends Model
{
    //
    protected $table = 'programbudaya';

    public function getHashidAttribute() {
        return Hashids::connection('programbudaya')->encode($this->attributes['id']);
    }
}
