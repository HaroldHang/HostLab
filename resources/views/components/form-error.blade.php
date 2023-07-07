@if($errors->any())
    <div class=" px-2 py-2 bg-red-200 border-b-5 text-xs rounded-lg  mx-auto mb-8">
        <ul class="text-center list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('message'))
    {{$slot}}
    <div class="px-2 py-2 bg-green-200 border-b-5 text-xs text-center rounded-lg mx-auto mb-8">
        {{session()->get('message')}}
    </div>
@endif