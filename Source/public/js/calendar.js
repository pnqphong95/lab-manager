function createCal()
{
    var day_of_week = new Array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
  var month_of_year = new Array('January','February','March','April','May','June','July','August','September','October','November','December');

  var Calendar = new Date();
  var year = Calendar.getFullYear();
  var month = Calendar.getMonth();  
    var today = Calendar.getDate();   
    var weekday = Calendar.getDay();

    var DAYS_OF_WEEK = 7;
    var DAYS_OF_MONTH = 31;
    var cal;

    Calendar.setDate(1);
  Calendar.setMonth(month);

  var TR_start = '<tr>';
    var TR_end = '</tr>';
    var highlight_start = '<td BGCOLOR="#6699ff"><b><center>';
    var highlight_end   = '</center></b></td>';
    var TD_start = '<td><center>';
    var TD_end = '</center></td>';

    cal =  '<table class="table"><tr><td>';
    cal += '<table class="table">' + TR_start;
    cal += '<td COLSPAN="' + DAYS_OF_WEEK + '" BGCOLOR="#EFEFEF"><center><b>';
    cal += month_of_year[month]  + '   ' + year + '</b>' + TD_end + TR_end;
    cal += TR_start;

    for(index=0; index < DAYS_OF_WEEK; index++)
    {


        if(weekday == index)
        {
          cal += TD_start + '<B>' + day_of_week[index] + '</B>' + TD_end;
        }

        else
        cal += TD_start + day_of_week[index] + TD_end;
    }

    cal += TD_end + TR_end;
    cal += TR_start;

    for(index=0; index < Calendar.getDay(); index++)
    {
      cal += TD_start + '  ' + TD_end;
    }

    for(index=0; index < DAYS_OF_MONTH; index++)
    {
        if( Calendar.getDate() > index )
        {
          week_day =Calendar.getDay();

          if(week_day == 0)
          {
            cal += TR_start;
          }

          if(week_day != DAYS_OF_WEEK)
          {

            var day  = Calendar.getDate();          
            if( today==Calendar.getDate() )
            {
              cal += highlight_start + day + highlight_end + TD_end;
            }
            else
            {
              cal += TD_start + day + TD_end;
            }
          }

          if(week_day == DAYS_OF_WEEK)
          {
            cal += TR_end;
        }

        }

        Calendar.setDate(Calendar.getDate()+1);

    }

    cal += '</table>';
    cal += '</td></tr></table>';
    return cal;
}