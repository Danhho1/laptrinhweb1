@extends('dashboard')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>

<div class="container">
    <h3>List of users</h3>
    <div class="row justify-content-center">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>descrption</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product->users as $user)
                <tr>
                    <th>{{$user->id}}</th>
                    <th>{{$user->name}}</th>
                    <th>{{$user->image}}</th>
                    <th>{{$user->price}}</th>
                    <th>{{$user->quantity}}</th>
                    <th>{{$user->descrption}}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection