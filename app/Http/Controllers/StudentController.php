<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Image;

class StudentController extends Controller
{
    public function studentIndex()
    {

    	$students = Student::get();

    	return view('student.create',compact('students'));
    }

    public function studentStore(Request $request)
    {
    	$this->validate($request,[

    		"db_name" => 'required',
    		"db_roll" => 'required',
    		"db_phone" => 'required',
    		"db_image" => 'required|image|mimes:jpg,png',
    	]);


    	if ($request->hasFile('db_image')) {
    		$image = $request->file('db_image');
    		$fileName = time().'.'.$image->getClientOriginalExtension();
    		$location = public_path().'/images/'.$fileName;
			Image::make($image)->save($location);
    	}


    	$student = new Student;
    	$student->name = $request->db_name;
    	$student->roll = $request->db_roll;
    	$student->phone = $request->db_phone;
    	$student->image = $fileName;
    	$student->save();

    	return back();
    }

    public function studentDel($studentId)
    {
    	$students = Student::find($studentId);
        unlink(public_path().'/images/'.$students->image);
    	$students->delete();

    	return back();
    }

    public function studentEdit($studentId)
    {
    	$students = Student::find($studentId);

    	return view('student.edit',compact('students'));
    }

    public function studentUpdate(Request $request, $studentId)
    {
    	$this->validate($request,[
    		"db_name" => 'required',
    		"db_roll" => 'required',
    		"db_phone" => 'required',
            "db_image" => 'sometimes|required|mimes:jpg,png,jpeg',
    	]);



    	$student = Student::find($studentId);



        if ($request->hasFile('db_image')) {

            unlink(public_path().'/images/'.$student->image);


            $image = $request->file('db_image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $location = public_path().'/images/'.$fileName;
            Image::make($image)->save($location);

            $student->image = $fileName;
        }

    	$student->name = $request->db_name;
    	$student->roll = $request->db_roll;
    	$student->phone = $request->db_phone;
    	$student->update();

    	return redirect('/student');
    }

}
