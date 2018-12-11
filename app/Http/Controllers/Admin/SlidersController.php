<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'))->with('successfully','Added Successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $slider = new Slider();

        $image = $request->file('image');
        $orginalName = $image->getClientOriginalName();
        $unicname = mt_rand().$orginalName;
        $folder = "slider_image/";
        $upload = $image->move($folder,$unicname);
        $url = $folder.$unicname;

        
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->image = $url;
        $slider->save();

        return redirect()->route('sliders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $slider = Slider::find($id);
        $image  = $request->file('image');
        if (isset($image)) {
           $orginalName = $image->getClientOriginalName();
            $unicname   = mt_rand().$orginalName;
            $folder     = "slider_image/";
            $upload     = $image->move($folder,$unicname);
            $url        = $folder.$unicname; 
        }else{
            $url = $slider->image;
        }
        
        $slider->title    = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->image    = $url;
        $slider->update();

        return redirect()->route('sliders.index')->with('successMsg','Slider Updat Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $slider = Slider::find($id);
        $image_path = $slider->image;
        unlink($image_path);
        $slider->delete();

        return redirect('admin/sliders')->with('deleteMsg','Deleted Successfully');
    }
}
