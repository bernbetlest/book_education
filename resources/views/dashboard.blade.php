<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Dashboard - BookEdukasi</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">BookEdukasi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about">About Us</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">All Products</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="#!">Featured Books</a></li>
                            <li><a class="dropdown-item" href="#!">Discounts</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#!"></a></li>
                    <li class="nav-item" id="adminPanelTab"><a class="nav-link" href="login">Log Out</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!"></a></li>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Welcome to the Admin Panel</h1>
                <p class="lead fw-normal text-white-50 mb-0">Manage Your Bookstore With Ease</p>
            </div>
        </div>
    </header>

    <!-- Admin Panel Section -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="fw-bolder text-center mb-4">Admin Panel</h2>
                    <!-- Form for adding new book -->
                    <form id="addBookForm">
                        <div class="mb-3">
                            <label for="title" class="form-label">Book Title:</label>
                            <input type="text" class="form-control" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price:</label>
                            <input type="text" class="form-control" id="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="ratings" class="form-label">Ratings:</label>
                            <input type="text" class="form-control" id="ratings" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Book</button>
                    </form>
                    <hr>
                    <!-- Table for displaying existing books -->
                    <h3 class="fw-bolder text-center mb-4">Existing Books</h3>
                    <table class="table" id="bookTable">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Ratings</th>
                                <th scope="col">Price</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Existing books will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container"><p class="m-0 text-center text-white">Copyright &copy; BookEdukasi 
        <script>document.write(new Date().getFullYear())</script></p></div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- JavaScript for Admin Panel functionality -->
    <script>
        // Define an array to store existing books (for demonstration purposes)
        let books = [];

        // Function to add a new book
        function addBook() {
            const title = document.getElementById('title').value;
            const price = document.getElementById('price').value;
            const ratings = parseFloat(document.getElementById('ratings').value); // Parse ratings as float

            // Add the book to the array
            books.push({ title, price, ratings });

            // Call a function to update the table
            updateBookTable();

            // Reset the form fields
            document.getElementById('title').value = '';
            document.getElementById('price').value = '';
            document.getElementById('ratings').value = '';
        }

        // Function to update the book table
        function updateBookTable() {
    const tableBody = document.getElementById('bookTable').getElementsByTagName('tbody')[0];
    tableBody.innerHTML = '';

    books.forEach((book, index) => {
        const row = tableBody.insertRow();

        const titleCell = row.insertCell(0);
        titleCell.textContent = book.title;

        const ratingCell = row.insertCell(1);
        ratingCell.innerHTML = generateStars(book.ratings);

        const priceCell = row.insertCell(2);
        priceCell.textContent = book.price;

        const actionsCell = row.insertCell(3);
        const editButton = document.createElement('button');
        editButton.textContent = 'Edit';
        editButton.classList.add('btn', 'btn-primary', 'me-2');
        editButton.addEventListener('click', () => editBook(index));
        actionsCell.appendChild(editButton);

        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Delete';
        deleteButton.classList.add('btn', 'btn-danger');
        deleteButton.addEventListener('click', () => deleteBook(book.title));
        actionsCell.appendChild(deleteButton);
    });
}

        // Function to generate star icons based on ratings
        function generateStars(ratings) {
            const fullStars = Math.floor(ratings); // Number of full stars
            const halfStar = ratings % 1 !== 0; // Check if there's a half star
            let stars = '';
            // Append full stars
            for (let i = 0; i < fullStars; i++) {
                stars += '<i class="bi bi-star-fill text-warning"></i>';
            }
            // Append half star if present
            if (halfStar) {
                stars += '<i class="bi bi-star-half text-warning"></i>';
            }
            return stars;
        }
// Function to edit a book
function editBook(index) {
    const book = books[index];
    const newTitle = prompt('Enter new title:', book.title);
    const newPrice = prompt('Enter new price:', book.price);

    // Update book details if user entered values and confirmed
    if (newTitle !== null && newPrice !== null) {
        books[index].title = newTitle;
        books[index].price = newPrice;
        updateBookTable(); // Update the table with new data
    }
}
        // Function to delete a book
        function deleteBook(title) {
            books = books.filter(book => book.title !== title); // Filter out the book with given title
            updateBookTable();
        }

        // Add event listener for the form submission
        document.getElementById('addBookForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            addBook();
        });

        // Initial population of the book table (for demonstration purposes)
        // You can replace this with your own data retrieval logic
        books = [
            { title: 'Little Women', price: 'Rp120.000', ratings: 4.5 },
            { title: 'The Maze Runner', price: 'Rp80.000', ratings: 4.5 },
            { title: 'The Book Thief', price: 'Rp120.000', ratings: 5 },
            { title: 'Percy Jackson and The Olympians: The Lightning Thief', price: 'Rp80.000', ratings: 4.5 },
            { title: 'The Hate U Give', price: 'Rp105.000', ratings: 4.5 },
            { title: 'Pride and Prejudice', price: 'Rp110.000', ratings: 4.5 },
            { title: 'Hujan', price: 'Rp70.000', ratings: 4.5 },
            { title: 'Laut Bercerita', price: 'Rp80.000', ratings: 4.5 }
        ];
        updateBookTable();
    </script>
</body>
</html>
