<?php

namespace App\controllers;



use App\models\Course;

class CourseController 
{
    public function index()
    {
        $courses = Course::all();
        header('Content-type: application/json');
        echo json_encode($courses);
    }

    public function save()
    {
        $data = json_decode( file_get_contents('php://input') );
        $course = new Course();

        $course->name = $data->name;

        header('Content-type: application/json');
        if($course->save()){
            echo json_encode( ['course' => $course, 'status' => 'ok']);
        }else{
            echo json_encode( ['status' => 'error']);
        }
    }

    public function show($id)
    {
        $course = Course::find($id);

        header('Content-type: application/json');
        if(!empty($course)){
            echo json_encode( ['course' => $course, 'status' => 'ok']);
        }else{
            echo json_encode( ['status' => 'error']);
        }
    }

    public function update($id)
    {
        $data = json_decode( file_get_contents('php://input') );
        $course = Course::find($id);

        $course->name = $data->name;

        header('Content-type: application/json');
        if($course->save()){
            echo json_encode( ['course' => $course, 'status' => 'ok']);
        }else{
            echo json_encode( ['status' => 'error']);
        }
    }

    public function delete($id)
    {
        $course = Course::find($id);

        header('Content-type: application/json');
        if($course->delete()){
            echo json_encode( ['course' => $course, 'status' => 'ok']);
        }else{
            echo json_encode( ['status' => 'error']);
        }
    }
}