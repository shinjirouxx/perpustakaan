<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
      .book_label
      {
        color: white;
        padding: 30px;
        font-size: 30px;
        font-weight: bold;
      }

      .book_deg
      {
        text-align: center;
        margin: auto;
      }

      .book_div
      {
        padding: 15px;
        color: black;
      }

      label
      {
        display: inline-block;
        width: 200px;
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">

    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="book_deg">
                <h1 class="book_label">Update Book</h1>

                <form action="{{url('update_book', $data->id)}}" method="Post" enctype="multipart/form-data">
                  @csrf
                    <div class="book_div">
                        <label>Book Title</label>
                        <input type="text" name="title" value="{{$data->title}}">
                    </div>

                    <div  class="book_div">
                        <label>Author Name</label>
                        <input type="text" name="author_name" value="{{$data->author_name}}">
                    </div>

                    <div class="book_div">
                        <label>Quantity</label>
                        <input type="number" name="quantity" value="{{$data->quantity}}">
                    </div>

                    <div class="book_div">
                        <label>Description</label>
                        <textarea name="description">{{$data->description}}</textarea>
                    </div>

                    <div class="book_div">
                        <label>Category</label>
                        <select name="category">
                          <option value="{{$data->category_id}}">{{$data->category->cat_title}}</option>

                          @foreach($category as $category)
                          <option value="{{$category->id}}">{{$category->cat_title}}</option>
                          @endforeach
                        </select>

                        <div class="book_div">
                          <label>Current Author Image</label>
                          <img style="width: 100px; border-radius: 50%; margin: auto;" src="/pfp/{{$data->author_img}}">
                        </div>

                        <div class="book_div">
                          <label>Change Author Image</label>
                          <input type="file" name="author_img">
                        </div>

                        <div class="book_div">
                          <label>Current Book Image</label>
                          <img style="width: 100px; margin: auto;" src="/book/{{$data->book_img}}">
                        </div>

                        <div class="book_div">
                          <label>Change Book Image</label>
                          <input type="file" name="book_img">
                        </div>

                        <input type="submit" class="btn btn-info" value="Update Book">
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
    
    @include('admin.footer')
  </body>
</html>