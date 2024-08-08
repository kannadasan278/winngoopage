<?php
namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class RolePermissionSeeder.
 *
 * @see https://spatie.be/docs/laravel-permission/v5/basic-usage/multiple-guards
 *
 * @package App\Database\Seeds
 */
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Enable these options if you need same role and other permission for User Model
         * Else, please follow the below steps for admin guard
         */

        // Create Roles and Permissions
        // $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        // $roleAdmin = Role::create(['name' => 'admin']);
        // $roleEditor = Role::create(['name' => 'editor']);
        // $roleUser = Role::create(['name' => 'user']);


        // Permission List as array
        $permissions = [

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],
            [
                'group_name' => 'categories',
                'permissions' => [
                    // categories Permissions
                    'categories.create',
                    'categories.view',
                    'categories.edit',
                    'categories.delete',
                    'categories.approve',
                ]
            ],
            [
             'group_name' => 'subcategories',
                'permissions' => [
                    // subcategories Permissions
                    'subcategories.create',
                    'subcategories.view',
                    'subcategories.edit',
                    'subcategories.delete',
                    'subcategories.approve',
                ]

                ],
                  [
             'group_name' => 'subsubcategories',
                'permissions' => [
                    // subcategories Permissions
                    'subsubcategories.create',
                    'subsubcategories.view',
                    'subsubcategories.edit',
                    'subsubcategories.delete',
                    'subsubcategories.approve',
                ]

                ],
            [
                'group_name' => 'staff',
                'permissions' => [
                    // admin Permissions
                    'staff.create',
                    'staff.view',
                    'staff.edit',
                    'staff.delete',
                    'staff.approve',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    // profile Permissions
                    'profile.view',
                    'profile.edit',
                    'profile.delete',
                    'profile.update',
                ]
            ],
            [
                'group_name' => 'members',
                'permissions' => [
                    // members Permissions
                    'members.create',
                    'members.view',
                    'members.edit',
                    'members.delete',
                    'members.update',

                ]
            ],
            [
                'group_name' => 'merchants',
                'permissions' => [
                    // merchants Permissions
                    'merchants.create',
                    'merchants.view',
                    'merchants.edit',
                    'merchants.delete',
                    'merchants.update',
                    'merchants.pending',
                    'merchants.rejected',
                    'merchants.approve',
                ]
            ],
            [
                'group_name' => 'francise',
                'permissions' => [
                    // francise Permissions
                    'francise.create',
                    'francise.view',
                    'francise.edit',
                    'francise.delete',
                    'francise.update',
                    'francise.pending',
                    'francise.rejected',
                    'francise.approve',
                ]
            ],
            [
                'group_name' => 'wholesaler',
                'permissions' => [
                    // wholesaler Permissions
                    'wholesaler.create',
                    'wholesaler.view',
                    'wholesaler.edit',
                    'wholesaler.delete',
                    'wholesaler.update',
                    'wholesaler.pending',
                    'wholesaler.rejected',
                    'wholesaler.approve',
                ]
            ],
            [
                'group_name' => 'charity',
                'permissions' => [
                    // charity Permissions
                    'charity.create',
                    'charity.view',
                    'charity.edit',
                    'charity.delete',
                    'charity.update',
                    'charity.pending',
                    'charity.rejected',
                    'charity.approve',
                ]
            ],
            [
                'group_name' => 'worship',
                'permissions' => [
                    // Placeofworship Permissions
                    'worship.create',
                    'worship.view',
                    'worship.edit',
                    'worship.delete',
                    'worship.update',
                     'worship.pending',
                    'worship.rejected',
                    'worship.approve',
                ]
            ],

              [
                'group_name' => 'merchantfees',
                'permissions' => [
                    // Merchant fees Permissions
                    'merchantfees.create',
                    'merchantfees.view',
                    'merchantfees.edit',
                    'merchantfees.delete',
                    'merchantfees.update',
                ]
            ],
             [
                'group_name' => 'country',
                'permissions' => [
                    // country Permissions
                    'country.create',
                    'country.view',
                    'country.view',
                    'country.edit',
                    'country.delete',
                    'country.update',
                ]
            ],
            [
                'group_name' => 'coupon',
                'permissions' => [
                    // coupon Permissions
                    'coupon.create',
                    'coupon.view',
                    'coupon.view',
                    'coupon.edit',
                    'coupon.delete',
                    'coupon.update',
                ]
            ],
              [
                'group_name' => 'dietary',
                'permissions' => [
                    //dietary Permissions
                    'dietary.create',
                    'dietary.view',
                    'dietary.edit',
                    'dietary.delete',
                    'dietary.update',
                ]
            ],
              [
                'group_name' => 'pointsystem',
                'permissions' => [
                    // pointsystem  Permissions
                    'pointsystem.create',
                    'pointsystem.view',
                    'pointsystem.edit',
                    'pointsystem.delete',
                    'pointsystem.update',
                ]
            ],
               [
                'group_name' => 'reports',
                'permissions' => [
                    // reports  Permissions
                    'reports.create',
                    'reports.view',
                    'reports.edit',
                    'reports.delete',
                    'reports.update',
                ]
            ],
               [
                'group_name' => 'enquiries',
                'permissions' => [
                    // enquiries  Permissions
                    'enquiries.create',
                    'enquiries.view',
                    'enquiries.edit',
                    'enquiries.delete',
                    'enquiries.update',
                ]
            ],
             [
                'group_name' => 'emails',
                'permissions' => [
                    // emails  Permissions
                    'emails.create',
                    'emails.view',
                    'emails.edit',
                    'emails.delete',
                    'emails.update',
                ]
            ],

             [
                'group_name' => 'newsletters',
                'permissions' => [
                    // newsletters  Permissions
                    'newsletters.create',
                    'newsletters.view',
                    'newsletters.edit',
                    'newsletters.delete',
                    'newsletters.update',
                ]
            ],

             [
                'group_name' => 'history',
                'permissions' => [
                    // history  Permissions
                    'history.create',
                    'history.view',
                    'history.edit',
                    'history.delete',
                    'history.update',
                ]
            ],
            [
                'group_name' => 'cms',
                'permissions' => [
                    // cms  Permissions
                    'cms.create',
                    'cms.view',
                    'cms.edit',
                    'cms.delete',
                    'cms.update',
                ]
            ],
        ];


        // Create and Assign Permissions
        // for ($i = 0; $i < count($permissions); $i++) {
        //     $permissionGroup = $permissions[$i]['group_name'];
        //     for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
        //         // Create Permission
        //         $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
        //         $roleSuperAdmin->givePermissionTo($permission);
        //         $permission->assignRole($roleSuperAdmin);
        //     }
        // }

        // Do same for the admin guard for tutorial purposes.
        $admin = Admin::where('username', 'superadmin')->first();
        $roleSuperAdmin = $this->maybeCreateSuperAdminRole($admin);

        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $permissionExist = Permission::where('name', $permissions[$i]['permissions'][$j])->first();
                if (is_null($permissionExist)) {
                    $permission = Permission::create(
                        [
                            'name' => $permissions[$i]['permissions'][$j],
                            'group_name' => $permissionGroup,
                            'guard_name' => 'admin'
                        ]
                    );
                    $roleSuperAdmin->givePermissionTo($permission);
                    $permission->assignRole($roleSuperAdmin);
                }
            }
        }

        // Assign super admin role permission to superadmin user
        if ($admin) {
            $admin->assignRole($roleSuperAdmin);
        }
    }

    private function maybeCreateSuperAdminRole($admin): Role
    {
        if (is_null($admin)) {
            $roleSuperAdmin = Role::create(['name' => 'superadmin', 'guard_name' => 'admin']);
        } else {
            $roleSuperAdmin = Role::where('name', 'superadmin')->where('guard_name', 'admin')->first();
        }

        if (is_null($roleSuperAdmin)) {
            $roleSuperAdmin = Role::create(['name' => 'superadmin', 'guard_name' => 'admin']);
        }

        return $roleSuperAdmin;
    }
}
