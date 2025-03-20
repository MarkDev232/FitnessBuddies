<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_picture')->nullable()->after('email');
            $table->string('phone')->nullable()->after('profile_picture');
            $table->string('address')->nullable()->after('phone');
            $table->string('role')->default('customer')->after('address'); // Default role
        });
    }

    public function down() {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['profile_picture', 'phone', 'address', 'role']);
        });
    }
};

