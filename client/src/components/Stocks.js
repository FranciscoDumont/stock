import './Stocks.css'
import StockItem from './StockItem';
import { useEffect, useState } from 'react';
import stockdb from '../stockdb.json'


function Stocks(props) {
  const [stocks, setStocks] = useState(stockdb);

  useEffect(() => {
    console.log(stocks)
  }, []);


  return (
    <div className="expenses">
      {stocks.map(stock => {
        return <StockItem stock={stock}/>
      })}
    </div>
  );
}

export default Stocks;
