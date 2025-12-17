<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']); // También se puede usar only
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->check()) {
            $productos = Product::orderBy('id', 'desc')->get(); // Orden descente (más nuevos primero) return 'sesion iniciada';

            return view('products.index', ['productos' => $productos, 'productosEliminados' => collect()]);
        } else {
            // Mis productos activos
            $productosUser = auth()->user()->products;
            // El resto de productos
            $productos = Product::where('user_id', '!=', auth()->user()->id)->get();
            // Productos eliminados del usuario
            $productosEliminados = Product::onlyTrashed()->where('user_id', auth()->user()->id)->get();
            return view('products.index', ['productos' => $productos, 'productosUser' => $productosUser, 'productosEliminados' => $productosEliminados]);
        }

        // dd($productos[0]->name);
        // cargar la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1 Validar los campos
        // 1A Definir reglas (imagen menor que 2mb, precio tipo numero,...)
        $rules = [
            'name' => 'required|string',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];

        // 1B Definir mensajes de error ('El campo precio debe ser numérico...')
        $messages = [
            'name.required' => 'El nombre de la Arepa es obligatorio.',
            'description.max' => 'Describe la Arepa, no me cuentes tu vida',
            'image.required' => ' Porfiiii sube una foto :)',
        ];
        $data = $request->all(); // $data['name'] en vez de $request->input()
        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            // volver con errores del validador y con la información que rellenó el usuario en el form
            // session()->flash('success', 'Todo bien, mentira');
            // session(['success' => 'todo bien']);//ojo, no es flash
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // TODO HA IDO BIEN
        // Preparar el file   8934578934573498573489534895734.jpg
        $file = $request->file('image');
        $fileExtension = $file->getClientOriginalExtension(); // png
        $imageName = Str::random(20).'.'.$fileExtension;
        $file->move(public_path('images/arepas'), $imageName);

        // Guardar
        $p = new Product();
        $p->name = $data['name'];
        $p->description = $data['description'];
        $p->price = $data['price'];
        $p->image = $imageName;
        /*$p->user_id = auth()->user()->id;
        $p->save(); // ORM Eloquent */
        auth()->user()->products()->save($p);

        // Alternativa SIN ELOQUENT
        /* Product::create([
             'name' => $data['name'],
             'description' => $data['description'],
             'price' => $data['price'],
             'image' => $imageName,
         ]);*/

        session()->flash('success', 'Arepa creada correctamente');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $p = Product::find($id);

        return view('products.show', ['producto' => $p]); // $producto llega a la view show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (auth()->check() && auth()->user()->id == $product->user_id || auth()->user()->isAdmin()) {
            // obtener datos de la arepa ( para el mensaje y para borrar la imagen)
            $imagen = $product->image;
            $nombre = $product->name;
            // borrar producto (activadas softDeletes, no se eliminará del todo)
            $product->delete();

            // redireccionar a la lista de productos (con un mensaje chuli)
            return redirect()->route('products.index')->with('success', "$nombre borrada con éxito");
        } else {
            return redirect()->route('products.index')->with('success', '¿Qué intentas, pipiolo?');
        }
    }

    public function kill(Product $product)
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            // obtener datos de la arepa ( para el mensaje y para borrar la imagen)
            $imagen = $product->image;
            $nombre = $product->name;
            // borrar producto
            $product->forceDelete();
            // borrar imagen
            $imagePath = public_path('images/arepas/'.$imagen);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // redireccionar a la lista de productos (con un mensaje chuli)
            return redirect()->route('products.index')->with('success', "$nombre borrada. Es irrecuperable");
        } else {
            return redirect()->route('products.index')->with('success', '¿Qué intentas, pipiolo?');
        }
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->find($id);

        if ($product && auth()->check() && (auth()->user()->id == $product->user_id || auth()->user()->isAdmin())) {
            $product->restore();
            return redirect()->route('products.index')->with('success', 'Arepa restaurada con éxito');
        }

        return redirect()->route('products.index')->with('success', 'No puedes restaurar esto, pipiolo');
    }
}
