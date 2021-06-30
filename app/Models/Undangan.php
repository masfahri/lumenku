<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'users';

    public function index()
    {
        return $this->all();
    }
}
