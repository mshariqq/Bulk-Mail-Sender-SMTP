<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailList extends Model
{
    use HasFactory;

    protected $table = 'email_list'; // Ensure this matches the table name
    protected $fillable = ['email', 'company_name', 'person_name', 'country', 'city', 'list_name'];
}
