<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuperTeamRequest;
use App\Http\Requests\UpdateSuperTeamRequest;
use App\Models\SuperTeam;
use Illuminate\Http\Request;

class SuperTeamController extends Controller
{
    public function index()
    {
        $super_teams = SuperTeam::all();
        return view('admin.super_teams.index', compact('super_teams'));
    }

    public function create()
    {
        return view('admin.super_teams.create');
    }
    
    public function edit(SuperTeam $superTeam)
    {
        return view('admin.super_teams.edit', compact('superTeam'));
    }

    public function store(StoreSuperTeamRequest $request)
    {
        $data = $request->validated();
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
    
        SuperTeam::create($data);
    
        return redirect()->route('admin.super_teams.index')->with('success', 'Super team created successfully.');
    }
    
    public function update(UpdateSuperTeamRequest $request, SuperTeam $superTeam)
    {
        $data = $request->validated();
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
    
        $superTeam->update($data);
    
        return redirect()->route('admin.super_teams.index')->with('success', 'Super team updated successfully.');
    }
    
    public function destroy(SuperTeam $superTeam)
    {
        $superTeam->delete();
    
        return redirect()->route('admin.super_teams.index')->with('success', 'Super team deleted successfully.');
    }
}
