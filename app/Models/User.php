<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use JeffGreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Sgcomptech\FilamentTicketing\Interfaces\HasTickets;
use Sgcomptech\FilamentTicketing\Traits\InteractsWithTickets;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Savannabits\SignaturePad\Forms\Concerns\HasSignaturePadAttributes;

class User extends Authenticatable implements FilamentUser, HasMedia, hasTickets {
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, TwoFactorAuthenticatable, InteractsWithMedia, InteractsWithTickets, HasSignaturePadAttributes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'user_type',
        'signature',
        'logo_url',
        'comp_id',
        'comp_name',
        'comp_email',
        'comp_phone',
        'comp_address',
        'active_until',
        'email_verified_at',
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

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active_until' >= Carbon::now());
    }

    public function customers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Customer::class, 'creator_id');
    }

    public function events(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(
            Events::class,
            Customer::class,
            'creator_id',
            'customer_id',
            'id',
            'id'
        );
    }

    /**
     * @return bool
     */
     public function canAccessFilament(): bool
    {
        // manager or admin
        if (auth()->user()->user_type === 0)
        {
            return true;
            // active user
        }elseif ( auth()->user()->user_type === 1 && auth()->user()->active_until >= Carbon::now())
        {
            return true;
        }else{
            return false;
        }

    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('preview')->fit(Manipulations::FIT_CROP, 300, 300)->nonQueued();
    }

}
