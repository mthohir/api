<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $fillable = ['user_id', 'title', 'description'];

    public function saveCrud($data)
    {
	        $this->user_id = auth()->user()->id;
	        $this->title = $data['title'];
	        $this->description = $data['description'];
	        $this->save();
	        return 1;
	}
}
