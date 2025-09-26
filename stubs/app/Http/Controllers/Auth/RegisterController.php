<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = '/email/verify';
    public function __construct(){ $this->middleware('guest'); }
    protected function validator(array $data){
        return Validator::make($data, [
            'title' => ['nullable','string','max:10'],
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'mobile' => ['nullable','string','max:20'],
            'gender' => ['nullable','string','max:10'],
            'university' => ['nullable','string','max:255'],
            'department' => ['nullable','string','max:255'],
            'city' => ['nullable','string','max:255'],
            'state' => ['nullable','string','max:255'],
            'country' => ['nullable','string','max:255'],
            'pincode' => ['nullable','string','max:20'],
            'password' => ['required','string','min:8','confirmed'],
            'agree' => ['accepted'],
            'profile_image' => ['nullable','image','max:5120']
        ]);
    }
    protected function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    protected function registered(Request $request, $user){
        $profile = new UserProfile([
            'title' => $request->input('title'),
            'mobile' => $request->input('mobile'),
            'gender' => $request->input('gender'),
            'university' => $request->input('university'),
            'department' => $request->input('department'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'pincode' => $request->input('pincode'),
        ]);
        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('avatars','public');
            $profile->profile_image_path = $path;
        }
        $user->profile()->save($profile);
        event(new Registered($user));
        return redirect()->route('verification.notice')->with('status','Account created. Please verify your email address.');
    }
}
