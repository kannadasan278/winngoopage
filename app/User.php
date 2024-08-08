<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\VerifyEmailCustom;

class User extends Authenticatable implements MustVerifyEmail

{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'member_id','name','lname', 'email','email_verification_code','email_verification_code_gen_date','email_verified_at','mobile_number', 'password','gender','birth_month','address_line_1',
        'address_line_2',
        'address_line_3',
        'city',
        'postcode',
        'country',
        'role','photo','status','provider','provider_id','expires_at',
    ];

      protected $dates = [
        'expires_at',  // Ensure expires_at is treated as a Carbon instance
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public static function getpermissionGroups()
    {
        $permission_groups = DB::table('permissions')
            ->select('group_name as name')
            ->groupBy('group_name')
            ->get();
        return $permission_groups;
    }

    public static function getpermissionsByGroupName($group_name)
    {
        $permissions = DB::table('permissions')
            ->select('name', 'id')
            ->where('group_name', $group_name)
            ->get();
        return $permissions;
    }

    public static function roleHasPermissions($role, $permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
        }
        return $hasPermission;
    }

    public static function generateMemberId()
    {
        // Get the latest user
        $latestUser = self::latest('created_at')->where('role','user')->first();

        if (!$latestUser) {
            // If there is no user yet, start with the first ID
            return 'Winngoo-100001';
        }

        // Extract the number from the latest member_id and increment it
        $latestIdNumber = intval(str_replace('Winngoo-', '', $latestUser->member_id));
        $newIdNumber = $latestIdNumber + 1;

        return 'Winngoo-' . str_pad($newIdNumber, 6, '0', STR_PAD_LEFT);
    }

    public function sendEmailVerificationNotification()
        {
            $this->notify(new VerifyEmailCustom);
        }
}

