<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Contact;

class HomeController extends Controller
{
    public function makeAdmin()
    {
        // Cari user dengan ID 1
        $user = User::find(1);

        // Cek apakah role admin sudah ada, jika belum buat
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Assign role admin ke user
        $user->assignRole($role);

        return "User dengan ID 1 telah menjadi admin.";
    }
    // Method for the Home page
    public function index()
    {
        return view('index'); // Make sure the `index.blade.php` exists in the `resources/views` folder
    }

    // Method for the About page
    public function about()
    {
        return view('about'); // Make sure the `about.blade.php` exists in the `resources/views` folder
    }

    // Method for the Product page
    public function product()
    {
        // Get all products from the database
        $products = Product::paginate(10);

        // Pass the products data to the `cycle` view
        return view('cycle', compact('products'));
    }

    // Method for the Contact Us page
    public function contact()
    {
        return view('contact'); // Make sure the `contact.blade.php` exists in the `resources/views` folder
    }

    // Method for the Cart page
    public function cart()
    {
        $cart = session()->get('cart', []);
        $cartItems = collect($cart); // Mengubah array menjadi koleksi

        // Menghitung jumlah item dalam cart
        $cartItemCount = $cartItems->count();

        // Debug output
        dd($cartItemCount); // Memastikan bahwa nilai ini diteruskan ke view

        return view('cart', compact('cartItems', 'cartItemCount'));
    }



    // Show all products (can be used on the product listing page)
    public function showProducts()
    {
        $products = Product::paginate(10);
        return view('manage-products', compact('products'));
    }

    // Add product to the cart
    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        // Ambil cart pengguna yang sedang login
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

        // Periksa apakah produk sudah ada di cart
        $cartItem = CartItem::where('cart_id', $cart->id)
                            ->where('product_id', $productId)
                            ->first();

        if ($cartItem) {
            // Jika produk sudah ada, update jumlahnya
            $cartItem->quantity++;
            $cartItem->save();
        } else {
            // Jika produk belum ada, tambahkan ke cart
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => 1,
                'price' => $product->price
            ]);
        }

        return redirect()->route('cart.index');
    }

    // Show the Cart page
    public function showCart()
    {
        $cart = Cart::where('user_id', auth()->id())->first();
        $cart = Cart::where('user_id', auth()->id())->first();
        $cartItems = $cart ? $cart->items : collect();  // Gunakan collect() jika itu adalah array

        $cartItemCount = $cartItems->count();  // Menghitung jumlah item

        return view('cart', compact('cartItems', 'cartItemCount'));
    }
    
    // Remove product from the cart
    public function removeFromCart($productId)
    {
        // Ambil cart pengguna yang sedang login
        $cart = Cart::where('user_id', auth()->id())->first();

        if ($cart) {
            // Cari item di dalam cart
            $cartItem = CartItem::where('cart_id', $cart->id)
                                ->where('product_id', $productId)
                                ->first();

            // Hapus item jika ditemukan
            if ($cartItem) {
                $cartItem->delete();
            }
        }

        return redirect()->route('cart.index');
    }


    // Create a new product (form view)
    public function createProduct()
    {
        return view('crud'); // Ensure the view exists in resources/views/products/create.blade.php
    }

    // Store a new product in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'description' => 'nullable|string',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('products.manage')->with('success', 'Product created successfully.');
    }

    // Delete a product from the database
    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.manage')->with('success', 'Product deleted successfully.');
    }

    public function manageProducts()
    {
        $products = Product::all(); // Ambil semua produk dari database
        return view('crud', compact('products')); // Kirim data produk ke view 'crud.blade.php'
    }
    
    public function edit($id)
    {
        $product = Product::findOrFail($id); // Find the product by ID
        return view('edit-product', compact('product')); // Pass the product to the view for editing
    }

    // Update product information
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();

        return redirect()->route('products.manage')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.manage')->with('success', 'Product deleted successfully');
    }

    public function create()
    {
        return view('create');
    }

    public function showCyclePage()
    {
        $products = Product::paginate(10);
        return view('cycle', compact('products'));
    }

    public function checkout()
    {
        $cart = Cart::where('user_id', auth()->id())->first();
        $cartItems = $cart ? $cart->items : collect();
        $total = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('checkout', compact('cartItems', 'total'));
    }

    public function processCheckout(Request $request)
    {
    $validated = $request->validate([
        'address' => 'required|string|max:255',
    ]);

    // Proses pembayaran dan pemesanan (misalnya menyimpan ke tabel Orders, mengupdate stok, dll)

    // Menghitung total pembayaran dan menyusun pesan untuk WhatsApp
    $cart = Cart::where('user_id', auth()->id())->first();
    $cartItems = $cart ? $cart->items : collect();
    $total = $cartItems->sum(function ($item) {
        return $item->price * $item->quantity;
    });

    $orderDetails = "Pemesanan baru:\n";
    foreach ($cartItems as $item) {
        $orderDetails .= "Produk: {$item->product->name}, Jumlah: {$item->quantity}, Harga: Rp " . number_format($item->price, 0, ',', '.') . "\n";
    }
    $orderDetails .= "\nAlamat Pengiriman: {$request->address}\n";
    $orderDetails .= "Total Pembayaran: Rp " . number_format($total, 0, ',', '.');

    // Nomor WhatsApp tujuan
    $whatsAppNumber = '+6283861293242';  // Ganti dengan nomor WhatsApp yang sesuai
    $whatsAppMessage = urlencode($orderDetails);  // Mengubah pesan menjadi URL-encoded

    // Redirect ke WhatsApp API
    return redirect("https://wa.me/{$whatsAppNumber}?text={$whatsAppMessage}");
    }


    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'message' => 'required|string|max:1000',
        ]);

        Contact::create($request->all());
        return redirect()->back()->with('success', 'Your message has been submitted successfully.');
    }

    public function listContacts()
    {
        $contacts = Contact::all(); // Ambil semua data kontak
        return view('contacts-list', compact('contacts'));
    }

    public function deleteContact($id)
    {
        // Cari data kontak berdasarkan ID
        $contact = Contact::findOrFail($id);

        // Hapus data kontak
        $contact->delete();

        // Redirect kembali ke halaman daftar kontak dengan pesan sukses
        return redirect()->route('contact.list')->with('success', 'Contact has been deleted successfully.');
    }

    

    }


