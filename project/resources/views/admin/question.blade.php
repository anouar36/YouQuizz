<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Question Management</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="{{asset('css/Qesition.css')}}">

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
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="{{ asset('admin/users') }}">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="{{ asset('admin/quizz') }}">
                        <span class="icon">
                            <ion-icon name="extension-puzzle-outline"></ion-icon>                        
                        </span>
                        <span class="title">Quizz</span>
                    </a>
                </li>

                <li class="hovered">
                    <a href="#">
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

            <!-- ================ Question Form ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Add New Question</h2>
                        <a href="#" class="btn">Create Question</a>
                    </div>

                    <div class="quizFormContainer">
                        <form class="quizForm" method="POST" action="{{route('question.store')}}">
                            @csrf
                            <div class="formGroup">
                                <label for="questionText">Question Text</label>
                                <textarea id="questionText" name="questionText" required placeholder="Enter your question here..."></textarea>
                            </div>
                            
                            <div class="formRow">
                                <div class="formGroup">
                                    <label for="questionType">Question Type</label>
                                    <select id="questionType" name="questionType" required>
                                        @foreach($types as $type)
                                        <option value="">Select question type</option>
                                        <option value="{{$type->id}}">{{$type->type}} </option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                
                                <div class="formGroup">
                                    <label for="difficulty">Difficulty Level</label>
                                    <select id="difficulty" name="difficulty" required>
                                        <option value="">Select difficulty</option>
                                        <option value="easy">Easy</option>
                                        <option value="medium">Medium</option>
                                        <option value="hard">Hard</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="answerSection">
                                <h3>Answer Options</h3>
                                
                                <div class="formGroup">
                                    <label for="answer1">Answer Option 1</label>
                                    <div class="answerRow">
                                        <input type="text" id="answer1" name="answers[]" required placeholder="Enter answer option">
                                        <label class="correctAnswer">
                                            <input type="radio" name="correctAnswer" value="0" required>
                                            
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="formGroup">
                                    <label for="answer2">Answer Option 2</label>
                                    <div class="answerRow">
                                        <input type="text" id="answer2" name="answers[]" required placeholder="Enter answer option">
                                        <label class="correctAnswer">
                                            <input type="radio" name="correctAnswer" value="1">
                                            
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="formGroup">
                                    <label for="answer3">Answer Option 3</label>
                                    <div class="answerRow">
                                        <input type="text" id="answer3" name="answers[]" required placeholder="Enter answer option">
                                        <label class="correctAnswer">
                                            <input type="radio" name="correctAnswer" value="2">
                                            
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="formGroup">
                                    <label for="answer4">Answer Option 4</label>
                                    <div class="answerRow">
                                        <input type="text" id="answer4" name="answers[]" required placeholder="Enter answer option">
                                        <label class="correctAnswer">
                                            <input type="radio" name="correctAnswer" value="3">
                                            
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="formActions">
                                <button type="button" class="btnCancel">Cancel</button>
                                <button type="submit" class="btnSubmit">Save Question</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- ================= Question List ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Question List</h2>
                    </div>
                    <div class="questionList">
                    @foreach($questions as $question)
                        <!-- Question Item Example 1 -->
                        <div class="questionItem">
                            <div class="questionHeader">
                                <h4>{{$question->question}}?</h4>
                                <span class="questionBadge easy">{{$question->Difficulty}}</span>
                            </div>
                            <div class="answerList">
                                @foreach($question->reponses as $reponse )
                              <div class="answerItem {{ $reponse->isCorrect ? 'correct' : '' }} ">{{ $reponse->reponse}}</div> 
                                @endforeach
                            </div>
                            <div class="questionActions">
                                <button class="editBtn"><ion-icon name="create-outline"></ion-icon></button>
                                <button class="deleteBtn"><ion-icon name="trash-outline"></ion-icon></button>
                            </div>
                            
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>