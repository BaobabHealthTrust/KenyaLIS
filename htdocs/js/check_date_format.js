/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function dt_format_check(in_date, type_date)
{
    var dash_dob_yy = in_date.indexOf("-");
    var dash_dob_mm = in_date.indexOf("-", 5);
     if ((dash_dob_yy != 4) || (dash_dob_mm != 7))
            { 
                alert("Wrong "+type_date+ " format. Please use this date format: YYYY-MM-DD");
                return false;
            }else
            { return true; }
}