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
        Schema::table('achievement_field', function (Blueprint $table) {
            // Set default values or allow changes to the columns
            $table->string('achievement')->default('')->change();  // Set default value to empty string or other appropriate value
            $table->string('subheading')->default('')->change();   // Set default for subheading
            $table->string('path_video')->nullable()->change();    // Allow null for path_video
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('achievement_field', function (Blueprint $table) {
            // Reverse the changes made in the up() method
            $table->string('achievement')->nullable(false)->change(); // Revert achievement to non-nullable
            $table->string('subheading')->nullable(false)->change();  // Revert subheading to non-nullable
            $table->string('path_video')->nullable(false)->change();  // Revert path_video to non-nullable
        });
    }
};
