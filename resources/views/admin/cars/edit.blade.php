@extends('admin.layouts.index')

@section('content')

<div class="card shadow">

    <div class="card-header">

        <h4>Edit Car</h4>

    </div>

    <div class="card-body">

        <form
            action="{{ route('admin.cars.update',$car) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            @include('admin.cars.form')

            <button
                class="btn btn-primary"
            >
                Update Car
            </button>

        </form>

    </div>

</div>

@endsection

@section('scripts')

<script>

document
.querySelector('input[name=image]')
.addEventListener('change', function(){

    let file = this.files[0];

    if(file){

        let reader = new FileReader();

        reader.onload = function(e){

            let preview =
            document.getElementById('preview');

            preview.src = e.target.result;

            preview.style.display = 'block';

        }

        reader.readAsDataURL(file);

    }

});

</script>

@endsection