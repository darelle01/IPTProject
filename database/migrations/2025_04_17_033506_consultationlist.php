<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultationlist',function (Blueprint $table){
            $table->id();                                                                               
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();    
            $table->timestamps();
            $table->string('ConsultationList');
            $table->string('ConsultationSchedule');
        });
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
