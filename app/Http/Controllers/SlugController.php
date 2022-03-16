<?php

namespace App\Http\Controllers;
use App\Models\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slug = Slug::orderBy('created_at', 'DESC')->paginate(20);
        return view ('Slug.index',compact('slug'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Slug.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {


        // $this->validate($request, [
        //     'title' => 'required|unique:slugs,name',
        // ]);


        $data = new Slug();

        $data->title = $request->input('title');
        $data->slug = Str::slug($request->title, '-');
        $data->summary = $request->input('summary');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/student';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $data['image']= $path.'/'. $file_name;
        }

        $data->save();

        return redirect('slug')->with('status', 'Student added successfully');

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
    public function edit($id)
    {

        $slug = Slug::findOrFail($id);
        return view('Slug.edit', compact('slug'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$id)
    {
        $slug = Slug::findOrFail($id);
        $slug->title = $request->input('title');
        $slug->slug = Str::slug($request->title, '-');
        $slug->summary = $request->input('summary');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/student';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $slug['image']= $path.'/'. $file_name;
        }

        $slug->update();

        return redirect('slug')->with('status', 'Student added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slug = Slug::findOrFail($id);
        
        if($slug){
            if(file_exists(($slug->image))){
                unlink($slug->image);
            }

            $slug->delete();
            session()->flash('success', 'student deleted successfully');
            return back();
        }
    }
}
