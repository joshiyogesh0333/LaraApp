<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Helper;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'=> 01,
            'name' => 'yogesh',
            'userID'=> 'User1',
            'status' => 'Active',
            'approval' => 'true',
            'email' => 'joshiyogesh0333@gmail.com',
            'password' => Hash::make('joshiyogesh0333'),
        ]);

        Helper::assignPermission(1,'UserRead');
        Helper::assignPermission(1,'UserCreate');
        Helper::assignPermission(1,'UserUpdate');
        Helper::assignPermission(1,'UserDelete');

        Helper::assignPermission(1,'RoleRead');
        Helper::assignPermission(1,'RoleCreate');
        Helper::assignPermission(1,'RoleUpdate');
        Helper::assignPermission(1,'RoleDelete');

        Helper::assignPermission(1,'PermissionRead');
        Helper::assignPermission(1,'PermissionCreate');
        Helper::assignPermission(1,'PermissionUpdate');
        Helper::assignPermission(1,'PermissionDelete');
    }
}
