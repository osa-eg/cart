<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public function getAllColumnsAttribute() : array
    {
        return array_values(\Schema::getColumnListing($this->tableName()));
    }
}
