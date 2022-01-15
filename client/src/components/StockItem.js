import StockDate from './StockDate'
import './StockItem.css'

function StockItem(props) {

  const stock = props.stock;

  return (
    <div className="stock-item">
      <img className="stock-item__image"
           src={'https://picsum.photos/id/' + Math.floor(Math.random() * 1000) + '/200'} alt=""/>
      <StockDate date={stock.expiration}/>
      <div className="stock-item__description">
        <h2>{stock.product_id}</h2>
        <div className="stock-item__quantity">{stock.stock}</div>
      </div>
    </div>
  );
}

export default StockItem;