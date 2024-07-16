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

    // Örnek veri ekleyelim
    DB::table('employees')->insert([
        [
            'name' => 'John Doe',
            'surname' => 'Doe',
            'sicil' => 12345,
            'organization_unit' => 1,
            'phone_num' => '555-1234567',
            'e_mail' => 'john.doe@example.com',
            'duty' => 'Developer',
        ],
        [
            'name' => 'Jane Smith',
            'surname' => 'Smith',
            'sicil' => 54321,
            'organization_unit' => 2,
            'phone_num' => '555-9876543',
            'e_mail' => 'jane.smith@example.com',
            'duty' => 'Designer',
        ],
        // Diğer örnek verileri buraya ekleyebilirsiniz
    ]);
    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('example_employees');
    }
};
