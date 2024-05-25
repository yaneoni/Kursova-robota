<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public const ADULT_TICKET_PRICE = 20;
    public const KIDS_TICKET_PRICE = 10;
    public const EDUCATORS_TICKET_PRICE = 15;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'price',
    ];
}
