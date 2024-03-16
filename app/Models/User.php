<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'jumlah_jiwa',
        'asal_tempat',
        'status',
        'telepon',
        'alamat',
    ];

    // ...berubahan login telepon
    public function attempt(array $credentials = [], $remember = false)
    {
        if (filter_var($credentials['email'], FILTER_VALIDATE_EMAIL)) {
            return $this->loginWithEmail($credentials, $remember);
        } else {
            return $this->loginWithTelepon($credentials, $remember);
        }
    }

    // Fungsi untuk mencocokkan login dengan email
    private function loginWithEmail(array $credentials = [], $remember = false)
    {
        return Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $remember);
    }

    // Fungsi untuk mencocokkan login dengan nomor telepon
    private function loginWithTelepon(array $credentials = [], $remember = false)
    {
        return Auth::attempt(['telepon' => $credentials['email'], 'password' => $credentials['password']], $remember);
    }

    // -)
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
}
