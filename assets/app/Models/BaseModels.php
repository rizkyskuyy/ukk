<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model {

    public static function csvFileToJson($csv_file) {
        try {
            $data = file_get_contents($csv_file);
            $data = substr($data,3);
            $data = str_replace("\r", "", $data);
            $data = explode("\n", $data);
    
            $column = explode(",", $data[0]);
            unset($data[0]);
    
            $json = [];
            foreach ($data as $key=>$value) {
                $dt = [];
                $sliced = explode(",", $value);
                foreach ($sliced as $k=>$v) {
                    $dt[$column[$k]] = $v;
                }
                array_push($json,$dt);
            }
            return $json;
        } catch (\Exception $e) {
            return false;
        }
    }

}