<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class RepairBooking extends Model
{
    use HasFactory;

    // Określamy, które pola mogą być masowo przypisywane
    protected $fillable = [
        'user_id', 'name', 'email', 'repair_date', 'bike_type', 'repair_items', 'payment_method', 'message'
    ];

    public $timestamps = false; // Wyłączamy domyślny mechanizm zapisywania czasu

    protected $table = 'repair_bookings';

    // Relacja z modelem User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
