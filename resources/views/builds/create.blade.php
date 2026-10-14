<x-layout title="Create Build">
    <h1>Add your build to our site!</h1>
    <form method="POST" action="{{route('builds-store')}}" enctype="multipart/form-data">
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required value="{{old('title')}}">
            @error ('title')
            <span class="text-green-800">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{old('description')}}</textarea>
            @error ('description')
            <span class="text-green-700">{{$message}}</span>
            @enderror
        </div>
        <div>
            <label for="image_url">Image URL</label>
            <input type="file" id="image_url" name="image_url" value="{{old('image_url')}}">
        </div>
        <div>
            <label for="category">Category</label>
            <input type="text" id="category" name="category" value="{{old('category')}}">
            @error ('category')
            <span class="text-green-700">{{$message}}</span>
            @enderror
        </div>
        <div>
            <button type="submit" class="p-2 bg-green-700 text-white rounded-xl hover:bg-green-600">Create Build
            </button>
        </div>
    </form>
</x-layout>
