<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the skills.
     */
    public function index()
    {
        $skills = Skill::withCount('employees')->get();
        return view('skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new skill.
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * Store a newly created skill in database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:skills',
        ]);

        Skill::create($request->all());
        return redirect()->route('skills.index')->with('success', 'Skill berhasil dibuat!');
    }

    /**
     * Display the specified skill.
     */
    public function show(Skill $skill)
    {
        $skill->load('employees.company');
        return view('skills.show', compact('skill'));
    }

    /**
     * Show the form for editing the specified skill.
     */
    public function edit(Skill $skill)
    {
        return view('skills.edit', compact('skill'));
    }

    /**
     * Update the specified skill in database.
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:skills,name,' . $skill->id,
        ]);

        $skill->update($request->all());
        return redirect()->route('skills.index')->with('success', 'Skill berhasil diperbarui!');
    }

    /**
     * Remove the specified skill from database.
     */
    public function destroy(Skill $skill)
    {
        // Hapus juga relasi di tabel pivot (tidak perlu explicit karena sudah onDelete cascade)
        $skill->delete();
        return redirect()->route('skills.index')->with('success', 'Skill berhasil dihapus!');
    }
}
