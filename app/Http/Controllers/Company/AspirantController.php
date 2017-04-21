<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aspirant;

class AspirantController extends Controller
{
    public function index(Request $request)
    {
        $aspirants = Aspirant::orderBy('created_at', 'desc')->paginate(10);

        if ($request->has('q')) {
            $words = explode(' ', $request->q);
            $aspirants = Aspirant::query();

            foreach ($words as $word) {
                $aspirants->where('state', 'like', "%$word%")
                    ->orWhere('city', 'like', "%$word%")
                    ->orWhereHas('user', function ($query) use ($word) {
                        $query->where('name', 'like', "%$word%")
                            ->orWhere('email', 'like', "%$word%");
                });
            }

            $aspirants = $aspirants
                ->distinct()
                ->paginate(10)
                ->appends(['q' => $request->q]);
        }

        return view('company.aspirants.index', compact('aspirants'));
    }

    public function show($id)
    {
        $aspirant = Aspirant::findOrFail($id);

        if ($aspirant->resumeFile) {
            return response()
                ->file(storage_path('app/')
                . $aspirant->resumeFile->path);
        }

        if ($aspirant->resume) {
            return dd($aspirant->resume->getAttributes());
        }

        abort(404);
    }
}
