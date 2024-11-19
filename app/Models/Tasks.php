<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model for the Tasks table
class Tasks extends Model
{
    use HasFactory; // Enables the usage of Laravel's model factories for testing and seeding

    // Specify the attributes that can be mass-assigned
    protected $fillable = ['title', 'description']; 
    // Allows 'title' and 'description' fields to be updated or inserted in bulk operations
}