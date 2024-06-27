let clock_timeStamp_cond = false;
let clock_timeStamp_currentDateActive = null;
let clock_timeStamp_x = 0.5;

function timeStamp(date) {
    if (clock_timeStamp_cond == false) {
        clock_timeStamp_currentDateActive = date;
        clock_timeStamp_cond = true;
    }
    clock_timeStamp_x++;
    let dateStr = moment(new Date(clock_timeStamp_currentDateActive)).add(clock_timeStamp_x, 'seconds').format('DD/MM/YYYY HH:mm:ss');
    return dateStr
}