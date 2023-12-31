<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Language;
use Illuminate\Support\Facades\Validator;
use Log;

class LanguageController extends Controller
{
    public function index()
    {
        $data  = Language::all();
        return view('admin.language.index', [
            'data' => $data,
            'i' => 1
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'prefix' => 'required|max:10',
        ]);

        $language = Language::where('prefix', $request->prefix)->first();
        if (!$language) {
            Language::create([
                'name' => $request->name,
                'prefix' => $request->prefix,
            ]);

            return redirect()->back()->with('success', 'Language Add Successfully');
        } else {
            return redirect()->back()->with('error', 'Language prefix already exist');
        }
    }

    public function getInfo(Language $lang)
    {
        try {
            return response()->json([
                'status' => true,
                'data' => $lang,
            ], 200);
        } catch (\Exception $ex) {
            Log::error('getClientService', [
                'message' => $ex->getMessage(),
                'trace' => $ex->getTraceAsString(),
            ]);

            return response()->json([
                'message' => $ex->getMessage(),
            ], 404);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'prefix' => 'required|max:10',
        ]);

        $languageModel = Language::find($request->lang_id);
        $languageModel->update([
            'name' => $request->name,
            'prefix' => $request->prefix,
        ]);

        return redirect()->back()->with('success', 'Language Update Successfully');
    }

    public function changeStatus(Language $lang)
    {
        if ($lang->status == 1) {
            $lang->update([
                'status' => '0',
            ]);
        } else {
            $lang->update([
                'status' => '1',
            ]);
        }

        return redirect()->back()->with('success', 'Language Update Successfully');
    }

    public function selectLanguage()
    {
        $data  = Language::where('status', 1)->get();
        return view('admin.language.language-choose', [
            'data' => $data
        ]);
    }
}
