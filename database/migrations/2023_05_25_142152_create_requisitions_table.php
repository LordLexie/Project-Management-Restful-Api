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
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('requisition_title');
            $table->string('requisition_description')->nullable();
            $table->string('requisition_no')->unique();
            $table->string('requisition_type')->default('project_based');
            $table->string('requisition_status')->default('pending');            
            $table->integer('author_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisitions');
    }
};
