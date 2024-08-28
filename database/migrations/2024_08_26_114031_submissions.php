<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->string('email', 191)->nullable(false);
            $table->string('name', 128)->nullable();
            $table->text('message')->nullable(false);
            $table->unsignedInteger('created_at')->nullable(false);
            $table->unsignedInteger('updated_at')->nullable();
        });
    }
};
