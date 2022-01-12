<?php
namespace App\Http\Controllers;

class DeleteController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
     */

    public static function destroy()
    {
        $IdInUri = explode("/", $_SERVER['REQUEST_URI']);
        $id = $IdInUri[2];
        //echo ($id);
        //$id->delete();
        // User::delete($id);
        DB::table('users')->delete($id);
    }
}
