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

        // Permissions
        $permPostsViewId = DB::table('permissions')->insertGetId([
            'name' => 'View Posts',
            'slug' => 'posts.view',
            'module' => 'posts',
            'description' => 'View posts',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $permPostsCreateId = DB::table('permissions')->insertGetId([
            'name' => 'Create Posts',
            'slug' => 'posts.create',
            'module' => 'posts',
            'description' => 'Create posts',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

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

        // Role permissions (pivot)
        DB::table('role_permissions')->insert([
            ['role_id' => $superAdminRoleId, 'permission_id' => $permPostsViewId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permPostsCreateId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permSitesCreateId],
            ['role_id' => $superAdminRoleId, 'permission_id' => $permSitesViewId],
            ['role_id' => $adminRoleId, 'permission_id' => $permPostsViewId],
            ['role_id' => $adminRoleId, 'permission_id' => $permPostsCreateId],
            ['role_id' => $adminRoleId, 'permission_id' => $permSitesCreateId],
            ['role_id' => $adminRoleId, 'permission_id' => $permSitesViewId],
            ['role_id' => $driverRoleId, 'permission_id' => $permSitesViewId],
            ['role_id' => $residentRoleId, 'permission_id' => $permPostsViewId],
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
            'firstname' => 'Rina',
            'middlename' => null,
            'lastname' => 'Resident',
            'username' => 'rinaresident',
            'email' => 'resident@example.com',
            'email_verified_at' => $now,
            'password' => Hash::make('password123'),
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
            'province_name' => 'Cebu',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $geographicId = DB::table('geographics')->insertGetId([
            'province_id' => $provinceId,
            'geographic_name' => 'Metro Zone',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $barangayId = DB::table('barangays')->insertGetId([
            'geographic_id' => $geographicId,
            'barangay_name' => 'Barangay Uno',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $purokId = DB::table('puroks')->insertGetId([
            'barangay_id' => $barangayId,
            'purok_name' => 'Purok 1',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Site
        $siteId = DB::table('sites')->insertGetId([
            'purok_id' => $purokId,
            'site_name' => 'Main Collection Point',
            'latitude' => 10.31569900,
            'longitude' => 123.88543700,
            'location_type' => 'drop-off',
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

        DB::table('collection_queues')->insert([
            'schedule_id' => $scheduleId,
            'site_id' => $siteId,
            'queue_order' => 1,
            'status' => 'pending',
            'collected_at' => null,
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
            'fullname' => 'Rina Resident',
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
