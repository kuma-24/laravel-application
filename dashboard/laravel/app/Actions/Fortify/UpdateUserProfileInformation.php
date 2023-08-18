<?php

namespace App\Actions\Fortify;

use App\Models\Administrator;
use App\Models\AdministratorAccount;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(Administrator $administrator, array $input): void
    {
        $administratorInput['email'] = $input['email'];
        Validator::make($administratorInput, [
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('administrators')->ignore(Auth::user()->id),],
        ])->validateWithBag('updateProfileInformation');

        if ($administratorInput['email'] !== $administrator->email && $administrator instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($administrator, $administratorInput);

        } else {
            $this->administrator_account_update($input);
            $administrator->forceFill([
                'email' => $administratorInput['email'],
            ])->save();
        }
    }

    protected function administrator_account_update($input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'first_name_kana' => ['required', 'string', 'max:50'],
            'last_name_kana' => ['required', 'string', 'max:50'],
        ])->validate();

        $administrator_account = AdministratorAccount::with("administrator")->findOrFail(Auth::user()->id);
        $administrator_account->forceFill([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'first_name_kana' => $input['first_name_kana'],
            'last_name_kana' => $input['last_name_kana'],
        ])->save();
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(Administrator $administrator, array $input): void
    {
        $administrator->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $administrator->sendEmailVerificationNotification();
    }
}
