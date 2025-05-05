<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password')
        ]);

        // Create companies
        $company1 = Company::create(['name' => 'Tech Corp']);
        $company2 = Company::create(['name' => 'Digital Creative']);
        $company3 = Company::create(['name' => 'Code Masters']);

        // Create skills
        $skills = [
            Skill::create(['name' => 'PHP']),
            Skill::create(['name' => 'Laravel']),
            Skill::create(['name' => 'Vue.js']),
            Skill::create(['name' => 'React']),
            Skill::create(['name' => 'Python']),
            Skill::create(['name' => 'JavaScript']),
        ];

        // Create employees with skills
        $employees = [
            // Company 1
            Employee::create(['name' => 'Alice', 'company_id' => $company1->id]),
            Employee::create(['name' => 'Bob', 'company_id' => $company1->id]),
            
            // Company 2
            Employee::create(['name' => 'Charlie', 'company_id' => $company2->id]),
            Employee::create(['name' => 'Diana', 'company_id' => $company2->id]),
            
            // Company 3
            Employee::create(['name' => 'Evan', 'company_id' => $company3->id]),
        ];

        // Attach skills to employees
        $employees[0]->skills()->sync([$skills[0]->id, $skills[1]->id]);  // Alice: PHP, Laravel
        $employees[1]->skills()->sync([$skills[2]->id, $skills[3]->id]);  // Bob: Vue.js, React
        $employees[2]->skills()->sync([$skills[4]->id, $skills[5]->id]);  // Charlie: Python, JavaScript
        $employees[3]->skills()->sync([$skills[1]->id, $skills[3]->id]);  // Diana: Laravel, React
        $employees[4]->skills()->sync([$skills[0]->id, $skills[5]->id]);  // Evan: PHP, JavaScript
    }
}
