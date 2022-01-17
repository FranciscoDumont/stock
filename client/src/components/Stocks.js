import './Stocks.css'
import StockItem from './StockItem';
import { useEffect, useState } from 'react';


function Stocks(props) {
  const [error, setError] = useState(null);
  const [isLoaded, setIsLoaded] = useState(false);
  const [stocks, setStocks] = useState([]);

  useEffect(() => {
    fetch('http://127.0.0.1:8000/api/stocks')
    .then(response => response.json())
    .then(
      (result) => {
        setIsLoaded(true);
        setStocks(result)
      },
      (error) => {
        setIsLoaded(true);
        setError(error);
      }
    );
  }, []);


  if (error) {
    return <div>Error: {error.message}</div>;
  } else if (!isLoaded) {
    return <div>Loading...</div>
  } else {
    return (
      <div className="expenses">
        {stocks.map(stock => {
          return <StockItem key={stock.id} stock={stock}/>
        })}
      </div>
    );
  }
}

export default Stocks;
