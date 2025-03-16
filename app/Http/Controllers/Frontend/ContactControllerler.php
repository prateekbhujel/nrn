<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactControllerler extends Controller
{
    function index(){
        return view('frontend.contact.index');
    }

    public function save(Request $request)
{
    try {
        $post = $request->all();
        $type = 'success';
        $message = "Your message  sent successfully";
        DB::beginTransaction();
        $result = Contact::saveData($post);
        if (!$result) {
            throw new Exception('Could not send record', 1);
        }
        DB::commit();
    } catch (Exception $e) {
        DB::rollBack();
    $type = "error";
        $message = $e->getMessage();
    }

    if ($request->ajax()) {
        // Return JSON response for AJAX requests
        return response()->json(['type' => $type, 'message' => $message]);
    }
    
    // Fallback for non-AJAX requests
    return redirect()->route('contact')->with($type, $message);
}

}
