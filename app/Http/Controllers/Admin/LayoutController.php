<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Header;
use App\Models\Admin\Footer;

class LayoutController extends Controller
{

     // indxex for header setting
     public function index()
     {
         $headerData = Header::first();
         if($headerData){
             $data = $headerData;
         }else{
             $data = [];
         }
         return view('admin.home.header',[
             'headerData' => $data
         ]);
     }


    public function store(Request $request)
    {
        $request->validate([
            'logo_img' => 'mimes:jpeg,png,jpg,gif|max:2000',
        ]);

        if($request->logo_img){
            $imageName = time() . '.' . $request->logo_img->extension();
            $request->logo_img->move(public_path('/header/'), $imageName);

            $headerModel = Header::first();
            if($headerModel){
                $headerModel->update([
                    'logo' => $imageName
                ]);
            }else{
                Header::create([
                    'logo' =>$imageName,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Header update successfull');
    }


    // open the footer
    public function indexFooter()
     {
         $footerData = Footer::first();
         if($footerData){
             $data = $footerData;
         }else{
             $data = [];
         }

         return view('admin.home.footer',[
            'data' => $data
         ]);
    }

    public function storeFooter(Request $request)
    {
        $request->validate([
            'footer_color' => 'required',
            'contact_email' => 'required|max:60',
        ]);


        $footerModel = Footer::first();
        if($footerModel){
            $footerModel->update([
                'footer_color' => $request->footer_color,
                'contact_email' => $request->contact_email
            ]);
        }else{
            Footer::create([
                'footer_color' => $request->footer_color,
                'contact_email' => $request->contact_email
            ]);
        }


        return redirect()->back()->with('success', 'Header update successfull');
    }

}
