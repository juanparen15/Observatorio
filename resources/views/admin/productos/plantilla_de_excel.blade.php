<table>
    <thead>
        <tr>
            <th>NÚMERO DE CONSECUTIVO</th>
            <th>PLAN DE DESARROLLO</th>
            <th>SECTOR</th>
            <th>PROGRAMA</th>
            <th>SUB PROGRAMA</th>
            <th>TIPO DE PRODUCTO</th>
            <th>UNIDAD DE MEDIDA</th>
            <th>UNIDAD DE MEDIDA</th>
            <th>TIPO DE PRODUCTO</th>
            <th>USUARIO</th>
            <th>CODIGO DEL PRODUCTO</th>
            <th>NOMBRE DEL PRODUCTO</th>
            <th>INDICADOR BASE</th>
            <th>META CUATRIENIA</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>{{ $producto->id }}</td>
            <td>ALCALDIA MUNICIPAL DE PUERTO BOYACA, BOYACA</td>
            <td>{{ $producto->plandesarrollo->nomPD }}</td>
            <td>{{ $producto->sector->nomS }}</td>
            <td>{{ $producto->programa->nomProg }}</td>
            <td>{{ $producto->subprograma->nomSP }}</td>
            <td>{{ $producto->tipoproducto->nomProd }}</td>
            <td>{{ $producto->unidadmedida->nomUMed }}</td>
            <td>{{ $producto->user->area->nomA }}</td>
            <td>{{ $producto->codProd }}</td>
            <td>{{ $producto->nomProd }}</td>
            <td>{{ $producto->iB }}</td>
            <td>{{ $producto->mCuatrienia }}</td>
            <td>{{ $producto->user->email }}</td>
            <td>{{ $producto->user->name }}</td>
            <td>{{ $producto->updated_at }}</td>
            <td>

                {{-- @foreach ($plan->productos as $producto)
                {{$producto->id}},
                @endforeach --}}

            </td>
        </tr>

    </tbody>
</table>
