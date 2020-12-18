@extends('layout.app')


@section('content')
    <div class="container mt-4">
       <form action="/create" method="post">
        @csrf
        @method('post')
        <div class="form-group">
            <label>Payment</label>
            <input type="text" name="payment_name" class="form-control @error('payment_name') is-invalid @enderror" id="payment_name">
            @error('payment_name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-5">Simpan</button>
       </form>
    </div>
@endsection