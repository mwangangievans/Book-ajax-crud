<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Book</title>
  </head>
  <body>
    <div class="container">
        <h2 class="text-center">Book Data</h2>
        <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#exampleModal" >add book</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                        @csrf
                    <form>
                        <div class="form-group">
                            <label for=" " class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" >
                        </div>
                            <div class="form-group">
                            <label for=" " class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" >
                        </div>
                            <div class="form-group">
                            <label for=" " class="form-label">NBN</label>
                            <input type="text" class="form-control" id="nbn" >
                        </div>
                            <div class="form-group">
                            <label for=" " class="form-label">Publisher</label>
                            <input type="text" class="form-control" id="publisher" >
                        </div>
                            <div class="form-group">
                            <label for=" " class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" >
                        </div>
                            <div class="form-group">
                            <label for=" " class="form-label">Year</label>
                            <input type="text" class="form-control" id="year" >
                        </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"  id="btnsave">Save changes</button>
            </div>
            </div>
        </div>
        </div>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">author</th>
                <th scope="col">nbn</th>
                <th scope="col">publisher</th>
                <th scope="col">country</th>
                <th scope="col">year</th>
                </tr>
            </thead>
<tbody id="data">

</tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<script>
    const tbody = document.querySelector('#data');
    const getData = () => {
      //fetch function
      fetch("/data",{
//method
                method: "GET",
      })
      .then((res)=> res.json())
      .then((data) =>{

          var i;
          for( i=0; i<data.length; i++){
              const tr = document.createElement('tr');
              tr.innerHTML = `
              <td>${data[i].id}</td>
            <td>${data[i].name}</td>
              <td>${data[i].author}</td>
              <td>${data[i].nbn}</td>
              <td>${data[i].publisher}</td>
              <td>${data[i].country}</td>
              <td>${data[i].year}</td>

              `;
                tbody.appendChild(tr);
          }
      });


    }
    window.onload = () => {
    getData();
};

    const name = document.querySelector('#name');
    const author = document.querySelector('#author');
    const nbn = document.querySelector('#nbn');
    const publisher = document.querySelector('#publisher');
    const country = document.querySelector('#country');
    const year = document.querySelector('#year');

    //getting save button
    const btnsave = document.querySelector('#btnsave');

    btnsave.addEventListener("click", (e) =>{
        fetch("books",{
        //method
        body: JSON.stringify({
            name: name.value,
            author: author.value,
            nbn: nbn.value,
            country: country.value,
            publisher: publisher.value,
            year: year.value
        }),
                    method: "POST",
                    })
                    .then((res)=> res.json())
                    .then((data) =>{
                        console.log("send");
                    });
    });
</script>
  </body>
</html>

