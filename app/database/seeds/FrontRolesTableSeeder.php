<?php

class FrontRolesTableSeeder extends Seeder {

    public function run()
    {

        $owner = new FrontRole;
        $owner->name = 'Author';
        $owner->save();

        $admin = new FrontRole;
        $admin->name = 'Admin';
        $admin->save();

        $user = Member::where('id', '=', 1)->first();
        $user->attachRole($admin);

        $author = Member::where('id', '>', 1)->first();
        $author->attachRole($owner);

        $manageTopics = new FrontPermission;
        $manageTopics->name = 'manage_topics';
        $manageTopics->display_name = 'Manage Topics';
        $manageTopics->save();

        $manageUsers = new FrontPermission;
        $manageUsers->name = 'manage_users';
        $manageUsers->display_name = 'Manage Users';
        $manageUsers->save();

        $admin->perms()->sync(array($manageTopics->id,$manageUsers->id));
        $owner->perms()->sync(array($manageTopics->id));
    }

}