<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AppTablesSeeder extends Seeder
{
    /**
     * Seed the application's database tables.
     */
    public function run(): void
    {
        $now = now();

        // Roles
        $superAdminRoleId = DB::table('roles')->insertGetId([
            'name' => 'Super Admin',
            'slug' => 'super-admin',
            'description' => 'Full system access',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $adminRoleId = DB::table('roles')->insertGetId([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Administrative access',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $driverRoleId = DB::table('roles')->insertGetId([
            'name' => 'Driver',
            'slug' => 'driver',
            'description' => 'Collection operations access',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $residentRoleId = DB::table('roles')->insertGetId([
            'name' => 'Resident',
            'slug' => 'resident',
            'description' => 'Resident account access',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Site Permissions
        $permSitesCreateId = DB::table('permissions')->insertGetId([
            'name' => 'Create Sites',
            'slug' => 'sites.create',
            'module' => 'sites',
            'description' => 'Create site records',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $permSitesViewId = DB::table('permissions')->insertGetId([
            'name' => 'View Sites',
            'slug' => 'sites.view',
            'module' => 'sites',
            'description' => 'View site records',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $SiteupdateID = DB::table('permissions')->insertGetId([
            'name' => 'Update Sites',
            'slug' => 'sites.update',
            'module' => 'sites',
            'description' => 'Update site records',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $deleteSiteID = DB::table('permissions')->insertGetId([
            'name' => 'Delete Sites',
            'slug' => 'sites.delete',
            'module' => 'sites',
            'description' => 'Delete site records',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        //Driver management permissions
        $permDriversCreateId = DB::table('permissions')->insertGetId([
            'name' => 'Create Drivers',
            'slug' => 'drivers.create',
            'module' => 'drivers',
            'description' => 'Create driver records',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $permDriversViewId = DB::table('permissions')->insertGetId([
            'name' => 'View Drivers',
            'slug' => 'drivers.view',
            'module' => 'drivers',
            'description' => 'View driver records',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    
        $permDriversUpdateId = DB::table('permissions')->insertGetId([
            'name' => 'Update Drivers',
            'slug' => 'drivers.update',
            'module' => 'drivers',
            'description' => 'Update driver records',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $permDriversDeleteId = DB::table('permissions')->insertGetId([
            'name' => 'Delete Drivers',
            'slug' => 'drivers.delete',
            'module' => 'drivers',
            'description' => 'Delete driver records',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        //Driver side permissions
        $taskViewId = DB::table('permissions')->insertGetId([
            'name' => 'View Assigned Tasks',
            'slug' => 'tasks.view',
            'module' => 'tasks',
            'description' => 'View assigned collection tasks',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $taskUpdateId = DB::table('permissions')->insertGetId([
            'name' => 'Update Task Status',
            'slug' => 'tasks.update',
            'module' => 'tasks',
            'description' => 'Update status of assigned tasks',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        //Schedule management permissions
        $permScheduleCreateId = DB::table('permissions')->insertGetId([
            'name' => 'Create Schedules',
            'slug' => 'schedules.create',
            'module' => 'schedules',
            'description' => 'Create collection schedules',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $permScheduleViewId = DB::table('permissions')->insertGetId([
            'name' => 'View Schedules',
            'slug' => 'schedules.view',
            'module' => 'schedules',
            'description' => 'View collection schedules',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $permScheduleUpdateId = DB::table('permissions')->insertGetId([
            'name' => 'Update Schedules',
            'slug' => 'schedules.update',
            'module' => 'schedules',
            'description' => 'Update collection schedules',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $permScheduleDeleteId = DB::table('permissions')->insertGetId([
            'name' => 'Delete Schedules',
            'slug' => 'schedules.delete',
            'module' => 'schedules',
            'description' => 'Delete collection schedules',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        //Queue Permission
        $permQueueShowId = DB::table('permissions')->insertGetId([
            'name' => 'View Collection Queue',
            'slug' => 'queue.view',
            'module' => 'queue',
            'description' => 'View collection queue items',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $permQueueUpdateId = DB::table('permissions')->insertGetId([
            'name' => 'Update Collection Queue Status',
            'slug' => 'queue.update',
            'module' => 'queue',
            'description' => 'Update status of collection queue items',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        //Post permissions
        $permPostsCreateId = DB::table('permissions')->insertGetId([
            'name' => 'Create Posts',
            'slug' => 'posts.create',
            'module' => 'posts',
            'description' => 'Create community posts',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $permPostsViewId = DB::table('permissions')->insertGetId([
            'name' => 'View Posts',
            'slug' => 'posts.view',
            'module' => 'posts',
            'description' => 'View community posts',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $permPostsUpdateId = DB::table('permissions')->insertGetId([
            'name' => 'Update Posts',
            'slug' => 'posts.update',
            'module' => 'posts',
            'description' => 'Update community posts',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $permPostsDeleteId = DB::table('permissions')->insertGetId([
            'name' => 'Delete Posts',
            'slug' => 'posts.delete',
            'module' => 'posts',
            'description' => 'Delete community posts',
            'created_at' => $now,
            'updated_at' => $now,
        ]);



        // Role permissions (pivot)
        DB::table('role_permissions')->insert([
            ['role_id' => $superAdminRoleId, 'permission_id' => $SiteupdateID],
            ['role_id' => $superAdminRoleId, 'permission_id' => $deleteSiteID],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permSitesCreateId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permSitesViewId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permDriversCreateId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permDriversViewId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permDriversUpdateId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permDriversDeleteId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permPostsCreateId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permPostsViewId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permPostsUpdateId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permPostsDeleteId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permScheduleCreateId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permScheduleViewId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permScheduleUpdateId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permScheduleDeleteId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permQueueUpdateId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permQueueShowId],

            //admin permissions
            ['role_id' => $adminRoleId, 'permission_id' => $SiteupdateID],
            ['role_id' => $adminRoleId, 'permission_id' => $deleteSiteID],
            ['role_id' => $adminRoleId, 'permission_id' => $permSitesCreateId],
            ['role_id' => $adminRoleId, 'permission_id' => $permSitesViewId],
            ['role_id' => $adminRoleId, 'permission_id' => $permDriversCreateId],
            ['role_id' => $adminRoleId, 'permission_id' => $permDriversViewId],
            ['role_id' => $adminRoleId, 'permission_id' => $permDriversUpdateId],
            ['role_id' => $adminRoleId, 'permission_id' => $permDriversDeleteId],
            ['role_id' => $adminRoleId, 'permission_id' => $permPostsCreateId],
            ['role_id' => $adminRoleId, 'permission_id' => $permPostsViewId],
            ['role_id' => $adminRoleId, 'permission_id' => $permPostsUpdateId],
            ['role_id' => $adminRoleId, 'permission_id' => $permPostsDeleteId],
            ['role_id' => $adminRoleId, 'permission_id' => $permScheduleCreateId],
            ['role_id' => $adminRoleId, 'permission_id' => $permScheduleViewId],
            ['role_id' => $adminRoleId, 'permission_id' => $permScheduleUpdateId],
            ['role_id' => $adminRoleId, 'permission_id' => $permScheduleDeleteId],
            ['role_id' => $adminRoleId, 'permission_id' => $permQueueShowId],
            //driver permissions
            ['role_id' => $driverRoleId, 'permission_id' => $permDriversViewId],
            ['role_id' => $driverRoleId, 'permission_id' => $permSitesViewId],
            ['role_id' => $driverRoleId, 'permission_id' => $taskViewId],
            ['role_id' => $driverRoleId, 'permission_id' => $taskUpdateId],
            ['role_id' => $driverRoleId, 'permission_id' => $permQueueUpdateId],
            ['role_id' => $driverRoleId, 'permission_id' => $permQueueShowId],

            //resident permissions
            ['role_id' => $residentRoleId, 'permission_id' => $permSitesViewId],
        ]);

        // Users
        $superAdminUserId = DB::table('users')->insertGetId([
            'firstname' => 'Super',
            'middlename' => null,
            'lastname' => 'Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@example.com',
            'email_verified_at' => $now,
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $adminUserId = DB::table('users')->insertGetId([
            'firstname' => 'Alice',
            'middlename' => 'M',
            'lastname' => 'Admin',
            'username' => 'aliceadmin',
            'email' => 'admin@example.com',
            'email_verified_at' => $now,
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $driverUserId = DB::table('users')->insertGetId([
            'firstname' => 'Dan',
            'middlename' => null,
            'lastname' => 'Driver',
            'username' => 'dandriver',
            'email' => 'driver@example.com',
            'email_verified_at' => $now,
            'password' => Hash::make('password123'),
            'remember_token' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $residentUserId = DB::table('users')->insertGetId([
            'firstname' => 'Denmark',
            'middlename' => 'B.',
            'lastname' => 'Rivera',
            'username' => 'makisenzu',
            'email' => 'den@gmail.com',
            'email_verified_at' => $now,
            'password' => Hash::make('denden123'),
            'remember_token' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // User roles (pivot)
        DB::table('user_roles')->insert([
            ['user_id' => $superAdminUserId, 'role_id' => $superAdminRoleId, 'assigned_at' => $now, 'assigned_by' => null],
            ['user_id' => $adminUserId, 'role_id' => $adminRoleId, 'assigned_at' => $now, 'assigned_by' => $superAdminUserId],
            ['user_id' => $driverUserId, 'role_id' => $driverRoleId, 'assigned_at' => $now, 'assigned_by' => $superAdminUserId],
            ['user_id' => $residentUserId, 'role_id' => $residentRoleId, 'assigned_at' => $now, 'assigned_by' => $superAdminUserId],
        ]);

        // Geography hierarchy
        $provinceId = DB::table('provinces')->insertGetId([
            'province_name' => 'Agusan',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $geographicId = DB::table('geographics')->insertGetId([
            'province_id' => $provinceId,
            'geographic_name' => 'San Francisco',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $barangayId = DB::table('barangays')->insertGetId([
            'geographic_id' => $geographicId,
            'barangay_name' => 'Barangay 1',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $purokId = DB::table('puroks')->insertGetId([
            'barangay_id' => $barangayId,
            'purok_name' => 'Purok 1',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Station and collection sites
        $stationId = DB::table('sites')->insertGetId([
            'purok_id' => $purokId,
            'site_name' => 'Barangay Station',
            'latitude' => 10.31569900,
            'longitude' => 23.88543700,
            'location_type' => 'station',
            'status' => 'active',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $site1Id = DB::table('sites')->insertGetId([
            'purok_id' => $purokId,
            'site_name' => 'Site 1',
            'latitude' => 10.31572900,
            'longitude' => 23.88543700,
            'location_type' => 'site',
            'status' => 'active',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $site2Id = DB::table('sites')->insertGetId([
            'purok_id' => $purokId,
            'site_name' => 'Site 2',
            'latitude' => 10.31574900,
            'longitude' => 23.88543700,
            'location_type' => 'site',
            'status' => 'active',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $site3Id = DB::table('sites')->insertGetId([
            'purok_id' => $purokId,
            'site_name' => 'Site 3',
            'latitude' => 10.31571900,
            'longitude' => 23.88543700,
            'location_type' => 'site',
            'status' => 'active',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $site4Id = DB::table('sites')->insertGetId([
            'purok_id' => $purokId,
            'site_name' => 'Site 4',
            'latitude' => 10.31570900,
            'longitude' => 23.88543700,
            'location_type' => 'site',
            'status' => 'active',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $site5Id = DB::table('sites')->insertGetId([
            'purok_id' => $purokId,
            'site_name' => 'Site 5',
            'latitude' => 10.31573900,
            'longitude' => 23.88543700,
            'location_type' => 'site',
            'status' => 'active',
            'created_at' => $now,
            'updated_at' => $now,
        ]);



        // Driver profile
        $driverId = DB::table('drivers')->insertGetId([
            'user_id' => $driverUserId,
            'licence_number' => 'LIC-2026-0001',
            'status' => 'active',
            'employment_date' => $now,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Schedule & queue
        $scheduleId = DB::table('schedules')->insertGetId([
            'barangay_id' => $barangayId,
            'driver_id' => $driverId,
            'collection_date' => $now,
            'status' => 'scheduled',
            'created_at' => $now,
            'updated_at' => $now,
        ]);


        // Waste setup
        $wasteCategoryId = DB::table('waste_categories')->insertGetId([
            'category_name' => 'Plastic',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $wasteItemId = DB::table('waste_items')->insertGetId([
            'waste_category_id' => $wasteCategoryId,
            'item_name' => 'PET Bottle',
            'points_per_unit' => 2.50,
            'status' => 'active',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Collection report + media
        $collectionReportId = DB::table('collection_reports')->insertGetId([
            'schedule_id' => $scheduleId,
            'waste_category_id' => $wasteCategoryId,
            'kilogram_collected' => 18.75,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('collection_report_media')->insert([
            'collection_report_id' => $collectionReportId,
            'filename' => 'collection-photo-1.jpg',
            'path' => 'collection_reports/collection-photo-1.jpg',
            'mime_type' => 'image/jpeg',
            'size' => 245760,
            'alt_text' => 'Collected waste photo',
            'description' => 'Initial collection report photo',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Review setup
        $reviewCategoryId = DB::table('review_categories')->insertGetId([
            'category_name' => 'Collection Service',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $residentId = DB::table('residents')->insertGetId([
            'user_id' => $residentUserId,
            'status' => 'active',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('reviews')->insert([
            'resident_id' => $residentId,
            'purok_id' => $purokId,
            'review_category_id' => $reviewCategoryId,
            'fullname' => 'Denmark Rivera',
            'content' => 'Great service and on-time collection.',
            'suggestion' => 'Add weekend schedule updates.',
            'rating' => 4.5,
            'status' => 'approved',
            'is_anonymous' => false,
            'moderation_flag' => 'none',
            'moderation_score' => 0.12,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Redeemables
        $redeemableCategoryId = DB::table('redeemable_categories')->insertGetId([
            'category_name' => 'Household Items',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $redeemableId = DB::table('redeemables')->insertGetId([
            'redeemable_category_id' => $redeemableCategoryId,
            'item_name' => 'Reusable Tote Bag',
            'description' => 'Eco-friendly tote bag',
            'points_required' => 50.00,
            'stock' => 100,
            'status' => 'active',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('redemption_histories')->insert([
            'resident_id' => $residentId,
            'redeemable_id' => $redeemableId,
            'redeemed_quantity' => 1,
            'points_spent' => 50.00,
            'status' => 'approved',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Admin profile
        $adminId = DB::table('admins')->insertGetId([
            'user_id' => $adminUserId,
            'access_level' => 'full',
            'status' => 'active',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Exchange log
        DB::table('exchange_logs')->insert([
            'resident_id' => $residentId,
            'waste_item_id' => $wasteItemId,
            'admin_id' => $adminId,
            'quantity' => 10.00,
            'points_earned' => 25.00,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
