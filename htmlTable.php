<?php

class htmlTable {
    public static function generateTableFromMultiArray($arr) {
        $tableSet = '<table border="1"cellpadding="10">';

        foreach ($arr as $row =>$innerArray) {
            $tableSet .= '<tr>';
            foreach ($innerArray as $innerrow => $value) {
                $tableSet .= '<th>' . $innerrow . '</th>';

            }
            $tableSet .= '</tr>';
            break;
        }
        foreach ($arr as $row =>$innerArray) {
            $tableSet .= '<tr>';
            foreach ($innerArray as $innerrow => $value) {
                $tableSet .= '<td>' . $value . '</td>';
            }
            $tableSet .= '</tr>';
        }
        $tableSet .= '</tr></table><hr>';
        return $tableSet;

    }
    public static function generateTableFromOneRecord($innerArray) {
        $tableSet = '<table border="1" cellpadding="10"><tr>';

        $tableSet .= '<tr>';
        foreach ($innerArray as $innerrow => $value) {
            $tableSet .= '<th>' . $value . '</th>';
        }
        $tableSet .= '</tr>';

        foreach($innerArray as $value) {
            $tableSet .= '<td>' . $value . '</td>';
        }
        $tableSet .= '</tr></table><hr>';
        return $tableSet;
    }
}

?>