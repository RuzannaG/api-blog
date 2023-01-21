<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserSubscribe;
use Illuminate\Http\Request;

class UserSubscribeControoler extends Controller
{
    public function index()
    {
        try {
            $subscribes = UserSubscribe::get();
            return response()->json([
                'success' => true,
                'subscribes' => $subscribes
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'subscribes' => $e->getMessage()
            ]);
        }
    }
    public function delete($id)
    {
        try {
            $result = UserSubscribe::findOrFail($id)->delete();
            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => 'Subscribes Delete successfully'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Some problem'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
