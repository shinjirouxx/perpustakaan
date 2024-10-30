<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        .center
        {
            text-align: center;
            margin: auto;
            width: 80%;
            border: 1px solid white;
            margin-top: 60px
        }

        th
        {
            background-color: rgb(243, 202, 64);
            text-align: center;
            color: black;
            font-size: 20px;
            font-weight: bold;
            padding: 10px;
        }

        tr
      {
          border: 1px solid white;
          padding: 10px
      }

        .img_book
      {
        width: 150px;
        height: auto;
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
            <table class="center">
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Book Title</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Updated At</th>
                    <th>Book Image</th>
                    <th></th>
                    <th></th>
                </tr>

                @foreach($data as $data)

                <tr>
                    <td>{{$data->user->name}}</td>
                    <td>{{$data->user->email}}</td>
                    <td>{{$data->user->phone}}</td>
                    <td>{{$data->book->title}}</td>
                    <td>{{$data->book->quantity}}</td>
                    <td>{{$data->status}}</td>
                    <td>{{$data->updated_at}}</td>
                    <td>
                        <img class="img_book" src="book/{{$data->book->book_img}}" alt="">
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{url('approve_books', $data->id)}}">Approve</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{url('reject_books', $data->id)}}">Reject</a>
                    </td>
                </tr>

                @endforeach
            </table>
            </div>
        </div>
    </div>
    
    @include('admin.footer')
  </body>
</html>