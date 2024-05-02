<?php

namespace App\Http\Controllers\HumanResource;

use App\Http\Controllers\Controller;
use App\Models\HumanResource\Department;
use App\Models\HumanResource\Employee;
use App\Models\HumanResource\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;



class EmployeeController extends Controller
{
    public function __invoke(Request $request)
    {
        // Department::withCount(['employees'])->get()->dd();
        $employees = Employee::with(['position.department'])
                        ->orderBy('created_at')
                        ->paginate(20);

        if($request->has('search') && $request->search != null){
            $employees = Employee::where('first_name', 'like', "%{$request->search}%")
                ->orWhere('last_name', 'like', "%{$request->search}%")
                ->orderBy('created_at')
                ->paginate(20);
        }

        return View::make('layouts.hr.employee', [
            'employees' => $employees,
            'overallEmployeeCount' => Employee::count(),
            'departments' => Department::withCount(['employees'])->get()
        ]);
    }
}