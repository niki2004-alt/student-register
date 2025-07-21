<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMajorIdToStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // Add major_id column, nullable at first
            $table->unsignedBigInteger('major_id')->nullable()->after('major');

            // Add foreign key constraint
            $table->foreign('major_id')->references('id')->on('majors')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['major_id']);
            $table->dropColumn('major_id');
        });
    }
}
