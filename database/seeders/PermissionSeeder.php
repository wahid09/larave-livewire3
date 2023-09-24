<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ModuleDevConsole = Module::updateOrCreate([
            'name' => 'Dev Console',
            'parent_id' => 0,
            'sort_order' => 1,
            'slug' => 'dev-console',
            'url' => 'dev-console',
            'icon' => 'fas fa-th'
        ]);

        Permission::updateOrCreate([
            'module_id' => $ModuleDevConsole->id,
            'name' => 'Dev Console Index',
            'slug' => 'dev-console-index'
        ]);

        $moduleRole = Module::updateOrCreate([
            'name' => 'Roles',
            'parent_id' => $ModuleDevConsole->id,
            'sort_order' => 2,
            'slug' => 'role',
            'url' => 'dev-console/roles',
            'icon' => 'fas fa-columns'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name' => 'Role Index',
            'slug' => 'role-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name' => 'Role Create',
            'slug' => 'role-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name' => 'Role Update',
            'slug' => 'role-update'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRole->id,
            'name' => 'Role Delete',
            'slug' => 'role-delete'
        ]);
        //User information
        $moduleUserInfo = Module::updateOrCreate([
            'name' => 'User Management',
            'parent_id' => 0,
            'sort_order' => 3,
            'slug' => 'user-management',
            'url' => 'user-management',
            'icon' => 'fas fa-users'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleUserInfo->id,
            'name' => 'User Management Index',
            'slug' => 'user-management-index'
        ]);

        $moduleuser = Module::updateOrCreate([
            'name' => 'User Mgt',
            'parent_id' => $moduleUserInfo->id,
            'sort_order' => 4,
            'slug' => 'user-mgt',
            'url' => 'user-management/user-mgts',
            'icon' => 'fas fa-user'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleuser->id,
            'name' => 'User Index',
            'slug' => 'user-mgt-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleuser->id,
            'name' => 'User Create',
            'slug' => 'user-mgt-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleuser->id,
            'name' => 'User Update',
            'slug' => 'user-mgt-update'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleuser->id,
            'name' => 'User Delete',
            'slug' => 'user-mgt-delete'
        ]);
        //Data Import
        $moduleDataImport = Module::updateOrCreate([
            'name' => 'Data Import',
            'parent_id' => $ModuleDevConsole->id,
            'sort_order' => 5,
            'slug' => 'data-import',
            'url' => 'dev-console/data-imports',
            'icon' => 'fas fa-csv'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleDataImport->id,
            'name' => 'Data Import index',
            'slug' => 'data-import-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleDataImport->id,
            'name' => 'Data Import create',
            'slug' => 'data-import-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleDataImport->id,
            'name' => 'Data Import update',
            'slug' => 'data-import-update'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleDataImport->id,
            'name' => 'Data Import delete',
            'slug' => 'data-import-delete'
        ]);
        // Access Control
        $ModuleAccessControl = Module::updateOrCreate([
            'name' => 'Access Control',
            'parent_id' => 0,
            'sort_order' => 6,
            'slug' => 'access-control',
            'url' => 'access-control',
            'icon' => 'fas fa-copy'
        ]);

        Permission::updateOrCreate([
            'module_id' => $ModuleAccessControl->id,
            'name' => 'Access Control Index',
            'slug' => 'access-control-index'
        ]);
        //Configuration
        $ModuleConfiguration = Module::updateOrCreate([
            'name' => 'Configuration',
            'parent_id' => 0,
            'sort_order' => 7,
            'slug' => 'configuration',
            'url' => 'configuration',
            'icon' => 'fas fa-cogs'
        ]);

        Permission::updateOrCreate([
            'module_id' => $ModuleConfiguration->id,
            'name' => 'Configuration',
            'slug' => 'configuration-index'
        ]);
        $moduleDivision = Module::updateOrCreate([
            'name' => 'Division',
            'parent_id' => $ModuleConfiguration->id,
            'sort_order' => 8,
            'slug' => 'division',
            'url' => 'configuration/divisions',
            'icon' => 'fa fa-copy'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleDivision->id,
            'name' => 'Division Index',
            'slug' => 'division-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleDivision->id,
            'name' => 'Division Create',
            'slug' => 'division-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleDivision->id,
            'name' => 'Division Update',
            'slug' => 'division-update'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleDivision->id,
            'name' => 'Division Delete',
            'slug' => 'division-delete'
        ]);

        //Access Log
        $moduleAccessLog = Module::updateOrCreate([
            'name' => 'Access Logs',
            'parent_id' => $ModuleAccessControl->id,
            'sort_order' => 9,
            'slug' => 'access-log',
            'url' => 'access-control/access-logs',
            'icon' => 'fa fa-book'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAccessLog->id,
            'name' => 'Access Log index',
            'slug' => 'access-log-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAccessLog->id,
            'name' => 'Access Log create',
            'slug' => 'access-log-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAccessLog->id,
            'name' => 'Access Log update',
            'slug' => 'access-log-update'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAccessLog->id,
            'name' => 'Access Log delete',
            'slug' => 'access-log-delete'
        ]);

        //Login Records
        $moduleLoginRecords = Module::updateOrCreate([
            'name' => 'Login Records',
            'parent_id' => $ModuleAccessControl->id,
            'sort_order' => 10,
            'slug' => 'login-record',
            'url' => 'access-control/login-records',
            'icon' => 'fa fa-clone'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleLoginRecords->id,
            'name' => 'Login Record index',
            'slug' => 'login-record-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleLoginRecords->id,
            'name' => 'Login Record create',
            'slug' => 'login-record-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleLoginRecords->id,
            'name' => 'Login Record update',
            'slug' => 'login-record-update'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleLoginRecords->id,
            'name' => 'Login Record delete',
            'slug' => 'login-record-delete'
        ]);
        //Backup
        // $moduleBackup = Module::updateOrCreate([
        //     'name' => 'Backups',
        //     'name_bn' => 'ব্যাকআপ'
        // ]);
        // Permission::updateOrCreate([
        //     'module_id' => $moduleBackup->id,
        //     'name' => 'Backup Index',
        //     'slug' => 'backup-index'
        // ]);
        // Permission::updateOrCreate([
        //     'module_id' => $moduleBackup->id,
        //     'name' => 'Backup Create',
        //     'slug' => 'backup-create'
        // ]);
        // Permission::updateOrCreate([
        //     'module_id' => $moduleBackup->id,
        //     'name' => 'Backup Update',
        //     'slug' => 'backup-download'
        // ]);
        // Permission::updateOrCreate([
        //     'module_id' => $moduleBackup->id,
        //     'name' => 'Backup Delete',
        //     'slug' => 'backup-delete'
        // ]);

        //Module
        $moduleBackup = Module::updateOrCreate([
            'name' => 'Modules',
            'parent_id' => $ModuleDevConsole->id,
            'sort_order' => 11,
            'slug' => 'module',
            'url' => 'dev-console/modules',
            'icon' => 'fas fa-book'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Module Index',
            'slug' => 'module-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Module Create',
            'slug' => 'module-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Module Update',
            'slug' => 'module-update'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Module Delete',
            'slug' => 'module-delete'
        ]);

        //Permission
        $moduleBackup = Module::updateOrCreate([
            'name' => 'Permissions',
            'parent_id' => $ModuleDevConsole->id,
            'sort_order' => 12,
            'slug' => 'permission',
            'url' => 'dev-console/permissions',
            'icon' => 'fa fa-address-card'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Permission Index',
            'slug' => 'permission-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Permission Create',
            'slug' => 'permission-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Permission Update',
            'slug' => 'permission-update'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleBackup->id,
            'name' => 'Permission Delete',
            'slug' => 'permission-delete'
        ]);

        //Application setup

        $ModuleApplicationSetup = Module::updateOrCreate([
            'name' => 'Application Setup',
            'parent_id' => 0,
            'sort_order' => 13,
            'slug' => 'application-setup',
            'url' => 'application-setup',
            'icon' => 'fa fa-cog fa-fw'
        ]);

        Permission::updateOrCreate([
            'module_id' => $ModuleApplicationSetup->id,
            'name' => 'Application Setup Index',
            'slug' => 'application-setup-index'
        ]);

        $moduleRank = Module::updateOrCreate([
            'name' => 'Ranks',
            'parent_id' => $ModuleApplicationSetup->id,
            'sort_order' => 14,
            'slug' => 'rank',
            'url' => 'application-setup/ranks',
            'icon' => 'fa fa-bars'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRank->id,
            'name' => 'Rank Index',
            'slug' => 'rank-index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRank->id,
            'name' => 'Rank Create',
            'slug' => 'rank-create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRank->id,
            'name' => 'Rank Update',
            'slug' => 'rank-update'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleRank->id,
            'name' => 'Rank Delete',
            'slug' => 'rank-delete'
        ]);
    }
}