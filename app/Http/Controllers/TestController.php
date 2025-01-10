<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Faker\Factory;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Repositories\Card\CardRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public $cart;
    public function __construct(CardRepository $cart)
    {
        $this->cart = $cart;

    }
    
  private function format($date){
    return date_format($date, "Y-m-d H-i-s");
   }
    public function index(){


    }
}
