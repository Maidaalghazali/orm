<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Models\Skill;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the employees.
     */
    public function index()
    {
        $employees = Employee::with('company')->get();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee.
     */
    public function create()
    {
        $companies = Company::all();
        $skills = Skill::all();
        return view('employees.create', compact('companies', 'skills'));
    }

    /**
     * Store a newly created employee in database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ]);

        $employee = Employee::create($request->only(['name', 'company_id']));
        
        if ($request->has('skills')) {
            $employee->skills()->attach($request->skills);
        }

        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil dibuat!');
    }

    /**
     * Display the specified employee.
     */
    public function show(Employee $employee)
    {
        $employee->load('company', 'skills');
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified employee.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        $skills = Skill::all();
        $employee->load('skills');
        return view('employees.edit', compact('employee', 'companies', 'skills'));
    }

    /**
     * Update the specified employee in database.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ]);

        $employee->update($request->only(['name', 'company_id']));
        
        // Sync skills (menghapus yang tidak dipilih, menambah yang baru)
        if ($request->has('skills')) {
            $employee->skills()->sync($request->skills);
        } else {
            $employee->skills()->detach();
        }

        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil diperbarui!');
    }

    /**
     * Remove the specified employee from database.
     */
    public function destroy(Employee $employee)
    {
        $employee->skills()->detach(); // Hapus hubungan dengan skills
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil dihapus!');
    }
}
