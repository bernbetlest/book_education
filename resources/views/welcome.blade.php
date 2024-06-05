<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Dashboardpage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
<!-- Navigation-->
@include('components.navbar')

        
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <!-- Include the Playfair Display font -->
            <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap">

            <!-- Apply Playfair Display to the header -->
            <style>
                body {
                    font-family: 'Playfair Display', serif;
                }
            
                /* Add the following styles for better alignment */
                #cartTable th:nth-child(3),
                #cartTable td:nth-child(3) {
                    text-align: center;
                }
            
                #cartTable .text-warning {
                    margin-bottom: 0; /* Remove bottom margin for the stars */
                }
            
                #cartTable .bi-star-fill,
                #cartTable .bi-star-half {
                    font-size: 1rem; /* Adjust the font size of stars */
                }
            </style>

            <!-- Updated header text with Playfair Display font -->
            <h1 class="display-4 fw-bolder">"There is no friend as loyal as a book."
                - <span class="quote">Ernest Hemingway</span></h1>
            <p class="lead fw-normal text-white-50 mb-0"></p>
        </div>
    </div>
</header>

        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
    <!-- Section for Recommended Books -->
    <section class="py-5">                
                <!-- Title for the product lists -->
                <h2 class="fw-bolder text-center mb-4">This Month's Recommended Books</h2>
                
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <!-- Book 1 Little Women-->
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://almabooks.com/wp-content/uploads/2016/10/9781847495877.jpg" alt="Book Cover 1" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Little Women</h5>
                                     <!-- Product reviews-->
                                     <div class="d-flex justify-content-center small text-warning mb-2">
                                      <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                     <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-half"></div>
                                     </div>                                      
                                    <!-- Product price-->
                                    Rp120.000
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="#" onclick="addToCart('Little Women', 'Rp120.000', 4.5)">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- Book 2 The Maze Runner-->
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Featured</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/en/d/db/The_Maze_Runner_cover.png" alt="Book Cover 2" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">The Maze Runner</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-half"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through">Rp100.000</span>
                                    Rp80.000
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <button class="btn btn-outline-dark mt-auto" onclick="addToCart('The Maze Runner', 'Rp80.000', 4.5)">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
            
<!--Book 3: The Book Thief -->
<div class="col mb-5">
    <div class="card h-100">
        <!-- Sale badge-->
        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Featured</div>                            
        <!-- Product image-->
        <img class="card-img-top" src="https://m.media-amazon.com/images/I/A1D+0JA2IJL._AC_UF1000,1000_QL80_.jpg" alt="Book Cover 1" />
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">The Book Thief</h5>
                <!-- Product reviews-->
                <div class="d-flex justify-content-center small text-warning mb-2">
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                </div>                                    
                <!-- Product price-->
                Rp120.000
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
                <!-- Add to Cart button with onclick attribute -->
                <a class="btn btn-outline-dark mt-auto" href="#" onclick="addToCart('The Book Thief', 'Rp120.000', 4.5)">Add to Cart</a>
            </div>
        </div>
    </div>
</div>
<!--Book 4: Percy Jackson and The Olympians: The Lightning Thief -->
<div class="col mb-5">
    <div class="card h-100">
        <!-- Sale badge-->
        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Featured</div>
        <!-- Product image-->
        <img class="card-img-top" src="https://m.media-amazon.com/images/I/91WN6a6F3RL._AC_UF1000,1000_QL80_.jpg" alt="Book Cover 2" />
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">Percy Jackson and The Olympians: The Lightning Thief</h5>
                <!-- Product reviews-->
                <div class="d-flex justify-content-center small text-warning mb-2">
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-half"></div>
                </div>
                <!-- Product price-->
                Rp80.000
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
                <!-- Add to Cart button with onclick attribute -->
                <a class="btn btn-outline-dark mt-auto" href="#" onclick="addToCart('Percy Jackson and The Olympians: The Lightning Thief', 'Rp80.000', 4.5)">Add to Cart</a> 
            </div>
        </div>
    </div>
</div>
<!--Book 5: The Hate U Give -->
<div class="col mb-5">
    <div class="card h-100">
        <!-- Product image-->
        <img class="card-img-top" src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1476284759i/32075671.jpg" alt="Book Cover 1" />
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->                
                <h5 class="fw-bolder">The Hate U Give</h5>
                <!-- Product reviews-->
                <div class="d-flex justify-content-center small text-warning mb-2">
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-half"></div>
                </div>                                    
                <!-- Product price-->
                Rp105.000
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
                <!-- Add to Cart button with onclick attribute -->
                <a class="btn btn-outline-dark mt-auto" href="#" onclick="addToCart('The Hate U Give', 'Rp105.000', 4.5)">Add to Cart</a>
            </div>
        </div>
    </div>
</div>
<!--Book 6: Pride and Prejudice -->
<div class="col mb-5">
    <div class="card h-100">
        <!-- Sale badge-->
        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Featured</div>                            
        <!-- Product image-->
        <img class="card-img-top" src="https://images.squarespace-cdn.com/content/v1/58c180edff7c50dd0e51a2ad/1596041993633-UW2GTN4JZP8XLPZKKXCJ/9781847493699.jpg" alt="Book Cover 1" />
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">Pride and Prejudice</h5>
                <!-- Product reviews-->
                <div class="d-flex justify-content-center small text-warning mb-2">
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-half"></div>
                </div>                                    
                <!-- Product price-->
                Rp110.000
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
                <!-- Add to Cart button with onclick attribute -->
                <a class="btn btn-outline-dark mt-auto" href="#" onclick="addToCart('Pride and Prejudice', 'Rp110.000', 4.5)">Add to Cart</a>
            </div>
        </div>
    </div>
</div>

<!--Book 7: Hujan -->
<div class="col mb-5">
    <div class="card h-100">
        <!-- Product image-->
        <img class="card-img-top" src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1451905281i/28446637.jpg" alt="Book Cover 1" />
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">Hujan</h5>
                <!-- Product reviews-->
                <div class="d-flex justify-content-center small text-warning mb-2">
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-half"></div>
                </div>                  
                <!-- Product price-->
                Rp70.000
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
                <!-- Add to Cart button with onclick attribute -->
                <a class="btn btn-outline-dark mt-auto" href="#" onclick="addToCart('Hujan', 'Rp70.000', 4.5)">Add to Cart</a>
                
            </div>
        </div>
    </div>
</div>

<!--Book 8: Laut Bercerita -->
<div class="col mb-5">
    <div class="card h-100">
        <!-- Product image-->
        <img class="card-img-top" src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1516602134i/36393774.jpg" alt="Book Cover 1" />
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder">Laut Bercerita</h5>
                <!-- Product reviews-->
                <div class="d-flex justify-content-center small text-warning mb-2">
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-half"></div>
                </div>                  
                <!-- Product price-->
                Rp80.000
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center">
                <!-- Add to Cart button with onclick attribute -->
                <a class="btn btn-outline-dark mt-auto" href="#" onclick="addToCart('Laut Bercerita', 'Rp80.000', 4.5)">Add to Cart</a>
            </div>
        </div>
    </div>
</div>
        </section>

 <!-- Section for Shopping Cart -->
 <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <!-- Title for the cart table -->
        <h2 class="fw-bolder text-center mb-4">Your Cart</h2>

        <!-- Cart Table -->
        <table class="table" id="cartTable">
            <thead>
                <tr>
                    <th scope="col">Book Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Ratings</th>
                    <th scope="col">Language</th>
                    <th scope="col">Actions </th>
                </tr>
            </thead>
            <tbody>
                <!-- Content will be dynamically added here based on user's actions -->
            </tbody>
        </table>
    </div>
                    <!-- Payment Button -->
                    <div class="text-center mt-4">
                    <button class="btn btn-primary btn-lg" id="paymentButton" onclick="handlePayment()" disabled>Proceed to Payment</button>
                </div>
            </div>
        </section>
    </div>
</section>      
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; BookEdukasi 2024</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Custom JavaScript for cart functionality -->
    <script>
function addToCart(bookTitle, price, ratings) {
    // Create a new row
    var table = document.getElementById("cartTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length);

    // Insert cells for Book Title, Price, Ratings, and Actions
        var cellTitle = newRow.insertCell(0);
        var cellPrice = newRow.insertCell(1);
        var cellQuantity = newRow.insertCell(2);
        var cellRatings = newRow.insertCell(3);
        var cellLanguage = newRow.insertCell(4);
        var cellActions = newRow.insertCell(5);

    // Set the values for Book Title, Price, and Ratings
    cellTitle.innerHTML = bookTitle;
    cellPrice.innerHTML = price;
    // Set the quantity to always display 1
    cellQuantity.innerHTML = 1;
    // Create a div for Ratings and append it to the Ratings cell
    var ratingsDiv = document.createElement("div");
    ratingsDiv.className = "d-flex justify-content-center small text-warning mb-2";

    // Dynamically generate star icons based on the provided ratings
    var fullStars = Math.floor(ratings);
    var halfStar = ratings % 1 !== 0;

    for (var i = 0; i < fullStars; i++) {
        var starIcon = document.createElement("div");
        starIcon.className = "bi-star-fill";
        ratingsDiv.appendChild(starIcon);
    }

    if (halfStar) {
        var halfStarIcon = document.createElement("div");
        halfStarIcon.className = "bi-star-half";
        ratingsDiv.appendChild(halfStarIcon);
    }

    // Append the ratingsDiv to the Ratings cell
    cellRatings.appendChild(ratingsDiv);

    // Create a dropdown for Language
    var languageSelect = document.createElement("select");
    languageSelect.innerHTML = '<option value="bahasa">Bahasa Indonesia</option><option value="english">English</option>';
    languageSelect.className = "form-select";

    // Append the dropdown to the Language cell
    cellLanguage.appendChild(languageSelect);
    
    // Add a "Remove" button with an event listener to trigger removeFromCart
    var removeButton = document.createElement("button");
    removeButton.innerHTML = "Remove";
    removeButton.className = "btn btn-outline-danger btn-sm";
    removeButton.addEventListener("click", function () {
        removeFromCart(newRow.rowIndex);
    });

    // Append the "Remove" button to the Actions cell
    cellActions.appendChild(removeButton);
    document.getElementById('paymentButton').disabled = false;
}
        var cartRows = document.getElementById("cartTable").getElementsByTagName("tr").length;
        if (cartRows <= 1) {
            // Disable the payment button if the cart is empty
            document.getElementById("paymentButton").disabled = true;
        }
    
 // Function to handle payment process
 function handlePayment() {
        alert('Proceeding to payment...');
        // Add your payment processing logic here
    }
        function removeFromCart(index) {
            // Implement the logic to remove the book from the cart
            // You may use JavaScript to manipulate the DOM and update the cart information
            // For simplicity, the sample row and index are provided here.
            // In a real application, you would dynamically generate and update these rows based on the user's cart.

            // Remove the row from the table
            document.getElementById("cartTable").deleteRow(index);
        }
    </script>
</body>

</html>
