<?php

class FrontRolesTableSeeder extends Seeder {

    public function run()
    {

        $admin = new FrontRole;
        $admin->name = '管理员';
        $admin->created_at = date('Y-m-d H:i:s');
        $admin->updated_at = date('Y-m-d H:i:s');
        $admin->save();
        if(! $admin->save()) {
            Log::error('不能创建角色'.$admin->name, (array)$admin->errors());
        }

        $owner = new FrontRole;
        $owner->name = '作者';
        $owner->created_at = date('Y-m-d H:i:s');
        $owner->updated_at = date('Y-m-d H:i:s');
        $owner->save();
        if(! $owner->save()) {
            Log::error('不能创建角色'.$owner->name, (array)$owner->errors());
        }

        $user = Member::where('id', '=', 1)->first();
        $user->attachRole($admin);

        /*$author = Member::where('id', '>', 1)->first();
        $author->attachRole($owner);*/

        $manageUsers = new FrontPermission;
        $manageUsers->name = 'manage_users';
        $manageUsers->display_name = '用户管理';
        $manageUsers->created_at = date('Y-m-d H:i:s');
        $manageUsers->updated_at = date('Y-m-d H:i:s');
        $manageUsers->save();

        $manageTopics = new FrontPermission;
        $manageTopics->name = 'manage_topics';
        $manageTopics->display_name = '话题管理';
        $manageTopics->created_at = date('Y-m-d H:i:s');
        $manageTopics->updated_at = date('Y-m-d H:i:s');
        $manageTopics->save();

        $admin->perms()->sync(array($manageTopics->id,$manageUsers->id));
        $owner->perms()->sync(array($manageTopics->id));
    }

}