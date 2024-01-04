<?php

namespace App\Models;
use Carbon\Carbon;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    // mutator para exiibir a data de validade da assinatura
    public function getAccessEndAttribute()
    {
        $accessEndAt = $this->subscription('default')->ends_at;

        return Carbon::make($accessEndAt)->format("d/m/Y à\s H:i:s");
    }

    //mutator para exibir o nome do plano
    public function plan()
    {
        $stripePlan = $this->subscription('default')->stripe_plan;

        return Plan::where('stripe_id', $stripePlan)->first();
    }

}
