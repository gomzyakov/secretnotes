<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int         $id
 * @property string      $text
 * @property string      $slug
 * @property string|null $password
 * @property Carbon|null $expiration_date
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 */
class Note extends EloquentModel
{
    use HasFactory;

    protected $fillable = ['text', 'slug', 'expiration_date', 'password'];
}
