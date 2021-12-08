<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    @isset($pedido)
        <div id="root">
            <div>
                <strong>Recebemos seu pedido</strong>
            </div>
            <h1>Pedido #{{ $pedido->id }}</h1>
            <p>Cliente: <strong>{{ $pedido->cliente->nome }}</strong></p>
            <p>Forma de Pagamento: {{ $pedido->forma_pagamento }}</p>
            <p>Data: {{ $pedido->created_at }}</p>

            @php
                $total = 0;
            @endphp

            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedido->produtos as $item)
                        <tr>
                            @php
                                $total += $item->valor_total;
                            @endphp

                            <td>{{ $item->produto->nome }}</td>
                            <td>{{ $item->quantidade }}</td>
                            <td>R$ {{ number_format($item->valor_unitario, 2,',','.') }}</td>
                            <td>R$ {{ number_format($item->valor_total, 2,',','.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Total</td>
                        <td>R$ {{ $total }}</td>
                    </tr>
                </tfoot>
            </table>
            <div>
                Observação: {{ $pedido->observacao }}
            </div>
        </div>


    @endisset
</body>

</html>
