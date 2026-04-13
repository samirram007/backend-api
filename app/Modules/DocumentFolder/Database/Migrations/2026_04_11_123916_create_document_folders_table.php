<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents_folders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('folder_id');
            $table->unique(['document_id', 'folder_id']);
            // Define foreign keys
            $table->foreign('document_id')
                ->references('id')
                ->on('documents')
                ->where('document_type', '<>', 'folder')
                ->onDelete('cascade');

            $table->foreign('folder_id')
                ->references('id')
                ->on('documents')
                ->where('document_type', '=', 'folder')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document_folders');
    }
};
