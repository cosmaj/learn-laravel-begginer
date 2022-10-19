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
        'avatar',
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
    ];

    // Mutator OR Setter change the normal/default behaviour of the field specified in the function name
    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }

    //Accessor OR gettor
    public function getNameAttribute($name)
    {
        return ucwords($name) ;
    }

    private function deleteOldImage(){
        if (auth()->user()->avatar) {
            \Storage::delete('/public/profile_images/'.auth()->user()->avatar);
        } 
    }

    protected static function generateFileName($fileName){
        $username = auth()->user()->email;
        $time = time();
        $randomString = "${time} ${fileName} ${username}";
        return bcrypt($randomString);
    }
    public static function uploadAvatar($image){
        $fileName = $image->getClientOriginalName();
        $fileExtension = explode('.', $fileName);
        $extension = $fileExtension[count($fileExtension)-1];
        (new self)->deleteOldImage();
        $newFileName = User::generateFileName($fileName);
        $newFileName = "${newFileName}.${extension}";
        $image->storeAs('profile_images', $newFileName, 'public');
        auth()->user()->update(['avatar' => $newFileName]);
    }
    
}
