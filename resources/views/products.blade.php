@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Product Form -->
        <form action="/products" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Product Name -->
            <div class="form-group">
                <label for="products" class="col-sm-3 control-label">Products</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="products-title" class="form-control">
                </div>
            </div>

            <!-- Add Products Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Products
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current products -->
@endsection
