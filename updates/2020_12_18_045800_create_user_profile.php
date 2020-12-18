<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->id();
            $table->integer('uid')
                ->comment('用户id')
                ->unique();
            $table->string('pic',255)
                ->comment('头像');
            $table->float('money',3)
                ->comment('余额')
                ->default('0.000');
            $table->integer('sex')
                ->comment('性别')
                ->default(1);
            $table->date('birthday')
                ->comment('生日')
                ->default('2000-01-01');
            $table->string('city')
                ->comment('城市')
                ->default('上海');
            $table->string('country')
                ->comment('国家')
                ->default('中国');
            $table->string('phone')
                ->comment('手机号');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profile');
    }
}
