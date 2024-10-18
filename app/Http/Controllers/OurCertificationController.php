<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificationRequest;
use App\Http\Requests\UpdateCertificationRequest;
use App\Models\OurCertification;
use Illuminate\Http\Request;

class OurCertificationController extends Controller
{
    public function index()
    {
        $certifications = OurCertification::all();
        return view('admin.certifications.index', compact('certifications'));
    }

    public function create()
    {
        return view('admin.certifications.create');
    }

    public function showCertifications()
    {
        // Fetch all certifications for display on the front end
        $certifications = OurCertification::all();

        // Pass the certifications to the view
        return view('front.teams', compact('certifications'));
    }

    public function store(StoreCertificationRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('certifications', 'public');
        }

        OurCertification::create($data);

        return redirect()->route('admin.certifications.index')->with('success', 'Certification created successfully.');
    }

    public function edit(OurCertification $certification)
    {
        return view('admin.certifications.edit', compact('certifications'));
    }

    public function update(UpdateCertificationRequest $request, OurCertification $certification)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('certificitions', 'public');
        }

        $certification->update($data);

        return redirect()->route('admin.certifications.index')->with('success', 'Certification updated successfully.');
    }

    public function destroy(OurCertification $certification)
    {
        $certification->delete();

        return redirect()->route('admin.certifications.index')->with('success', 'Certification deleted successfully.');
    }
}
