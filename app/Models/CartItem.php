<?
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_items'; 
    protected $fillable = ['product_id', 'product_name', 'price', 'image_url', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    
   

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
