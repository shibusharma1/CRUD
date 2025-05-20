<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Blog Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .form-container {
      max-width: 600px;
      margin: 40px auto;
      padding: 25px;
      border-radius: 15px;
      background-color: #f9f9f9;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-title {
      color: #092448;
      font-weight: bold;
      text-align: center;
      margin-bottom: 25px;
    }
    .btn-theme {
      background-color: #092448;
      color: white;
    }
    .btn-theme:hover {
      background-color: #0b355f;
    }
  </style>
</head>
<body>

@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
<div class="container">
  <div class="form-container">
    <h2 class="form-title">Create a Blog Post</h2>
    <form action="{{  route('blog.store') }}" method="POST">
        @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Blog Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter blog title" required>
      </div>
      <div class="mb-3">
        <label for="author" class="form-label">Author Name</label>
        <input type="text" class="form-control" id="author" name="author" placeholder="Enter author name" required>
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" id="category" name="category" required>
          <option value="">-- Select Category --</option>
          <option value="Technology">Technology</option>
          <option value="Lifestyle">Lifestyle</option>
          <option value="Education">Education</option>
          <option value="Travel">Travel</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="content" class="form-label">Blog Content</label>
        <textarea class="form-control" id="content" name="contents" rows="6" placeholder="Write your blog content here..." required></textarea>
      </div>
      <button type="submit" class="btn btn-theme w-100">Publish Blog</button>
    </form>
  </div>
</div>

</body>
</html>
