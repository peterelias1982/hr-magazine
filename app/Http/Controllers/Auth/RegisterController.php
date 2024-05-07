<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Gender;
use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Traits\Common;
use App\Traits\Files;
use Illuminate\Validation\Rules\Enum;

class RegisterController extends Controller
{

    use Common;
    use Files;
    use RegistersUsers;

    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:255'],
            'secondName' => ['required', 'string', 'max:255'],
            'mobile' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', new Enum(Gender::class)],
            'position' => ['required', 'string', 'max:255'],
            'image' => ['sometimes', 'mimes:png,jpg,jpeg', 'max:2048'],
            // data of employer
            'companyName' => ['required_if:user,employer', 'string', 'max:255'],
            'address' => ['required_if:user,employer', 'string', 'max:255'],
            'about_company' => ['required_if:user,employer', 'string'],
            'logo' => ['sometimes', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $dataPrepared = $this->prepareData($data);

        $user = User::create($dataPrepared['user']);

        if(isset($dataPrepared['employer'])) {
            Employer::create([
                ...$dataPrepared['employer'],
                'user_id' => $user->id
            ]);
        }

        return $user;
    }

    private function prepareData(array $data)
    {
        $preparedData = [];

        if(isset($data['user']) && $data['user'] === 'employer') {
            $employerData = [
                'companyName' => $data['companyName'],
                'address' => $data['address'],
                'about_company' => $data['about_company'],
                'phone' => $data['phone'],
            ];

            if($data['logo'] ?? false) {
                $logo = $this->uploadFile($data['image'], 'assets/images/employers');
                $employerData['logo'] = $logo;
            }

            $preparedData['employer'] = $employerData;
        }

        $userData = [
            'firstName' => $data['firstName'],
            'secondName' => $data['secondName'],
            'gender' => $data['gender'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'password' => $data['password'],
            'position' => $data['position'],
        ];

        if ($data['image'] ?? false) {
            $image = $this->uploadFile($data['image'], 'assets/images/users');

        } else {
            $allImages = RegisterController::getFilesFromDir(public_path('assets/images/users/default'));
            $image = fake()->randomElement($allImages);

            $imageArray = explode('-', $image);
            $imageArray[0] = $data['gender'];
            $image = implode('-', $imageArray);

            $image = 'default' . DIRECTORY_SEPARATOR . $image;
        }

        $userData['image'] = $image;

        $preparedData['user'] = $userData;

        return $preparedData;
    }
}
