<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player', function (Blueprint $table) {
           $table->increments('id');// ID player
           $table->string('campaign_name');// Tên dự án game
           $table->string('location_name')->nullable();// Tên địa điểm chơi
           $table->string('device_name')->nullable();// Tên máy
           $table->string('avatar')->nullable();// Ảnh người dùng
           $table->string('full_name')->nullable();// Họ và tên
           $table->string('email')->nullable();// Email player
           $table->string('phone_number')->nullable();// Số điện thoại
           $table->date('birthday')->nullable();// Sinh nhật
           $table->string('mac_address')->nullable();// Địa chỉ mac
           $table->string('imei')->nullable();// Imei điện thoại
           $table->datetime('created_client_at')->nullable();// Thời gian client gửi dữ liệu
           $table->string('content')->nullable();// Nội dung - chứa các thông tin không thuộc các trường ở đây
           $table->integer('state')->nullable();// Tình trạng
           $table->integer('user_id')->nullable();
           $table->rememberToken();
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
        Schema::dropIfExists('player');
    }
}
