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
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('tender_id');
            $table->string('description');
            $table->decimal('document_price');
            $table->decimal('tender_security');
            $table->date('last_sale_date');
            $table->date('opening_date')->nullable();
            $table->date('closing_date')->nullable();
            $table->string('similar_works')->nullable();
            $table->string('tender_capacity')->nullable();
            $table->string('turnover')->nullable();
            $table->enum('method', ['LTM', 'OTM', 'OSTETM', 'RFQ'])->default('OTM');
            $table->string('note')->nullable();
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};
