<?php

use Illuminate\Database\Seeder;
use App\Employee;
use App\Task;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Employee::class, 20)
            ->create()
            ->each(function ($employee)
            {
                $tasks = 
                    Task::inRandomOrder()
                        ->take(rand(1, 3))
                        ->get();

                $employee
                    ->tasks()
                    ->attach($tasks);
            });
    }
}
