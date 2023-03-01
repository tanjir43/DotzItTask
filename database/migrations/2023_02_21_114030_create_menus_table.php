<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    private $data = [

        [
            'id'        => 1,
            'parent'    => null,
            'name'      => 'Save / Update',
            'name_l'    => 'সেভ / আপডেট',
            'web'       => '',
            'app'       => '',
            'web_icon'  => '',
            'app_icon'  => '',
            'note'      => '',
            'note_l'    => '',
        ],
        [
            'id'        => 2,
            'parent'    => null,
            'name'      => 'Block / Unblock',
            'name_l'    => 'ব্লক / আনব্লক',
            'web'       => '',
            'app'       => '',
            'web_icon'  => '',
            'app_icon'  => '',
            'note'      => '',
            'note_l'    => '',
        ],
        [
            'id'        => 3,
            'parent'    => null,
            'name'      => 'Delete',
            'name_l'    => 'ডিলিট',
            'web'       => '',
            'app'       => '',
            'web_icon'  => '',
            'app_icon'  => '',
            'note'      => '',
            'note_l'    => '',
        ],
        [
            'id'        => 4,
            'parent'    => null,
            'name'      => 'Dashboard',
            'name_l'    => 'ড্যাশবোর্ড',
            'web'       => 'dashboard',
            ''       => '',
            'web_icon'  => 'uil uil-home-alt',
            'app_icon'  => '',
            'note'      => '',
            'note_l'    => '',
        ],
        #Product
        [
            'id'        => 100,
            'parent'    => null,
            'name'      => 'Product',
            'name_l'    => 'পণ্য ',
            'web'       => 'product',
            'app'       => '',
            'web_icon'  =>  'uil uil-home-alt',
            'app_icon'  =>  '',
            'note'      =>  '',
            'note_l'    =>  '',
        ],
        [
            'id'        => 101,
            'parent'    => null,
            'name'      => 'My Product',
            'name_l'    => 'আমার পণ্য ',
            'web'       => 'my.product',
            'app'       => '',
            'web_icon'  =>  'uil uil-home-alt',
            'app_icon'  =>  '',
            'note'      =>  '',
            'note_l'    =>  '',
        ],

    ];

    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->integer('parent')->nullable();
            $table->string('name')->collation('utf16_general_ci');
            $table->string('name_l')->collation('utf16_general_ci');

            $table->string('web')->nullable();
            $table->string('web_icon')->nullable();
            
            $table->string('app')->nullable();
            $table->string('app_icon')->nullable();

            $table->string('note')->nullable();
            $table->string('note_l')->nullable();
            $table->timestamps();
        });
        DB::table('menus')->insert($this->data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
