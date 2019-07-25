<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Violation;
use App\ViolationDescription;
use App\ViolationImage;

class ViolationController extends Controller
{
    public function index()
    {
        $violations = Violation::with(['images','notes','descriptions'])->get();
        return response()->json(["violations" => $violations], 200);
    }

    public function store(Request $request)
    {
        $violation = New Violation;
        $violation->complainant_name = $request->complainant_name;
        $violation->complainant_email = $request->complainant_email;
        $violation->complainant_phone = $request->complainant_phone;
        $violation->violator_name = $request->violator_name;
        $violation->violator_address = $request->violator_address;
        $violation->violator_city = $request->violator_city;
        $violation->violator_state = $request->violator_state;
        $violation->violator_zip = $request->violator_zip;
        $violation->pin_code = $request->violator_pin;
        $violation->ward_district_no = $request->violator_ward_district_no;
        $violation->status = $request->status;
        $violation->save();

        // var_dump(json_decode($request->violation_descriptions));
        if(count(json_decode($request->violation_descriptions)) > 0){
            foreach(json_decode($request->violation_descriptions) as $violation_description){
                $dbViolationDesc = new ViolationDescription;
                $dbViolationDesc->text = $violation_description->text;
                $dbViolationDesc->violation_id = $violation->id;
                $dbViolationDesc->inspector_id = 0;
                $dbViolationDesc->save();					
            }
        }	

        foreach(request()->file('violation_images') as $violation_image){
            if($violation_image !== null){
                $path = $violation_image->storeAs('complaints', $violation_image->getClientOriginalName(), 'public');
                $dbViolationImage = new ViolationImage;
                $dbViolationImage->filename = $violation_image->getClientOriginalName();
                $dbViolationImage->violation_id = $violation->id;
                $dbViolationImage->inspector_id = 0;
                $dbViolationImage->save();
            } 
        } 

        return response()->json($violation,201);
    }
}
