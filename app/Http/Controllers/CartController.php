<?php

namespace App\Http\Controllers;

use App\Helper\Cart;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Inertia\Inertia;


class CartController extends Controller
{
    public function view(Request $request, Product $product){
        $user = $request->user() ; 
        //Si l'utilisateur est authentifier on effectue ce traitement 
        
        if($user){
            $cartItems = CartItem::where('user_id', $user->id)->get() ; 
            $userAddress = UserAddress::where('user_id', $user->id)->get() ; 

            if($cartItems->count() > 0){
                return Inertia::render('User/CartList', [
                    'cartitems' => $cartItems,
                    'userAdress' => $userAddress 
                ]) ; 
            }
        }
        //Si l'utilisateur n'est pas authentifier on fait appel à notre helper 
        //Notre helper nous permet de travailler avec les cookies 
        else 
        {
            //Si il n'est pas authentifier on fait appel à cette fonction de notre helper 
            $cartItems = Cart::getCookieCartItems() ; 
            if(count($cartItems) > 0){
                $cartItems = new CartResource(Cart::getProductsAndCartItems()) ;
                return Inertia::render('User/CartList', [
                    'cartItems' => $cartItems
                ]) ;


            } else {
                return redirect()->back() ; 
            }
        }
        

    }

    public function store(Request $request, Product $product) {
        $quantity = $request->post('quantity', 1) ; 
        $user = $request->user() ; 
        //Si l'utilisateur est authentifier alors 
        if($user){
            $cartItem = CartItem::where(['user_id' => $user->id, 'product_id' => $product->id])->first() ;
            if($cartItem){
                $cartItem->increment('quantity') ; 
            }else{
                CartItem::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'quantity' => 1,
                ]) ;
            }

        }else{
           $cartItems = Cart::getCookieCartItems() ; 
           $isProductExists = false ; 
           foreach($cartItems as $item){
              //Si le produits obtenue dans les cookie est egale au produit reçu lors de traitement du bouton 
            if($item['product_id'] === $product->id ){

                $item['quantity'] += $quantity ; 
                $isProductExists = true ; 
                break ; 

            }
            // On poursuit le traitement pour le foreach

           }
    // 
           if(!$isProductExists){
              $cartItems[] = [
                  'user_id' => null,
                  'product_id' => $product->id,
                  'quantity' => $quantity,
                  'price' => $product->price,
              ];
           }
           Cart::setCookieCartItems($cartItems) ; 

        }

        return redirect()->back()->with('success', 'Cart added succesfully') ; 
       
    }

    public function update (Request $request, Product $product){
        $quantity = $request->integer('quantity') ; 
        $user =  $request->user()  ; 
        if($user){
            CartItem::where(['user_id' => $user->id, 'product_id' => $product->id])->update(['quantity' => $quantity]) ; 

        } else {
            $cartItems = Cart::getCookieCartItems() ; 
            foreach($cartItems as &$item){
                if($item['product_id'] === $product->id){
                    $item['quantity'] = $quantity ; 
                    break ;
                }

            }
            Cart::setCookieCartItems($cartItems) ;

        }

        return redirect()->back() ; 

    }

    public function delete(Request $request, Product $product) {

        $user = $request->user() ;
        if($user){
            CartItem::query()->where(['user_id' => $user->id, 'product_id' => $product->id])->first()?->delete() ;
            if(CartItem::count() <= 0){
                return redirect()->route('user.home')->with('info', 'your cart is empty') ;
            } else {
                return redirect()->back()->with('success','item removed successfully') ; 
            }

        } 
        // Si ce n'est pas un utilisateur 
        else {
            $cartItems = Cart::getCookieCartItems() ; 
            foreach($cartItems as $i => &$item){
                if($item['product_id'] === $product->id){
                array_splice($cartItems, $i, 1);
                break ;
                }
                 
            }
            Cart::setCookieCartItems($cartItems) ;
            if(count($cartItems) <= 0){
                return redirect()->route('user.home')->with('info', 'Your cart is empty') ;
            } else {
                return redirect()->back()->with('success', 'item removed succesfully') ; 
            }

        }

    }    

}
