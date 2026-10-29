<x-layout title="Create Build">
    @auth
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
        <h1 class="font-bold text-2xl mb-4">Add your build to our site!</h1>
    <form method="POST" action="{{route('builds-store')}}" enctype="multipart/form-data">
        <div>
            <label class="font-bold" for="title">Title</label>
            <input class="border-green-700 p-2" type="text" id="title" name="title" required value="{{old('title')}}">
            @error ('title')
            <span class="text-green-800">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label class="font-bold" for="description">Description</label>
            <textarea class="border-green-700 p-2" id="description" name="description"
                      required>{{old('description')}}</textarea>
            @error ('description')
            <span class="text-green-700">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label class="font-bold" for="image_url">Image URL</label>
            <input type="file" id="image_url" name="image_url" required value="{{old('image_url')}}">
        </div>
        <div>
            <label class="font-bold" for="category">Category</label>
            <select id="category" name="category" class="w-full border rounded-lg p-2" required>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                <option value="new">Add new category</option>
            </select>
        </div>
        <div>
            <button type="submit" class="p-2 bg-green-700 text-white rounded-xl hover:bg-green-600">Create Build
            </button>
        </div>
    </form>
    </div>
    @else
        <p>You need to log in to post a build</p>
    @endif
</x-layout>
