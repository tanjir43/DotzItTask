<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->collation('utf16_general_ci');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->boolean('block')->default(false)->comment('0 (false) = active , 1(true) = blocked');
            $table->enum('user_type',['admin','seller','user'])->default('seller');
            $table->foreignId('role_id')->nullable()->constrained('roles');
            $table->string('phone');
           
            $table->string('default_lan')->default('en');

            //$table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();

            $table->integer('created_by')->references('id')->on('users');
            $table->integer('updated_by')->nullable()->references('id')->on('users');
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'name'              =>  'Developer',
                'email'             =>  'developer@rowshansoft.com',
                'email_verified_at' =>  now(),
                'password'          =>  '$2y$10$Ra1gm7.5KspMfuH6Ovc0nOToG1CKKCtnCBJXDwbYaX2MYY9tdyUJK',
                'block'             =>  false,
                'phone'             =>  01222222222,
                'default_lan'       =>  'en',
                'role_id'           =>  '1',
                'user_type'         =>  'admin',
                'created_at'        =>  now(),
                'updated_at'        =>  now(),
                'created_by'        =>  '0'
            ],
            [
                'name'              =>  'Admin',
                'email'             =>  'admin@admin.com',
                'email_verified_at' =>  now(),
                'password'          =>  '$2y$10$Ra1gm7.5KspMfuH6Ovc0nOToG1CKKCtnCBJXDwbYaX2MYY9tdyUJK', #admin@admin.com
                'block'             =>  false,
                'phone'             =>  013333333345,
                'user_type'         =>  'admin',

                'default_lan'       =>  'en',
                'role_id'           =>  '2',

                'created_at'        =>  now(),
                'updated_at'        =>  now(),
                'created_by'        =>  '0'
            ],
            [
                'name'              =>  'Seller1',
                'email'             =>  'seller1@seller1.com',
                'email_verified_at' =>  now(),
                'password'          =>  '$2y$10$Ra1gm7.5KspMfuH6Ovc0nOToG1CKKCtnCBJXDwbYaX2MYY9tdyUJK', #admin@admin.com
                'block'             =>  false,
                'user_type'         =>  'seller',
                'phone'             =>  1234567896,
                'default_lan'       =>  'en',
                'role_id'           =>  '3',

                'created_at'        =>  now(),
                'updated_at'        =>  now(),
                'created_by'        =>  '0'
            ],
            [
                'name'              =>  'Seller2',
                'email'             =>  'seller2@seller2.com',
                'email_verified_at' =>  now(),
                'password'          =>  '$2y$10$Ra1gm7.5KspMfuH6Ovc0nOToG1CKKCtnCBJXDwbYaX2MYY9tdyUJK', #admin@admin.com
                'block'             =>  false,
                'phone'             =>  01333333332,

                'default_lan'       =>  'en',
                'role_id'           =>  '3',
                'user_type'         =>  'seller',

                'created_at'        =>  now(),
                'updated_at'        =>  now(),
                'created_by'        =>  '0'
            ],
            [
                'name'              =>  'Seller3',
                'email'             =>  'Seller3@Seller3.com',
                'email_verified_at' =>  now(),
                'password'          =>  '$2y$10$Ra1gm7.5KspMfuH6Ovc0nOToG1CKKCtnCBJXDwbYaX2MYY9tdyUJK', #admin@admin.com
                'block'             =>  false,
                'phone'             =>  013333333456,
                'user_type'         =>  'seller',

                'default_lan'       =>  'en',
                'role_id'           =>  '3',

                'created_at'        =>  now(),
                'updated_at'        =>  now(),
                'created_by'        =>  '0'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
