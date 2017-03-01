
function printCal(){
  var day_of_week = new Array('CN','T2','T3','T4','T5','T6','T7');
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

  var TR_start = '<TR>';
  var TR_end = '</TR>';
  var highlight_start = '<TD><TABLE ><TR><TD><B><CENTER>';
  var highlight_end   = '</CENTER></TD></TR></TABLE></B>';
  var TD_start = '<TD><CENTER>';
  var TD_end = '</CENTER></TD>';

  cal =  '<div class="table-responsive"><TABLE class="table table-bordered marin-bot-1px" ><TR><TD>';
  cal += '<TABLE class="table marin-bot-1px">' + TR_start;
  cal += '<TD COLSPAN="' + DAYS_OF_WEEK + '" BGCOLOR="#EFEFEF"><CENTER><B>';
  cal += month_of_year[month]  + '   ' + year + '</B>' + TD_end + TR_end;
  cal += TR_start;
  for(index=0; index < DAYS_OF_WEEK; index++)
  {
    if(weekday == index)
    cal += TD_start + '<B>' + day_of_week[index] + '</B>' + TD_end;
    else
    cal += TD_start + day_of_week[index] + TD_end;
  }

  cal += TD_end + TR_end;
  cal += TR_start;
  for(index=0; index < Calendar.getDay(); index++)
  cal += TD_start + '  ' + TD_end;
  for(index=0; index < DAYS_OF_MONTH; index++)
  {
    if( Calendar.getDate() > index )
    {
      // RETURNS THE NEXT DAY TO PRINT
      week_day =Calendar.getDay();

      // START NEW ROW FOR FIRST DAY OF WEEK
      if(week_day == 0)
      cal += TR_start;

      if(week_day != DAYS_OF_WEEK)
      {
        var day  = Calendar.getDate();

        // HIGHLIGHT NGAY HIEN TAI
        if( today==Calendar.getDate() )
        cal += highlight_start + day + highlight_end + TD_end;

        // PRINTS DAY
        else
        cal += TD_start + day + TD_end;
      }
      if(week_day == DAYS_OF_WEEK)
        cal += TR_end;
    }
    Calendar.setDate(Calendar.getDate()+1);
  }// end for loop

  cal += '</TD></TR></TABLE></TABLE></div>';
  return cal;
}


