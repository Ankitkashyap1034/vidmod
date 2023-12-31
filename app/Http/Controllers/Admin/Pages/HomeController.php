<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Home\Hero;
use App\Models\Admin\Home\About;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $homeHero = Hero::where('lang_prefix', $request->lang_prefix)->first();
        if ($homeHero) {
            $data = $homeHero;
        } else {
            $data = [];
        }
        return view('admin.home.hero', [
            'homeHero' => $data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:10|max:100',
            'sub_title' => 'required|min:10|max:100',
            // 'hero_image' => 'mimes:jpeg,png,jpg,gif|max:5000',
            'button_text' => 'required|min:10|max:100',
            'mini_security_title' => 'required|min:10|max:30',
            'hero_description' => 'required|min:10|max:300',
            'home_hero_id' => 'required'
        ]);

        // $imageName = time() . '.' . $request->hero_image->extension();
        // $request->hero_image->storeAs('public/home/hero', $imageName);

        $homeHero = Hero::find($request->home_hero_id);
        if ($homeHero) {
            $homeHero->update([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                // 'hero_image' => $imageName,
                'button_text' => $request->button_text,
                'hero_description' => $request->hero_description,
                'mini_security_title' => $request->mini_security_title,
            ]);
        } else {
            Hero::create([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'button_text' => $request->button_text,
                'hero_description' => $request->hero_description,
                'mini_security_title' => $request->mini_security_title,
            ]);
        }


        return redirect()->back()->with('success', 'Section update successfull');
    }

    // index for about section setting
    public function indexAbout()
    {
        $aboutData = About::first();
        if ($aboutData) {
            $data = $aboutData;
        } else {
            $data = [];
        }
        return view('admin.home.about', [
            'data' => $data
        ]);
    }

    public function storeAbout(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|max:600',
        ]);


        $aboutModel = About::first();
        if ($aboutModel) {
            $aboutModel->update([
                'title' => $request->title,
                'description' => $request->description
            ]);
        } else {
            About::create([
                'title' => $request->title,
                'description' => $request->description
            ]);
        }


        return redirect()->back()->with('success', 'About section update successfull');
    }
}
