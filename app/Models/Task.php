<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'beschreibung', 'lang_beschreibung'];

    public function toggleComplete()
    {
        $this->abgeschlossen = !$this->abgeschlossen;
        $this->save();
    }
}
