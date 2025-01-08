<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function enroll(Request $request)
    {

        $post = Post::find($request->post_id);
        
        $enrollment = Enrollment::create([
            'student_id' => Auth::guard('api')->user()->id,
            'post_id' => $post->id,
            'instructor_id' => $post->instructor_id,
            'status' => 'pending',
        ]);

        return response()->json($enrollment, 201);
    }

    public function accept(Enrollment $enrollment)
    {
        $enrollment->update(['status' => 'active']);
        return response()->json(['message' => 'Enrollment accepted']);
    }

    public function reject(Enrollment $enrollment)
    {
        $enrollment->update(['status' => 'canceled']);
        return response()->json(['message' => 'Enrollment rejected']);
    }



    public function updateEnrollStatus(Request $request, $id)
    {

        // dd($request->all(), $id);
            $request->validate([
                'status' => 'required'
            ]);

            $data = Enrollment::find($id);

            if (!$data) {
                return response()->json($data, 201);
            }

            $data->status = $request->status;
            $data->save();

            return response()->json($data, 400);
        
    }
    
    public function listStudents()
    {
        $user = Auth::guard('api')->user();
        $data = Post::with(['enrollment' =>function($query){
            $query->with('student');
        }])->where('instructor_id', $user->id)->get();
        // $data = Enrollment::with('post', 'student')->where('instructor_id' , $user->id)->get();
        return response()->json($data);
    }
}
