<?php

namespace App\Helpers;
use App\Models\User;

class Helper {

    /**
     * Generate unique username
     *
     * @param [string] $first_name
     * @param [string] $last_name
     * @return string
     */
    public static function username($first_name, $last_name)
    {
        $result = null;
        $suffix = 0;

        try {

            // if first_name/last_name is empty, throw null
            if($first_name == null || $last_name == null)
                return $result;

            do {
                //set the first name to small letters
                $first_name = strtolower(trim($first_name));

                //get the first character of the first name
                $first_character = substr($first_name, 0, 1);

                //set the last name to small letters
                $last_name = strtolower(trim($last_name));

                // remove spaces between word
                $lastname = str_replace(' ', '', $last_name);

                //concat first name first character and the last name
                $result = sprintf('%s%s', $first_character, $lastname);

                // check if username is unique
                $user = User::where('username', $result)->get();

                // if username is existing add suffix
                if ($user->count() > 0) {
                    $suffix++;
                    $result = sprintf('%s%u', $result, $suffix);

                    // recheck if username is existing
                    $user = User::where('username', $result)->get();
                }
            } while ($user->count() > 0); 

        } catch (\Throwable $th) {
            return $result;
        }

        return $result;
    }
}