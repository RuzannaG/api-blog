<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContantController extends Controller
{
    public function getContects()
    {
        try {
            $contacts = Contact::orderBy('id', 'desc')->get();
            return response()->json([
                'success' => true,
                'contects' => $contacts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'contects' => $e->getMessage(),
            ]);
        }
    }
    public function delete($id)
    {
        $result = Contact::findOrFail($id)->delete();
        if ($result) {
            return response()->json([
                'success' => true,
                'message' => 'Contact Delete Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Some Problem'
            ]);
        }
    }
}
