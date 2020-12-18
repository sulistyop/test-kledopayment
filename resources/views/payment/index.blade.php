@extends('layout.app')


@section('content')

<div class="container m-5">
 
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container">
        <a href="/addpayment" class="btn btn-primary">Tambah</a>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Payment</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <form action="/api/payment" method="post">
          @csrf
          @method('delete')
        @foreach ($payment as $key => $item)

          <tr>
            <th scope="row">{{ $key + $payment->firstItem()}}</th>
            <td>{{$item->payment_name}}</td>
            <td>
                <input type="checkbox" name="pilih[]" value="{{$item->id}}">	
              </td>
            </tr>
            @endforeach
            {{-- <form action="/api/payment/{{$item->id}}" method="post" class="d-inline">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger btn-circle">Delete</button>
            </form>  --}}
          </tbody>
        </table>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
      {{$payment->links()}}
</div>
@endsection