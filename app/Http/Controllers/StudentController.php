<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_student = Student::all(); 
        return view('student', compact('all_student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'gender' => 'required',
            'birthday' => 'required|date',
            'phone' => 'required',
            'major' => 'required|string'
        ]);

        try {
            $new_student = new Student;
            $new_student->name = $request->name;

            $genderValue;
            if($request->gender == "1"){
                $genderValue = "Nam";
            }else if ($request->gender == "2"){
                $genderValue = "Nữ";
            }else{
                $genderValue = "Khác";
            }
            $new_student->gender = $genderValue;

            $new_student->birthday = $request->birthday;
            $new_student->phone = $request->phone;
            $new_student->major = $request->major;
            $new_student->save();

            return redirect('/student')->with('sucess', 'User added sucessfully!');
        } catch (\Exception $e) {
            return redirect('/add-student')->with('fail', $e->getMessage());
        }
    }

    public function openAddPage()
    {
        $studentData = null;
        return view('add-student', compact('studentData'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $studentData = Student::find($id);
        return view('add-student', compact('studentData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'gender' => 'required',
            'birthday' => 'required|date',
            'phone' => 'required',
            'major' => 'required|string'
        ]);

        try {
            $genderValue;
            if($request->gender == "1" || $request->gender == "Nam"){
                $genderValue = "Nam";
            }else if ($request->gender == "2" || $request->gender == "Nữ"){
                $genderValue = "Nữ";
            }else{
                $genderValue = "Khác";
            }
            $update_student = Student::where('id', $request->student_id)->update([
                'name' => $request->name,
                'gender' => $genderValue,
                'birthday' => $request->birthday,
                'phone' => $request->phone,
                'major' => $request->major,
            ]);
            return redirect('/student')->with('sucess', 'User updated sucessfully!');
        } catch (\Exception $e) {
            return redirect('/add-student')->with('fail', $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            Student::where('id', $id)->delete();
            return redirect('/student')->with('success', 'Student deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/student')->with('fail', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
