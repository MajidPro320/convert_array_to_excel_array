<?php

// ------------------------------------------------------------------------------
function convert_array_to_excel_array($data)
{
    // Declare array value of alphabet for use the column name excel sheet
    // Count of array is 26 item
    // Start array index is 1 by set key value
    $cell = [
        1 => "A", // 1
        2 => "B", // 2
        3 => "C", // 3
        4 => "D", // 4
        5 => "E", // 5
        6 => "F", // 6
        7 => "G", // 7        
        8 => "H", // 8
        9 => "I", // 9        
        10 => "J", // 10
        11 => "K", // 11
        12 => "L", // 12
        13 => "M", // 13
        14 => "N", // 14
        15 => "O", // 15
        16 => "P", // 16
        17 => "Q", // 17
        18 => "R", // 18
        19 => "S", // 19
        20 => "T", // 20
        21 => "U", // 21
        22 => "V", // 22
        23 => "W", // 23
        24 => "X", // 24
        25 => "Y", // 25
        26 => "Z", // 26
    ];
    //-------------------------------------------------------

    // check array data is set == true
    // sample of array:
    // $data = array( array('Day', 'Date', 'Usage'), array('Sun', '10/06/2019', 100), array('Mon', '11/06/2019', 120));
    if (!isset($data)) {
        return;
    }
    //---------------------------

    // Data Array is set. satrt convert data array to excel row array

    // Decalre array value for save convert data row
    $excel_arr = [];
    // Sample result -> $excel_arr = ('A1' => 'Day', 'B1' => 'Date', 'C1' => 'Usage',
    //                                'A2' => 'Sun', 'B2' => '10/06/2019', 'C2' => 100);
    // key array == column name.
    //----------------------------------------------------------------------------------

    for ($row = 0; $row <= count($data) - 1; $row++) {  // loop for all row
        $col_index = 1; // check count column of row        // reset column index
        foreach ($data[$row] as $value) {           // loop for all column of row
            // this value for set column name of excel sheet
            $col_name = "";
            // Description for create column name:
            // part col_name ==> Part1 -> colname  +  Part2 -> row index. 
            // for example  A1 or B23 - A == name and 1 is row index -  B == name and 23 is row index
            // $cell value is array of alphabet. Start index array is 1 - for example $cell[1] === 'A'
            // --------------------------------------------------------------------------------------
            // Start Create Column Name Or Key array

            if ($col_index < 26) {  // 26 is count of alphabet
                $col_name = $cell[$col_index] . (string)($row + 1);    // start array index == 0 so $row + 1
            } else {
                $col_name_alphabet1 = $cell[$col_index / 26];   // .Divide.           for example $col_index==28 result == 'A'
                $col_name_alphabet2 = $cell[$col_index % 26];   // .Divide remaining. for example $col_index==28 result == 'B'
                $col_name = ($col_name_alphabet1 . $col_name_alphabet2) . (string)($row + 1); // start array index == 0 so $row + 1
            }

            // End Create Column Name Or Key array
            // --------------------------------------------------------------------------------------

            // Add item to array by key => value.
            // key array == $col_name  and  value == $value
            // for example 'A1' => 'Day'
            $excel_arr += [$col_name => $value];
            // Ending assignment value

            // this value used for get value of $cell array
            $col_index++; // next index column of $cell array value

        } // End loop check column of row
    } // End loop Count($data) 

    return $excel_arr;  // result convert array of excel row
}
//----------------------------------------------------------------------------------

// For Example Convert Array
$data = array(
    array('Day', 'Date', 'Usage'),
    array('Sun', '23/06/2019', 100),
    array('Mon', '24/06/2019', 110),
    array('Tue', '25/06/2019', 120),
    array('Wen', '26/06/2019', 130),
    array('Thu', '27/06/2019', 140),
    array('Fri', '28/06/2019', 150),
    array('Sat', '29/06/2019', 160),
);

echo "<pre>";
var_dump(convert_array_to_excel_array($data));
echo "</pre>";
