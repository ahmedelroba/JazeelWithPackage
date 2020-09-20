<?php

namespace Uxbert\Gamification\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Uxbert\Gamification\Models\UploadedFiles;

class Helper
{
    public static function get_percentage($total, $number)
    {
        if ( $total > 0 ) {
            return round( $number / $total * 100, 5 );
        } else {
            return 0;
        }
    }

    public static function GenerateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     *
     * Generate a unique random string of characters
     * uses str_random() helper for generating the random string
     *
     * @param     $table - name of the table
     * @param     $col - name of the column that needs to be tested
     * @param int $chars - length of the random string
     *
     * @return string
     */
    public static function unique_random($table, $col, $chars = 16){

        $unique = false;

        // Store tested results in array to not test them again
        $tested = [];

        do{

            // Generate random string of characters
            $random = Helper::GenerateRandomString($chars);

            // Check if it's already testing
            // If so, don't query the database again
            if( in_array($random, $tested) ){
                continue;
            }

            // Check if it is unique in the database
            $count = DB::table($table)->where($col, '=', $random)->count();

            // Store the random character in the tested array
            // To keep track which ones are already tested
            $tested[] = $random;

            // String appears to be unique
            if( $count == 0){
                // Set unique to true to break the loop
                $unique = true;
            }

            // If unique is still false at this point
            // it will just repeat all the steps until
            // it has generated a random string of characters

        }
        while(!$unique);


        return $random;
    }

    /**
     * Get direct url of file from file id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string  File ID      send file id to get url as string.
     */
    public static function GetURL($fileId)
    {
        $image = UploadedFiles::find($fileId);
        return isset($image) ? url($image->url) : asset('default-photo-profile.svg');
    }

    /**
     * This for uploading any file in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $path        you must write path you want to save a file into it in public folder.
     * @param  string  $input       you must write name of uploading input like `image`.
     * @param  string  $file_id     If you already update image and wants to remove old image and add new image please type old file id.
     * @return string  File ID      you must save it into your table to get it in any time you wants.
     */
    public static function UpdateFile(Request $request, $path, $input, $file_id = null)
    {
        if ($request->hasFile($input)) {
            if ($file_id != '') {
                $oldFile = UploadedFiles::find($file_id);

                if (File::exists(public_path($oldFile->path))) { // unlink or remove previous image from folder
                    File::deleteDirectory(public_path($oldFile->path));
                }

                $img_name = time() . '.' . $request->file($input)->getClientOriginalExtension();
                $request->file($input)->move(public_path($path), $img_name);
                $db_name =  $path . $img_name;
                $file = UploadedFiles::create([
                    'real_name' => $request->file($input)->getClientOriginalName(),
                    'new_name' => $img_name,
                    'extension' => $request->file($input)->getClientOriginalExtension(),
                    'path' => $path,
                    'url' => $db_name,
                    'type' => 'file'
                ]);
                if (isset($file))
                    $oldFile->delete();
                return $file->id;
            } else {
                $img_name = time() . '.' . $request->file($input)->getClientOriginalExtension();
                $request->file($input)->move(public_path($path), $img_name);
                $db_name = $path . $img_name;
                $file = UploadedFiles::create([
                    'real_name' => $request->file($input)->getClientOriginalName(),
                    'new_name' => $img_name,
                    'extension' => $request->file($input)->getClientOriginalExtension(),
                    'path' => $path,
                    'url' => $db_name,
                    'type' => 'file'
                ]);
                return $file->id;
            }
        } else
            $db_name = $file_id;
        return $db_name;
    }

    public static function DeleteFileByFileID($fileID)
    {
        $file = UploadedFiles::find($fileID);
        return File::deleteDirectory(public_path($file->path));
    }


}
