<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\Category;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $items = Item::all();
        return view('admin.Item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $categories = Category::all();
        return view('admin.Item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $item = new Item();

        $image = $request->file('image');
        $orginalName = $image->getClientOriginalName();
        $unicname = mt_rand().$orginalName;
        $folder = "item_image/";
        $upload = $image->move($folder,$unicname);
        $url = $folder.$unicname;

        
        $item->name = $request->name;
        $item->category_id = $request->category;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $url;
        $item->save();

        return redirect()->route('item.index')->with('successMsg','Item Insert Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
       $item = Item::find($id);
       $categories = Category::all();
       return view('admin.Item.edit', compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $item = Item::find($id);

        $image = $request->file('image');
        if (isset($image)) {
            $image_path = $item->image;
            unlink($image_path);
            $orginalName = $image->getClientOriginalName();
            $unicname = mt_rand().$orginalName;
            $folder = "item_image/";
            $upload = $image->move($folder,$unicname);
            $url = $folder.$unicname;
        }else{
            $url = $item->image;
        }

        
        $item->name = $request->name;
        $item->category_id = $request->category;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $url;
        $item->update();

        return redirect()->route('item.index')->with('successMsg','Item Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $deleteItm = Item::find($id);
        $image_path = $deleteItm->image;
        unlink($image_path);
        $deleteItm->delete();

        return redirect()->route('item.index')->with('successMsg','Item Delete Successfully');
    }
}
