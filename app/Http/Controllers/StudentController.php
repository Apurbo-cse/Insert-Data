<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $students = Student::orderBy('created_at', 'DESC')->paginate(20);
        return view ('index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data =new Student;
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->course = $request->input('course');
        $data->section = $request->input('section');


        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/student';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $data['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'course'=>'required',
            'section'=>'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
        ]);

        $data->save();

        return redirect('student')->with('status', 'Student added successfully');
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
    public function edit(Student $student)
    {
        $data['student']=$student;
        return view('edit', $data);

        // $data = Student::find($id);
        // return view ('edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Student $student)
    {
        $data =new Student;
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->course = $request->input('course');
        $data->section = $request->input('section');


        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/student';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $data['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'course'=>'required',
            'section'=>'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
        ]);

            $data->save();
        session()->flash('success', 'Gallery Update Successfully');
        return redirect('student')->with('status', 'Student added successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if($student){
            if(file_exists(($student->image))){
                unlink($student->image);
            }

            $student->delete();
            session()->flash('success', 'student deleted successfully');
            return back();
        }
    }
}
