<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search {
    public function compare($input, $data, $try=1) {
        $closest = NULL;
        // no shortest distance found, yet
        $shortest = -1;
        // loop through words to find the closest
        foreach ($data as $word) {

            // calculate the distance between the input word,
            // and the current word
            $lev = levenshtein($input, $word);

            // check for an exact match
            if ($lev == 0) {

                // closest word is this one (exact match)
                $closest = $word;
                $shortest = 0;

                // break out of the loop; we've found an exact match
                break;
            }

            // if this distance is less than the next found shortest
            // distance, OR if a next shortest word has not yet been found
            if ($lev <= $shortest || $shortest < 0) {
                // set the closest match, and shortest distance
                $closest  = $word;
                $shortest = $lev;
            }   
        }
        /*
        if ($shortest == 0) {
            echo "Exact match found: $closest\n";
        } else {
            echo "Did you mean: $closest?\n";
        }*/
        // check is 80% similar
        $similar_percentage = similar_text($input, $closest, $perc);
        if ($perc < 80 && $try == 1) {
            $new_string = explode(' ', $input);
            $max = count($new_string);
            $new_input = '';
            for ($i=$max; $i>0; $i--) {
                $new_input .= $new_string[$max-1];
                $max--;
            }
            // $closest = NULL;
            $closest = $this->compare($new_input, $data, 2);  
        } elseif ($perc < 80 && $try > 1) {
            $closest = NULL;
            // echo $closest;
        }
        // var_dump($closest); exit();
        return $closest;
    }
}