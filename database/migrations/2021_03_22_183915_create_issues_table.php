<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');

            $table->foreignId('reporter_id')->constrained('users');
            $table->foreignId('issue_type_id')->constrained('issue_types');

            $table->timestamps();
        });

        Schema::create('issue_labels', function (Blueprint $table) {
            $table->foreignId('issue_id')->constrained('issues');
            $table->foreignId('label_id')->constrained('labels');
        });

        Schema::create('issue_assignees', function (Blueprint $table) {
            $table->foreignId('issue_id')->constrained('issues');
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issue_labels');
        Schema::dropIfExists('issue_assignees');
        Schema::dropIfExists('issues');
    }
}
