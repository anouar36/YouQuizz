<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">Brand Name</span>
                    </a>
                </li>

                <li>
                    <a href="{{ asset('admin/dashboard') }}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ asset('admin/users') }}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                        <ion-icon name="extension-puzzle-outline"></ion-icon>                       
                     </span>
                        <span class="title">Quizz</span>
                    </a>
                </li>
                <li>
                    <a href="{{ asset('/question/index') }}">
                        <span class="icon">
                        <ion-icon name="book-outline"></ion-icon>                      
                      </span>
                        <span class="title">Question</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Questions List</h2>
                        <a href="#" class="btn" id="ajoutQuizzBtn">Ajout Quizz</a>
                    </div>
                    
                    <!-- New Quiz Form (hidden by default) -->
                    <form id="newQuizForm" action="{{ route('quizz.store') }}" method="POST">
                    @csrf
                    <div class="quiz-form" id="quizForm" style="display:none;">
                           
                            <input type="text" name="quiz_name" placeholder="Enter Quiz Name" required>
                            <button type="submit">Submit</button>
                            
                      
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Select</td>
                                <td>Question</td>
                                <td>Difficulty</td>
                               
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Example questions - replace with actual data from your database -->
                             @foreach ($questions as $question )
                             
                            <tr>
                                <td><input type="checkbox" name="selected_questions[]" value="{{ $question->id }}" class="question-checkbox"></td>
                                <td>{{ $question->question }}?</td>
                                <td>{{ $question->Difficulty }}</td>
                            </tr>
                            @endforeach
                           
                            <!-- Add more questions as needed -->
                        </tbody>
                    </table>
                    </form>
                </div>
               

                <!-- ================ Existing Quizzes List ================= -->
                <div class="recentQuizzes">
                    <div class="cardHeader">
                        <h2>Recent Quizzes</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Quiz Name</td>
                                <td>Time Limit</td>
                                <td>Status</td>
                                <td>Actions</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($Quizzs as $Quizz)
                            <tr>
                                <td>{{ $Quizz->name }}</td>
                                <td>{{ $Quizz->time }} min</td>
                                <td><span class="status {{ $Quizz->is_active ? 'delivered' : 'pending' }}">{{ $Quizz->is_active ? 'Active' : 'Draft' }}</span></td>
                                <td class="actionButtons">
                                    <a href="{{ route('quizz.edit', $Quizz->id) }}" class="editBtn"><ion-icon name="create-outline"></ion-icon></a>
                                    <a href="{{ route('questions.index', $Quizz->id) }}" class="viewBtn"><ion-icon name="list-outline"></ion-icon></a>
                                    <form action="{{ route('quizz.destroy', $Quizz->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="deleteBtn" onclick="return confirm('Are you sure you want to delete this quiz?')">
                                            <ion-icon name="trash-outline"></ion-icon>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if(count($Quizzs) == 0)
                            <tr>
                                <td colspan="5" class="noData">No quizzes found. Create your first quiz!</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="{{ asset('js/main.js') }}"></script>
    
    <!-- Script for Quiz Form Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ajoutQuizzBtn = document.getElementById('ajoutQuizzBtn');
            const quizForm = document.getElementById('quizForm');
            const newQuizForm = document.getElementById('newQuizForm');
            
            // Toggle the quiz form visibility
            ajoutQuizzBtn.addEventListener('click', function(e) {
                e.preventDefault();
                if(quizForm.style.display === 'none') {
                    quizForm.style.display = 'block';
                } else {
                    quizForm.style.display = 'none';
                }
            });
            
            // Handle form submission
            newQuizForm.addEventListener('submit', function(e) {
                // Get all selected questions
                const checkboxes = document.querySelectorAll('.question-checkbox:checked');
                if(checkboxes.length === 0) {
                    e.preventDefault();
                    alert('Please select at least one question for the quiz.');
                    return false;
                }
                
                // Form will submit normally if validation passes
            });
        });
    </script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>