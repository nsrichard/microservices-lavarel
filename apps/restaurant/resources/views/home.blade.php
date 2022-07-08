<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<title>Restaurant</title>

<!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
        
    <main>
    
        <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold">Restaurant</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Presione el boton para solicitar un nuevo plato</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="{{ route('order') }}" class="btn btn-primary btn-lg px-4 gap-3">Solicitar</a>
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-lg px-4">Actualizar info.</a>
                </div>
            </div>
        </div>

        <div class="b-example-divider"></div>

        <div class="row">
            <div class="col">
                <h3>Órdenes/estados</h3>
                <ul>
                @foreach ($orders as $order)
                    <li>{{ $order->created_at }} - {{ $order->menu->name }}
                        [<span class="{{ $order->status=='complete'?'text-success':'text-warning' }}">{{ $order->status }}</span>]
                    </li>            
                @endforeach
                </ul>
            </div>
            <div class="col">
                <h3>Compras/mercado</h3>
                <ul>
                @foreach ($buys as $buy)
                    <li>{{ $buy->created_at }} - {{ $buy->name }} ({{ $buy->quantity }})
                    </li>            
                @endforeach
                </ul>
            </div>
            <div class="col">
                <h3>Inventario/Stocks</h3>
                <ul>
                @foreach ($stocks as $stock)
                    <li>{{ $stock->name }} - ({{ $stock->quantity }})
                    </li>            
                @endforeach
                </ul>
            </div>
            <div class="col">
                <h3>Menú/Ingredientes</h3>
                <ul>
                @foreach ($menu as $item)
                    <li>{{ $item->name }}
                        <ul>
                            @foreach ($item->recipes as $recipe)
                            {{ $recipe->ingredient }} ({{ $recipe->quantity }})
                            @endforeach
                        </ul>
                    </li>            
                @endforeach
                </ul>
            </div>
        </div>

    </main>
</body>
</html>
    