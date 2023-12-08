<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        $companies = Company::all();

        return view('dashboard', compact('companies'));
    }
    public function view()
    {
        $companies = Company::all();

        return view('welcome', compact('companies'));
    }

    public function create()
    {
        return view('new-company');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'inn' => 'required|unique:companies,inn',
            'info' => 'required',
            'director' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $company = Company::create($validated);
        return redirect()->route('dashboard')->with('success', 'Компания добавлена успешно');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('dashboard')->with('success', 'Информация удалена успешно');
    }

}
