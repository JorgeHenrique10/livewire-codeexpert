<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'description', 'type', 'amount', 'photo', 'expense_date'];

    protected $dates = ['expense_date'];

    public function getAmountAttribute()
    {
        return $this->attributes['amount'] / 100;
    }
    public function setAmountAttribute($prop)
    {
        return $this->attributes['amount'] = $prop * 100;
    }

    public function setExpenseDateAttribute($prop)
    {
        return $this->attributes['expense_date'] = Carbon::parse($prop)->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
