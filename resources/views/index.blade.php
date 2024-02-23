@extends('layouts/app')

<div class="container mt-4">
    <div class="row">
        <div class="col-8">
            <table class="table">
                <thead class="table-dark">
                    <th>Localidade</th>
                    <th>Centro De Custo</th>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($localidades); $i++)
                        <tr>
                            <td>{{ $localidades[$i]->nome }}</td>
                            <td>{{ $centro_de_custo[$i]->nome }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
