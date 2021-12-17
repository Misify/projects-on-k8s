<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 填充超级管理员
        DB::table('administrators')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        // 填充初始角色
        DB::table('roles')->insert([
            'name' => 'administrators',
            'guard_name' => 'administrator',
            'title' => '超级管理员',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        //关联初始角色
        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_id' => 1,
            'model_type' => 'App\Administrator',
        ]);
        $permission = [
            [
                'name' => 'auth_admin',
                'title' => '用户列表',
                'guard_name' => 'administrator',
                'hidden' => 0,
                'fname' => 'auth',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'user_edit',
                'guard_name' => 'administrator',
                'title' => '编辑用户',
                'hidden' => 1,
                'fname' => 'user',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'auth_role',
                'guard_name' => 'administrator',
                'title' => '角色列表',
                'hidden' => 0,
                'fname' => 'roles',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'roles_edit',
                'title' => '编辑角色',
                'guard_name' => 'administrator',
                'hidden' => 1,
                'fname' => 'roles',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'auth_permission',
                'title' => '权限列表',
                'guard_name' => 'administrator',
                'hidden' => 0,
                'fname' => 'permission',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'permission_edit',
                'title' => '编辑权限',
                'guard_name' => 'administrator',
                'hidden' => 1,
                'fname' => 'permission',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'games_list',
                'title' => '游戏列表',
                'guard_name' => 'administrator',
                'hidden' => 0,
                'fname' => 'games',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'developer_list',
                'title' => '开发者列表',
                'guard_name' => 'administrator',
                'hidden' => 0,
                'fname' => 'developer',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        //创建权限
        DB::table('permissions')->insert($permission);
    }
}
