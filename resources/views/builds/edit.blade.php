<x-layout title="edit {{$build->title}}">
    <style>
        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        form div {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
    </style>
    <div class="max-w-5xl align-middle mx-auto p-4">
        <h1 class="font-bold text-2xl mb-4">Edit {{$build->title}}</h1>
        <form method="POST" action="{{route('builds-update', $build->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label class="font-bold" for="title">Title</label>
                <input class="border-green-700 p-2" type="text" id="title" name="title" required
                       value="{{$build->title}}">
                @error ('title')
                <span class="text-green-800">{{$message}}</span>
                @enderror
            </div>
            <div>
                <label class="font-bold" for="description">Description</label>
                <textarea class="border-green-700 p-2" id="description" name="description"
                          required>{{$build->description}}</textarea>
                @error ('description')
                <span class="text-green-700">{{$message}}</span>
                @enderror
            </div>
            <div>
                <label class="font-bold" for="image_url">Image URL</label>
                <img src="{{ asset('storage/' . $build->image_url)}}" alt="{{$build->title}}"
                     class="w-44 h-44 object-cover rounded-xl mb-2">
                <p>You now have this image uploaded</p>
                <input type="file" id="image_url" name="image_url" value="{{$build->image_url}}">
            </div>
            {{--            <div>--}}
            {{--                <label class="font-bold" for="category">Category</label>--}}
            {{--                <input class="border-green-700 p-2" type="text" id="category" name="category"--}}
            {{--                       value="{{$build->category_id}}">--}}
            {{--                @error ('category')--}}
            {{--                <span class="text-green-700">{{$message}}</span>--}}
            {{--                @enderror--}}
            {{--            </div>--}}
            <div>
                <button type="submit" class="p-2 bg-green-700 text-white rounded-xl hover:bg-green-600">Update Build
                </button>
            </div>
        </form>
        <div>
            <form method="POST" action="{{route('builds-destroy', $build->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-2 bg-orange-900 text-white rounded-xl hover:bg-red-600">Delete Build
                </button>
            </form>
        </div>
    </div>
</x-layout>
