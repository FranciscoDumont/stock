import StockDate from './StockDate'
import './StockItem.css'

function StockItem(props) {
  const stock = props.stock;

  const getImage = (url) => {
    return url ? url : '/default-avatar.png';
  }

  return (
    <div className="stock-item">
      <img className="stock-item__image" src={getImage(stock.product.image)} alt=""/>
      <div className="stock-item__description">
        <h2>{stock.product.name}</h2>
      </div>
      <StockDate date={stock.expiration}/>
      <div className="stock-item__quantity">{stock.stock}</div>
    </div>
  );
}

export default StockItem;