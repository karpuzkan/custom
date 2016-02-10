<?php

// ROLE SEEDER
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

$role = Role::create(['name'=>'writer']);
$role->givePermissionTo('show galleries');
