<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobProposalsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_proposals_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_proposal_id');
            $table->string('file_name', 300);
            $table->unsignedTinyInteger('file_location_type');
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
        Schema::dropIfExists('job_proposals_files');
    }
}
