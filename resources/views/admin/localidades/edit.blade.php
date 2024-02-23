@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row row-cols-1 pb-3">
            <div class="col">
                <div class="card">
                    <x-admin.forms.localidade type="edt" :users="$users" :tipolocalidades="$tipo_localidades"/>
                </div>
            </div>
        </div>
    </div>
@endsection