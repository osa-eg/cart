<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UniqeInTranslations implements Rule
{
    private $table;
    private $column;
    private $id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table,$column,$id = null)
    {

        $this->table = $table;
        $this->column = $column;
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $key = substr($attribute,strpos($attribute,'.')+1);
        if ($this->id) {
            return (\DB::table($this->table)->where($this->column,'!=',$this->id)->where($key,trim($value))->count() > 1)?false:true;
        }else{
            return (!\DB::table($this->table)->where($key,$value)->count())?true:false;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('alerts.notUnique');
    }
}
