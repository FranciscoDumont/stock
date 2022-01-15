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

  return (
    <div className='expense-date'>
      <div className='expense-date__day'>{day}</div>
      <div className='expense-date__month'>{month}</div>
      <div className='expense-date__year'>{year}</div>
    </div>
  );
}

export default StockDate;
