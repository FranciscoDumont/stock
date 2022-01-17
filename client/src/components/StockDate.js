import './StockDate.css'

function StockDate(props) {

  let date = props.date;
  let day;
  let month;
  let year;

  if (date) {
    date = new Date(date);
    day = date.toLocaleString('en-US', { day: '2-digit' });
    month = date.toLocaleString('en-US', { month: 'long' });
    year = date.getFullYear();
  } else {
    day = ''
    month = ''
    year = ''
  }

  // a and b are javascript Date objects
  function dateDiffInDays (a, b) {
    const _MS_PER_DAY = 1000 * 60 * 60 * 24;
    // Discard the time and time-zone information.
    const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
    const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

    return Math.floor((utc2 - utc1) / _MS_PER_DAY);
  }

  function statusColor (expiration) {
    const diff = dateDiffInDays(new Date(), new Date(expiration));
    let result;
    switch (true) {
      case diff > 3*4:
        result = "#2C82C9";
        break;
      case diff > 3*3:
        result = "#2CC990";
        break;
      case diff > 3*2:
        result = "#EEE657";
        break;
      case diff > 3*1:
        result = "#FCB941";
        break;
      case diff > 3*0:
        result = "#FC6042";
        break;
      default:
        result = "#242424";
    }
    return result;
  }

  let style = {
    background: statusColor(date) + 'AA',
    border: "3px solid" + statusColor(date),
    visibility: date ? 'visible' : 'hidden',
  }
  return (
    <div className="expense-date" style={style}>
      <div className='expense-date__day'>{day}</div>
      <div className='expense-date__month'>{month}</div>
      <div className='expense-date__year'>{year}</div>
    </div>
  );
}

export default StockDate;
