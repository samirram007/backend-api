<?php

use App\Enums\DocumentPrivacyLevel;
use App\Enums\DocumentStorageType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('path')->nullable();
            $table->string('name');
            $table->string('original_name')->nullable();
            $table->string('caption')->nullable();
            $table->string('description')->nullable();
            $table->enum('storage_type', DocumentStorageType::getValues())->default(DocumentStorageType::LOCAL->value);
            $table->text('link')->nullable();
            $table->string('extension')->nullable();
            $table->string('mime_type')->nullable();
            $table->string('size')->nullable();
            $table->enum('privacy_level', DocumentPrivacyLevel::getValues())->default(DocumentPrivacyLevel::PUBLIC->value);
            $table->boolean('is_root')->default(false);
            $table->text('tags')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
