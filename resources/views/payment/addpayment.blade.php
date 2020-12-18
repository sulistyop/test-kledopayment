@extends('layout.app')


@section('content')
    <div class="container mt-4">
       <form action="/api/payment" method="post">
        @csrf
        @method('post')
        <div class="form-group">
            <label>Payment</label>
            <input type="text" name="payment_name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-5">Simpan</button>
       </form>
    </div>
@endsection