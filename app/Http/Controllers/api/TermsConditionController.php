<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TermsCondition;

class TermsConditionController extends Controller
{public function termsCondition() {
    // Fetch terms and conditions from the database
    $termsCondition = TermsCondition::all();

    // Modify the terms_condition_text field for better readability
    foreach ($termsCondition as $term) {
        // Check if terms_conditions column has value and modify it
        if (!empty($term->terms_conditions)) {
            // Replace \r\n with \n for better consistency and readability
            $term->terms_condition_text = str_replace("\r\n", "\n", $term->terms_conditions);
        }
    }

    // Prepare response data
    $data['status'] = 200;
    $data['message'] = 'Terms and Conditions fetched successfully';

    // Only include the terms_condition_text in the response
    $data['termsCondition'] = $termsCondition->map(function ($term) {
        // Remove the raw terms_conditions field if not needed
        unset($term->terms_conditions);
        return $term;
    });

    // Return the JSON response
    return response()->json($data, 200);
}


}
