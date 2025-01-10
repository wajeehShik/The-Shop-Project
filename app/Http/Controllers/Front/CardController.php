<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Models\Product;
use App\Repositories\Card\CardRepository;
use Illuminate\Http\Request;

class CardController extends Controller
{protected $cart;

    public function __construct(CardRepository $cart)
    {
        $this->cart = $cart;

    }
    public function index()
    {
       return view('front.card', [
            'cart' => $this->cart,
        ]);
    }
    public function store(CardRequest $request)
    {

         $product = Product::findOrFail($request->post('product_id'));
        $this->cart->add($product, $request->post('qunatity')??1);
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Item added to cart!',
            ], 201);
        }
        alert()->success('card','add card success');
        return redirect()->route('front.card')
            ->with('success', 'Product added to cart!');
    }
    public function update(Request $request, $id)
    {
         //تزبيط ريكوست
         $request->validate([
            'quantity' => ['required', 'int', 'min:1'],
        ]);

       $data= $this->cart->update($id, $request->post('quantity'));
    $total=$this->cart->total();
    return[
        'product'=>$data,
        'total'=>$total,
    ];
    }
    public function destroy($id)
    {
        $this->cart->delete($id);
        
        return [
            'message' => 'Item deleted!',
        ];
    }

}
