<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','title','mobile','gender','university','department','city','state','country','pincode','profile_image_path'];
    public function user(){ return $this->belongsTo(User::class); }
}
